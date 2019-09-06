<?php
/**
 * Created by PhpStorm.
 * User: asperapablo
 * Date: 06/09/19
 * Time: 15:08
 */

require_once __DIR__ ."/../models/TipoProduto.php";
$tipoProduto = new TipoProduto();

$objColTipoProduto = $tipoProduto->getAll();
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
                <a href="/tipos_produto/index.php" class="breadcrumb">Tipos produto</a>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row" style="margin-top: 15px;">
        <div class="col s1"><a href="/" class="btn-small">voltar</a></div>
        <div class="col s3"><a href="/tipos_produto/add.php" class="btn-small">novo tipo produto</a></div>
    </div>
    <div class="row" style="margin-top: 15px;">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Porcentagem imposto</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($objColTipoProduto as $objTipoProduto): ?>
                <tr>
                    <td><?=$objTipoProduto['id']?></td>
                    <td><?=$objTipoProduto['nome']?></td>
                    <td><?=$objTipoProduto['percentual_imposto']?>%</td>
                    <td>
                        <a href="/tipos_produto/edit.php?id=<?=$objTipoProduto['id']?>" class="orange lighten-1 btn-small"><i class="material-icons left">edit</i> Editar</a>
                        <a href="/tipos_produto/remove.php?id=<?=$objTipoProduto['id']?>" class="red lighten-1 btn-small"><i class="material-icons left">remove</i> Remover</a>
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
        M.toast({html: 'Tipo produto deletado!'});
        <?php elseif(isset($_GET['success'])): ?>
        M.toast({html: 'Erro ao deletar tipo produto!'});
        <?php endif; ?>
    });
</script>
</body>
</html>