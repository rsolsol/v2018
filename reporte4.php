<!DOCTYPE html>
<html>
<head>
    <title>CONTEO POR CENTRO DE VOTACI&oacute;N</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>
<body>
    <h1>CONTEO POR CENTRO DE VOTACI&oacute;N</h1>
    
    <section class="container">
        <div class="cuerpo2">
            <table border="1" class="tablita3">
              <thead style="text-align:center;">
                  <tr>
                      <th>Nª</th>
                      <th>Distrito</th>
                      <th>Colegio</th>
                      <th class="box" style='color: #FF0000;'>Keiko</th>
                      <th class="box2" style='color: #1c9bd6;'>PPK</th>
                      <th>blanco</th>
                      <th>Nulo</th>
                      <th>Inpugnados</th>
                      <th>Total</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                    header('Content-type: application/vnd.ms-excel');
                    header("Content-Disposition: attachment; filename=Conteo_por_centro_de_votacion.xls");
                    header("Pragma: no-cache");
                    header("Expires: 0");
                    include_once ("conexion.php");
                    $sql="SELECT id_distrito,det_distrito FROM v16_distrito;";
                    if($resulta=mysqli_query($conexion,$sql)){
                         //echo "New record created successfully";
                        }else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
                        }
                    while($result=mysqli_fetch_array($resulta)){
                        $distrito=$result['id_distrito'];
                        $distritos=$result['id_distrito'];
                        $totgk='0'; $totgppk='0'; $totgblanco='0'; $totgnulo='0'; $totginpugnado='0'; $totggeneral='0';
                        $cont='0';
                        $sql2="SELECT id_colegio,detalle_cole FROM v16_colegio WHERE id_distrito_c='$distrito';";
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
                            $sql3="SELECT SUM(v_k) totalk,SUM(v_ppk) totalppk,SUM(v_blanco) totalblanco,SUM(v_nulo) totalnulo,SUM(v_inpugnado) totalinpugnado FROM v16_mesas WHERE id_distrito='$distrito' AND id_colegios='$cole' AND v_reg='1';";
                            if($resulta3=mysqli_query($conexion,$sql3)){
                                
                            }else{
                                echo "Error: " . $sql3 . "<br>" . mysqli_error($conexion);
                            }
                            while($result3=mysqli_fetch_array($resulta3)){
                                $total=$result3['totalk']+$result3['totalppk']+$result3['totalblanco']+$result3['totalnulo']+$result3['totalinpugnado'];
                                $totgk=$totgk+$result3['totalk'];
                                $totgppk=$totgppk+$result3['totalppk'];
                                $totgblanco=$totgblanco+$result3['totalblanco'];
                                $totgnulo=$totgnulo+$result3['totalnulo'];
                                $totginpugnado=$totginpugnado+$result3['totalinpugnado'];
                                $totggeneral=$totggeneral+$total;
                                echo "<td class='boxito'>".$result3['totalk']."</td>";
                                echo "<td class='boxito2'>".$result3['totalppk']."</td>";
                                echo "<td class='boxito3'>".$result3['totalblanco']."</td>";
                                echo "<td class='boxito3'>".$result3['totalnulo']."</td>";
                                echo "<td class='boxito3'>".$result3['totalinpugnado']."</td>";
                                echo "<td class='boxito3'>".$total."</td>";
                            echo "</tr>";
                            }
                        }
                        switch ($distritos) {
                            case "0":
                            //echo "<td> total de mesas faltante del distrito de ANCON </td>";
                                break;
                            case "1":
                                echo "<td colspan='2'><b> TOTAL DE MESAS DE ANCON </b></td>";
                                echo "<td class='boxito3'><b>".$cont." Mesas </b></td>";
                                echo "<td class='boxito'><b>".$totgk."</b></td>";
                                echo "<td class='boxito2'><b>".$totgppk."</b></td>";
                                echo "<td class='boxito3'><b>".$totgblanco."</b></td>";
                                echo "<td class='boxito3'><b>".$totgnulo."</b></td>";
                                echo "<td class='boxito3'><b>".$totginpugnado."</b></td>";
                                echo "<td class='boxito3'><b>".$totggeneral."</b></td>";
                                //echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                break;
                            case "2":
                                    echo "<td colspan='2'><b> TOTAL DE MESAS DE CARABAYLLO </b></td>";
                                    echo "<td class='boxito3'><b>".$cont." mesas  </b></td>";
                                    echo "<td class='boxito'><b>".$totgk."</b></td>";
                                    echo "<td class='boxito2'><b>".$totgppk."</b></td>";
                                    echo "<td class='boxito3'><b>".$totgblanco."</b></td>";
                                    echo "<td class='boxito3'><b>".$totgnulo."</b></td>";
                                    echo "<td class='boxito3'><b>".$totginpugnado."</b></td>";
                                    echo "<td class='boxito3'><b>".$totggeneral."</b></td>";
                                    //echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                    break;
                            case "3":
                                echo "<td colspan='2'><b> TOTAL DE MESAS DE COMAS </b></td>";
                                echo "<td class='boxito3'><b>".$cont." mesas  </b></td>";
                                echo "<td class='boxito'><b>".$totgk."</b></td>";
                                echo "<td class='boxito2'><b>".$totgppk."</b></td>";
                                echo "<td class='boxito3'><b>".$totgblanco."</b></td>";
                                echo "<td class='boxito3'><b>".$totgnulo."</b></td>";
                                echo "<td class='boxito3'><b>".$totginpugnado."</b></td>";
                                echo "<td class='boxito3'><b>".$totggeneral."</b></td>";
                                    //echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                break;
                            case "4":
                                echo "<td colspan='2'><b> TOTAL DE MESAS DE INDEPENDENCIA </b></td>";
                                echo "<td class='boxito3'><b>".$cont." mesas  </b></td>";
                                echo "<td class='boxito'><b>".$totgk."</b></td>";
                                echo "<td class='boxito2'><b>".$totgppk."</b></td>";
                                echo "<td class='boxito3'><b>".$totgblanco."</b></td>";
                                echo "<td class='boxito3'><b>".$totgnulo."</b></td>";
                                echo "<td class='boxito3'><b>".$totginpugnado."</b></td>";
                                echo "<td class='boxito3'><b>".$totggeneral."</b></td>";
                                    //echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                break;
                            case "5":
                                echo "<td colspan='2'><b> TOTAL DE MESAS DE LOS OLIVOS </b></td>";
                                echo "<td class='boxito3'><b>".$cont." mesas  </b></td>";
                                echo "<td class='boxito'><b>".$totgk."</b></td>";
                                echo "<td class='boxito2'><b>".$totgppk."</b></td>";
                                echo "<td class='boxito3'><b>".$totgblanco."</b></td>";
                                echo "<td class='boxito3'><b>".$totgnulo."</b></td>";
                                echo "<td class='boxito3'><b>".$totginpugnado."</b></td>";
                                echo "<td class='boxito3'><b>".$totggeneral."</b></td>";
                                    //echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                break;    
                            case "6":
                                echo "<td colspan='2'><b> TOTAL DE MESAS DE PUENTE PIEDRA </b></td>";
                                echo "<td class='boxito3'><b>".$cont." mesas  </b></td>";
                                echo "<td class='boxito'><b>".$totgk."</b></td>";
                                echo "<td class='boxito2'><b>".$totgppk."</b></td>";
                                echo "<td class='boxito3'><b>".$totgblanco."</b></td>";
                                echo "<td class='boxito3'><b>".$totgnulo."</b></td>";
                                echo "<td class='boxito3'><b>".$totginpugnado."</b></td>";
                                echo "<td class='boxito3'><b>".$totggeneral."</b></td>";
                                //echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                break;
                            case "7":
                                echo "<td colspan='2'><b> TOTAL DE MESAS DE RIMAC </b></td>";
                                echo "<td class='boxito3'><b>".$cont." mesas </b></td>";
                                echo "<td class='boxito'><b>".$totgk."</b></td>";
                                echo "<td class='boxito2'><b>".$totgppk."</b></td>";
                                echo "<td class='boxito3'><b>".$totgblanco."</b></td>";
                                echo "<td class='boxito3'><b>".$totgnulo."</b></td>";
                                echo "<td class='boxito3'><b>".$totginpugnado."</b></td>";
                                echo "<td class='boxito3'><b>".$totggeneral."</b></td>";
                                //echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                break;
                            case "8":
                                echo "<td colspan='2'><b> TOTAL DE MESAS DE SAN MARTIN DE PORRES</b></td>";
                                echo "<td class='boxito3'><b>".$cont." mesas </b></td>";
                                echo "<td class='boxito'><b>".$totgk."</b></td>";
                                echo "<td class='boxito2'><b>".$totgppk."</b></td>";
                                echo "<td class='boxito3'><b>".$totgblanco."</b></td>";
                                echo "<td class='boxito3'><b>".$totgnulo."</b></td>";
                                echo "<td class='boxito3'><b>".$totginpugnado."</b></td>";
                                echo "<td class='boxito3'><b>".$totggeneral."</b></td>";
                                //echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                break;    
                            case "9":
                                echo "<td colspan='2'><b> TOTAL DE MESAS DE del distrito de SANTA ROSA </b></td>";
                                echo "<td class='boxito3'><b>".$cont." mesas </b></td>";
                                echo "<td class='boxito'><b>".$totgk."</b></td>";
                                echo "<td class='boxito2'><b>".$totgppk."</b></td>";
                                echo "<td class='boxito3'><b>".$totgblanco."</b></td>";
                                echo "<td class='boxito3'><b>".$totgnulo."</b></td>";
                                echo "<td class='boxito3'><b>".$totginpugnado."</b></td>";
                                echo "<td class='boxito3'><b>".$totggeneral."</b></td>";
                                //echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                break; 
                            default:
                                    echo "<td> Faltan datos... </td>";
                            }
                    }
                       
                ?>
              </tbody>
            </table>
        </div>
       </section>
    </body>
</html>