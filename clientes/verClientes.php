<?php
include('conexion.php');

    $consulta="SELECT * FROM proveedor";
    $resultado=mysqli_query($conexion, $consulta);
    $fila=mysqli_fetch_row($resultado);?>

 <table class="table table-hover">
   <tr>
     <th colspan="6"><p class="h1 text-center">CLIENTES</p></th>
   </tr>
     <tr class="thead-dark">
       <th scope="col">RUT</th>
       <th scope="col">NOMBRE</th>
       <th scope="col">TELEFONO</th>
       <th scope="col">DIRECCION</th>
     </tr>
     <?php $consulta="SELECT * FROM cliente";
           $resultados=mysqli_query($conexion, $consulta);
           while(($fila=mysqli_fetch_row($resultados))==true): ?>
           <tr>
             <th><?php echo $fila[0]?></hd>
             <th><?php echo $fila[1]?></hd>
             <th><?php echo $fila[2]?></hd>
             <th><?php echo $fila[3]?></hd>
           </tr>
           <?php endwhile;?>
  </table>
  <section class="row justify-content-around">
    <div class="text-center"> <a href='clientes/addcli.php'><button class='btn btn-outline-success'><i class='far fa-home'></i>AGERGAR</button></a></div>
    <div class="text-center"> <a href='clientes/actcli.php'><button class='btn btn-outline-warning'><i class='far fa-home'></i>MODIFICAR</button></a></div>
    <div  class="text-center"> <a href='clientes/delcli.php'><button class='btn btn-outline-danger'><i class='far fa-home'></i>ELIMINAR</button></a></div>
   </section>

      
