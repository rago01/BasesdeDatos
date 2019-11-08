<?php include('../conexion.php');

$idcat = $_POST['idcat'];
$envio = $_POST['envio'];

$sql="SELECT * FROM categoria
        WHERE id_cat= '$idcat'";
$consulta=mysqli_query($conexion, $sql);
$conexion->query($sql);
$total = mysqli_num_rows($consulta);

if (isset($envio))
{
  if($total > 0)
  {
    $sql = "DELETE FROM categoria WHERE id_cat='$idcat'";
    mysqli_query($conexion, $sql);
    $conexion->query($sql);
    echo "<p class='h1'> SE ELIMINO CORRECTAMENTE</p>";
    echo " <a href='../principal.php'><button class='btn btn-success'><i class='far fa-home'></i> REGRESAR AL INICIO</button></a>";
  }else{
    echo "<p class='h1'> ESTE PRODUCTO NO EXISTE</p>";
    echo " <a href='delcat.php'><button class='btn btn-success'><i class='far fa-home'></i>INTENTE DE NUEVO</button></a>";
  }
}


?>

<form class="container col-md-5" action="delcat.php" method="POST"> <br>
  <p class="alert alert-danger h2 text-center">ELIMINAR CATEGORIA </p>
    <table class="table text-center">
      <tr>
        <th>ID DE PRODUCTO A ELIMINAR</th>
      </tr>
      <tr>
        <td> <input type="text" class="text-center form-control"name="idcat" > </td>
      </tr>
    </table>

    <section class="text-center">
      <input type="submit" name="envio" class="btn btn-danger" value="ELIMINAR">
        <a href="../principal.php"> <input type="button" class="btn btn-success"value="VER"> </a>
    </section>
