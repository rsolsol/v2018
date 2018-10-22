<?php 
    include_once ("conexion.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Resultado x Provincial</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="css/normaliza.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/estilos.css" type="text/css" media="all">
</head>
<body>
    <h1>Conteo General del Voto Provincial</h1>
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
    $sql= "SELECT SUM(v_PPP_P) as total_PPP_P,
                  SUM(v_SOL_P) as total_SOL_P,
                  SUM(v_PPS_P) as total_PPS_P,
                  SUM(v_PL_P) as total_PL_P,
                  SUM(v_AP_P) as total_AP_P,
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
        $tPPP_P= $result['total_PPP_P'];
        $tSOL_P= $result['total_SOL_P'];
        $tPPS_P = $result['total_PPS_P'];
        $tPL_P = $result['total_PL_P'];
        $tAP_P = $result['total_AP_P'];
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
    $porcPPS_P = ($tPPS_P * 100) / $totaldevotantes;
    $porcPL_P = ($tPL_P * 100) / $totaldevotantes;
    $porcAP_P = ($tAP_P * 100) / $totaldevotantes;
    $porcblanco_P=($tblanco_P*100)/$totaldevotantes;
    $porcnulo_P=($tnulo_P*100)/$totaldevotantes;
    $porcinpugnado_P=($tinpugnado_P*100)/$totaldevotantes;
    
    $total_contabilizado_voto=$tPPP_P+$tSOL_P+$tblanco_P+$tnulo_P+$tinpugnado_P;
    $total_porc_voto=$porcPPP_P+$porcSOL_P+$porcblanco_P+$porcnulo_P+$porcinpugnado_P;
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
                                    <input type="text" class="box2" name="votoPPP_P" style="text-align: right;" disabled value="<?php echo $tPPP_P; ?>"/>
                                    <img src="images/ppp.png" style="padding:1px;" alt="">
                                </li>
                                <li>
                                    <label for="keiko"><b style="color:#ff5a00;font-size:1.40em;"> VOTOS x SOL:</b></label>
                                    <input type="text" class="box" name="votoSOL_P" style="text-align:right;" disabled value="<?php echo $tSOL_P; ?>"/>
                                    <img src="images/psn.png" style="padding:1px;" alt="">
                                </li>
                                <li>
                                    <label for="ppk"><b style="color:#1c9bd6 ;font-size:1.40em;"> VOTOS x PPS:</b></label>
                                    <input type="text" class="box2" name="votoPPS_P" style="text-align:right;" disabled value="<?php echo $tPPS_P; ?>"/>
                                    <img src="images/sp.png" style="padding:1px;" alt="">
                                </li>
                               <li>
                                    <label for="ppk"><b style="color:#1c9bd6 ;font-size:1.40em;"> VOTOS x PL:</b></label>
                                    <input type="text" class="box2" name="votoPL_P" style="text-align:right;" disabled value="<?php echo $tPL_P; ?>"/>
                                    <img src="images/su.png" style="padding:1px;" alt="">
                                </li>
                                <li>
                                    <label for="ppk"><b style="color:#1c9bd6 ;font-size:1.40em;"> VOTOS x AcP:</b></label>
                                    <input type="text" class="box2" name="votoAP_P" style="text-align:right;" disabled value="<?php echo $tAP_P; ?>"/>
                                    <img src="images/ap.png" style="padding:1px;" alt="">
                                </li>
                                <li>
                                    <label for="blanco" style="font-size:1.40em;">Votos en Blanco: </label>
                                    <input type="text" name="votoblanco" style="text-align: right;" disabled value="<?php echo $tblanco_P; ?>"/>
                                </li>
                                <li>
                                    <label for="anulados" style="font-size:1.40em;">Votos anulados: </label>
                                    <input type="text" name="votoanulados" style="text-align: right;" disabled value="<?php echo $tnulo_P; ?>"/>
                                </li>
                                <li>
                                    <label for="inpugnado" style="font-size:1.40em;">Votos Inpugnados: </label>
                                    <input type="text" name="votoinpugnados" style="text-align: right;" disabled value="<?php echo $tinpugnado_P; ?>"/> 
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
                                <input type="text" class="box2" name="votoPPP_P" style="text-align: right;" disabled value="<?php echo number_format($porcPPP_P,2)."%"; ?>"/>
                            </li>
                            <li>
                                <input type="text" class="box" name="votoSOL_P" style="text-align: right;" disabled value="<?php echo number_format($porcSOL_P,2)."%"; ?>"/> 
                            </li>
                            <li>
                                <input type="text" class="box2" name="votoPPS_P" style="text-align: right;" disabled value="<?php echo number_format($porcPPS_P, 2) . "%"; ?>"/> 
                            </li>
                            <li>
                                <input type="text" class="box2" name="votoPL_P" style="text-align: right;" disabled value="<?php echo number_format($porcPL_P, 2) . "%"; ?>"/> 
                            </li>
                            <li>
                                <input type="text" class="box2" name="votoAP_P" style="text-align: right;" disabled value="<?php echo number_format($porcAP_P, 2) . "%"; ?>"/> 
                            </li>
                            <li>
                                <input type="text" name="votoblanco_P" style="text-align: right;" disabled value="<?php echo number_format($porcblanco_P,2)."%"; ?>"/>
                            </li>
                            <li>
                                <input type="text" name="votoanulados_D" style="text-align: right;" disabled value="<?php echo number_format($porcnulo_P,2)."%"; ?>"/>
                            </li>
                            <li>
                                <input type="text" name="votoinpugnados_D" style="text-align: right;" disabled value="<?php echo number_format($porcinpugnado_P,2)."%"; ?>"/> 
                            </li>
                            </ul>
                            <li style="list-style-type:none;">
                                <input class="box" type="text" name="t_porc_voto" disabled value="<?php echo number_format($total_porc_voto,2)."%"; ?>"/> 
                                <label for="t_porc_voto"><b>TOTAL PORCENTUAL: </b></label>
                            </li>
                        </form>
                </td>
                 <button class="submit" type="submit" onClick="location.href='reporte5.php'">Imprimir</button>
                </tr>               
            </table>
        </div>
    </section>
</body>
</html>