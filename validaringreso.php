<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>


<?php

try{

	$login=htmlentities(addslashes($_POST["usuario"]));
	$password=htmlentities(addslashes($_POST["clave"]));
	$contador=0;
	$base=new PDO("mysql:host=localhost; dbname=tienda" , "root", "515t3m45");
	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="SELECT * FROM usuarios WHERE usuario= :usuario";
	$resultado=$base->prepare($sql);
	$resultado->execute(array(":usuario"=>$login));
		while($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
				if (password_verify($password, $registro['clave'])){
					$contador++;
				}
		}
		if($contador>0){ echo "<br>";
			echo '<section class="text-center"><p class="h1 text-center">ACCESO CORRECTO</p>
						<a href="principal.php"><button class="btn btn-success">CONTINUAR</button></a></section>';
		}else {
			echo '<section class="text-center"><p class="h1 text-center">ACCESO INCORRECTO</p>
						<a href="ingreso.php"><button class="btn btn-danger">REINTENTAR</button></a></section>';
		}
		$resultado->closeCursor();
}catch(Exception $e){
	die("Error: " . $e->getMessage());
}
?>
</body>
</html>
