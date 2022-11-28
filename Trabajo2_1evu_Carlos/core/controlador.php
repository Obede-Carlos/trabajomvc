<?php
require_once "models/model.php";

class controlador{

    public function run()
    {
      if (isset($_GET['method'])) {
        $method = $_GET['method'];
      } else {
        $method = 'index';
      }
      $this->$method();
    }

    public function auth()
    {//metodo de validar la contraseña
        $db = model::db();
        $sql = $db->prepare("SELECT password FROM credenciales WHERE usuario = :usu");
        $sql->execute(array(":usu" => $_SESSION["usuario"]));
        $sql->setFetchMode(PDO::FETCH_CLASS, controlador::class);
        $hash = $sql->fetch(PDO::FETCH_CLASS);
        $password = $_SESSION["password"];
        if (password_verify($password, $hash)) {
            $this->cargar_xml();
            header("Location:home.php");
        }
    }

    public function cargar_xml()
    {
        $datos = simplexml_load_file("agenda.xml");
        $nombrep = $datos->xpath("//contacto[@tipo='persona']/nombre");
        $apellidos = $datos->xpath("//contacto[@tipo='persona']/apellidos");
        $direccionp = $datos->xpath("//contacto[@tipo='persona']/direccion");
        $telefonop = $datos->xpath("//contacto[@tipo='persona']/telefono");
        $db = model::db();
        $sql = $db->prepare('INSERT INTO personas (nombre, apellidos, direccion, telefono) VALUES (:nombre, :apellidos, :direccion, :telefono)');
        $sql->bindValue(':nombre', $nombrep);
        $sql->bindValue(':apellidos', $apellidos);
        $sql->bindValue(':direccion', $direccionp);
        $sql->bindValue(':telefono', $telefonop);
        $nombree = $datos->xpath("//contacto[@tipo='empresa']/nombre");
        $direccione = $datos->xpath("//contacto[@tipo='empresa']/direccion");
        $telefonoe = $datos->xpath("//contacto[@tipo='empresa']/telefono");
        $email = $datos->xpath("//contacto[@tipo='empresa']/email");
        $db = model::db();
        $sql = $db->prepare('INSERT INTO empresas (nombre, direccion, telefono, email) VALUES (:nombre, :direccion, :telefono, :email)');
        $sql->bindValue(':nombre', $nombree);
        $sql->bindValue(':direccion', $direccione);
        $sql->bindValue(':telefono', $telefonoe);
        $sql->bindValue(":email", $email);
    }
}