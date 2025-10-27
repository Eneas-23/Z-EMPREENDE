<?php
// Ficheiro: config.php

// ==========================================
// 1. CONFIGURAÇÃO DA BASE DE DADOS
// Estas constantes DEVEM ser definidas aqui, no topo.

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', ''); 
define('DB_NAME', 'z_empreende_db');
define('CHARSET', 'utf8mb4'); // Linha 9 será esta ou a próxima

// ==========================================
// 2. CONFIGURAÇÃO DO SITE
define('SITE_URL', 'http://localhost/Z-EMPREENDE'); 
define('SITE_NAME', 'Z-EMPREENDE ISUTC');

// ==========================================
// 3. INCLUSÕES
// NOTA: Não inclua db_connect.php aqui, pois o index.php já o faz.
?>