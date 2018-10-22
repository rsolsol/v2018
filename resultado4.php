<!DOCTYPE html>
<html>
<head>
    <title>POR CENTRO DE VOTACI&oacute;N</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="css/normaliza.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/estilos.css" type="text/css" media="all">
</head>
<body>
    <h1 style="color: white;">POR CENTRO DE VOTACI&oacute;N</h1>
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
              <thead style="text-align:center;">
                  <tr>
                      <th>Nª</th>
                      <th>Distrito</th>
                      <th>Colegio</th>
                      <th class="box" style='color: #FF0000;'>PPP</th>
                      <th class="box2" style='color: #1c9bd6;'>SOL</th>
                      <th class="box2" style='color: #1c9bd6;'>SP</th>
                      <th class="box2" style='color: #1c9bd6;'>SU</th>
                      <th class="box2" style='color: #1c9bd6;'>AP</th>
                      <th>blanco</th>
                      <th>Nulo</th>
                      <th>Inpugnados</th>
                      <th>Total</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                    include_once ("conexion.php");
                    $sql="SELECT id_distrito,det_distrito FROM v18_distrito;";
                    if($resulta=mysqli_query($conexion,$sql)){
                         //echo "New record created successfully";
                        }else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
                        }
                    while($result=mysqli_fetch_array($resulta)){
                        $distrito=$result['id_distrito'];
                        $distritos=$result['id_distrito'];
                        $totgPPP_D='0'; $totgSOL_D='0'; $totgblanco_D='0'; $totgnul_Do='0'; $totginpugnado_D='0'; $totggeneral='0';
                        $cont='0';
                        $sql2="SELECT id_colegio,detalle_cole FROM v18_colegio WHERE id_distrito_c='$distrito';";
                        if($resulta2=mysqli_query($conexion,$sql2)){
                        }else {
                            echo "Error: " . $sql2 . "<br>" . mysqli_error($conexion);
                        }
                        while($result2=mysqli_fetch_array($resulta2)){
                            $cont=$cont+1;
                            $cole=$result2['id_colegio'];
                            
                            echo "<tr>";
                            echo "<td>".$cont."</td>";
                            echo "<td>".$result['det_distrito']."</td>";
                            echo "<td>".$result2['detalle_cole']."</td>";
                            $sql3="SELECT SUM(v_PPP_D) totalPPP_D,
                                          SUM(v_SOL_D) totalSOL_D,
                                          SUM(v_SP_D) totalSP_D,
                                          SUM(v_SU_D) totalSU_D,
                                          SUM(v_AP_D) totalAP_D,
                                          SUM(v_blanco_D) totalblanco_D,
                                          SUM(v_nulo_D) totalnulo_D,
                                          SUM(v_inpugnado_D) totalinpugnado_D 
                                    FROM v18_mesas WHERE id_colegio='$cole' AND estado_mesa='2';";
                            if($resulta3=mysqli_query($conexion,$sql3)){
                                
                            }else{
                                echo "Error: " . $sql3 . "<br>" . mysqli_error($conexion);
                            }
                            while($result3=mysqli_fetch_array($resulta3)){
                                $total=$result3['totalPPP_D']+$result3['totalSOL_D']+ $result3['totalSP_D']+ $result3['totalSU_D']+ $result3['totalAP_D'] +$result3['totalblanco_D']+$result3['totalnulo_D']+$result3['totalinpugnado_D'];
                                $totgPPP_D=$totgPPP_D+$result3['totalPPP_D'];
                                $totgSOL_D=$totgSOL_D+$result3['totalSOL_D'];
                                $totgSP_D = $totgSP_D + $result3['totalSP_D'];
                                $totgSU_D = $totgSU_D + $result3['totalSU_D'];
                                $totgAP_D = $totgAP_D + $result3['totalAP_D'];
                                $totgblanco_D=$totgblanco_D+$result3['totalblanco_D'];
                                $totgnul_Do=$totgnul_Do+$result3['totalnulo_D'];
                                $totginpugnado_D=$totginpugnado_D+$result3['totalinpugnado_D'];
                                $totggeneral=$totggeneral+$total;
                                echo "<td class='boxito'>".$result3['totalPPP_D']."</td>";
                                echo "<td class='boxito2'>".$result3['totalSOL_D']."</td>";
                                echo "<td class='boxito2'>".$result3['totalSP_D']."</td>";
                                echo "<td class='boxito2'>".$result3['totalSU_D']."</td>";
                                echo "<td class='boxito2'>".$result3['totalAP_D']."</td>";
                                echo "<td class='boxito3'>".$result3['totalblanco_D']."</td>";
                                echo "<td class='boxito3'>".$result3['totalnulo_D']."</td>";
                                echo "<td class='boxito3'>".$result3['totalinpugnado_D']."</td>";
                                echo "<td class='boxito3'>".$total."</td>";
                            echo "</tr>";
                            }
                        }
                        switch ($distritos) {
                            case "0":
                            //echo "<td> total de mesas faltante del distrito de ANCON </td>";
                                break;
                            case "1":
                                echo "<td colspan='2'><b> TOTAL POR CENTROS DE VOTACION DE PUENTE PIEDRA </b></td>";
                                echo "<td class='boxito3'>".$cont." Centros </td>";
                                echo "<td class='boxito'>".$totgPPP_D."</td>";
                                echo "<td class='boxito2'>".$totgSOL_D."</td>";
                                echo "<td class='boxito2'>".$totgSP_D."</td>";
                                echo "<td class='boxito2'>".$totgSU_D."</td>";
                                echo "<td class='boxito2'>".$totgAP_D."</td>";
                                echo "<td class='boxito3'>".$totgblanco_D."</td>";
                                echo "<td class='boxito3'>".$totgnul_Do."</td>";
                                echo "<td class='boxito3'>".$totginpugnado_D."</td>";
                                echo "<td class='boxito3'>".$totggeneral."</td>";
                                //echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                break;
                            case "2":
                                    echo "<td colspan='2'><b> TOTAL POR CENTROS DE VOTACION DE CARABAYLLO </b></td>";
                                    echo "<td class='boxito3'>".$cont." Centros  </td>";
                                    echo "<td class='boxito'>".$totgPPP_D."</td>";
                                    echo "<td class='boxito2'>".$totgSOL_D."</td>";
                                    echo "<td class='boxito3'>".$totgblanco_D."</td>";
                                    echo "<td class='boxito3'>".$totgnul_Do."</td>";
                                    echo "<td class='boxito3'>".$totginpugnado_D."</td>";
                                    echo "<td class='boxito3'>".$totggeneral."</td>";
                                    //echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                    break;
                            case "3":
                                echo "<td colspan='2'><b> TOTAL POR CENTROS DE VOTACION DE COMAS </b></td>";
                                echo "<td class='boxito3'>".$cont." Centros  </td>";
                                echo "<td class='boxito'>".$totgPPP_D."</td>";
                                echo "<td class='boxito2'>".$totgSOL_D."</td>";
                                echo "<td class='boxito3'>".$totgblanco_D."</td>";
                                echo "<td class='boxito3'>".$totgnul_Do."</td>";
                                echo "<td class='boxito3'>".$totginpugnado_D."</td>";
                                echo "<td class='boxito3'>".$totggeneral."</td>";
                                    //echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                break;
                            case "4":
                                echo "<td colspan='2'><b> TOTAL POR CENTROS DE VOTACION DE INDEPENDENCIA </b></td>";
                                echo "<td class='boxito3'>".$cont." Centros  </td>";
                                echo "<td class='boxito'>".$totgPPP_D."</td>";
                                echo "<td class='boxito2'>".$totgSOL_D."</td>";
                                echo "<td class='boxito3'>".$totgblanco_D."</td>";
                                echo "<td class='boxito3'>".$totgnul_Do."</td>";
                                echo "<td class='boxito3'>".$totginpugnado_D."</td>";
                                echo "<td class='boxito3'>".$totggeneral."</td>";
                                    //echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                break;
                            case "5":
                                echo "<td colspan='2'><b> TOTAL POR CENTROS DE VOTACION DE LOS OLIVOS </b></td>";
                                echo "<td class='boxito3'>".$cont." Centros  </td>";
                                echo "<td class='boxito'>".$totgPPP_D."</td>";
                                echo "<td class='boxito2'>".$totgSOL_D."</td>";
                                echo "<td class='boxito3'>".$totgblanco_D."</td>";
                                echo "<td class='boxito3'>".$totgnul_Do."</td>";
                                echo "<td class='boxito3'>".$totginpugnado_D."</td>";
                                echo "<td class='boxito3'>".$totggeneral."</td>";
                                    //echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                break;    
                            case "6":
                                echo "<td colspan='2'><b> TOTAL POR CENTROS DE VOTACION DE PUENTE PIEDRA </b></td>";
                                echo "<td class='boxito3'>".$cont." Centros  </td>";
                                echo "<td class='boxito'>".$totgPPP_D."</td>";
                                echo "<td class='boxito2'>".$totgSOL_D."</td>";
                                echo "<td class='boxito3'>".$totgblanco_D."</td>";
                                echo "<td class='boxito3'>".$totgnul_Do."</td>";
                                echo "<td class='boxito3'>".$totginpugnado_D."</td>";
                                echo "<td class='boxito3'>".$totggeneral."</td>";
                                //echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                break;
                            case "7":
                                echo "<td colspan='2'><b> TOTAL POR CENTROS DE VOTACION DE RIMAC </b></td>";
                                echo "<td class='boxito3'>".$cont." Centros </td>";
                                echo "<td class='boxito'>".$totgPPP_D."</td>";
                                echo "<td class='boxito2'>".$totgSOL_D."</td>";
                                echo "<td class='boxito3'>".$totgblanco_D."</td>";
                                echo "<td class='boxito3'>".$totgnul_Do."</td>";
                                echo "<td class='boxito3'>".$totginpugnado_D."</td>";
                                echo "<td class='boxito3'>".$totggeneral."</td>";
                                //echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                break;
                            case "8":
                                echo "<td colspan='2'><b> TOTAL POR CENTROS DE VOTACION DE SAN MARTIN DE PORRES</b></td>";
                                echo "<td class='boxito3'>".$cont." Centros </td>";
                                echo "<td class='boxito'>".$totgPPP_D."</td>";
                                echo "<td class='boxito2'>".$totgSOL_D."</td>";
                                echo "<td class='boxito3'>".$totgblanco_D."</td>";
                                echo "<td class='boxito3'>".$totgnul_Do."</td>";
                                echo "<td class='boxito3'>".$totginpugnado_D."</td>";
                                echo "<td class='boxito3'>".$totggeneral."</td>";
                                //echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                break;    
                            case "9":
                                echo "<td colspan='2'><b> TOTAL POR CENTROS DE VOTACION DE SANTA ROSA</b></td>";
                                echo "<td class='boxito3'>".$cont." Centros </td>";
                                echo "<td class='boxito'>".$totgPPP_D."</td>";
                                echo "<td class='boxito2'>".$totgSOL_D."</td>";
                                echo "<td class='boxito3'>".$totgblanco_D."</td>";
                                echo "<td class='boxito3'>".$totgnul_Do."</td>";
                                echo "<td class='boxito3'>".$totginpugnado_D."</td>";
                                echo "<td class='boxito3'>".$totggeneral."</td>";
                                //echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                break; 
                            default:
                                    echo "<td> Faltan datos... </td>";
                            }
                    }
                       
                ?>
              </tbody>
              <button class="submit" type="submit" onClick="location.href='reporte4.php'">Imprimir</button>
            </table>
        </div>
       </section>
    </body>
</html>