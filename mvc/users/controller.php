<?php
    require_once('constants.php');
    require_once('model.php');
    require_once('view.php');

    function handler() {
        $event = VIEW_GET_USER;
        $uri = action();
        $peticiones = array(SET_USER, GET_USER, DELETE_USER, EDIT_USER,
                            VIEW_SET_USER, VIEW_GET_USER, VIEW_DELETE_USER,
                            VIEW_EDIT_USER);
        foreach ($peticiones as $peticion) {
            if(strcmp ($uri,$peticion)==0) {
                $event = $peticion;
                break;
            }
        }

        $user_data = helper_user_data();
        $user = set_obj();

        switch ($event) {
            case SET_USER:
                $user->set($user_data);
                $data = array('mensaje'=>$user->message);
                retornar_vista(VIEW_SET_USER, $data);
                break;
            case GET_USER:
                $user->get('email',$user_data);
                $data = array(
                    'names'=>$user->names,
                    'surNames'=>$user->surNames,
                    'email'=>$user->email
                );
                retornar_vista(VIEW_EDIT_USER, $data);
                break;
            case DELETE_USER:
                $user->delete($user_data['email']);
                $data = array('mensaje'=>$user->message);
                retornar_vista(VIEW_DELETE_USER, $data);
                break;
            case EDIT_USER:
                $user->edit($user_data);
                $data = array('mensaje'=>$user->message
                        );
                retornar_vista(VIEW_GET_USER, $data);
                break;
            default:
                retornar_vista($event);
        }
    }

    function set_obj() {
        $obj = new User();
        return $obj;
    }

    function helper_user_data() {
        $user_data = array();
        if($_POST) {
            if(array_key_exists('names', $_POST)) {
                $user_data['names'] = $_POST['names'];
            }
            if(array_key_exists('surNames', $_POST)) {
                $user_data['surNames'] = $_POST['surNames'];
            }
            if(array_key_exists('email', $_POST)) {
                $user_data['email'] = $_POST['email'];
            }
            if(array_key_exists('password', $_POST)) {
                $user_data['password'] = $_POST['password'];
            }
        } else if($_GET) {
            if(array_key_exists('email', $_GET)) {
                $user_data = $_GET['email'];
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