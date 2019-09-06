<?php
/**
 * Created by PhpStorm.
 * User: asperapablo
 * Date: 06/09/19
 * Time: 17:02
 */

require_once __DIR__ ."/../models/Produto.php";
$produto = new Produto();

header('Location: /produtos/index.php?success='. $produto->delete($_GET['id']));