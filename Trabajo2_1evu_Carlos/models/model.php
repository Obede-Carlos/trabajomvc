<?php

const DSN = 'mysql:dbname=mvc;host=db';
const USER = 'root';
const PASSWORD = 'password';

class model{
    public static function db() {
        try {
            $db = new PDO(DSN, USER, PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
        return $db;
    }
}