<?php

namespace DWES;

class Caja
{
    public $alto;
    public $ancho;
    public $largo;
    public $contenido;
    public $color;

    public function __construct()
    {
        $this->alto = 0;
        $this->ancho = 0;
        $this->largo = 0;
        $this->contenido = null;
        $this->color = 'negro';
    }

    public function setAlto($alto)
    {
        $this-> alto = $alto;
    }

    public function introduce($cosa)
    {
        $this->contenido = $cosa;
    }

    public function muestraContenido()
    {
        echo $this->contenido;
    }

    public function __toString()
    {
        $retorno = "<p>Alto: {$this->alto} - Ancho: {$this->ancho}</p>";

        return $retorno;
    }
}
