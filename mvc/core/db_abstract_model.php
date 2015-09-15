<?php

/**
 * Esta clase tiene como finalidad realizar todas las operaciones con la base
 * de datos
 *
 * @author HLlanos y ADFA
 */
abstract class DBAbstractModel {
    private static $db_host = 'localhost';
    private static $db_user = 'root';
    private static $db_pass = '';
    private static $db_charset = 'utf8';
    protected $db_name = 'projectIS';
    protected $query;
    protected $rows = array();
    private $conn;
    public $message = 'Hecho';
    
    # métodos abstractos para ABM de clases que hereden
    abstract protected function get();
    #abstract protected function set();
    #abstract protected function edit();
    #abstract protected function delete();
    
    # los siguientes métodos pueden definirse con exactitud y
    # no son abstractos
    # Conectar a la base de datos
    private function open_connection() {
        $this->conn = new PDO('mysql:host='.self::$db_host.';'
                . 'dbname='.$this->db_name.';'
                . 'charset='.self::$db_charset,
                self::$db_user,
                self::$db_pass,
                array(PDO::ATTR_EMULATE_PREPARES => FALSE,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                        )
                );
    }
    
    # Desconectar la base de datos
    private function close_connection() {
        $this->conn = null;
    }
    
    # Ejecutar un query simple del tipo INSERT, DELETE, UPDATE
    protected function execute_single_query() {
        if($_POST) {
            $this->open_connection();
            $action = $this->conn->prepare($this->query);
            $action->execute();
            $this->close_connection();
        } else {
            $this->message = 'Metodo no permitido';
        }
    }
    
    # Traer resultados de una consulta en un Array
    protected function get_results_from_query() {
        $this->open_connection();
        $result = $this->conn->prepare($this->query);
        $result->execute();
        $this->rows = $result->fetchAll(PDO::FETCH_ASSOC);
        $result->closeCursor();
        $this->close_connection();
        
    }
}
?>