<?php
//programa que muestra los resultados finales de las elecciones
    include_once ("conexion.php");
    $sql= "SELECT SUM(v_PPP_D) as totalPPP_D,
                  SUM(v_SOL_D) as totalSOL_D,
                  SUM(v_SP_D) as totalSP_D,
                  SUM(v_SU_D) as totalSU_D,
                  SUM(v_AP_D) as totalAP_D,
                  SUM(v_blanco_D) as totalblanco_D,
                  SUM(v_nulo_D) as totalnulo_D,
                  SUM(v_inpugnado_D) as totalinpugnado_D 
            FROM v18_mesas;";
    
    if($resesulta=mysqli_query($conexion,$sql)){
     //echo "New record created successfully";
    }else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
    
    while ($result=mysqli_fetch_array($resesulta)){
        $tPPP_D=$result['totalPPP_D'];
        $tSOL_D=$result['totalSOL_D'];
        $tSP_D = $result['totalSP_D'];
        $tSU_D = $result['totalSU_D'];
        $tAP_D = $result['totalAP_D'];
        $tblanco_D=$result['totalblanco_D'];
        $tnulo_D=$result['totalnulo_D'];
        $tinpugnado_D=$result['totalinpugnado_D'];
    }
    //sacar el total de votantes en los 9 distritos.//
    $sql2= "SELECT SUM(num_votantes) as tvotantes FROM v18_mesas;";
    if($resesulta2=mysqli_query($conexion,$sql2)){
     //echo "New record created successfully";
    }else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conexion);
    }
    while ($result2=mysqli_fetch_array($resesulta2)){
        $totaldevotantes=$result2['tvotantes'];
        //echo  $totaldevotantes;
    }
    //sacar el porcentaje por totales
    $porcPPP_D= ($tPPP_D*100)/$totaldevotantes;
    $porcSOL_D= ($tSOL_D*100)/$totaldevotantes;
    $porcSP_D = ($tSP_D *100) / $totaldevotantes;
    $porcSU_D = ($tSU_D * 100) / $totaldevotantes;
    $porcAP_D = ($tAP_D * 100) / $totaldevotantes;
    $porcblanco_D=($tblanco_D*100)/$totaldevotantes;
    $porcnulo_D=($tnulo_D*100)/$totaldevotantes;
    $porcinpugnado_D=($tinpugnado_D*100)/$totaldevotantes;
    
    $total_contabilizado_voto=$tPPP_D+$tSOL_D+$tSP_D+ $tSU_D + $tAP_D + $tblanco_D+$tnulo_D+$tinpugnado_D;
    $total_porc_voto=$porcPPP_D+$porcSOL_D+ $porcSP_D+ $porcSU_D + $porcAP_D +$porcblanco_D+$porcnulo_D+$porcinpugnado_D;
    
    header('Content-type: application/vnd.ms-excel');
    header("Content-Disposition: attachment; filename=ReporteFinalDistrital.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
?>
   <!DOCTYPE html>
<html>
<head>
    <title>Impresion de los Resultado de las elecciones Municipalidades</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>
<body>
     <h1>Reporte de Resultados de Conteo de Votos - Distrital</h1>
     <table border="1">
        <tr>
             <td></td>
             <td style="text-align:center">votos</td>
             <td style="text-align:center">Porcentaje</td>
         </tr>
         <tr>
             <td>Votos por PPP :</td>
             <td><?php echo $tPPP_D ?></td>
             <td><?php echo number_format($porcPPP_D,2)."%" ?></td>
         </tr>
         <tr>
            <td>Votos por Solidaridad :</td>
            <td><?php echo $tSOL_D ?></td>
            <td><?php echo number_format($porcSOL_D,2)."%" ?></td>
         </tr>
        <tr>
            <td>Votos por Somo Peru :</td>
            <td><?php echo $tSP_D ?></td>
            <td><?php echo number_format($porcSP_D, 2) . "%" ?></td>
         </tr>
        <tr>
            <td>Votos por Siempre Unidos :</td>
            <td><?php echo $tSU_D ?></td>
            <td><?php echo number_format($porcSU_D, 2) . "%" ?></td>
         </tr>
                 <tr>
            <td>Votos por Avanza Pais :</td>
            <td><?php echo $tAP_D ?></td>
            <td><?php echo number_format($porcAP_D, 2) . "%" ?></td>
         </tr>
          <tr>
            <td>Votos en Blanco :</td>
            <td><?php echo $tblanco_D ?></td>
            <td><?php echo number_format($porcblanco_D,2)."%" ?></td>
         </tr>
        <tr>
            <td>Votos nulos :</td>
            <td><?php echo $tnulo_D ?></td>
            <td><?php echo number_format($porcnulo_D,2)."%" ?></td>
        </tr>
        <tr>
            <td>Votos Inpugnados :</td>
            <td><?php echo $tinpugnado_D ?></td>
            <td><?php echo number_format($porcinpugnado_D,2)."%" ?></td>
        </tr>
        <tr>
            <td>Total General :</td>
            <td><?php echo $total_contabilizado_voto ?></td>
            <td><?php echo number_format($total_porc_voto,2)."%" ?></td>
        </tr>
     </table>
</body>
</html>
       
   
   
   
   

