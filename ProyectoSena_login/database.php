<?php
    $server= 'localhost';
    $username= 'root';
    $password= 'Administrador1#';
    $database= 'proyectosena_login_database';

    try {
        $conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
       
    } catch(PDOException) {
        die('Connected failed: '.$e->getMessage());
    }

?>