<?php
/**
 * Created by PhpStorm.
 * User: asperapablo
 * Date: 06/09/19
 * Time: 17:02
 */

require_once __DIR__ ."/../models/TipoProduto.php";
$tipoProduto = new TipoProduto();
require_once __DIR__ ."/../models/Produto.php";
$produto = new Produto();

$res = $produto->getAll($_GET['id']);

if(!empty($res)){
    header('Location: /tipos_produto/index.php?success=0');
}else{
    header('Location: /tipos_produto/index.php?success='. $tipoProduto->delete($_GET['id']));
}