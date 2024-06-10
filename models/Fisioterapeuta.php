<?php

namespace Model;

class Fisioterapeuta extends ActiveRecord
{
    protected static $tabla = 'fisioterapeuta';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];


    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar()
    {
        if (!$this->nombre) {
            self::$errores[] = "Debes añadir un Nombre";
        }
        if (!$this->apellido) {
            self::$errores[] = "Debes añadir un Apellido";
        }
        if (!$this->telefono) {
            self::$errores[] = "Debes añadir un Teléfono";
        }
        if (!preg_match('/^\d{9}$/', $this->telefono)) {
            self::$errores[] = "Formato de teléfono Inválido";
        }

        return self::$errores;
    }
}
