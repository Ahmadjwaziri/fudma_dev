<?php
//Author SAMIUL HAQQ
defined('DB_SERVER') ? null : define("DB_SERVER","localhost");
defined('DB_USER') ? null : define("DB_USER","ahmad");		  
defined('DB_PASS') ? null : define("DB_PASS","08028305974@Ajw");			  
defined('DB_NAME') ? null : define("DB_NAME","misjsiit_dev"); 
$dBASE = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if ($dBASE->connect_error) {
    die("Failed to establish Database connection: " . $dBASE->connect_error);
}
?>