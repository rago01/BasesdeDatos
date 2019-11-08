<?php
include('conexion.php');

    $consulta="SELECT * FROM venta";
    $resultado=mysqli_query($conexion, $consulta);
    $fila=mysqli_fetch_row($resultado);?>
<p class="h1 text-center">VENTAS</p>
 <table class="table table-hover">
   <tr>
     <th colspan="8"></th>
   </tr>
     <tr class="thead-dark">
       <th scope="col">ID VENTA</th>
       <th scope="col">ID PRODUCTO</th>
       <th scope="col">ID CLIENTE</th>
       <th scope="col">FECHA</th>
       <th scope="col">PRECIO</th>
       <th scope="col">CANTIDAD</th>
       <th scope="col">MONTOFINAL</th>
     </tr>
     <?php $consulta="SELECT * FROM venta";
           $resultados=mysqli_query($conexion, $consulta);
           while(($fila=mysqli_fetch_row($resultados))==true): ?>
           <tr>
             <td><?php echo $fila[0]?></td>
             <td><?php echo $fila[1]?></td>
             <td><?php echo $fila[2]?></td>
             <td><?php echo $fila[3]?></td>
             <td><?php echo $fila[4]?></td>
             <td><?php echo $fila[5]?></td>
             <td><?php echo $fila[6]?></td>
           </tr>
           <?php endwhile;?>
 </table>
 <section class="row justify-content-around">
   <div class="text-center"> <a href='ventas/addventas.php'><button class='btn btn-outline-success'><i class='far fa-home'></i>AGERGAR</button></a></div>
   <div class="text-center"> <a href='ventas/actventas.php'><button class='btn btn-outline-warning'><i class='far fa-home'></i>MODIFICAR</button></a></div>
   <div  class="text-center"> <a href='ventas/delventas.php'><button class='btn btn-outline-danger'><i class='far fa-home'></i>ELIMINAR</button></a></div>
  </section>
