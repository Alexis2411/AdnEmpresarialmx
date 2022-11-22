<?php
    $id_usuario= $_GET['id_usuario'];
    include("includes/function/funciones.php");

  //  deleteUser($id_usuario);
    header('location: AdminRegistros.php');
    exit;


?>
