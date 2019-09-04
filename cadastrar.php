<!DOCTYPE html>
<html lang="pt-br">

<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <link rel="shortcut icon" href="_icones/favicone1.png" />
       <link rel="stylesheet" href="_css/estilo.css">
       <link rel="stylesheet" href="css/bootstrap.css">
       <title>Cadastrar</title>
</head>

<body>
       <div id="corpo-form-cad" class="container img-fluid">
              <h1>Cadastrar</h1>
              <form method="POST">
                     <label>Nome Completo</label>
                     <input type="text" name="nome" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Nome Completo" maxlength="45">

                     <label>Telefone</label>
                     <input type="telefone" name="telefone" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="(00) 0000-0000" maxlength="30">

                     <label>E-Mail</label>
                     <input type="email" name="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="E-mail" maxlength="40">

                     <label>Password</label>
                     <input type="password" name="password" class="form-control " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Password" maxlength="20">

                     <label>Confirmar Senha</label>
                     <input type="password" name="confpassword" class="form-control " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" placeholder="Confirmar Senha" maxlength="20">
                     <br>
                     <button type="submit" class="btn btn-success btn-lg btn-block">Cadastrar</button>
              </form>
       </div>
       <?php
       if (isset($_POST['nome'])) {
              session_start();
              include("conexao.php");
              $msgErro = ""; // se vazia tudo funcionando corretamente;
              $nome = addslashes($_POST['nome']);
              $telefone = addslashes($_POST['telefone']);
              $email = addslashes($_POST['email']);
              $senha = addslashes($_POST['password']);
              $confpassword = addslashes($_POST['confpassword']);
              if (!empty($nome) && !empty($email) && !empty($telefone) && !empty($senha) && !empty($confpassword)) {
                     if ($msgErro == "") {
                            if ($senha == $confpassword) {
                                   if (strlen($senha) < 8) { ?>
                                          <div class="msg-erro">
                                                 Senha muito fraca! Precisa ter...<br />
                                                 Tem no mínimo de 8 caracteres<br />
                                                 Tem no mínimo 1 letras maiúsculas: ABCDEFG<br />
                                                 Tem no mínimo 1 letra minúscula: abcdefgh<br />
                                                 Tem no mínimo 1 número: 123456<br />
                                          </div>
                                          <?php
                                                                      } else {
                                                                             global $pdo;
                                                                             //Verificar se já existe o email/usuario cadastrado
                                                                             $sql = "SELECT * FROM cadastro WHERE email = '$email'";
                                                                             $query = mysqli_query($conexao, $sql);
                                                                             if (mysqli_num_rows($query) == 0) {
                                                                                    $sql = ("INSERT INTO cadastro(nome,telefone,email,senha) VALUES ('{$nome}', '{$telefone}', '{$email}', md5('{$senha}'))");
                                                                                    $resultado = mysqli_query($conexao, $sql);
                                                                                    if ($resultado) {
                                                                                           ?>
                                                        <div id="sucesso">
                                                               <a href="index.php">Cadastrado com sucesso, faça o login para acessar<a>
                                                        </div>
                                                 <?php
                                                                                           } else {
                                                                                                  $msg = 0;
                                                                                           }
                                                                                           return true; //cadastrado com sucesso;
                                                                                    } else {
                                                                                           ?>
                                                 <div class="msg-erro">
                                                        Ocorreu o seguinte erro:
                                                        Usuario ja cadastrado
                                                 </div>
                                   <?php
                                                                             return false; //ja esta cadastrado;
                                                                      }
                                                               }
                                                        } else {
                                                               ?>
                                   <div class="msg-erro">
                                          Ocorreu o seguinte erro:
                                          Senha não corresponder a confirmar senha!
                                   </div>
                            <?php
                                                 }
                                          } else {
                                                 ?>
                            <div class="msg-erro">
                                   Ocorreu o seguinte erro:
                                   <?php echo "ERRO:" . $u->$msgErro; ?>
                            </div>
                     <?php
                                   }
                            } else {
                                   ?>
                     <div class="msg-erro">
                            Ocorreu o seguinte erro:
                            Preencha todos os campos !
                     </div>
       <?php
              }
       }
       ?>
</body>

</html>