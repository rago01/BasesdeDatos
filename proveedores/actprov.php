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
          $sql="UPDATE proveedor SET  nom_prov='$nombre',
           tel_prov='$telefono', web_prov='$sitioweb', dir_prov='$direccion',
           ciudad_prov='$ciudad' WHERE id_prov = '$rut'";
           mysqli_query($sql);
           $conexion->query($sql);
           echo "<p class='h1'> SE ACTUALIZO CORRECTAMENTE </p>";
          echo " <a href='actprov.php'><button class='btn btn-success'><i class='far fa-home'></i>MODIFICAR OTRO</button></a>";
          echo $sql;
        }else {
          echo "<p class='h1'>ESTE RUT NO SE ENCUENTRA REGISTRADO</p>";
          echo " <a href='actprov.php'><button class='btn btn-success'><i class='far fa-home'></i> REINTENTAR</button></a>";
          //echo $sql;
        }
  }

 ?>
      <form class="text-center col" action="actprov.php" method="post">
        <p class="h1 text-center">ACTUALIZAR PROVEEDORES</p>
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
      <input type="submit" name="envio" value="ACTUALIZAR" class="btn btn-success">
      <a href="../principal.php"> <input type="button" class="btn btn-success"value="VER"> </a>
      </form>














<?php      /*
$sql="SELECT id_prov FROM proveedor GROUP BY id_prov";
 $result=mysqli_query($conexion, $sql);
while($fila = mysqli_fetch_array($result)) {
  echo '<option value="'.$fila['id_prov'].'">'.$fila['id_prov'].' </option>';
}

      */ ?>
