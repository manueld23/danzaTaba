<?php
      //session_start();
      /*include('../cabecera/menu.php');
      if (isset($_SESSION['admin'])) {

        include('../cabecera/barraAdmin.php');

      }elseif (isset($_SESSION['user'])) {

       include('../cabecera/barraUser.php');

      }else{

         include('../cabecera/barra.php');
      }*/

      include('../cabecera/menu.php');
      if (isset($_SESSION['admin'])) {

        include('../cabecera/barraAdmin.php');

      }elseif (isset($_SESSION['user'])) {

       include('../cabecera/barraUser.php');

      }elseif (isset($_SESSION['maestro'])){

       include('../cabecera/barraMaestro.php');

      }else{

         include('../cabecera/barra.php');
      }
    ?>