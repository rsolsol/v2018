<!DOCTYPE html>
<html>
<head>
    <title>Guardar Actas</title>
    <meta charset="UTF-8">
    <meta name="description" content="Elecciones Municipales 2018">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="css/normaliza.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/estilos.css" type="text/css" media="all">
</head>
<body>
    <h1>Ingrese los resultado de la Actas de Votaci&oacute;n</h1>  
    <section>
        <?php 
            include_once("conexion.php");
            $mesa = $_POST['mesa'];
                    // $sql="SELECT count(*) as cuenta, cole.detalle_cole, distrito.det_distrito,mesa.v_reg, mesa.votantes FROM v16_mesas mesa INNER JOIN v16_colegio cole ON mesa.id_colegios = cole.id_colegio AND mesa.id_distrito = cole.id_distrito_c INNER JOIN v16_distrito distrito ON distrito.id_distrito=mesa.id_distrito WHERE num_mesa='$mesa'";
            $sql = "SELECT count(*) as cuenta, cole.detalle_cole, mesas.estado_mesa FROM v18_mesas mesas INNER JOIN v18_colegio cole ON cole.id_colegio = mesas.id_colegio WHERE num_mesa = '$mesa'";
            $q = mysqli_query($conexion, $sql);
                //verificamos que no este entrando una mesa falsa o mesa ya contabilizada         
            while ($resultado = mysqli_fetch_array($q)) {
                if ($resultado['estado_mesa'] == '2') {
                    $variable = "Mesa ya Procesada!!";
                    echo '<script language="javascript">alert("' . $variable . '");';
                    echo "location.href = \"http://www.v2018.com.mialias.net/\"";
                    echo '</script>';
                }
                if ((string)$resultado['cuenta'] < '1') {
                    $variable = "Mesa No Encontrada, por favor Verficar!!";
                    echo '<script language="javascript">alert("' . $variable . '");';
                    echo "location.href = \"http://www.v2018.com.mialias.net/\"";
                    echo '</script>';
                }
                    //fin de la verificacion que no este entrando una mesa falsa
                    //   $det_distrito=$resultado['det_distrito'];
                $det_coles = $resultado['detalle_cole'];
                        // $votantes=$resultado['votantes']; 
            }
        ?>
   </section>
    <section class="container">
        <div class="cuerpo2">
            <table border="1" class="tablita2">
                <form class="llenado_form" action="grabamesa.php" method="POST" name="form1" id="form1">
                    <tr>
                        <span class="requiere_notificacion">* Completar todo</span>
                        <td class="llenado_form">
                                <ul class="clasicas">
                                        <input type="text" name="mesa" value="<?php echo $mesa; ?>" hidden/> 
                                    <li>
                                
                                    </li>
                                    <li class="clasicas">
                                        <label class="clasicas" for="marlon"> Votos x PPP: </label>
                                        <input class="clasicas" type="text" name="voto_PPP_P" required autofocus pattern="[0-9]{1,3}"/>
                                        <img src="images/ppp.png" alt="">
                                    </li>
                                    <li class="clasicas">
                                        <label class="clasicas" for="SOL"> Votos x SOL: </label>
                                        <input class="clasicas" type="text" name="voto_SOL_P" required pattern="[0-9]{1,3}"/>
                                        <img src="images/psn.png" alt="">
                                    </li>
                                    <li class="clasicas">
                                        <label class="clasicas" for="PPS"> Votos x PPS: </label>
                                        <input class="clasicas" type="text" name="voto_PPS_P" required pattern="[0-9]{1,3}"/>
                                        <img src="images/pps.png" alt="">
                                    </li>
                                    <li class="clasicas">
                                        <label class="clasicas" for="PL"> Votos x PL: </label>
                                        <input class="clasicas" type="text" name="voto_PL_P" required pattern="[0-9]{1,3}"/>
                                        <img src="images/pl.png" alt="">
                                    </li>
                                    <li class="clasicas">
                                        <label class="clasicas" for="AP"> Votos x AP: </label>
                                        <input class="clasicas" type="text" name="voto_AP_P" required pattern="[0-9]{1,3}"/>
                                        <img src="images/ap.png" alt="">
                                    </li>
                                    <li>
                                        <label class="clasicas" for="blanco">Votos en Blanco: </label>
                                        <input class="clasicas" type="text" name="votoblanco_P" required pattern="[0-9]{1,3}"/>
                                    </li>
                                    <li>
                                        <label class="clasicas" for="anulados">Votos anulados: </label>
                                        <input class="clasicas" type="text" name="votoanulados_P" required pattern="[0-9]{1,3}"/>
                                    </li>
                                    <li>
                                        <label class="clasicas" for="inpugnado">Votos Inpugnados: </label>
                                        <input class="clasicas" type="text" name="votoinpugnados_P" required pattern="[0-9]{1,3}"/></p> 
                                    </li>
                                </ul>
                            
                        </td>
                        <td class="llenado_form">
                            <ul class="clasicas">
                                    <input type="text" name="" value="" hidden/> 
                                <li class="clasicas">
                                    <label class="clasicas" for="PPP"> Votos x PPP D: </label>
                                    <input class="clasicas" type="text" name="voto_PPP_D" required pattern="[0-9]{1,3}"/>
                                    <img src="images/ppp.png" alt="">
                                </li>
                                <li class="clasicas">
                                    <label class="clasicas" for="SOL"> Votos x SOL D: </label>
                                    <input class="clasicas" type="text" name="voto_SOL_D" required pattern="[0-9]{1,3}"/>
                                    <img src="images/psn.png" alt="">
                                </li>
                                <li class="clasicas">
                                    <label class="clasicas" for="SP"> Votos x SP D: </label>
                                    <input class="clasicas" type="text" name="voto_SP_D" required pattern="[0-9]{1,3}"/>
                                    <img src="images/sp.png" alt="">
                                </li>
                                <li class="clasicas">
                                    <label class="clasicas" for="SU"> Votos x SU D: </label>
                                    <input class="clasicas" type="text" name="voto_SU_D" required pattern="[0-9]{1,3}"/>
                                    <img src="images/su.png" alt="">
                                </li>
                                <li class="clasicas">
                                    <label class="clasicas" for="AP"> Votos x AP D: </label>
                                    <input class="clasicas" type="text" name="voto_AP_D" required pattern="[0-9]{1,3}"/>
                                    <img src="images/avp.png" alt="">
                                </li>
                                <li>
                                    <label class="clasicas" for="blanco">Votos en Blanco: </label>
                                    <input class="clasicas" type="text" name="votoblanco_D" required pattern="[0-9]{1,3}"/>
                                </li>
                                <li>
                                    <label class="clasicas" for="anulados">Votos anulados: </label>
                                    <input class="clasicas" type="text" name="votoanulados_D" required pattern="[0-9]{1,3}"/>
                                </li>
                                <li>
                                    <label class="clasicas" for="inpugnado">Votos Inpugnados: </label>
                                    <input class="clasicas" type="text" name="votoinpugnados_D" required pattern="[0-9]{1,3}"/></p> 
                                </li>
                            </ul>                        
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"  style="text-align:center;">
                            <button class="submit" type="submit">Grabar Acta</button>
                            <button class="submit" type="submit" onClick="location.href='index.php'">Cancelar</button>
                        </td>
                    </tr>           
                </form>
            </table>
        </div>
    </section>
</body>
</html>
