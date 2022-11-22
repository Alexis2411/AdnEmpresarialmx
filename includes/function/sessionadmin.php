<?php
 function authenticatedUser(){
    if(!checkUser()){
        header('Location: InicioSesion.php');
        exit(); 
    } 
  }

   function checkUser(){
    return isset($_SESSION['admin']);
   }

   session_start();
   authenticatedUser();