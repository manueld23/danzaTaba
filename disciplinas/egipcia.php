<?php
      //session_start();
      //include('../cabecera/menu.php');
      include('../cabecera/tipo.php');
      include('../controlador/aDisciplinas.php');
    ?>
    <style>
      .contentdisciplinas{
        background-color: black;
      }
    </style>
    <section class='section-agents section-t8 contentdisciplinas'>
        
        
        <div class='row'>

        <div class='col-md-9 columnas9'>
          <img id='imgFondo' src='../img/disciplinas/1572999126_60761264_1879522942147283_4579306620760096768_n.jpg' width='100%' height='100%'>
        </div>
        <div class='col-md-3 colorFondo'>
        <br>        
          <?php 
               if(file_exists('../videos/egipcia.php')){ ?>
                <a href='../videos/egipcia.php' class='btn btn-success'>Videos</a>
               <?php }
            ?>
            <button class='btn btn-info'>Informacion</button> <br><br>
          <span>
            danza egipcia
          </span>
        </div>
  
      </div>

          <style>
          #imgFondo {
            width: 100%;
            height: 100%;
            position: relative;
          }
         
        .texto-encima{
            position: absolute;
            right: 0;
            display: block;
            opacity: 0.5;
            background-color: blue;
        }
        
        .contentdisciplinas{
          padding-top: 5%;
        }
        
        .colorFondo{
          opacity: 0.7;
          background-color: black;
        }
        
        .columnas9{
          padding: 0;
        }
            .aside{
              background-color: #FF5733;
              width: 30%;
              }
          </style>

    </section>
      <script src='http://localhost/ejercicio4/lib/jquery/jquery.min.js'></script>
      <script src='http://localhost/ejercicio4/lib/jquery/jquery-migrate.min.js'></script>
      <script src='http://localhost/ejercicio4/lib/popper/popper.min.js'></script>
      <script src='http://localhost/ejercicio4/lib/bootstrap/js/bootstrap.min.js'></script>
      <script src='http://localhost/ejercicio4/lib/easing/easing.min.js'></script>
      <script src='http://localhost/ejercicio4/lib/owlcarousel/owl.carousel.min.js'></script>
      <script src='http://localhost/ejercicio4/lib/scrollreveal/scrollreveal.min.js'></script>

      <script src='http://localhost/ejercicio4/contactform/contactform.js'></script>

      <script src='http://localhost/ejercicio4/js/main.js'></script>

      <script src='http://localhost/ejercicio4/vendor/chart.js/Chart.min.js'></script>
      <script src='http://localhost/ejercicio4/vendor/bootstrap/js/bootstrap.bundle.min.js'></script>


      <script src='http://localhost/ejercicio4/vendor/jquery-easing/jquery.easing.min.js'></script>

      <script src='http://localhost/ejercicio4/js/sb-admin-2.min.js'></script>
    <?php //include('../cabecera/pie.php'); ?>