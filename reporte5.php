<?php
//programa que muestra los resultados finales de las elecciones
    include_once ("conexion.php");
    $sql= "SELECT SUM(v_PPP_P) as totalPPP_P,
                  SUM(v_SOL_P) as totalSOL_P,
                  SUM(v_PPS_P) as totalPPS_P,
                  SUM(v_PL_P) as totalPL_P,
                  SUM(v_AP_P) as totalAP_P,
                  SUM(v_blanco_P) as totalblanco_P,
                  SUM(v_nulo_P) as totalnulo_P,
                  SUM(v_inpugnado_P) as totalinpugnado_P 
            FROM v18_mesas;";
    
    if($resesulta=mysqli_query($conexion,$sql)){
     //echo "New record created successfully";
    }else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
    
    while ($result=mysqli_fetch_array($resesulta)){
        $tPPP_P = $result['totalPPP_P'];
        $tSOL_P = $result['totalSOL_P'];
        $tPPS_P = $result['totalPPS_P'];
        $tPL_P  = $result['totalPL_P'];
        $tAP_P  = $result['totalAP_P'];
        $tblanco_P=$result['totalblanco_P'];
        $tnulo_P=$result['totalnulo_P'];
        $tinpugnado_P=$result['totalinpugnado_P'];
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
    $porcPPP_P= ($tPPP_P*100)/$totaldevotantes;
    $porcSOL_P= ($tSOL_P*100)/$totaldevotantes;
    $porcPPS_P = ($tPPS_P *100) / $totaldevotantes;
    $porcPL_P = ($tPL_P * 100) / $totaldevotantes;
    $porcAP_P = ($tAP_P * 100) / $totaldevotantes;
    $porcblanco_P=($tblanco_P*100)/$totaldevotantes;
    $porcnulo_P=($tnulo_P*100)/$totaldevotantes;
    $porcinpugnado_P=($tinpugnado_P*100)/$totaldevotantes;
    
    $total_contabilizado_voto=$tPPP_P+$tSOL_P+$tPPS_P+ $tPL_P + $tAP_P + $tblanco_P+$tnulo_P+$tinpugnado_P;
    $total_porc_voto=$porcPPP_P+$porcSOL_P+ $porcPPS_P+ $porcPL_P + $porcAP_P +$porcblanco_P+$porcnulo_P+$porcinpugnado_P;

    header('Content-type: application/vnd.ms-excel');
    header("Content-Disposition: attachment; filename=ReporteFinalProvincial.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
?>
   <!DOCTYPE html>
<html>
<head>
    <title>Impresion de los Resultado de las elecciones Municipalidades - Provincial</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>
<body>
     <h1>Reporte de Resultados de Conteo de Votos - Provincial</h1>
     <table border="1">
        <tr>
             <td></td>
             <td style="text-align:center">votos</td>
             <td style="text-align:center">Porcentaje</td>
         </tr>
         <tr>
             <td>Votos por PPP :</td>
             <td><?php echo $tPPP_P ?></td>
             <td><?php echo number_format($porcPPP_P,2)."%" ?></td>
         </tr>
         <tr>
            <td>Votos por Solidaridad :</td>
            <td><?php echo $tSOL_P ?></td>
            <td><?php echo number_format($porcSOL_P,2)."%" ?></td>
         </tr>
        <tr>
            <td>Votos por Perú Patria Segura :</td>
            <td><?php echo $tPPS_P ?></td>
            <td><?php echo number_format($porcPPS_P, 2) . "%" ?></td>
         </tr>
        <tr>
            <td>Votos por Perú libertario :</td>
            <td><?php echo $tPL_P ?></td>
            <td><?php echo number_format($porcPL_P, 2) . "%" ?></td>
         </tr>
                 <tr>
            <td>Votos por Acción Popular :</td>
            <td><?php echo $tAP_P ?></td>
            <td><?php echo number_format($porcAP_P, 2) . "%" ?></td>
         </tr>
          <tr>
            <td>Votos en Blanco :</td>
            <td><?php echo $tblanco_P ?></td>
            <td><?php echo number_format($porcblanco_P,2)."%" ?></td>
         </tr>
        <tr>
            <td>Votos nulos :</td>
            <td><?php echo $tnulo_P ?></td>
            <td><?php echo number_format($porcnulo_P,2)."%" ?></td>
        </tr>
        <tr>
            <td>Votos Inpugnados :</td>
            <td><?php echo $tinpugnado_P ?></td>
            <td><?php echo number_format($porcinpugnado_P,2)."%" ?></td>
        </tr>
        <tr>
            <td>Total General :</td>
            <td><?php echo $total_contabilizado_voto ?></td>
            <td><?php echo number_format($total_porc_voto,2)."%" ?></td>
        </tr>
     </table>
</body>
</html>