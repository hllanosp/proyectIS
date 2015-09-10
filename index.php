
<!-- Representa la estructura de la pagina web -->
<!DOCTYPE html>
<html class="no-js">

<?php
  include('pages/head.php');
 ?>

 <div class="container-fluid" id = "">
     <div class="row-fluid">
         <?php
            include('pages/slidebar.php');
          ?>

         <!--/span-->
         <div class="span9" id="content">
          <?php
            include('pages/home.php');
           ?>
         </div>
     </div>



     <hr>
  
       <?php
          include('pages/footer.php');
        ?>

 </div>
 <!--/.fluid-container-->
 <script src="vendors/jquery-1.9.1.min.js"></script>
 <script src="bootstrap/js/bootstrap.min.js"></script>
 <script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
 <script src="assets/scripts.js"></script>
 <script>
 $(function() {
     // Easy pie charts
     $('.chart').easyPieChart({animate: 1000});
 });
 </script>
 </body>

 </html>
