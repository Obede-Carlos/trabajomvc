<?php

require_once 'model.php';
/**
* clase contacto donde estan todos los metodos necesarios para que se realicen las opciones necesarias.
*/
class contact {

    function __construct()
    {

    }

    public static function all()
    {
        $db = model::db();
        $statement = $db->query('SELECT * FROM users');
        $users = $statement->fetchAll(PDO::FETCH_CLASS, User::class);

        return $users;
    }

    public static function find($id)
    {
        $db = model::db();
        $stmt = $db->prepare('SELECT * FROM users WHERE id=:id');
        $stmt->execute(array(':id' => $id));
        $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
        $user = $stmt->fetch(PDO::FETCH_CLASS);
        return $user;
    }

    public function insertPersona()
    {
        $db = model::db();
        $stmt = $db->prepare('INSERT INTO users(name, surname, birthdate, email) VALUES(:name, :surname, :birthdate, :email)');
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':surname', $this->surname);
        $stmt->bindValue(':birthdate', $this->birthdate);
        $stmt->bindValue(':email', $this->email);
        return $stmt->execute();
    }
    public function insertEmpresa()
    {
        $db = model::db();
        $stmt = $db->prepare('INSERT INTO users(name, surname, birthdate, email) VALUES(:name, :surname, :birthdate, :email)');
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':surname', $this->surname);
        $stmt->bindValue(':birthdate', $this->birthdate);
        $stmt->bindValue(':email', $this->email);
        return $stmt->execute();
    }
    public function deletePersona()
    {
        $db = model::db();
        $stmt = $db->prepare('DELETE FROM users WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        return $stmt->execute();
    }
    public function deleteEmpresa()
    {
        $db = model::db();
        $stmt = $db->prepare('DELETE FROM users WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        return $stmt->execute();
    }
    public function alterPersona()
    {
        $db = model::db();
        $stmt = $db->prepare('UPDATE users SET name = :name, surname = :surname, birthdate = :birthdate, email = :email WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':surname', $this->surname);
        $stmt->bindValue(':birthdate', $this->birthdate);
        $stmt->bindValue(':email', $this->email);
        return $stmt->execute();
    }
    public function alterEmpresa()
    {
        $db = model::db();
        $stmt = $db->prepare('UPDATE users SET name = :name, surname = :surname, birthdate = :birthdate, email = :email WHERE id = :id');
        $stmt->bindValue(':id', $this->id);
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':surname', $this->surname);
        $stmt->bindValue(':birthdate', $this->birthdate);
        $stmt->bindValue(':email', $this->email);
        return $stmt->execute();
    }
}