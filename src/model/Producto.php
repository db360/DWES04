<?php
namespace classes;

require_once('src/model/IGuardable.php');
require_once('src/model/IListable.php');

use interfaces\IGuardable;
use interfaces\IListable;


$pdo = connect();
/* Clase Producto */
class Producto implements IListable, IGuardable {
    /* PARÁMETROS */
    private $cod;
    private $desc;
    private $precio;
    private $stock;
    private $id;

    /* CONSTRUCTOR */
    public function __construct($cod, $desc, $precio, $stock, $id = null, ) {
        $this->cod = $cod;
        $this->desc = $desc;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }
    public function getPrecio() {
        return $this->precio;
    }
    public function getDesc() {
        return $this->desc;
    }
    public function getCod() {
        return $this->cod;
    }
    public function getStock () {
        return $this->stock;
    }
    public function setPrecio($precio) {
        if(is_numeric($precio) && $precio > 0) {
            $this->precio = $precio;
            $retorno = true;
        } else {
            $retorno = false;
        };
        return $retorno;
    }

    public function setStock($stock) {
        if(is_numeric($stock) && $stock > 0) {
        $this-> stock = $stock;
        $retorno = true;
        } else {
        $retorno = false;
        }
        return $retorno;
    }
    public function setCod($cod) {
        if (preg_match('/^[a-zA-Z0-9]+$/', $cod)) {
            $this->cod = $cod;
            $retorno = true;
        } else {
            $retorno = true;
        }
        return $retorno;
    }
    public function setDesc($desc) {
        if(strlen($desc) > 1) {
            $this->desc = $desc;
            $retorno = true;
        } else {
            $retorno = false;
        }
        return $retorno;
    }
    /* Método guardar. Guarda, si el id existe en la base de datos o modifica el
     contenido en la base de datos asociado a éste producto */
    public function guardar($pdo) {
        try {
            $sql = "SELECT id FROM productos WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$this->id]);
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($row) {
                $sql = "UPDATE productos SET cod = ?, `desc` = ?, precio = ?, stock = ? WHERE id = ?";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$this->cod, $this->desc, $this->precio, $this->stock, $this->id]);
            } else {
                $sql = "INSERT INTO productos (cod, `desc`, precio, stock) VALUES (?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$this->cod, $this->desc, $this->precio, $this->stock]);
                $this->id = $pdo->lastInsertId();
            }

            return $stmt->rowCount();

        } catch (\PDOException $e) {
            echo $e;
            return false;
        }
    }
    // Código para rescatar un objeto por su ID desde la base de datos
    public static function rescatar($pdo, $id) {
        $stmt = null;
        try {
            $stmt = $pdo->prepare("SELECT * FROM productos WHERE id = ?");
            $stmt->execute([$id]);
            $producto = $stmt->fetch();
            if($producto) {
                return new Producto( $producto['cod'], $producto['desc'], floatval($producto['precio']), intval($producto['stock']) , intval($producto['id']),);
            } else {
                return null;
            }

        } catch (\PDOException $e) {
            return false;
        }


    }


    // Código para borrar un objeto por su ID desde la base de datos
    public static function borrar($pdo, $id) {
        try {
            $stmt = $pdo->prepare("DELETE FROM productos WHERE id=?");
            $stmt->execute([$id]);
            return $stmt->rowCount();

        } catch (\PDOException $e) {
            return false;
        }
    }

    // Código para listar objetos desde la base de datos con límite y offset
    public static function listar($pdo, $lim, $offset) {

        try {

            $stmt = $pdo->prepare("SELECT id FROM productos LIMIT ? OFFSET ?");
            $stmt->bindValue(1, $lim, \PDO::PARAM_INT);
            $stmt->bindValue(2, $offset, \PDO::PARAM_INT);
            $stmt->execute();
            $productos = $stmt->fetchAll(\PDO::FETCH_COLUMN);
            $listaProductos = array();
            foreach ($productos as $producto) {
                $listaProductos[] = Producto::rescatar($pdo, $producto);
            }
            return $listaProductos;

        } catch (\PDOException $e) {
            // echo $e;
            return false;
        }

    }

    // Código para contar la cantidad total de objetos en la base de datos
    public static function contar($pdo) {
        try {
            $stmt = $pdo->query("SELECT count(id) from productos");
            return  $stmt->fetchColumn();
        } catch (\PDOException $e){
            return $e;
        }
    }

}






?>



