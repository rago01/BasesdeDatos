<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title></title>
  </head>
  <body>
    <section class="text-center" > <br>

      <form class="col-md-9 " action="validaringreso.php" method="post">
            <p class="h2 text-center" style="background:yellow;border-radius:10px;">INGRESO DE USUARIO</p>
          <div class="row justify-content-center">
            <strong class="col-md-4">USUARIO : </strong>
            <input type="text" class="form-control text-center col-md-6 " name="usuario">
          </div> <br>
          <div class="row justify-content-center">
            <strong class="col-md-4">CLAVE : </strong>
            <input type="text" class="form-control text-center col-md-6" name="clave">
          </div> <br>
          <input type="submit" name="" value="INGRESAR" class="btn btn-success">
      </form>
    </section>
  </body>
</html>
