<?php
require_once "models/model.php";

class controlador{

    public function auth()
    {//metodo de validar la contraseña
        $db = model::db();
        $sql = $db->prepare("SELECT * FROM credenciales WHERE usuario = :usu");
        $sql->execute(array(":usu" => $_SESSION["usuario"]));
        $sql->setFetchMode(PDO::FETCH_CLASS, controlador::class);
        $user = $sql->fetch(PDO::FETCH_CLASS);
    }
}