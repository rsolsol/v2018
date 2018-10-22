<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="description" content="Elecciones 2016 segunda vuelta">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="css/normaliza.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/estilos.css" type="text/css" media="all">
</head>
<body>
 <h1>Registrador de Votos</h1>
 <section class="container">
  <div class="cuerpo">
     <table border="1" class="tablita">
		<tr>
			<td>
			    <form action="consultamesa.php" method="POST" name="form1" id="form1" class="llenado_form" >
                     <ul>
                     <li>
                         <label for="ingreso" class="clasicas">Ingrese su Mesa: </label>
                         <input class="clasicas" type="text" name="mesa" required autofocus pattern="[0-9]{5,6}"/>
                     </li>
                     <li>
                         <button class="submit" type="submit">ingreso de mesa</button>
                     </li>
                     </ul>
               </form>			    
			</td>
		</tr>
    </table>
   </div>
 </section>
</body>
</html>
