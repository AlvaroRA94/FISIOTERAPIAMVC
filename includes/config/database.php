<?php

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', '1234', 'fisioterapia_crud');

    if(!$db) {
        echo "Error, no se pudo realizar la conexión";
        exit;
    }
    
    return $db;
}