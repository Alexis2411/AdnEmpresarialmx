<?php
interface IDAORegistro{
    public function selecUsuario();
    public function selectUserId($id);
    public function verifyEmail($email);
    public function InsertUser(Usuario $user, Empresa $emp);
    public function UpdateUser(Usuario $user, Empresa $emp);
    public function DeleteUser($id);
}

?>