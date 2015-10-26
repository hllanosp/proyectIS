
<?php

error_reporting(E_ALL ^ E_DEPRECATED);

 $host = 'localhost';
 $dbname = 'projectIS';
 $username = 'root';
 $password = '';
 $conexion = mysql_connect($host, $username, $password);
 mysql_select_db($dbname);

?> 
