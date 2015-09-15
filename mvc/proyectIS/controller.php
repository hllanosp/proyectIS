<?php
    require_once('constants.php');
    require_once('model.php');
    require_once('view.php');

    function handler() {
        $event = VIEW_GET_PROJECT;
        $uri = action();
        $peticiones = array(GET_PROJECT, VIEW_GET_PROJECT);
        foreach ($peticiones as $peticion) {
            if(strcmp ($uri,$peticion)==0) {
                $event = $peticion;
                break;
            }
        }

        $proyectIS_data = helper_user_data();
        $proyectIS = set_obj();

        switch ($event) {

            default:
                $proyectIS->get();
                $data = $proyectIS -> projects;
                retornar_vista($event, $data);
        }
    }

    function set_obj() {
        $obj = new ProyectIS();
        return $obj;
    }

    function helper_user_data() {
        $user_data = array();
        if($_POST) {
            if(array_key_exists('', $_POST)) {
                $user_data[''] = $_POST[''];
            }
        } else if($_GET) {
            if(array_key_exists('', $_GET)) {
                $user_data = $_GET[''];
            }
        }
        return $user_data;
    }
    
    function action(){
        $action = '';
        
        if($_POST){
            if(array_key_exists('action', $_POST)) {
                $action = $_POST['action'];
            }
        } else if($_GET){
            if(array_key_exists('action', $_GET)) {
                $action = $_GET['action'];
            }
        }
        return $action;
    }

    handler();
?>