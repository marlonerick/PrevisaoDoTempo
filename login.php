<?php
session_start();
//pega a instancia da conexão.
include('conexao.php');
if (empty($_POST['email']) || empty($_POST['password'])) {
    $_SESSION['nao_preenchido'] = 'Email e/ou senha não preenchidos !';
    header('Location:index.php');
    exit();
}
$msgErro = ""; // se vazia tudo funcionando corretamente;

//proteção inject
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['password']);

//Verifica se foi passado usuario e senha.
if (!empty($email) && !empty($senha)) {
    if ($msgErro == "") {
        //query para verificar usuario e senha no banco de dados
        $query = "SELECT email,senha from cadastro where email='{$email}' and senha = md5('{$senha}')";
        $result = mysqli_query($conexao, $query);
        $row = mysqli_num_rows($result);
        if ($row == 1) {
            $_SESSION['email'] = $email;
            header('Location:home.php');
        } else {
            $_SESSION['nao_autenticado'] = 'Email e/ou senha invalidos !';
            header('Location:index.php');
        }
    } else {
        $_SESSION['msgErro'] = $msgErro;
        header('Location:index.php');
    }
} else {
    $_SESSION['nao_preenchido'] = 'Email e/ou senha não preenchidos !';
    ?>
<?php
}
