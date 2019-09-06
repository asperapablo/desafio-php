<?php
/**
 * Created by PhpStorm.
 * User: asperapablo
 * Date: 06/09/19
 * Time: 13:48
 */

require_once __DIR__ ."/../core/DB.php";

class TipoProduto extends DB {
    function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM tipo_produto ";
        $sql .= "ORDER BY id ASC ";

        return $this->select($sql);
    }

    public function get($id)
    {
        $sql = "SELECT * FROM tipo_produto WHERE id = $id";

        return $this->select($sql, false);
    }

    public function insert($nome, $percentual_imposto)
    {
        $sql = "INSERT INTO tipo_produto ";
        $sql .= "(nome, percentual_imposto) ";
        $sql .= "VALUES ";
        $sql .= "('$nome', $percentual_imposto) ";

        return $this->exec($sql);
    }

    public function update($id, $nome, $percentual_imposto)
    {
        $sql = "UPDATE tipo_produto SET ";
        $sql .= "nome = '$nome', ";
        $sql .= "percentual_imposto = $percentual_imposto ";
        $sql .= "WHERE ";
        $sql .= "id = $id ";

        return $this->exec($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM tipo_produto WHERE id = $id";

        return $this->exec($sql);
    }
}