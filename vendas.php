<?php
/**
 * Created by PhpStorm.
 * User: asperapablo
 * Date: 06/09/19
 * Time: 13:48
 */

require_once "models/Produto.php";
$produto = new Produto();

$objColProduto = $produto->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="lib/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Sistema mercado</title>
</head>

<body>

<nav>
    <div class="nav-wrapper">
        <div class="container">
            <div class="col s12">
                <a href="/" class="breadcrumb">Início</a>
                <a href="/vendas.php" class="breadcrumb">Vendas</a>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row" style="margin-top: 15px;">
        <div class="col s8">
            <div class="card">
                <div class="card-content">
                    <h3>Produtos</h3>
                    <div class="row produtos" style="margin-top: 15px;">
                        <?php foreach($objColProduto as $objProduto): ?>
                            <div class="col s3">
                                <a class="waves-effect waves-light btn btn-block btn-produto"
                                    data-nome="<?=$objProduto['nome']?>"
                                    data-valor="<?=$objProduto['valor']?>"
                                    data-percentual="<?=$objProduto['percentual_imposto']?>"
                                    data-id="<?=$objProduto['id']?>"><?=$objProduto['nome']?></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s4">
            <div class="card carrinho">
                <div class="card-content">
                    <h3>Carrinho</h3>
                    <table>
                        <thead class="header">
                            <th>Item</th>
                            <th>Quantidade</th>
                            <th>Imposto</th>
                            <th>$</th>
                        </thead>
                        <tbody id="listagem"></tbody>
                    </table>
                    <div class="line"></div>
                    <div class="total imposto">
                        <span>Total impostos</span>
                        <span class="valor"></span>
                    </div>
                    <div class="total geral">
                        <span>Total geral</span>
                        <span class="valor"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="lib/main.js"></script>
</body>
</html>