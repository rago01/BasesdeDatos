<?php include('../conexion.php');

$idven = $_POST['idven'];
$envio = $_POST['envio'];

$sql="SELECT * FROM venta
        WHERE id_venta= '$idven'";
$consulta=mysqli_query($conexion, $sql);
$conexion->query($sql);
$total = mysqli_num_rows($consulta);

if (isset($envio))
{
  if($total > 0)
  {
    $sql = "DELETE FROM venta WHERE id_venta='$idven'";
    mysqli_query($conexion, $sql);
    $conexion->query($sql);
    echo "<p class='h1'> SE ELIMINO CORRECTAMENTE</p>";
    echo " <a href='../principal.php'><button class='btn btn-success'><i class='far fa-home'></i> REGRESAR AL INICIO</button></a>";
    echo $sql;
  }else{
    echo "<p class='h1'>ESTa VENTA NO EXISTE</p>";
    echo " <a href='delventas.php'><button class='btn btn-success'><i class='far fa-home'></i>INTENTE DE NUEVO</button></a>";
  }
}
?>

<form class="container col-md-5" action="delventas.php" method="POST"> <br>
  <p class="alert alert-danger h2 text-center">ELIMINAR VENTA </p>
    <table class="table text-center">
      <tr>
        <th>ID VENTA</th>
      </tr>
      <tr>
        <td> <input type="text" class="text-center form-control"name="idven" > </td>
      </tr>
  </table>
  <section class="text-center">
    <input type="submit" name="envio" class="btn btn-danger" value="ELIMINAR">
      <a href="../principal.php"> <input type="button" class="btn btn-success"value="VER"> </a>
  </section>

</form>
