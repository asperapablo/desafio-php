<?php
/**
 * Created by PhpStorm.
 * User: asperapablo
 * Date: 06/09/19
 * Time: 15:08
 */

require_once __DIR__ ."/../models/TipoProduto.php";
$tipoProduto = new TipoProduto();

if(!empty($_POST)){
    $res = $tipoProduto->insert($_POST['nome'], $_REQUEST['percentual_imposto']);
}
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
                <a href="/tipos_produto/index.php" class="breadcrumb">Tipos produtos</a>
                <a href="/tipos_produto/add.php" class="breadcrumb">Adicionar</a>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row" style="margin-top: 15px;">
        <div class="col s1"><a href="/tipos_produto/index.php" class="btn-small">voltar</a></div>
    </div>
    <div class="row" style="margin-top: 15px;">
        <form method="post" class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" class="validate" id="nome" name="nome" required>
                    <label for="nome">Nome tipo produto</label>
                </div>
                <div class="input-field col s6">
                    <input type="number" max="100" class="validate" id="percentual_imposto" name="percentual_imposto" required>
                    <label for="percentual_imposto">Percentual imposto</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <button class="btn-small waves-effect waves-light" type="submit" name="action">Salvar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    $(document).ready(function(){
        $('select').formSelect();

        <?php if(isset($res) && $res == true): ?>
        M.toast({html: 'Tipo produto salvo!'});
        <?php elseif(isset($res)): ?>
        M.toast({html: 'Erro ao salvar tipo produto!'});
        <?php endif; ?>
    });
</script>
</body>
</html>