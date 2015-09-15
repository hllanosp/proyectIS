<?php
require_once('../core/db_abstract_model.php');
/**
 * Esta clase realiza las funciones dependientes de la clase usuario
 *
 * @author Hllanos y ADFA
 */
class User extends DBAbstractModel {
    ############################### PROPIEDADES ################################
        protected $userID;
        public $names;
        public $surNames;
        public $userName;
        private $password;
        public $email;
        public $creationDate;
        protected $modifiedDate;
        
    ################################# MÉTODOS ##################################
        # Método constructor
        function __construct() {
            #Por el momento no hacemos nada
        }
        
        # Método destructor del objeto
        function __destruct() {
            unset($this);
        }

        # Traer datos de un usuario
        public function get($option='', $filter='') {
            if($option !=''){
                if($option == 'email'){
                    $this->query = "CALL SP_SELECT_USER_BY_EMAIL('$filter');";
                }else if($option == 'userID'){
                    $this->query = "CALL SP_SELECT_USER_BY_ID('$filter');";
                }else if($option == 'userName'){
                    $this->query = "CALL SP_SELECT_USER_BY_USERNAME('$filter');";
                }
                $this->get_results_from_query();
            }

            if(count($this->rows) == 1) {
                foreach ($this->rows[0] as $propiedad=>$valor) {
                    $this->$propiedad = $valor;
                }
                $this->message = 'Usuario encontrado';
            } else {
                $this->message = 'Usuario no encontrado';
            }
        }    
}

?>