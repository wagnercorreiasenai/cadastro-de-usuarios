<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cadastro de usuários</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="lib/bootstrap-5.0.0-dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <meta name="theme-color" content="#7952b3">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="lib/carousel/carousel.css" rel="stylesheet">
</head>
<body>

<?php require 'include/menu.php'; ?>

<main>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing p-3">

        <div class="row">
            <div class="col-md-12 col-12">
                <h3>Usuários cadastrados</h3>
            </div>
        </div>

        <div class="row p-3">

            <div class="col-md-12 col-12">

                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Nome</td>
                            <td>E-mail</td>
                            <td>Login</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                    require './Classes/Usuario.php';

                    use Classes\Usuario;

                    $usuario = new Usuario();

                    $listaDeUsuario = [];

                    if (isset($_GET ['procurar'])) {
                        $listaDeUsuario = $usuario->pesquisar($_GET ['procurar']);
                    } else {
                        $listaDeUsuario = $usuario->listar();
                    }


                    foreach ($listaDeUsuario as $u) {
                        ?>
                        <tr>
                            <td><?php echo $u ['id']; ?></td>
                            <td><?php echo $u ['nome']; ?></td>
                            <td><?php echo $u ['email']; ?></td>
                            <td><?php echo $u ['login']; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>

        </div>

    </div><!-- /.container -->

    <?php require 'include/rodape.php'; ?>

</main>

<script src="lib/jquery/jquery-3.6.0.min.js" type="text/javascript"></script>
<script src="lib/bootstrap-5.0.0-dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>


</body>
</html>
