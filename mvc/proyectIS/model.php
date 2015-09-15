<?php
require_once('mvc/core/db_abstract_model.php');
require_once('mvc/project/model.php');
/**
 * Esta clase realiza las funciones dependientes del proyecto
 *
 * @author Hllanos y ADFA
 */
class ProyectIS extends DBAbstractModel {
    ############################### PROPIEDADES ################################
        public $projects = array();
        
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

            if(count($this->rows) > 0) {
                $i = 0;
                foreach ($this->rows as $row) { 
                    $project = new Project();
                    foreach ($row as $property=>$value) {
                        $project->set_Data($property, $value);
                    }
                    $this->projects[$i] = $project;
                    $i = $i + 1;
                }
                $this->message = 'Proyectos encontrados';
            } else {
                $this->message = 'No existen proyectos';
            }
        }    
}

?>