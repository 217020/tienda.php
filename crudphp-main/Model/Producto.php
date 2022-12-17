<?php
include "config.php";
class Producto
{
    private $pdo;

    public $id;
    public $nombre;
    public $descripcion;
    public $categoria;

    public function __construct()
    {
        try {
            $this->pdo = Conexion::Conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function MostrarProducto()
    {
        try {
            $sql = "SELECT * FROM tb_producto order by id desc";
            $result = $this->pdo->query($sql);
            return $result->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function RegistrarProducto($data)
    {
        try {
            $sql = $this->pdo->prepare("INSERT INTO tb_producto(nombre,descripcion,categoria) VALUES(?,?,?)");
            $sql->execute(
                array(
                    $data->nombre,
                    $data->descripcion,
                    $data->categoria
                )
            );

            return true;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminarProducto($data)
    {
        try {
            $sql = $this->pdo->prepare("DELETE FROM tb_producto where id = ?");
            $sql->execute(
                array(
                    $data->id
                )
            );

            return true;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function EditarProducto($data)
    {
        try {
            $sql = $this->pdo->prepare("UPDATE tb_producto SET nombre=?,descripcion=?,categoria=? where id=?");
            $sql->execute(
                array(
                    $data->nombre,
                    $data->descripcion,
                    $data->categoria,
                    $data->id
                )
            );

            return true;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
