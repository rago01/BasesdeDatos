<?php

include('../conexion.php');
$rut = $_POST['rut'];
$nombre = $_POST ['nombre'];
$telefono = $_POST  ['telefono'];
$direccion = $_POST ['direccion'];
$envio = $_POST ['envio'];
$sql="SELECT * FROM clientes WHERE id_prov = '$rut'";
$consulta=mysqli_query($conexion, $sql);
$conexion->query($sql);
$total=mysqli_num_rows($consulta);


if(isset($envio)){
  if ($total > 0) {
    echo "<p class='h1'> ESTE RUT YA SE ENCUENTRA REGISTRADO</p>";
    echo " <a href='clientes/addcli.php'><button class='btn btn-success'><i class='far fa-home'></i>REINTENTAR</button></a>";
  }else {
    $sql1="CALL insertarCliente('$rut','$nombre','$telefono','$direccion')";
    mysqli_query($conexion, $sql1);
    $conexion->query($sql1);
    echo "<p class='h1'> SE AGREGO CORRECTAMENTE </p>";
    echo " <a href='../principal.php'><button class='btn btn-success'><i class='far fa-home'></i> REGRESAR AL INICIO</button></a>";
    echo $sql1;
  }


}
 ?>
      <form class="text-center col" action="addcli.php" method="post">
        <p class="h1 text-center">AÑADIR CLIENTES</p>
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
        <strong class="col-md-4">DIRECCION: </strong>
        <input type="text" class="form-control text-center col-md-6" name="direccion">
      </div> <br>
      <input type="submit" name="envio" value="AGREGAR" class="btn btn-success">
      <a href="../principal.php"> <input type="button" class="btn btn-success"value="VER"> </a>
      </form>
