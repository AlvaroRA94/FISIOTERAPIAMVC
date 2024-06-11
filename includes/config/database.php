<?php

function conectarDB() : mysqli {
    // CONEXIÓN LOCALHOST //
    // $db = new mysqli('localhost', 'root', '1234', 'fisioterapia_crud');

    // CONEXIÓN HOSTING //
    $db = new mysqli('q19.h.filess.io:3307', 'fisioterapia_gasolineno', '481eabce32742d68071ba517af7bd7a1eca1f9c0', 'fisioterapia_gasolineno');

    if(!$db) {
        echo "Error, no se pudo realizar la conexión";
        exit;
    }
    
    return $db;
}