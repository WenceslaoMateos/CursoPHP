<!DOCTYPE html>
<html lang="en">
  <head>
      <?php include('templates/inicial/head.php');?>  
  </head>
  <body>
    <?php include('templates/inicial/header.php');?>  
    <main>
      <div class="container col-lg-5 col-offset-6 centered" style='padding-top: 4rem;'>
        <ul class="list-group">
          <a href = "mapa.php" class="list-group-item list-group-item-action">Tracking</a>
          <a href = "cargar-campanias.php" class="list-group-item list-group-item-action">Prototipo de carga de Tracking de Barcos</a></li>
          <li class="list-group-item list-group-item-action disabled">Carga de Batimetrías</li>
          <li class="list-group-item list-group-item-action disabled">Clima</li>
          <li class="list-group-item list-group-item-action disabled">Prototipo de carga de Climas</li>
        </ul>
      </div>
    </main>
    <?php include('templates/inicial/footer.php');?>  
  </body>
</html>

