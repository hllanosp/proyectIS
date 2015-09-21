



<!DOCTYPE html>
<html lang="en">

<?php 
    include('pages/head.php');
 ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php 
            include('pages/nav_principal.php');
         ?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <?php
                /*
                    include('mvc/proyectIS/controller.php');
                */
                include ('pages/home2.php');
                 ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
         <?php 
            include('pages/footer.php');
         ?>
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
