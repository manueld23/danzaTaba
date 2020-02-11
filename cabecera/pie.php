<!--/ footer Star /-->

<style>
  .sectionPie {
    background-color: #2f2222;
  }

  footer {
    background-color: #2f2222;
  }
</style>

<section class="section-services section-t8 sectionPie">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-6 section-md-t3">
        <div class="widget-a">
          <div class="w-header-a">
            <h3 id="pie" class="w-title-a text-brand" style="color:white">EstateAgency</h3>
          </div>
          <div class="w-body-a">
            <p class="w-text-a color-text-a" style="color:white">
              Enim minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat duis
              sed aute irure.
            </p>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-md-6 section-md-t3">
        <div class="widget-a">
          <div class="w-header-a">
            <h3 class="w-title-a text-brand" style="color:white">Formulario de contacto</h3>
          </div>
          <div class="w-body-a">

            <form name="frmNotification" id="frmNotification" action="controlador/agregarnotificacion.php" method="post">

              <div class="row">

                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="autor" name="autor" placeholder="Nombre">
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo">
                </div>
                <div class="form-group col-md-12">
                  <input type="text" class="form-control" id="tema" name="tema" placeholder="Tema">
                </div>
                <div class="form-group col-md-12">
                  <input type="text" class="form-control" id="mensaje" name="mensaje" placeholder="Mensaje">
                </div>
              </div>
              <div class="col-md-12">
                <input class="btn btn-a" type="submit" name="add" id="btn-send" value="Enviar">
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<footer>
  <div class="container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d943.9952843503684!2d-97.11258218041912!3d18.843506504510824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x85c503ceea72fecb%3A0x3c453e836b04e38f!2sTABA%20Escuela%20de%20Danza%2C%20Sur%2016%20290%2C%20Centro%2C%2094300%20Orizaba%2C%20Ver.!3m2!1d18.8434808!2d-97.1120919!5e0!3m2!1ses-419!2smx!4v1569971185941!5m2!1ses-419!2smx" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="socials-a">
          <ul class="list-inline">
            <span class="text-center">Redes sociales</span><br><br>
            <?php
            $sentencia = $pdo->prepare("SELECT * FROM `redesSociales`");
            $sentencia->execute();
            $redesSociales = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <?php foreach($redesSociales as $redS){?>

            <li class="list-inline-item">
              <a href="<?php echo $redS['url'];?>">
                <img src="http://localhost/ejercicio4/img/redesSociales/<?php echo $redS['imagenSocial'];?>" width="30px" alt="">
                <!--<i class="fa fa-facebook" aria-hidden="true"></i>-->
              </a>
            </li>

            <?php }?>
            <!--
             -->
          </ul>
        </div>
        <div class="copyright-footer">
          <p class="copyright color-text-a">
            &copy; Copyright
            <span class="color-a">EstateAgency</span> All Rights Reserved.
          </p>
        </div>
        <div class="credits">
          <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
            -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </div>
  </div>
</footer>

<!--/ Footer End /-->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!--div id="preloader"></div>-->

<!-- JavaScript Libraries -->
<script src="http://localhost/ejercicio4/lib/jquery/jquery.min.js"></script>
<script src="http://localhost/ejercicio4/lib/jquery/jquery-migrate.min.js"></script>
<script src="http://localhost/ejercicio4/lib/popper/popper.min.js"></script>
<script src="http://localhost/ejercicio4/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="http://localhost/ejercicio4/lib/easing/easing.min.js"></script>
<script src="http://localhost/ejercicio4/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="http://localhost/ejercicio4/lib/scrollreveal/scrollreveal.min.js"></script>
<!-- Contact Form JavaScript File -->
<script src="http://localhost/ejercicio4/contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="http://localhost/ejercicio4/js/main.js"></script>

<!-- ---------------------------------------------- -->

<!-- Bootstrap core JavaScript-->
<!-- Page level plugins -->
<script src="http://localhost/ejercicio4/vendor/chart.js/Chart.min.js"></script>
<script src="http://localhost/ejercicio4/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="http://localhost/ejercicio4/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="http://localhost/ejercicio4/js/sb-admin-2.min.js"></script>

   <script type="text/javascript">
      function myFunction() {
        $.ajax({
          url: "../cabecera/notificaciones.php",
          type: "POST",
          processData:false,
          success: function(data){
            $("#notification-count").remove();                  
            $("#notification-latest").show();$("#notification-latest").html(data);
          },
          error: function(){}           
        });
      }
                                 
      $(document).ready(function() {
        $('body').click(function(e){
          if ( e.target.id != 'notification-icon'){
            $("#notification-latest").hide();
          }
        });
      });                                     
    </script>

</div>
</body>

</html>