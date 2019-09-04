<!DOCTYPE html>
<html lang="pt-br">
<?php
session_start();
include('verificalogin.php');
$cid = 'BRXX0198'; // CID da sua cidade, encontre a sua em http://hgbrasil.com/weather

$dados = json_decode(file_get_contents('http://api.hgbrasil.com/weather/?cid=' . $cid . '&format=json'), true); // Recebe os dados da API

/*
 * Obtendo os dados HG Weather utilizando a funcao hg_request()
 *
 * Consulte nossa documentacao em http://hgbrasil.com/weather
 * Contato: hugodemiglio@hgbrasil.com
 * Copyright 2015 - Hugo Demiglio - @hugodemiglio
 *
*/
//5e1d3e17 e a2ef3ab1
$chave = '5e1d3e17'; // Obtenha sua chave de API gratuitamente em http://hgbrasil.com/weather

// Resgata o IP do usuario
$ip = $_SERVER["REMOTE_ADDR"];

// !!! Descomente um dos exemplos abaixo para visualizar !!!

/* 1 - Somente por CID */
// $dados = hg_request(array(
//   'cid' => 'BRXX0198', // CID da sua cidade, encontre a sua em http://hgbrasil.com/weather
// ), $chave);

/* 2 - Por Geo IP (requer chave) */
// $dados = hg_request(array(
//   'user_ip' => $ip
// ), $chave);

/* 3 - Coordenadas GPS (requer chave) */
// $dados = hg_request(array(
//   'user_ip' => $ip,
//   'lat' => '-22.9035',
//   'lon' => '-43.2096'
// ), $chave);

/* 4 - Nome da Cidade (requer chave) 
$parametros = $_POST["city-name"];
$dados = hg_request(array(
    'city_name' => $parametros
), $chave);
*/


if (!isset($dados)) {
    echo 'Descomente um dos exemplos para visualizar.';
    die();
}

/* ================================================
 * Função para resgatar os dados da API HG Brasil
 *
 * Parametros:
 *
 * parametros: array, informe os dados que quer enviar para a API
 * chave: string, informe sua chave de acesso
 * endpoint: string, informe qual API deseja acessar, padrao weather (previsao do tempo)
 */
/*
function hg_request($parametros, $chave = null, $endpoint = 'weather')
{
    $url = 'http://api.hgbrasil.com/' . $endpoint . '/?format=json&';

    if (is_array($parametros)) {
        // Insere a chave nos parametros
        if (!empty($chave)) $parametros = array_merge($parametros, array('key' => $chave));

        // Transforma os parametros em URL
        foreach ($parametros as $key => $value) {
            if (empty($value)) continue;
            $url .= $key . '=' . urlencode($value) . '&';
        }

        // Obtem os dados da API
        $resposta = file_get_contents(substr($url, 0, -1));

        return json_decode($resposta, true);
    } else {
        return false;
    }
}*/

?>

<!DOCTYPE html>
<html>

<head>

    <title>Previsão do Tempo - HG Weather</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="_icones/favicone1.png" />
    <link rel="stylesheet" href="_css/weather.css">
    <link rel="stylesheet" href="css/bootstrap.css">

</head>

<body>
    <form id="form-logout" action="logout.php">
        <div id="menu" class="text-right">
            <p class="text-right">Bem Vindo! <?php echo $_SESSION['email']; ?></p>
            <button type="submit" class="btn btn-outline-warning" href="logout.php">Logout</button>
        </div>
    </form>
    <div id="home-form" class="container img-fluid">
        <h2>Previsão do tempo</h2>
        <div class="info-city">
            <div id="info">
                <p class="text-left"><strong><?php echo $dados['results']['city_name']; ?><br></strong></p>
                <h1><strong><?php echo $dados['results']['temp']; ?> ºC <?php echo $dados['results']['description']; ?><br></strong></h1>
                Humidade <?php echo $dados['results']['humidity']; ?><br>
                Vento <?php echo $dados['results']['wind_speedy']; ?><br>
                <div class="border-top border-warning"></div>
                <?php echo $dados['results']['date']; ?> <?php echo $dados['results']['time']; ?> (horário de Brasília)<br>
                Nascer do Sol <?php echo $dados['results']['sunrise']; ?> - Pôr do Sol <?php echo $dados['results']['sunset']; ?><br>
                <img src="imagens/<?php echo $dados['results']['img_id']; ?>.png" class="imagem-do-tempo">
            </div>
        </div>
        <form class="form-search" method="POST" action="hg-weather.php" class="visible-phone container">
            <div id="search" class="input-group input-group-sm search-box">
                <input type="input" for="city-name" name="city-name" class="search-txt" placeholder="Insira aqui nome da sua cidade" aria-describedby="button-addon2" value="">
                <button id="city-name" type="submit" class="btn btn-search btn-sm search-btn" id="basic-addon2" value=""></button>
            </div>
            <div class="bar"></div>
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