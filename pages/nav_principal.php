<link rel="stylesheet" href="css/stylo.css">
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
    <li><p class="navbar-text">Already have an account?</p></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
        <ul id="login-dp" class="dropdown-menu">
          <li>
             <?php 
              include('login/login2.php');
              ?>
          </li>
        </ul>
    </li>
  </ul>
  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <?php 
    include('slidebar.php');
   ?>
  <!-- /.navbar-collapse -->
</nav>