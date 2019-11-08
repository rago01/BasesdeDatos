<?php include('conexion.php'); ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body class="container">
<br>
      <section class="row justify-content-md-center">
        <ul class="nav nav-pills text-center" >
            <li ><a class="btn btn-light" id="proveedor" data-toggle="pill" href="#proveedores" >PROVEEDORES</a> &nbsp </li>
            <li ><a class="btn btn-light" id="cliente" data-toggle="pill" href="#clientes" >CLIENTES</a> &nbsp </li>
            <li ><a class="btn btn-light" id="producto" data-toggle="pill" href="#productos" >PRODUCTOS</a> &nbsp </li>
            <li ><a class="btn btn-light" id="venta" data-toggle="pill" href="#ventas" >VENTAS</a> &nbsp </li>
            <li ><a class="btn btn-light" id="categoria" data-toggle="pill" href="#categorias" >CATEGORIAS</a> &nbsp </li>
          </ul>
      </section> <br>

    <section class="tab-content" >
    <div class="tab-pane fade show activate" id="proveedores" role="tabpanel" aria-labelledby="proveedor"><?php include('proveedores/verProveedores.php') ?></div>
    <div class="tab-pane fade" id="clientes" role="tabpanel" aria-labelledby="cliente"><?php include('clientes/verClientes.php') ?></div>
    <div class="tab-pane fade" id="productos" role="tabpanel" aria-labelledby="producto"> <?php include('productos/verProductos.php')?> </div>
    <div class="tab-pane fade" id="ventas" role="tabpanel" aria-labelledby="venta"> <?php include('ventas/verVentas.php')?> </div>
    <div class="tab-pane fade" id="categorias" role="tabpanel" aria-labelledby="categoria"> <?php include('categorias/verCategorias.php')?> </div>
    </section>

<!-- GROUP BY Y BETWEEN-->

<section class="row">
    <section class="text-center col-md-3">
      <table class="table">
        <thead>
          <tr>
            <th><p class="h4"> CLIENTES</p></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><select class="form-control " name="proveedores">
              <option value="">
                <?php $sql="SELECT nom_cli FROM cliente GROUP BY nom_cli";
                 $result=mysqli_query($conexion, $sql);
                while($fila = mysqli_fetch_array($result)) {
                  echo '<option>'.$fila['nom_cli'].' </option>';
                }
       ?>
              </option>
            </select></td>
          </tr>
        </tbody>
      </table>
    </section>
    <section class="text-center col-md-3">
      <table class="table">
        <thead>
          <tr>
            <th><p class="h4">PROVEEDORES</p></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><select class="form-control " name="proveedores">
              <option value="">
                <?php $sql="SELECT nom_prov FROM proveedor GROUP BY nom_prov";
                 $result=mysqli_query($conexion, $sql);
                while($fila = mysqli_fetch_array($result)) {
                  echo '<option>'.$fila['nom_prov'].' </option>';
                }
       ?>
              </option>
            </select></td>
          </tr>
        </tbody>
      </table>
    </section>
    <section class="text-center col-md-3">
      <table class="table">
        <thead>
          <tr>
            <th><p class="h4">PRODUCTOS</p></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><select class="form-control " name="proveedores">
              <option value="">
                <?php $sql="SELECT nom_prod FROM producto GROUP BY nom_prod";
                 $result=mysqli_query($conexion, $sql);
                while($fila = mysqli_fetch_array($result)) {
                  echo '<option>'.$fila['nom_prod'].' </option>';
                }
       ?>
              </option>
            </select></td>
          </tr>
        </tbody>
      </table>
    </section>
  </section>

  <section class="text-center">
    <p class="h4">PRODUCTOS POR CATEGORIA</p>
      <table class="table table-light">
        <thead>
          <tr>
            <th>NOMBRE</th>
            <th>ID CATEGORIA</th>
            <th>CATEGORIA</th>
          </tr>
        </thead>
        <tbody>
          <?php $consulta="SELECT * FROM ProductoCategoria";
                $resultados=mysqli_query($conexion, $consulta);
                while(($fila=mysqli_fetch_row($resultados))==true): ?>
                <tr>
                  <td><?php echo $fila[0]?></td>
                  <td><?php echo $fila[1]?></td>
                  <td><?php echo $fila[2]?></td>
                </tr>
                <?php endwhile;?>
        </tbody>
      </table>
  </section>
  <section class="text-center">
    <table class="table table-light">
      <thead>
        <tr>
          <th>NOMBRE DEL CLIENTE</th>
          <th>NOMBRE PRODUCTO</th>
          <th>ID PRODUCTO</th>
        </tr>
      </thead>
      <p class="h4">CLIENTES Y VENTAS REALIZADAS</p>
      <tbody>
        <?php $consulta="SELECT * FROM clientesVentas";
              $resultados=mysqli_query($conexion, $consulta);
              while(($fila=mysqli_fetch_row($resultados))==true): ?>
              <tr>
                <td><?php echo $fila[0]?></td>
                <td><?php echo $fila[1]?></td>
                <td><?php echo $fila[2]?></td>
              </tr>
              <?php endwhile;?>
      </tbody>
    </table>
  </section>

  <br>

  <section class="text-center">
    <p class="h4">PRODUCTOS ENTRE UNO Y DOS MILLONES</p>
    <table class="table table-dark">
      <tbody>
        <thead>
          <tr>
            <th>NOMBRE</th>
            <th>PRECIO</th>
          </tr>
        </thead>
        <?php $consulta="SELECT nom_prod, precio_prod FROM producto WHERE precio_prod BETWEEN 1000000 AND 2000000";
              $resultados=mysqli_query($conexion, $consulta);
              while(($fila=mysqli_fetch_row($resultados))==true): ?>
              <tr>
                <td><?php echo $fila[0]?></td>
                <td><?php echo $fila[1]?></td>
              </tr>
              <?php endwhile;?>
      </tbody>
    </table>
  </section>
  <section class="text-center">
    <p class="h4">MANEJO PRODUCTOS</p>
    <table class="table table-hover">
        <tr class="thead-dark">
          <th scope="col">ID PRODUCTO</th>
          <th scope="col">ID PROVEEDOR</th>
          <th scope="col">ID CATEGORIA</th>
          <th scope="col">NOMBRE</th>
          <th scope="col">PRECIO</th>
          <th scope="col">STOCK</th>
          <th scope="col">ACCION</th>
          <th scope="col">FECHA</th>
        </tr>
        <?php $consulta="SELECT * FROM manejoProductos";
              $resultados=mysqli_query($conexion, $consulta);
              while(($fila=mysqli_fetch_row($resultados))==true): ?>
              <tr>
                <td><?php echo $fila[0]?></td>
                <td><?php echo $fila[1]?></td>
                <td><?php echo $fila[2]?></td>
                <td><?php echo $fila[3]?></td>
                <td><?php echo '$'.$fila[4]?></td>
                <td><?php echo $fila[5]?></td>
                <td><?php echo $fila[6]?></td>
                <td><?php echo $fila[7]?></td>
              </tr>
              <?php endwhile;?>
    </table>
  </section>
  <section class="text-center">
    <p class="h4">MANEJO CLIENTES</p>
    <table class="table table-hover">
        <tr class="thead-dark">
          <th scope="col">ID CLIENTE </th>
          <th scope="col">NOMBRE </th>
          <th scope="col">TELEFONO</th>
          <th scope="col">DIRECCION</th>
          <th scope="col">ACCION</th>
          <th scope="col">FECHA</th>
        </tr>
        <?php $consulta="SELECT * FROM manejoClientes";
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
                <td><?php echo $fila[7]?></td>
              </tr>
              <?php endwhile;?>
    </table>
  </section>
  <section class="text-center">
    <p class="h4">MANEJO VENTAS</p>
    <table class="table table-hover">
        <tr class="thead-dark">
          <th scope="col">ID VENTA</th>
          <th scope="col">ID PRODUCTO</th>
          <th scope="col">ID CLIENTE</th>
          <th scope="col">FECHA</th>
          <th scope="col">PRECIO PRODUCTO</th>
          <th scope="col">CANTIDAD</th>
          <th scope="col">MONTO FINAL</th>
          <th scope="col">ACCION</th>
        </tr>
        <?php $consulta="SELECT * FROM manejoVenta";
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
                <td><?php echo $fila[7]?></td>
              </tr>
              <?php endwhile;?>
    </table>
  </section>
  <p class="H1">FUNCIONES</p>
  <section class="text-center">
    <p class="h4">TOTAL PRODUCTOS</p>
    <table class="table table-hover">
        <tr class="thead-dark">
          <th scope="col">TOTAL</th>
        </tr>
        <?php $consulta="SELECT totalProductos()";
              $resultados=mysqli_query($conexion, $consulta);
              while(($fila=mysqli_fetch_row($resultados))==true): ?>
              <tr>
                <td><?php echo $fila[0]?></td>
              </tr>
              <?php endwhile;?>
    </table>
  </section>
  <section class="text-center">
    <p class="h4">TOTAL PRECIO PRODUCTOS</p>
    <table class="table table-hover">
        <tr class="thead-dark">
          <th scope="col">TOTAL</th>
        </tr>
        <?php $consulta="SELECT totalPrecioProductos()";
              $resultados=mysqli_query($conexion, $consulta);
              while(($fila=mysqli_fetch_row($resultados))==true): ?>
              <tr>
                <td><?php echo '$'.$fila[0]?></td>
              </tr>
              <?php endwhile;?>
    </table>
  </section>
  <section class="text-center">
    <p class="h4">TOTAL PROVEEDORES</p>
    <table class="table table-hover">
        <tr class="thead-dark">
          <th scope="col">TOTAL</th>
        </tr>
        <?php $consulta="SELECT totalProveedores()";
              $resultados=mysqli_query($conexion, $consulta);
              while(($fila=mysqli_fetch_row($resultados))==true): ?>
              <tr>
                <td><?php echo $fila[0]?></td>
              </tr>
              <?php endwhile;?>
    </table>
  </section>
  <section class="text-center">
    <p class="h4">TOTAL CATEGORIAS</p>
    <table class="table table-hover">
        <tr class="thead-dark">
          <th scope="col">TOTAL</th>
        </tr>
        <?php $consulta="SELECT totalCategorias()";
              $resultados=mysqli_query($conexion, $consulta);
              while(($fila=mysqli_fetch_row($resultados))==true): ?>
              <tr>
                <td><?php echo $fila[0]?></td>
              </tr>
              <?php endwhile;?>
    </table>
  </section>
  <section class="text-center">
    <p class="h4">TOTAL VENTAS</p>
    <table class="table table-hover">
        <tr class="thead-dark">
          <th scope="col">TOTAL</th>
        </tr>
        <?php $consulta="SELECT totalVentas()";
              $resultados=mysqli_query($conexion, $consulta);
              while(($fila=mysqli_fetch_row($resultados))==true): ?>
              <tr>
                <td><?php echo $fila[0]?></td>
              </tr>
              <?php endwhile;?>
    </table>
  </section>
  </body>
</html>
