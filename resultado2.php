<!DOCTYPE html>
<html>
<head>
    <title>Conteo por Distritos</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="css/normaliza.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/estilos.css" type="text/css" media="all">
</head>
<body>
    <h1 style="color: white;">CONTEO GENERAL DE VOTOS POR DISTRITOS</h1>
    <div style="text-align:center;">
        <nav style="display: inline-block;">
            <ul id="mini-menu">
                <li><a href="http://www.v2018.com.mialias.net/resultado1.php">Resultado Distrital</a></li>
                <li><a href="http://www.v2018.com.mialias.net/resultado5.php">Resultado Provincial</a></li>
                <!-- <li><a href="http://192.168.1.109/v2016/resultado2.php">Resultados por Distrito</a></li> -->
                <li><a href="http://www.v2018.com.mialias.net/resultado3.php">Mesas que no presentaron Repote</a></li>
                <li><a href="http://www.v2018.com.mialias.net/resultado4.php">Conteo por Colegios</a></li>
            </ul>
        </nav>
      </div>
    <section class="container">
        <div class="cuerpo2">
            <table border="1" class="tablita3">
                <tr>
                    <td>
                       <form class="llenado_form2" action="grabamesa.php" method="POST" name="form1" id="form1">                          
                            <ul  style="width:800px;">
                              <table class="tablita4">
                                  <tr style="text-align:center;">
                                        <td>&nbsp;&nbsp;&nbsp;</td>                                   
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td>&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;</td>
                                      <td style="color: #DA1515;"><b>&nbsp;&nbsp;DISTRITOS&nbsp;</b></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;</td>
                                        <td>&nbsp;&nbsp;</td>
                                      <td style='color: #FF0000;'><b>&nbsp;&nbsp;&nbsp;&nbsp;MARLON</b></td>
                                      <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                      <td style='color: #1c9bd6;'><b>&nbsp;&nbsp;RENAN</b></td>
                                      <td></td>
                                        <td></td>
                                        <td>&nbsp;</td>                                    
                                      <td><b>&nbsp;&nbsp;&nbsp;BLANCO&nbsp;</b></td>
                                        <td></td>
                                        <td>&nbsp;</td>
                                      <td><b>&nbsp;NULO</b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                      <td><b>&nbsp;INPUGNADO</b></td>
                                  </tr>
                              </table>
                               <?php
                                    //programa que muestra los resultados finales de las elecciones
                                    include_once ("conexion.php");
                                    $sql="SELECT id_distrito, det_distrito FROM v18_distrito;";
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
                                        $distrito=$result['id_distrito'];
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
                                            echo "<li>";
                                            echo "<b><label>Distrito de ".$result['det_distrito']. "</label><b>";                                            
                                            echo "<input class='box' disabled value=";
                                            echo $result2['totalk'];
                                            echo ">";    
                                            echo "  ";
                                            echo "<input class='box2' disabled value=";
                                            echo $result2['totalppk'];
                                            echo ">";    
                                            echo "  ";
                                            echo "<input disabled value=";
                                            echo $result2['totalblanco'];
                                            echo ">";
                                            echo "  ";
                                            echo "<input disabled value=";
                                            echo $result2['totalnulo'];
                                            echo ">"; 
                                            echo "  ";
                                            echo "<input disabled value=";
                                            echo $result2['totalinpugnados'];
                                            echo ">"; 
                                            echo "</li>";
                                        }
                                    }
                                echo "<li>";
                                echo "<b><label style='color: #DA1515;'>CONTEO GENERAL</label><b>";                                            
                                echo "<input class='box' disabled value=";
                                echo $totalk;
                                echo ">";    
                                echo "  ";
                                echo "<input class='box' disabled value=";
                                echo $totalppk;
                                echo ">";    
                                echo "  ";
                                echo "<input class='box' disabled value=";
                                echo $totalblanco;
                                echo ">";    
                                echo "  ";
                                echo "<input class='box' disabled value=";
                                echo $totalnulo;
                                echo ">";    
                                echo "  ";
                                echo "<input class='box' disabled value=";
                                echo $totalinpugnados;
                                echo ">";    
                                echo "</li>";
                                ?>                                                          
                            </ul>                            
                        </form>
                    </td>                                
                 <button class="submit" type="submit" onClick="location.href='reporte2.php'">Imprimir</button>
                </tr>               
            </table>
        </div>
    </section>    