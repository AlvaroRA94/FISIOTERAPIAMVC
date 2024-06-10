<?php

namespace Model;

class Servicio extends ActiveRecord
{
    protected static $tabla = 'servicios';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'creado', 'fisioterapeuta_id'];


    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $creado;
    public $fisioterapeuta_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->creado = date('Y/m/d');
        $this->fisioterapeuta_id = $args['fisioterapeuta_id'] ?? '';
    }

    public function validar()
    {
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un Título";
        }

        if (!$this->precio) {
            self::$errores[] = "Debes añadir un Precio";
        }

        if (strlen($this->descripcion) < 50) {
            self::$errores[] = "Debes añadir Descripción de al menos 50 caracteres";
        }

        if (!$this->fisioterapeuta_id) {
            self::$errores[] = "Debes añadir un Trabajador de la clínica";
        }

        if (!$this->imagen) {
            self::$errores[] = "Debes añadir una Imagen";
        }

        return self::$errores;
    }
}
