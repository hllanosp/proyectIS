
<!DOCTYPE html>
<html lang="en">
<?php 
    include('pages/head.php');
 ?>
<body>
    <?php 
       include('pages/slidebar.php');
   ?>
    <div id="wrapper">
        <!-- Navigation -->
        <div id="nav_principal" style = "border-button : 0px;">
        <?php 
            include('pages/nav_principal.php');
         ?>
         </div>
        <div id="page-wrapper">
               <div class="row-fluid container-fluid" id = "div_contenido">
                    <?php
                    // carrusel (jumbutton) principal de informacion 
                     include('pages/jumbutton.php');
                     ?>
                     
                         <?php 
                         // include('mvc/proyectIS/controller.php');
                         include('pages/proyectos.php');
                         include('pages/footer.php');
                          ?>       
       
               </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
</body>
</html>
