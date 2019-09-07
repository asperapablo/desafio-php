<?php
/**
 * Created by PhpStorm.
 * User: asperapablo
 * Date: 06/09/19
 * Time: 15:08
 */

require_once __DIR__ ."/../models/Produto.php";
$produto = new Produto();

$objColProduto = $produto->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Sistema mercado</title>
</head>

<body>

<nav>
    <div class="nav-wrapper">
        <div class="container">
            <div class="col s12">
                <a href="/" class="breadcrumb">Início</a>
                <a href="/produtos/index.php" class="breadcrumb">Produtos</a>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row" style="margin-top: 15px;">
        <div class="col s1"><a href="/" class="btn-small">voltar</a></div>
        <div class="col s2"><a href="/produtos/add.php" class="btn-small">novo produto</a></div>
    </div>
    <div class="row" style="margin-top: 15px;">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Tipo produto</th>
                <th>Nome</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($objColProduto as $objProduto): ?>
                <tr>
                    <td><?=$objProduto['id']?></td>
                    <td><?=$objProduto['tipo_produto_nome']?></td>
                    <td><?=$objProduto['nome']?></td>
                    <td><?=$objProduto['valor']?></td>
                    <td>
                        <a href="/produtos/edit.php?id=<?=$objProduto['id']?>" class="orange lighten-1 btn-small"><i class="material-icons left">edit</i> Editar</a>
                        <a href="/produtos/remove.php?id=<?=$objProduto['id']?>" class="red lighten-1 btn-small"><i class="material-icons left">remove</i> Remover</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script
        src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    $(document).ready(function(){
        <?php if(isset($_GET['success']) && $_GET['success'] == 1): ?>
        M.toast({html: 'Produto deletado!'});
        <?php elseif(isset($_GET['success'])): ?>
        M.toast({html: 'Erro ao deletar produto!'});
        <?php endif; ?>
    });
</script>
</body>
</html>