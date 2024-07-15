<?php
//Author Ahmad Waziri
defined('DB_SERVER') ? null : define("DB_SERVER","192.168.78.215");
defined('DB_USER') ? null : define("DB_USER","mis");		  
defined('DB_PASS') ? null : define("DB_PASS","Mis@2024");			  
defined('DB_NAME') ? null : define("DB_NAME","fudma_tps"); 
$dBASE = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);





if ($dBASE->connect_error) {
    die("Failed to establish Database connection: " . $dBASE->connect_error);
}
