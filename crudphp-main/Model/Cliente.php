<?php
include "config.php";
class Cliente
{
    private $pdo;

    public $idcliente;
    public $nombre;
    public $direccion;


    public function __construct()
    {
        try {
            $this->pdo = Conexion::Conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function MostrarCliente()
    {
        try {
            $sql = "SELECT * FROM tb_cliente order by idcliente desc";
            $result = $this->pdo->query($sql);
            return $result->fetchAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function RegistrarCliente($data)
    {
        try {
            $sql = $this->pdo->prepare("INSERT INTO tb_cliente(nombre,direccion) VALUES(?,?)");
            $sql->execute(
                array(
                    $data->nombre,
                    $data->direccion,

                )
            );

            return true;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function eliminarCliente($data)
    {
        try {
            $sql = $this->pdo->prepare("DELETE FROM tb_Cliente where idcliente = ?");
            $sql->execute(
                array(
                    $data->idcliente
                )
            );

            return true;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function EditarCliente($data)
    {
        try {
            $sql = $this->pdo->prepare("UPDATE tb_cliente SET nombre=?,direccion=? where idcliente=?");
            $sql->execute(
                array(
                    $data->nombre,
                    $data->direccion,
                    $data->idcliente
                )
            );

            return true;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}