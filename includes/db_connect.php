<?php
/*
 * Ficheiro: includes/db_connect.php
 * Descrição: Cria a variável de ligação $pdo para ser usada em todo o site.
 */

// 1. Incluir o ficheiro de configuração
// __DIR__ é a pasta atual (includes). '/../' sobe um nível para a raiz.
require_once __DIR__ . '/../config.php';

// 2. Definir o DSN (Data Source Name)
// Informa ao PDO qual é o tipo de BD (mysql), o host e o nome da BD.
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";

// 3. Definir Opções do PDO (Boas práticas)
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Lança exceções em caso de erro (MUITO útil)
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Retorna resultados como arrays associativos (ex: $row['nome'])
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Usa "prepared statements" reais do MySQL
];

// 4. Tentar a Ligação
try {
    
    // Esta é a linha que faz a magia: cria o objeto de ligação
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);

} catch (PDOException $e) {
    
    // Se a ligação falhar, pára o script e mostra uma mensagem de erro.
    // O $e->getMessage() mostra o erro detalhado (só em modo DEBUG).
    die("Erro fatal: Não foi possível ligar à Base de Dados. <br>" . $e->getMessage());
}

// Se o script chegou até aqui, a variável $pdo está viva e pronta a ser usada!
?>