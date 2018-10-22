<!DOCTYPE html>
<html>
<head>
    <title>Conteo General de Votos por Distrito</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>
<body>
     <h1>Reporte de Conteo General de Votos por Distrito</h1>
     <table border="1">
         <tr>
             <td>Distritos:</td>
             <td>Keiko</td>
             <td>PPK</td>
             <td>Blanco</td>
             <td>Nulo</td>
             <td>Inpugnado</td>
             <?php echo tabla();?>
         </tr>
     </table>
</body>
</html>
<?php
    function tabla()
    {
        header('Content-type: application/vnd.ms-excel');
        header("Content-Disposition: attachment; filename=reportevotosxdistr.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        include_once ("conexion.php");
        $sql="SELECT id_distrito, det_distrito FROM v16_distrito;";
        if($resulta=mysqli_query($conexion,$sql)){
        //echo "New record created successfully";
        }else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        }
        $totalk=0;
        $totalppk=0;
        $totalblanco=0;
        $totalnulo=0;
        $totalinpugnados=0;                                    
        while ($result=mysqli_fetch_array($resulta)){            
            echo "<tr>";
            echo "<td>";
            echo $result['det_distrito'];
            echo " </td>";
            $distrito=$result['id_distrito'];
            //totaliza los votos por distritos
            $sql2="SELECT SUM(v_k) totalk, SUM(v_ppk) totalppk,SUM(v_blanco) totalblanco,SUM(v_nulo) totalnulo,SUM(v_inpugnado) totalinpugnados  FROM v16_mesas WHERE id_distrito=$distrito";
            if($resesulta2=mysqli_query($conexion,$sql2)){
                //echo "New record created successfully";
            }else {
                echo "Error: " . $sql2 . "<br>" . mysqli_error($conexion);
            }                 
            while ($result2=mysqli_fetch_array($resesulta2)){
                $totalk=$totalk+$result2['totalk'];
                $totalppk=$totalppk+$result2['totalppk'];
                $totalblanco=$totalblanco+$result2['totalblanco'];
                $totalnulo=$totalnulo+$result2['totalnulo'];
                $totalinpugnados=$totalinpugnados+$result2['totalinpugnados'];
                echo "<td>";
                echo $result2['totalk'];
                echo " </td>";                                                        
                echo "<td>";
                echo $result2['totalppk'];
                echo " </td>";
                echo "<td>";
                echo $result2['totalblanco'];
                echo " </td>"; 
                echo "<td>";
                echo $result2['totalnulo'];
                echo " </td>"; 
                echo "<td>";
                echo $result2['totalinpugnados'];
                echo " </td>";
            }
            // fin de totalizar los votos
            echo "</tr>";
        }            
            echo "<td>Total General</td>";
            echo "<td>".$totalk."</td>";
            echo "<td>".$totalppk."</td>";
            echo "<td>".$totalblanco."</td>";
            echo "<td>".$totalnulo."</td>";
            echo "<td>".$totalinpugnados."</td>";
    }
?>