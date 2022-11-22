<?php
// DEV
   /* define('HOST_DB','localhost');
    define('USER_DB','root');
    define('PASS_DB','12334');
    define('NAME_DB','encuestauv');

*/
// PROD

    if(!defined('HOST_DB'))define('HOST_DB','localhost');
    if(!defined('USER_DB'))define('USER_DB','adnempre_admin');
    if(!defined('PASS_DB'))define('PASS_DB','Uv2020@#$');
    if(!defined('NAME_DB'))define('NAME_DB','encuestauv');

    $con = new mysqli(HOST_DB,USER_DB,PASS_DB,NAME_DB);
    
    if ($con->connect_error) {
        echo $con->connect_error;
    }
    
    $con->set_charset('utf8');
?>