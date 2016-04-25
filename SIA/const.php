<?php

require_once './MysqlManager.php';


$HOST_NAME = "localhost";
$USER_NAME = "root";
/*$PASSWORD_NAME = "caramelle";*/
$PASSWORD_NAME = "";
$DB_NAME = "bddepa";
        
$co = new MysqlManager($HOST_NAME, $DB_NAME, $USER_NAME, $PASSWORD_NAME);   
$ms = new MysqlManager($HOST_NAME, $DB_NAME, $USER_NAME, $PASSWORD_NAME); 
$sqli = new MysqlManager($HOST_NAME, $DB_NAME, $USER_NAME, $PASSWORD_NAME);
$manager = new MysqlManager($HOST_NAME, $DB_NAME, $USER_NAME, $PASSWORD_NAME); 
$sear = new MysqlManager($HOST_NAME, $DB_NAME, $USER_NAME, $PASSWORD_NAME); 
        
      

