<!DOCTYPE html>
<html>
<head>
    <title>Mesas que no presentaron actas</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="css/normaliza.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/estilos.css" type="text/css" media="all">
</head>
<body>
    <h1 style="color: white;">MESAS QUE NO PRESENTARON ACTAS POR DISTRITOS</h1>
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
                      <th>Mesa</th>
                      <th>Votantes</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                    include_once ("conexion.php");
                    $sql="SELECT * from v18_distrito;";
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
                        // $sql2= "SELECT * from v18_colegio cole INNER JOIN v18_mesas mesas on mesas.id_colegios=cole.id_colegio WHERE estado_mesa ='1'";
                    $sql2 = "SELECT * from v18_colegio cole INNER JOIN v18_mesas mesas on mesas.id_colegio=cole.id_colegio WHERE estado_mesa ='1'";
                        if($resulta2=mysqli_query($conexion,$sql2)){
                            //echo "New record created successfully";
                        }else {
                        echo "Error: " . $sql2 . "<br>" . mysqli_error($conexion);
                        }
                        while ($result2=mysqli_fetch_array($resulta2)){
                            //echo "<td>".$result['det_distrito']."</td>";
                            $cont=$cont+1;
                            $separador='1';
                            $votosperdidos=$votosperdidos+$result2['num_votantes'];
                            echo "<tr>";
                            echo "<td>".$cont."</td>";
                            echo "<td>".$result['det_distrito']."</td>";
                            echo "<td>".$result2['detalle_cole']."</td>";
                            echo "<td style='text-align: center;'>".$result2['num_mesa']."</td>";
                            echo "<td style='text-align: center;'>".$result2['num_votantes']."</td>";
                            echo "</tr>";
                        }
                            switch ($distritos) {
                                case "0":
                                    //echo "<td> total de mesas faltante del distrito de ANCON </td>";
                                    break;
                                case "1":
                                    echo "<td class='box' colspan='2'><b> TOTAL DE MESAS FALTANTES DE ANCON </b></td>";
                                    echo "<td class='box'><b>".$cont." Mesas   | TOTAL DE VOTO NO REGISTRADOS</b></td>";
                                    echo "<td class='box' colspan='2'><b>".$votosperdidos." VOTOS PERDIDOS</b></td>";
                                    break;
                                case "2":
                                    echo "<td class='box' colspan='2'> TOTAL DE MESAS FALTANTES DE CARABAYLLO </td>";
                                    echo "<td class='box' ><b>".$cont." Mesas | TOTAL DE VOTOS NO REGISTRADOS </b></td>";
                                    echo "<td class='box' colspan='2'><b>".$votosperdidos." VOTOS PERDIDOS</b></td>";
                                    break;
                                case "3":
                                    echo "<td class='box' colspan='2'> TOTAL DE MESAS FALTANTES DE COMAS </td>";
                                    echo "<td class='box' ><b>".$cont." Mesas | TOTAL DE VOTOS NO REGISTRADOS </b></td>";
                                    echo "<td class='box' colspan='2'><b>".$votosperdidos." VOTOS PERDIDOS</b></td>";
                                    break;
                                case "4":
                                    echo "<td class='box' colspan='2'> TOTAL DE MESAS FALTANTES DE INDEPENDENCIA </td>";
                                    echo "<td class='box' ><b>".$cont." Mesas | TOTAL DE VOTOS NO REGISTRADOS </b></td>";
                                    echo "<td class='box' colspan='2'><b>".$votosperdidos." VOTOS PERDIDOS</b></td>";
                                    break;
                                case "5":
                                    echo "<td class='box' colspan='2'> TOTAL DE MESAS FALTANTES DE LOS OLIVOS </td>";
                                    echo "<td class='box' ><b>".$cont." Mesas | TOTAL DE VOTOS NO REGISTRADOS </b></td>";
                                    echo "<td class='box' colspan='2'><b>".$votosperdidos." VOTOS PERDIDOS</b></td>";
                                    break;    
                                case "6":
                                    echo "<td class='box' colspan='2'> TOTAL DE MESAS FALTANTES DE PUENTE PIEDRA </td>";
                                    echo "<td class='box' ><b>".$cont." Mesas | TOTAL DE VOTOS NO REGISTRADOS </b></td>";
                                    echo "<td class='box' colspan='2'><b>".$votosperdidos." VOTOS PERDIDOS</b></td>";
                                    break;
                                case "7":
                                    echo "<td class='box' colspan='2'> TOTAL DE MESAS FALTANTES DE RIMAC </td>";
                                    echo "<td class='box' ><b>".$cont." Mesas | TOTAL DE VOTOS NO REGISTRADOS </b></td>";
                                    echo "<td class='box' colspan='2'><b>".$votosperdidos." VOTOS PERDIDOS</b></td>";
                                    break;
                                case "8":
                                    echo "<td class='box' colspan='2'> TOTAL DE MESAS FALTANTES DE SAN MARTIN DE PORRES</td>";
                                    echo "<td class='box' ><b>".$cont." Mesas | TOTAL DE VOTOS NO REGISTRADOS </b></td>";
                                    echo "<td class='box' colspan='2'><b>".$votosperdidos." VOTOS PERDIDOS</b></td>";
                                    break;    
                                case "9":
                                    echo "<td class='box' colspan='2'> TOTAL DE MESAS FALTANTES DE SANTA ROSA </td>";
                                    echo "<td class='box' ><b>".$cont." Mesas | TOTAL DE VOTOS NO REGISTRADOS </b></td>";
                                    echo "<td class='box' colspan='2'><b>".$votosperdidos." VOTOS PERDIDOS</b></td>";
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