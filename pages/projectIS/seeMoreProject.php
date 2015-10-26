<?php
    //PROJECTIS (2015)

    $maindir = '../../';

    //Incluimos el contenido del archivo config.inc.php
    include $maindir.'conexion/config.inc.php';
    
    //Capturamos el identificador del proyecto
    $projectID = $_GET['projectID'];
    
    //Se inicia sesión en el caso de que no se haya hecho anteriormente
    if(!isset($_SESSION))
        session_start();
    
    $_SESSION['projectID'] = $projectID; //Se almacena el identificador en la sesión
    
    //Añadiremos una vista a este proyecto
    $query = $db -> prepare("UPDATE `projects` SET `viewed`=`viewed`+1 WHERE `projectID`= ?");
    $query -> execute(array($projectID));
    
    //Se realiza la consulta
    $query = $db -> prepare("SELECT * FROM projects INNER JOIN users ON projects.userID = users.userID WHERE projects.projectID = ?");
    $query -> execute(array($projectID));
    
    $result = $query ->fetch(PDO::FETCH_ASSOC);
?>
<link href="pages/projectIS/seeMoreProject.css" rel="stylesheet" type="text/css"/>
<div class="row">
    <div class="panel panel-default coupon">
        <div class="panel-heading" id="head">
            <div class="panel-title" id="title">
                <img src="images/hh.jpg">
                <span class="hidden-xs"><?php echo $result['projectName']; ?></span>
                <span class="visible-xs"><?php echo $result['projectName']; ?></span>
            </div>
        </div>
        <div class="panel-body">
            <img src="images/hh.jpg" class="coupon-img img-rounded">
            <div class="col-md-9">
                <ul class="items">
                    <p><?php echo $result['description']; ?></p>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="offer">
                    <span class="usd"><sup><i class="fa fa-eye"></i></sup></span>
                    <span class="number"><?php echo $result['viewed']; ?></span>
                </div>
            </div>
        </div>
        <div class="panel-footer">
          <?php
              include 'comments.php';
          ?>
        </div>
    </div>
</div>