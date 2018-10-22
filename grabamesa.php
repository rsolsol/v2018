<?php
include_once ("conexion.php");
$mesa=$_POST['mesa'];
/* Provincial*/
$voto_PPP_P = $_POST['voto_PPP_P']; /*podemos por el progreso del peru */
$voto_SOL_P = $_POST['voto_SOL_P']; /* Solidaridad nacinal */
$voto_PPS_P = $_POST['voto_PPS_P']; /* peru patria segura*/
$voto_PL_P  = $_POST['voto_PL_P']; /* peru libertario*/
$voto_AP_P  = $_POST['voto_AP_P']; /*Accion popular */


/*Distrital */
$voto_PPP_D = $_POST['voto_PPP_D']; /*podemos por el progreso del peru */
$voto_SOL_D = $_POST['voto_SOL_D']; /* Solidaridad nacinal */
$voto_SP_D = $_POST['voto_SP_D']; /* somos peru*/
$voto_SU_D = $_POST['voto_SU_D']; /* siempre unidos*/
$voto_AP_D = $_POST['voto_AP_D']; /*avanza pais */

$votoblanco_P=$_POST['votoblanco_P'];
$votoanulados_P=$_POST['votoanulados_P'];
$votoinpugnado_P=$_POST['votoinpugnados_P'];
$votoblanco_D = $_POST['votoblanco_D'];
$votoanulados_D = $_POST['votoanulados_D'];
$votoinpugnado_D = $_POST['votoinpugnados_D'];

echo "mesa grabada".$mesa." votos</br>";
echo "VOTOS DE SOLIDARIDAD son". $voto_SOL_D ." votos</br>";
echo "VOTOS DE SOMOS PERU son". $voto_SP_D ." votos</br>";
echo "VOTOS EN BLANCO son".$votoblanco." votos</br>";
echo "VOTOS INPUGNADOS son".$votoinpugnado." votos</br>";


//rutina para guardar los datos
$_GRABAR_SQL="UPDATE v18_mesas 
              SET v_PPP_P = '$voto_PPP_P',
                  v_SOL_P = '$voto_SOL_P',
                  v_PPS_P = '$voto_PPS_P',
                  v_PL_P  = '$voto_PL_P',
                  v_AP_P  = '$voto_AP_P',
                  v_PPP_D = '$voto_PPP_D',
                  v_SOL_D = '$voto_SOL_D',
                  v_SP_D  = '$voto_SP_D',
                  v_SU_D  = '$voto_SU_D',
                  v_AP_D  = '$voto_AP_D',
                  v_blanco_P= '$votoblanco_P',
                  v_nulo_P  = '$votoanulados_P',
                  v_inpugnado_P='$votoinpugnado_P', 
                  v_blanco_D= '$votoblanco_D',
                  v_nulo_D  = '$votoanulados_D',
                  v_inpugnado_D='$votoinpugnado_D', 
                  estado_mesa='2' WHERE num_mesa='$mesa'";

if(mysqli_query($conexion,$_GRABAR_SQL)){
     echo "New record created successfully";
}else {
    echo "Error: " . $_GRABAR_SQL . "<br>" . mysqli_error($conexion);
}
mysqli_close($conexion);
header ("Location: http://www.v2018.com.mialias.net/");
?>