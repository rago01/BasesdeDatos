<?php

include('../conexion.php');
$idcat = $_POST  ['idcat'];
$nombre = $_POST ['nombre'];
$descr = $_POST ['descr'];
$envio = $_POST ['envio'];
$sql="SELECT * FROM categoria WHERE id_cat = '$idcat'";
$consulta=mysqli_query($conexion, $sql);
$conexion->query($sql);
$total=mysqli_num_rows($consulta);


if(isset($envio)){
  if ($total > 0) {
    echo "<p class='h1'>ESTA CATEGORIA YA SE ENCUENTRA REGISTRADO</p>";
    echo " <a href='addcat.php'><button class='btn btn-success'><i class='far fa-home'></i> REINTENTAR</button></a>";
  }else {
    $sql="CALL insertarCategoria('$idcat','$nombre','$descr')";
    mysqli_query($sql);
    $conexion->query($sql);
    echo "<p class='h1'> SE REGISTRO CORRECTAMENTE </p>";
   echo " <a href='addcat.php'><button class='btn btn-success'><i class='far fa-home'></i>INGRESAR OTRA</button></a>";
   echo $sql;
  }
}
 ?>
      <form class="text-center col" action="addcat.php" method="post">
        <p class="h1 text-center">AGREGAR CATEGORIAS</p>
      <div class="row justify-content-center">
        <strong class="col-md-4">ID CATEGORIA : </strong>
        <input type="text" class="form-control text-center col-md-6 " name="idcat">
      </div> <br>
      <div class="row justify-content-center">
        <strong class="col-md-4">NOMBRE: </strong>
        <input type="text" class="form-control text-center col-md-6" name="nombre">
      </div> <br>
      <div class="row justify-content-center">
        <strong class="col-md-4">DESCRIPCION: </strong>
        <input type="text" class="form-control text-center col-md-6" name="descr">
      </div> <br>
      <input type="submit" name="envio" value="AGREGAR" class="btn btn-success">
      <a href="../principal.php"> <input type="button" class="btn btn-success"value="VER"> </a>
      </form>
