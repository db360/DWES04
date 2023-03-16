<?php
require_once('/src/model/IGuardable.php');
require_once('/src/model/IListable.php');

class Producto {
    private $id = null;
    private $cod;
    private $desc;
    private $precio;
    private $stock;

    public function getId() {

    }
    public function __get($atributo) {
        return $this->atributos[$atributo];
    }
    public function __set($atributo, $valor) {
        $this->atributos[$atributo] = $valor;
    }
}


?>