<?php
function conectarDB() : mysqli {
    $db = new mysqli(
        $_ENV['DB_HOST'], 
        $_ENV['DB_USER'], 
        $_ENV['DB_PASS'] ?? '', 
        $_ENV['DB_BD']
    );

    if(!$db) {
        echo 'Error no se pudo conectar';
        echo 'errno de depuración: ' . $db->connect_errno;
        echo 'error de depuración: ' . $db->connect_error;
        exit;
    }
    return $db;
}