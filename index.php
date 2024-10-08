<?php
// Função para capturar o IP público do visitante
function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        // IP proveniente de proxy
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // IP proveniente de múltiplos proxies
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        // IP direto do cliente
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// Captura o IP do visitante
$user_ip = getUserIP();

// Formata a linha de log com data e IP
$log_line = date("Y-m-d H:i:s") . " - IP: " . $user_ip . "\n";

// Grava o IP no arquivo de log
file_put_contents('log.txt', $log_line, FILE_APPEND);

// Exibe uma página simples
echo "<h1>Funciona porra</h1>";
echo "<p></p>";
?>
