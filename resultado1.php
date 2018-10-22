<?php 
    include_once ("conexion.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Resultado x Distrital</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="css/normaliza.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/estilos.css" type="text/css" media="all">
</head>
<body>
    <h1>Conteo General del Voto Distrital</h1>
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
<?php 
    $sql= "SELECT SUM(v_PPP_D) as total_PPP_D,
                  SUM(v_SOL_D) as total_SOL_D,
                  SUM(v_SP_D) as total_SP_D,
                  SUM(v_SU_D) as total_SU_D,
                  SUM(v_AP_D) as total_AP_D,
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
        $tPPP_D= $result['total_PPP_D'];
        $tSOL_D= $result['total_SOL_D'];
        $tSP_D = $result['total_SP_D'];
        $tSU_D = $result['total_SU_D'];
        $tAP_D = $result['total_AP_D'];
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
    $porcSP_D = ($tSP_D * 100) / $totaldevotantes;
    $porcSU_D = ($tSU_D * 100) / $totaldevotantes;
    $porcAP_D = ($tAP_D * 100) / $totaldevotantes;
    $porcblanco_D=($tblanco_D*100)/$totaldevotantes;
    $porcnulo_D=($tnulo_D*100)/$totaldevotantes;
    $porcinpugnado_D=($tinpugnado_D*100)/$totaldevotantes;
    
    $total_contabilizado_voto=$tPPP_D+$tSOL_D+$tblanco_D+$tnulo_D+$tinpugnado_D;
    $total_porc_voto=$porcPPP_D+$porcSOL_D+$porcblanco_D+$porcnulo_D+$porcinpugnado_D;
?>
    <section class="container">
        <div class="cuerpo2">
            <table border="1" class="tablita3">
                <tr>
                    <td>
                       <form class="llenado_form" action="grabamesa.php" method="POST" name="form1" id="form1">
                            <ul>
                                <li><h2>CONTEO DE VOTOS DISTRITAL</h2></li>
                                <li>
                                    <label for="ppk"><b style="color:#1c9bd6 ;font-size:1.40em;"> VOTOS x PPP: </b></label>
                                    <input type="text" class="box2" name="votoPPP_D" style="text-align: right;" disabled value="<?php echo $tPPP_D; ?>"/>
                                    <img src="images/ppp.png" style="padding:1px;" alt="">
                                </li>
                                <li>
                                    <label for="keiko"><b style="color:#ff5a00;font-size:1.40em;"> VOTOS x SOL:</b></label>
                                    <input type="text" class="box" name="votoSOL_D" style="text-align:right;" disabled value="<?php echo $tSOL_D; ?>"/>
                                    <img src="images/psn.png" style="padding:1px;" alt="">
                                </li>
                                <li>
                                    <label for="ppk"><b style="color:#1c9bd6 ;font-size:1.40em;"> VOTOS x SP:</b></label>
                                    <input type="text" class="box2" name="votoSP_D" style="text-align:right;" disabled value="<?php echo $tSP_D; ?>"/>
                                    <img src="images/sp.png" style="padding:1px;" alt="">
                                </li>
                               <li>
                                    <label for="ppk"><b style="color:#1c9bd6 ;font-size:1.40em;"> VOTOS x SU:</b></label>
                                    <input type="text" class="box2" name="votoSU_D" style="text-align:right;" disabled value="<?php echo $tSU_D; ?>"/>
                                    <img src="images/su.png" style="padding:1px;" alt="">
                                </li>
                                <li>
                                    <label for="ppk"><b style="color:#1c9bd6 ;font-size:1.40em;"> VOTOS x AP:</b></label>
                                    <input type="text" class="box2" name="votoAP_D" style="text-align:right;" disabled value="<?php echo $tAP_D; ?>"/>
                                    <img src="images/ap.png" style="padding:1px;" alt="">
                                </li>
                                <li>
                                    <label for="blanco" style="font-size:1.40em;">Votos en Blanco: </label>
                                    <input type="text" name="votoblanco" style="text-align: right;" disabled value="<?php echo $tblanco_D; ?>"/>
                                </li>
                                <li>
                                    <label for="anulados" style="font-size:1.40em;">Votos anulados: </label>
                                    <input type="text" name="votoanulados" style="text-align: right;" disabled value="<?php echo $tnulo_D; ?>"/>
                                </li>
                                <li>
                                    <label for="inpugnado" style="font-size:1.40em;">Votos Inpugnados: </label>
                                    <input type="text" name="votoinpugnados" style="text-align: right;" disabled value="<?php echo $tinpugnado_D; ?>"/> 
                                </li>
                            </ul>
                            <li style="list-style-type:none;">
                                <label for="t_gen_voto"><b>TOTAL DE VOTOS: </b></label>
                                <input class="box" type="text" name="t_gen_voto" disabled value="<?php echo $total_contabilizado_voto; ?>"/> 
                            </li>
                        </form>
                    </td>
                    
                <td>
                    <form class="llenado_form" action="grabamesa.php" method="POST" name="form1" id="form1">                          
                        <ul style="text-align: center;">
                            <li style="text-align: center;">
                                <h2>PORCENTAJE</h2>
                            </li>
                            <li>
                                <input type="text" class="box2" name="votoPPP_D" style="text-align: right;" disabled value="<?php echo number_format($porcPPP_D,2)."%"; ?>"/>
                            </li>
                            <li>
                                <input type="text" class="box" name="votoSOL_D" style="text-align: right;" disabled value="<?php echo number_format($porcSOL_D,2)."%"; ?>"/> 
                            </li>
                            <li>
                                <input type="text" class="box2" name="votoSP_D" style="text-align: right;" disabled value="<?php echo number_format($porcSP_D, 2) . "%"; ?>"/> 
                            </li>
                            <li>
                                <input type="text" class="box2" name="votoSU_D" style="text-align: right;" disabled value="<?php echo number_format($porcSU_D, 2) . "%"; ?>"/> 
                            </li>
                            <li>
                                <input type="text" class="box2" name="votoAP_D" style="text-align: right;" disabled value="<?php echo number_format($porcAP_D, 2) . "%"; ?>"/> 
                            </li>
                            <li>
                                <input type="text" name="votoblanco_D" style="text-align: right;" disabled value="<?php echo number_format($porcblanco_D,2)."%"; ?>"/>
                            </li>
                            <li>
                                <input type="text" name="votoanulados_D" style="text-align: right;" disabled value="<?php echo number_format($porcnulo_D,2)."%"; ?>"/>
                            </li>
                            <li>
                                <input type="text" name="votoinpugnados_D" style="text-align: right;" disabled value="<?php echo number_format($porcinpugnado_D,2)."%"; ?>"/> 
                            </li>
                            </ul>
                            <li style="list-style-type:none;">
                                <input class="box" type="text" name="t_porc_voto" disabled value="<?php echo number_format($total_porc_voto,2)."%"; ?>"/> 
                                <label for="t_porc_voto"><b>TOTAL PORCENTUAL: </b></label>
                            </li>
                        </form>
                </td>
                 <button class="submit" type="submit" onClick="location.href='reporte1.php'">Imprimir</button>
                </tr>               
            </table>
        </div>
    </section>
</body>
</html>
