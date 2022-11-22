<?php
// DEV
/*
    define('HOST_DB','localhost:9006');
    define('USER_DB','root');
    define('PASS_DB','12334');
    define('NAME_DB','encuestauv');
*/

// PROD

    define('HOST_DB','localhost');
    define('USER_DB','adnempre_admin');
    define('PASS_DB','Uv2020@#$');
    define('NAME_DB','adnempre_encuesta');

    $con = new mysqli(HOST_DB,USER_DB,PASS_DB,NAME_DB);
    
    if ($con->connect_error) {
        echo $con->connect_error;
    }
    
    $con->set_charset('utf8');
?>