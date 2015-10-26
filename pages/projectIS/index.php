<?php
    //PROJECTIS (2015)

    $maindir = '';

    //Incluimos el contenido del archivo config.inc.php
    include $maindir.'conexion/config.inc.php';
    
    //Se realiza la consulta
    $query = $db -> prepare("SELECT * FROM projects");
    $query -> execute();
    
    include 'modals.php';
?>
<div class="row">
    <?php
        while($row = $query ->fetch(PDO::FETCH_ASSOC)){
    ?>
    <div class="col-xs-12 col-md-4" >
        <div class="panel panel-default">
            <div class="panel-image">
                <img src="images/hh.jpg" class="panel-image-preview">
            </div>
            <div class="panel-body">
                <h4><?php echo $row['projectName']; ?></h4>
                <p> <?php echo $row['description']; ?></p>            
            </div>
            <div class="panel-footer text-center">
                <a href="#download"><span class="glyphicon glyphicon-download"></span></a>
                <a href="#facebook"><span class="fa fa-facebook"></span></a>
                <a href="#twitter"><span class="fa fa-twitter"></span></a>
                <a href="#" onclick="share(<?php echo $row['projectID']?>);"><span class="glyphicon glyphicon-share-alt"></span></a>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
</div>

<script>
    function share(projectID) {
        projectID = {
            projectID : projectID
        }
        $.get("pages/projectIS/seeMoreProject.php", projectID, function(html){
            $("#seeMoreProjectBody").html(html);
        });
        $("#seeMoreProject").modal("show");
    }
</script>
