<!DOCTYPE html>
<html lang="pt-br">
<?php
session_start();
include('verificalogin.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="_icones/favicone1.png" />
    <link rel="stylesheet" href="_css/home.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Previsão do Tempo</title>
</head>

<body>
    <form id="form-logout" action="logout.php">
        <div id="menu" class="text-right">
            <p class="text-right">Bem Vindo! <?php echo $_SESSION['email']; ?></p>
            <button type="submit" class="btn btn-outline-warning" href="logout.php">Logout</button>
        </div>
    </form>
    <div id="home-form" class="container img-fluid">
        <h1>Previsão do tempo</h1>
        <form method="POST" action="hg-weather.php" class="visible-phone container">
            <div id="search" class="input-group input-group-sm search-box">
                <input type="input" for="city-name" name="city-name" class="search-txt" placeholder="Insira aqui nome da sua cidade" aria-describedby="button-addon2" value="">
                <button id="city-name" type="submit" class="btn btn-search btn-sm search-btn" id="basic-addon2" value=""></button>
            </div>
            <div class="hr"></div>
            <div id="formulario">
                <div class="float-left">
                    <div id="cap-form">
                        <h2>Capitais</h2>
                        <span>Min Máx</span>
                    </div>
                    <div id="cap-form">
                        <p><strong>18° 27° São Paulo</strong></p>
                        <p><strong>14° 22° Rio de Janeiro</strong></p>
                        <p><strong>21° 32° Belo Horizonte</strong></p>
                        <p><strong>24° 37° Belém</strong></p>
                        <p><strong>24° 37° Brasília</strong></p>
                    </div>
                </div>
            </div>
            <div id="formulario2">
                <div class="float-right">
                    <div id="cap-form-2">
                        <span>Min Máx</span>
                    </div>
                    <div id="cap-form">
                        <p><strong>23° 37° Salvador</strong></p>
                        <p><strong>5° 14° Curitiba</strong></p>
                        <p><strong>21° 32° Fortaleza</strong></p>
                        <p><strong>24° 37° Manaus</strong></p>
                        <p><strong>28° 40° João Pessoa</strong></p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>