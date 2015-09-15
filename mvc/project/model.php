<?php
require_once('mvc/core/db_abstract_model.php');
/**
 * Esta clase realiza las funciones dependientes del proyecto
 *
 * @author Hllanos y ADFA
 */
class Project extends DBAbstractModel {
    ############################### PROPIEDADES ################################
        protected $projectID;
        public $projectName;
        protected $userID;
        public $viewed;
        public $url;
        public $description;
        
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
        public function get() {
            $this->query = "CALL SP_SELECT_PROJECTS();"; 
            $this->get_results_from_query();

            if(count($this->rows) == 1) {
                foreach ($this->rows[0] as $property=>$value) {
                    $this->$property = $value;
                }
                $this->message = 'Proyectos encontrados';
            } else {
                $this->message = 'No existen proyectos';
            }
        }
        
        public function set_Data($property, $value){
            $this->$property = $value;
        }
}

?>