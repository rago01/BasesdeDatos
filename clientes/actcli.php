<?php

include('../conexion.php');
$rut = $_POST['rut'];
$nombre = $_POST ['nombre'];
$telefono = $_POST  ['telefono'];
$direccion = $_POST ['direccion'];
$envio = $_POST ['envio'];
$sql="SELECT * FROM cliente WHERE id_cli = '$rut'";
$consulta=mysqli_query($conexion, $sql);
$conexion->query($sql);
$total=mysqli_num_rows($consulta);


if(isset($envio)){
  if ($total > 0) {
      $sql="UPDATE cliente SET id_cli='$rut', nom_cli='$nombre',
       tel_cli='$telefono', dir_clie='$direccion' WHERE id_cli='$rut'";
       mysqli_query($sql);
       $conexion->query($sql);
       echo "<p class='h1'> SE ACTUALIZO CORRECTAMENTE </p>";
      echo " <a href='actcli.php'><button class='btn btn-success'><i class='far fa-home'></i>MODIFICAR OTRO</button></a>";
      echo $sql;
  }else {
    echo "<p class='h1'>ESTE RUT NO SE ENCUENTRA REGISTRADO</p>";
    echo " <a href='actcli.php'><button class='btn btn-success'><i class='far fa-home'></i> REINTENTAR</button></a>";
  }
}
 ?>
      <form class="text-center col" action="actcli.php" method="post">
        <p class="h1 text-center">ACTUALIZAR CLIENTES</p>
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
      <input type="submit" name="envio" value="ACTUALIZAR" class="btn btn-success">
      <a href="../principal.php"> <input type="button" class="btn btn-success"value="VER"> </a>
      </form>
