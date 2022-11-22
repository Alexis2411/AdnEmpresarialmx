<?php
 function authenticatedUser(){
    if(!checkUser()){
        header('Location: InicioSesion.php');
        exit();
    } 
  }

   function checkUser(){
    return isset($_SESSION['usuario']);
   }

   session_start();
   authenticatedUser();