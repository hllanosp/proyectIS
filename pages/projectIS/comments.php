<?php
    //PROJECTIS (2015)

    $maindir = '../../';

    //Incluimos el contenido del archivo config.inc.php
    include $maindir.'conexion/config.inc.php';
    
    //Se inicia sesión en el caso de que no se haya hecho anteriormente
    if(!isset($_SESSION))
        session_start();
    
    $projectID = $_SESSION['projectID']; //Se obtiene el identificador en la sesión

    //Se realiza la consulta
    $query = $db -> prepare("SELECT * FROM comments INNER JOIN users ON comments.userID = users.userID WHERE comments.projectID = ?");
    $query -> execute(array($projectID));
?>

<div class="clear"><hr>
    <h3>Deje su comentario</h3>
</div>
<div class="well span8">
    <div class="panel panel-default">
        <div class="panel-body">                
            <div accept-charset="UTF-8" role="form">
                <textarea class="form-control counted" name="message" placeholder="Déjanos un mensaje" rows="5" style="margin-bottom:10px;"></textarea>
                <h6 class="pull-right" id="counter">320 caracteres permitidos</h6>
                <button class="btn btn-info" type="submit">Comentar</button>
            </div>
        </div>
    </div>
</div>

<?php
    while($result = $query ->fetch(PDO::FETCH_ASSOC)){
?>
    <div class="row clear"><hr>
        <div class="col-md-2 col-md-offset-1" >
            <img src="images/hh.jpg" class="img-circle" style="height: 70px;">
        </div>
        <div class="col-md-8 ">
            <h3><?php echo $result['names']; ?></h3>
            <?php echo $result['description']; ?>
        </div>
    </div>
<?php
    }
?>