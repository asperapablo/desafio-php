<?php
/**
 * Created by PhpStorm.
 * User: asperapablo
 * Date: 06/09/19
 * Time: 15:09
 */

require_once __DIR__ ."/../core/DB.php";

class Produto extends DB {
    function __construct()
    {
        parent::__construct();
    }

    public function getAll($tipo_produto_id = null)
    {
        $sql = "SELECT ";
        $sql .= "produto.*, tipo_produto.nome as tipo_produto_nome, ";
        $sql .= "tipo_produto.percentual_imposto ";
        $sql .= "FROM produto ";
        $sql .= "INNER JOIN ";
        $sql .= "tipo_produto ";
        $sql .= "ON ";
        $sql .= "tipo_produto.id = produto.tipo_produto_id ";
        if(!empty($tipo_produto_id)){
            $sql .= "WHERE ";
            $sql .= "produto.tipo_produto_id = $tipo_produto_id ";
        }
        $sql .= "ORDER BY id ASC ";

        return $this->select($sql);
    }

    public function get($id)
    {
        $sql = "SELECT produto.*, tipo_produto.nome as tipo_produto_nome FROM produto ";
        $sql .= "INNER JOIN ";
        $sql .= "tipo_produto ";
        $sql .= "ON ";
        $sql .= "tipo_produto.id = produto.tipo_produto_id ";
        $sql .= "WHERE ";
        $sql .= "produto.id = $id";

        return $this->select($sql, false);
    }

    public function insert($tipo_produto_id, $nome, $valor)
    {
        $sql = "INSERT INTO produto ";
        $sql .= "(tipo_produto_id, nome, valor) ";
        $sql .= "VALUES ";
        $sql .= "($tipo_produto_id, '$nome', $valor) ";

        return $this->exec($sql);
    }

    public function update($id, $tipo_produto_id, $nome, $valor)
    {
        $sql = "UPDATE produto SET ";
        $sql .= "valor = $valor, ";
        $sql .= "tipo_produto_id = $tipo_produto_id, ";
        $sql .= "nome = '$nome' ";
        $sql .= "WHERE ";
        $sql .= "id = $id ";

        return $this->exec($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM produto WHERE id = $id";

        return $this->exec($sql);
    }
}