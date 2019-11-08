<?php

include('../conexion.php');
$rut = $_POST['rut'];
$nombre = $_POST ['nombre'];
$telefono = $_POST  ['telefono'];
$sitioweb = $_POST ['sitioweb'];
$direccion = $_POST ['direccion'];
$ciudad = $_POST ['ciudad'];
$envio = $_POST ['envio'];
$sql="SELECT * FROM proveedor WHERE id_prov = '$rut'";
$consulta=mysqli_query($conexion, $sql);
$conexion->query($sql);
$total=mysqli_num_rows($consulta);


if(isset($envio)){
  if ($total > 0) {
    echo "<p class='h1'> ESTE RUT YA SE ENCUENTRA REGISTRADO</p>";
    echo " <a href='addprov.php'><button class='btn btn-success'><i class='far fa-home'></i>REINTENTAR</button></a>";
  }else {
    $sql1="CALL insertarProveedor('$rut','$nombre','$telefono','$sitioweb','$direccion','$ciudad')";
    mysqli_query($conexion, $sql1);
    $conexion->query($sql1);
    echo "<p class='h1'> SE AGREGO CORRECTAMENTE </p>";
    echo " <a href='../principal.php'><button class='btn btn-success'><i class='far fa-home'></i> REGRESAR AL INICIO</button></a>";
    echo $sql1;
  }


}
 ?>
      <form class="text-center col" action="addprov.php" method="post">
        <p class="h1 text-center">AÑADIR PROVEEDORES</p>
        <div class="row justify-content-center">
          <strong class="col-md-4">RUT: </strong>
          <input type="text" class="form-control text-center col-md-6" name="rut" id="rut">
        </div> <br>
      <div class="row justify-content-center">
        <strong class="col-md-4">NOMBRE : </strong>
        <input type="text" class="form-control text-center col-md-6 " name="nombre">
      </div> <br>
      <div class="row justify-content-center">
        <strong class="col-md-4">TELEFONO: </strong>
        <input type="text" class="form-control text-center col-md-6" name="telefono">
      </div> <br>
      <div class="row justify-content-center">
        <strong class="col-md-4">SITIO WEB: </strong>
        <input type="text" class="form-control text-center col-md-6" name="sitioweb">
      </div> <br>
      <div class="row justify-content-center">
        <strong class="col-md-4">DIRECCION: </strong>
        <input type="text" class="form-control text-center col-md-6" name="direccion">
      </div> <br>
      <div class="row justify-content-center">
        <strong class="col-md-4">CIUDAD: </strong>
        <input type="text" class="form-control text-center col-md-6" name="ciudad">
      </div> <br>
      <input type="submit" name="envio" value="AGREGAR" class="btn btn-success">
      <a href="principal.php"> <input type="button" class="btn btn-success"value="VER"> </a>
      </form>
