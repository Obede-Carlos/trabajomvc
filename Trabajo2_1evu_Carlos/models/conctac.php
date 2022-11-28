<?php

require_once 'model.php';
/**
* clase contacto donde estan todos los metodos necesarios para que se realicen las opciones necesarias.
*/
class contact {

    function __construct()
    {

    }
    public function run()
    {
      if (isset($_GET['method'])) {
        $method = $_GET['method'];
      } else {
        $method = 'index';
      }
      $this->$method();
    }

    public static function all_personas()
    {
        $db = model::db();
        $statement = $db->query('SELECT * FROM personas');
        $contactos = $statement->fetchAll(PDO::FETCH_CLASS, contact::class);
        return $contactos;
    }

    public static function all_empresas()
    {
        $db = model::db();
        $statement = $db->query('SELECT * FROM empresas');
        $contactos = $statement->fetchAll(PDO::FETCH_CLASS, contact::class);
        return $contactos;
    }

    public static function find_persona($nombre)
    {
        $db = model::db();
        $stmt = $db->prepare('SELECT * FROM personas WHERE nombre =:nombre');
        $stmt->execute(array(':nombre' => $nombre));
        $stmt->setFetchMode(PDO::FETCH_CLASS, contact::class);
        $contacto = $stmt->fetch(PDO::FETCH_CLASS);
        return $contacto;
    }

    public static function find_empresa($nombre)
    {
        $db = model::db();
        $stmt = $db->prepare('SELECT * FROM empresas WHERE nombre =:nombre');
        $stmt->execute(array(':nombre' => $nombre));
        $stmt->setFetchMode(PDO::FETCH_CLASS, contact::class);
        $contacto = $stmt->fetch(PDO::FETCH_CLASS);
        return $contacto;
    }

    public function insertPersona()
    {
        $contact = new contact();
        $db = model::db();
        $sql = $db->prepare('INSERT INTO personas (nombre, apellidos, direccion, telefono) VALUES(:nombre, :apellidos, :direccion, :telfono)');
        $nombre = $_POST["nombre"];
        $sql->bindValue(':nombre', $nombre);
        $apellidos = $_POST["apellidos"];
        $sql->bindValue(':apellidos', $apellidos);
        $direccion = $_POST["direccion"];
        $sql->bindValue(':direccion', $direccion);
        $telefono = $_POST["telefono"];
        $sql->bindValue(':telefono', $telefono);
        $sql->execute();
    }
    public function insertEmpresa()
    {
        $db = model::db();
        $sql = $db->prepare('INSERT INTO empresas (nombre, direccion, telefono, email) VALUES(:nombre, :direccion, :telfono, :email)');
        $nombre = $_POST["nombre"];
        $sql->bindValue(':nombre', $nombre);
        $direccion = $_POST["direccion"];
        $sql->bindValue(':direccion', $direccion);
        $telefono = $_POST["telefono"];
        $sql->bindValue(':telefono', $telefono);
        $email = $_POST["email"];
        $sql->bindValue(':email', $email);
        $sql->execute();
    }
    public function deletePersona()
    {
        $db = model::db();
        $stmt = $db->prepare('DELETE FROM personas WHERE nombre = :nombre');
        $stmt->bindValue(':nombre', $_POST["nombre"]);
        $stmt->execute();
    }
    public function deleteEmpresa()
    {
        $db = model::db();
        $stmt = $db->prepare('DELETE FROM empresas WHERE nombre = :nombre');
        $stmt->bindValue(':nombre', $_POST["nombre"]);
        return $stmt->execute();
    }
    public function alterPersona()
    {
        $db = model::db();
        $nombre = $_POST["nombre"];
        if($this->find_persona($nombre)){
            header("Location:../views/home.html");
        } else {
            $sql = $db->prepare('UPDATE personas SET nombre = :nombre, apellidos = :apellidos, direccion = :direccion, telefono, = :telfono');
            $sql->bindValue(':nombre', $nombre);
            $apellidos = $_POST["apellidos"];
            $sql->bindValue(':apellidos', $apellidos);
            $direccion = $_POST["direccion"];
            $sql->bindValue(':direccion', $direccion);
            $telefono = $_POST["telefono"];
            $sql->bindValue(':telefono', $telefono);
            $sql->execute();
        }
        
    }
    public function alterEmpresa()
    {
        $db = model::db();
        $nombre = $_POST["nombre"];
        if($this->find_persona($nombre)){
            header("Location:../views/home.html");
        } else {
            $sql = $db->prepare('UPDATE personas SET nombre = :nombre, apellidos = :apellidos, direccion = :direccion, telefono, = :telfono');
            $sql->bindValue(':nombre', $nombre);
            $apellidos = $_POST["apellidos"];
            $sql->bindValue(':apellidos', $apellidos);
            $direccion = $_POST["direccion"];
            $sql->bindValue(':direccion', $direccion);
            $telefono = $_POST["telefono"];
            $sql->bindValue(':telefono', $telefono);
            $sql->execute();
        }
    }
}