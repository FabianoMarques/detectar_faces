<?php
$url = "detectarfaces-production.up.railway.app"; // Substitua pela URL real


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Desative se houver problemas com SSL
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Permite seguir redirecionamentos

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($http_code == 200) {
    echo "Resposta recebida: " . $response;
} else {
    echo "Falha ao acessar a URL. Código HTTP: " . $http_code;
}
?>
