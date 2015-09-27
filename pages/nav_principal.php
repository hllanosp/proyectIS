
<?php 
    if(!isset($_SESSION)) 
  { 
    session_start(); 
  } 

 ?> 
  
<link rel="stylesheet" href="css/stylo.css">

<!-- navbar principal este cambiara su contenido cuando alguien inicie o finalice sesion -->

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
       <img style = "float : left; height:50px;"  src="images/logo.png" alt="">
  </div>
  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav">
  
  <?php 
    // si nadie ha iniciado sesion
  // $_SESSION = array();
  // session_destroy();
    if(!isset($_SESSION['auntentificado']) ) {
       echo "
         <li><p class='navbar-text'>Already have an account?</p></li>
         <li class='dropdown' id= 'no_login'>
            <a href='#' class='dropdown-toggle' data-toggle='dropdown'><b>Login</b> <span class='caret'></span></a>
            <ul id='login-dp' class='dropdown-menu'>
              <li>";
                  include('../login/login.php');
         echo"</li>
            </ul>
        </li> ";
    }

    // si se ha iniciado sesion
    else{
      include('login/cerrar_sesion.php');
    }
    // fin else

   ?>
  
  </ul>

</nav>



