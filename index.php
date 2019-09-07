<?php
/**
 * Created by PhpStorm.
 * User: asperapablo
 * Date: 06/09/19
 * Time: 13:48
 */
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
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row" style="margin-top: 15px">
                <a href="/vendas.php" class="waves-effect waves-light btn">Vendas</a>
                <a href="/produtos/index.php" class="waves-effect waves-light btn">Produtos</a>
                <a href="/tipos_produto/index.php" class="waves-effect waves-light btn">Tipos produto</a>
            </div>
        </div>

        <script
                src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>