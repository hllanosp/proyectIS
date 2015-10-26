<!DOCTYPE html>
<style>
    @import url("http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");

    .panel-image img.panel-image-preview {
        width: 100%;
        border-radius: 4px 4px 0px 0px;
    }

    .panel-heading ~ .panel-image img.panel-image-preview {
        border-radius: 0px;
    }

    .panel-image ~ .panel-body, .panel-image.hide-panel-body ~ .panel-body {
        overflow: hidden;
    }
    .panel-image ~ .panel-footer a {
        padding: 0px 10px;
        font-size: 1.3em;
        color: rgb(100, 100, 100);
    }

    .panel-image.hide-panel-body ~ .panel-body {
        height: 0px;
        padding: 0px;
    }
</style>
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
        <?php 
            include('pages/nav_principal.php');
         ?>
        <div id="page-content-wrapper">
            <div class="row">
                <div class="jumbotron">
                    <h1 class="page-header">
                        Proyectis <small>comunidad IS</small>
                    </h1>
                    <p>Esta es una Plataforma online. En donde puedes compartir con la comunidad estudiantil todos tus proyectos. Tambien puedes participar en proyectos de vinculacion y en el blog...</p>
                    <p>
                        <a role="button" class="btn btn-primary btn-lg" href="#">Saber mas.. »</a>
                    </p>
                </div>
            </div>
            <?php
                include('pages/projectIS/index.php');
                include('pages/footer.php');
            ?>
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
