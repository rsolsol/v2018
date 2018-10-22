<!DOCTYPE html>
<html>
<head>
    <title>Mesas que no presentaron actas</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
</head>
<body>
    <h1>Mesas que no presentaron actas</h1>
<section class="container">
        <div class="cuerpo2">
            <table border="1" class="tablita3">
              <thead style="text-align:center;">
                  <tr>
                      <th>Nª</th>
                      <th>Distrito</th>
                      <th>Colegio</th>
                      <th>Mesa</th>
                      <th>Votantes</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                    header('Content-type: application/vnd.ms-excel');
                    header("Content-Disposition: attachment; filename=Mesas_que_no_presentaron_actas.xls");
                    header("Pragma: no-cache");
                    header("Expires: 0");
                    include_once ("conexion.php");
                    $sql="SELECT * from v16_distrito;";
                    if($resulta=mysqli_query($conexion,$sql)){
                     //echo "New record created successfully";
                    }else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
                    }
                    $distritos='0';
                    $separador='0';
                    while ($result=mysqli_fetch_array($resulta)){
                        $cont='0';
                        $votosperdidos='0';
                        $distrito=$result['id_distrito'];
                        $distritos=$result['id_distrito'];
                        $sql2="SELECT * from v16_colegio cole INNER JOIN v16_mesas mesas on mesas.id_colegios=cole.id_colegio and mesas.id_distrito=$distrito WHERE id_distrito_c=$distrito and v_reg='0'";
                        if($resulta2=mysqli_query($conexion,$sql2)){
                            //echo "New record created successfully";
                        }else {
                        echo "Error: " . $sql2 . "<br>" . mysqli_error($conexion);
                        }
                        while ($result2=mysqli_fetch_array($resulta2)){
                            //echo "<td>".$result['det_distrito']."</td>";
                            $cont=$cont+1;
                            $separador='1';
                            $votosperdidos=$votosperdidos+$result2['votantes'];
                            echo "<tr>";
                            echo "<td>".$cont."</td>";
                            echo "<td>".$result['det_distrito']."</td>";
                            echo "<td>".$result2['detalle_cole']."</td>";
                            echo "<td>".$result2['num_mesa']."</td>";
                            echo "<td>".$result2['votantes']."</td>";
                            echo "</tr>";
                        }
                            switch ($distritos) {
                                case "0":
                                    //echo "<td> total de mesas faltante del distrito de ANCON </td>";
                                    break;
                                case "1":
                                    echo "<td colspan='2'> total de mesas faltante del distrito de ANCON </td>";
                                    echo "<td>".$cont." mesas | Total de votos no registrados </td>";
                                    echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                    break;
                                case "2":
                                    echo "<td colspan='2'> total de mesas faltante del distrito de CARABAYLLO </td>";
                                    echo "<td>".$cont." mesas | Total de votos no registrados </td>";
                                    echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                    break;
                                case "3":
                                    echo "<td colspan='2'> total de mesas faltante del distrito de COMAS </td>";
                                    echo "<td>".$cont." mesas | Total de votos no registrados </td>";
                                    echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                    break;
                                case "4":
                                    echo "<td colspan='2'> total de mesas faltante del distrito de INDEPENDENCIA </td>";
                                    echo "<td>".$cont." mesas | Total de votos no registrados </td>";
                                    echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                    break;
                                case "5":
                                    echo "<td colspan='2'> total de mesas faltante del distrito de LOS OLIVOS </td>";
                                    echo "<td>".$cont." mesas | Total de votos no registrados </td>";
                                    echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                    break;    
                                case "6":
                                    echo "<td colspan='2'> total de mesas faltante del distrito de PUENTE PIEDRA </td>";
                                    echo "<td>".$cont." mesas | Total de votos no registrados </td>";
                                    echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                    break;
                                case "7":
                                    echo "<td colspan='2'> total de mesas faltante del distrito de RIMAC </td>";
                                    echo "<td>".$cont." mesas | Total de votos no registrados </td>";
                                    echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                    break;
                                case "8":
                                    echo "<td colspan='2'> total de mesas faltante del distrito de SAN MARTIN DE PORRES</td>";
                                    echo "<td>".$cont." mesas | Total de votos no registrados </td>";
                                    echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                    break;    
                                case "9":
                                    echo "<td colspan='2'> total de mesas faltante del distrito de SANTA ROSA </td>";
                                    echo "<td>".$cont." mesas | Total de votos no registrados </td>";
                                    echo "<td colspan='2'>".$votosperdidos." votos perdidos</td>";
                                    break; 
                                default:
                                    echo "<td> Faltan datos... </td>";
                            }
                    }
                ?>               
              </tbody>
              <button class="submit" type="submit" onClick="location.href='reporte3.php'">Imprimir</button>
            </table>
        </div>
    </section>    