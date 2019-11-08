<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title>Documento sin título</title>
</head>

<body>

<?php
	$usuario= $_POST["usuario"];
	$contrasenia= $_POST["clave"];
	$encriptar= password_hash($contrasenia, PASSWORD_DEFAULT);


	try{

		$base=new PDO('mysql:host=localhost; dbname=tienda', 'root', '515t3m45');
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec("SET CHARACTER SET utf8");
		$sql="INSERT INTO usuarios (id_user, usuario, clave) VALUES (NULL, :usuario, :clave)";
		$resultado=$base->prepare($sql);
		$resultado->execute(array(":usuario"=>$usuario, ":clave"=>$encriptar));

?>
	<section>
		<p class="h1 text-center"> SU REGISTRO HA SIDO EXITOSO </p>
		<a href="ingreso.php"><button type="button" class="btn btn-success">CONTINUAR</button></a>
	</section>

<?php
		$resultado->closeCursor();

	}catch(Exception $e){


die('Error: '. $e->GetMessage());

	}finally{

		$base=null;


	}

?>
</body>
</html>
