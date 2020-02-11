<?php 
/*if (isset($_SESSION['admin'])) {

  include('barraAdmin.php');
  
}elseif (isset($_SESSION['user'])) {

 include('barraUser.php');

}elseif($_SESSION['verificar'] = false){

   include('barra.php');
   
}*/

if (isset($_SESSION['admin']) == true) {

  include('barraAdmin.php');
  
}if (isset($_SESSION['user']) == true) {

 include('barraUser.php');

}if(isset($_SESSION['maestro']) == true){

  include('barraMaestro.php');
  
}
if(isset($_SESSION['verificar']) == false){

   include('barra.php');
   
}
?>