<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="_icones/favicone1.png" />
    <link rel="stylesheet" href="_css/estilo.css">
    <link rel="stylesheet" href="css/bootstrap.css">

    <title>Projeto Login</title>
</head>

<body class="container">
    <div id="corpo-form" class="container img-fluid">
        <h1>Entrar</h1>
        <form action="login.php" method="POST" class="visible-phone container" class="row col-lg-2">
            <label>Usuário/E-Mail</label>
            <input type="email" name="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="E-mail">

            <label>Password</label>
            <input type="password" name="password" class="form-control " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Password">
            <br>
            <button type="submit" class="btn btn-success btn-lg btn-block">Login</button>
            <a href="cadastrar.php"> Não é cadastrado em nosso site ? <strong>Cadastre-se</strong></a>
        </form>
        <div class="msg-erro-two ">
            <?php
            //Recuperando o valor da variável global, os erro de login.
            if (isset($_SESSION['nao_autenticado'])) {
                echo $_SESSION['nao_autenticado'];
                unset($_SESSION['nao_autenticado']);
            } else if (isset($_SESSION['nao_preenchido'])) {
                echo $_SESSION['nao_preenchido'];
                unset($_SESSION['nao_preenchido']);
            } else if (isset($_SESSION['msgErro'])) {
                echo $_SESSION['msgErro'];
                unset($_SESSION['msgErro']);
            } else if (isset($_SESSION['msgErro'])) {
                echo $_SESSION['msgErro'];
                unset($_SESSION['msgErro']);
            }
            ?>
        </div>
</body>

</html>