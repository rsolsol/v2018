<!DOCTYPE html>
<html>
<head>
    <title>Guardar Actas</title>
    <meta charset="UTF-8">
    <meta name="description" content="Elecciones 2018 Municipales">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="css/normaliza.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/estilos.css" type="text/css" media="all">
</head>
<body>
   <h1>actualiza el valor v_reg a cero</h1>  
   <section>
       <?php 
            include_once ("conexion.php");
            $sql= "SELECT * from v18_mesas";
            $q=mysqli_query($conexion,$sql);
           //verificamos que no este entrando una mesa falsa o mesa ya contabilizada         
            $cont='0';
            while ($resultado=mysqli_fetch_array($q)){
                //rutina para guardar los datos
                $mesa=$resultado['id_mesa'];
                $_GRABAR_SQL="UPDATE v18_mesas SET v_PPP_P = '0', v_SOL_P = '0', v_PPS_P = '0', v_PL_P = '0', v_AP_P = '0', v_blanco_P = '0', v_nulo_P = '0', v_inpugnado_P = '0', v_PPP_D = '0', v_SOL_D = '0', v_SP_D = '0', v_SU_D = '0', v_AP_D = '0', v_blanco_D = '0', v_nulo_D = '0', v_inpugnado_D = '0' WHERE id_mesa='$mesa'";
                if(mysqli_query($conexion,$_GRABAR_SQL)){
                    $cont=$cont+1;
                    echo $cont." numero de cole ".$mesa."</br>";
                }else {
                    echo "Error: " . $_GRABAR_SQL . "<br>" . mysqli_error($conexion);
                }
            }
                mysqli_close($conexion);                            
       ?>       
</body>
</html>