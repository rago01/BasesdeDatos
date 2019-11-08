<?php

include('../conexion.php');
$idprod = $_POST ['idprod'];
$idprov = $_POST ['idprov'];
$idcat = $_POST  ['idcat'];
$nombre = $_POST ['nombre'];
$precio = $_POST ['precio'];
$stock = $_POST ['stock'];
$envio = $_POST ['envio'];
$sql="SELECT * FROM producto WHERE id_prod = '$idprod'";
$consulta=mysqli_query($conexion, $sql);
$conexion->query($sql);
$total=mysqli_num_rows($consulta);


if(isset($envio)){
  if ($total > 0) {
    $sql="UPDATE producto SET id_prod='$idprod', id_prov='$idprov', id_cat='$idcat',
    nom_prod='$nombre', precio_prod='$precio', stock_prod='$stock' WHERE id_prod='$idprod'";
    mysqli_query($sql);
    $conexion->query($sql);
    echo "<p class='h1'> SE REGISTRO CORRECTAMENTE </p>";
   echo " <a href='actprod.php'><button class='btn btn-success'><i class='far fa-home'></i>INGRESAR OTRO</button></a>";
    ECHO $sql;
  }else {
   echo "<p class='h1'>ESTE PRODUCTO NO SE ENCUENTRA REGISTRADO</p>";
   echo " <a href='actprod.php'><button class='btn btn-success'><i class='far fa-home'></i>REINTENTAR</button></a>";
   echo $sql;
  }
}
 ?>
      <form class="text-center col" action="actprod.php" method="post">
        <p class="h1 text-center">ACTUALIZAR PRODUCTOS</p>
        <div class="row justify-content-center">
          <strong class="col-md-4">ID PRODUCTO: </strong>
          <input type="text" class="form-control text-center col-md-6" name="idprod" >
        </div> <br>
        <div class="row justify-content-center">
          <strong class="col-md-4">ID PROVEEDOR: </strong>
          <input type="text" class="form-control text-center col-md-6" name="idprov">
        </div> <br>
      <div class="row justify-content-center">
        <strong class="col-md-4">ID CATEGORIA : </strong>
        <input type="text" class="form-control text-center col-md-6 " name="idcat">
      </div> <br>
      <div class="row justify-content-center">
        <strong class="col-md-4">NOMBRE: </strong>
        <input type="text" class="form-control text-center col-md-6" name="nombre">
      </div> <br>
      <div class="row justify-content-center">
        <strong class="col-md-4">PRECIO: </strong>
        <input type="text" class="form-control text-center col-md-6" name="precio" >
      </div> <br>
      <div class="row justify-content-center">
        <strong class="col-md-4">STOCK: </strong>
        <input type="text" class="form-control text-center col-md-6" name="stock" >
      </div> <br>
      <input type="submit" name="envio" value="ACTUALIZAR" class="btn btn-success">
      <a href="../principal.php"> <input type="button" class="btn btn-success"value="VER"> </a>
      </form>
