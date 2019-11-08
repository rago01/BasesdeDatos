<?php

include('../conexion.php');
$idven = $_POST ['idven'];
$idprod = $_POST ['idprod'];
$idcli = $_POST  ['idcli'];
$date= date('Y-m-d');
$precio = $_POST ['precio'];
$dcto = $_POST ['dcto'];
$cantidad = $_POST ['cantidad'];
$montofinal = $precio*$cantidad;
$envio = $_POST ['envio'];
$sql="SELECT * FROM venta WHERE id_venta = '$idven'";
$consulta=mysqli_query($conexion, $sql);
$conexion->query($sql);
$total=mysqli_num_rows($consulta);


if(isset($envio)){
  if ($total > 0) {
    $sql="UPDATE venta SET id_venta='$idven', id_prod='$idprod', id_cli='$idcli',
    fecha='$date', precio_prod='$precio', cantidad='$cantidad', montoFinal='$montofinal' WHERE id_venta='$idven'";
    mysqli_query($sql);
    $conexion->query($sql);
    echo "<p class='h1'> SE ACTUALIZO CORRECTAMENTE </p>";
   echo " <a href='actventas.php'><button class='btn btn-success'><i class='far fa-home'></i>INGRESAR OTRO</button></a>";
    ECHO $sql;
  }else {
   echo "<p class='h1'>ESTE PRODUCTO NO SE ENCUENTRA REGISTRADO</p>";
   echo " <a href='actventas.php'><button class='btn btn-success'><i class='far fa-home'></i>REINTENTAR</button></a>";
   echo $sql;
  }
}
 ?>
      <form class="text-center col" action="actventas.php" method="post">
        <p class="h1 text-center">ACTUALIZAR VENTAS</p>
        <div class="row justify-content-center">
          <strong class="col-md-4">ID VENTA: </strong>
          <input type="text" class="form-control text-center col-md-6" name="idven" >
        </div> <br>
        <div class="row justify-content-center">
          <strong class="col-md-4">ID PRODUCTO: </strong>
          <input type="text" class="form-control text-center col-md-6" name="idprod">
        </div> <br>
      <div class="row justify-content-center">
        <strong class="col-md-4">ID CLIENTE : </strong>
        <input type="text" class="form-control text-center col-md-6 " name="idcli">
      </div> <br>
      <div class="row justify-content-center">
        <strong class="col-md-4">PRECIO: </strong>
        <input type="text" class="form-control text-center col-md-6" name="precio" >
      </div> <br>
      <div class="row justify-content-center">
        <strong class="col-md-4">CANTIDAD: </strong>
        <input type="text" class="form-control text-center col-md-6" name="cantidad" >
      </div> <br>

      <input type="submit" name="envio" value="ACTUALIZAR" class="btn btn-success">
      <a href="../principal.php"> <input type="button" class="btn btn-success"value="VER"> </a>
      </form>
