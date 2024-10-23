<?php

namespace DWES;

class Rectangulo {
    public $base;
    public $altura;

    public function __construct()
    {
        $this->base = 0;
        $this->altura = 0;
    }

    public function getBase() {
        return $this->base;
    }

    public function setBase($base) {
        $this->base = $base;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function setAltura($altura) {
        $this->altura = $altura;
    }

    public function calcularArea() {
        return $this->base * $this->altura;
    }
}