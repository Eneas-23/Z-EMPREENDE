<?php
// Ficheiro: index.php

// 1. Incluir ficheiros essenciais
// CORRIGIDO: __DIR__ garante que config.php é procurado na pasta Z-EMPREENDE (pasta atual).
require_once __DIR__ . '/config.php';
require_once 'includes/db_connect.php';

// A sessão deve ser iniciada antes do header
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// 2. Definir o título da página
$page_title = "Início";

// 3. Incluir o cabeçalho (começa o HTML e o menu)
// OBSERVAÇÃO: O CSS de variáveis (:root) e estilos globais (body, container) deve estar incluído em 'includes/header.php'
require_once 'includes/header.php';
?>

<section class="hero" style="
    background-color: var(--primary-color); 
    min-height: 100vh; 
    display: flex; 
    align-items: center; 
    justify-content: center; 
    text-align: center; 
    color: var(--white);
    padding: calc(var(--header-height, 80px) + 2rem) 2rem 4rem; /* Ajuste para o header fixo */
    position: relative; 
    overflow: hidden;
"> 
    <div class="container" style="
        max-width: 900px; 
        padding-top: 50px; 
        margin: 0 auto;
    ">
        <h1 style="
            font-size: clamp(3rem, 6vw, 5rem); 
            font-weight: 800; 
            margin-bottom: 1.5rem; 
            line-height: 1.1; 
            color: var(--white);
        ">Compre e Venda dentro do ISUTC!</h1>
        
        <p style="
            font-size: clamp(1.25rem, 3vw, 1.75rem); 
            margin-bottom: 3rem; 
            opacity: 0.9; 
            font-weight: 400; 
            max-width: 600px; 
            margin-left: auto; 
            margin-right: auto;
        ">Tudo o que precisa, de alimentos a materiais de estudo, vendido pelos seus colegas.</p>
        
        <div class="hero-buttons" style="
            display: block; /* MANTIDO COMO 'block' para o botão QUERO VENDER */
            margin-top: 30px; 
            gap: 1.5rem;
            justify-content: center;
        ">
            <a href="<?php echo SITE_URL; ?>/register.php" class="btn-primary" style="
                padding: 1.25rem 2.5rem;
                border-radius: var(--radius, 16px);
                text-decoration: none;
                font-weight: 700;
                text-align: center;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                transition: var(--transition, all 0.3s cubic-bezier(0.4, 0, 0.2, 1));
                border: none;
                cursor: pointer;
                font-size: 1.1rem;
                min-width: 160px;
                gap: 0.75rem;
                background: var(--primary-color); /* AZUL */
                color: var(--white);
                box-shadow: var(--shadow-lg, 0 20px 25px -5px rgba(0, 0, 0, 0.1));
            ">
                <i class="fas fa-plus-circle"></i> Quero Vender (Registe-se como Estudante)
            </a>
            </div>
    </div>
</section>

<section class="featured-products" style="
    margin-top: 40px; 
    padding: 0 20px 60px;
    max-width: 1200px; /* Limitar largura do conteúdo principal */
    margin-left: auto;
    margin-right: auto;
">
    
    <h2 style="
        font-size: 2rem; 
        font-weight: 700; 
        color: var(--text-color, #1f2937); 
        margin-bottom: 20px;
        padding-left: 20px; /* Alinhar com o conteúdo da grid */
    ">Produtos em Destaque</h2>
    
    <?php
    // Exemplo de como buscar 4 produtos
    try {
        // Assume que 'ativo' é o status de produtos aprovados
        $stmt = $pdo->query("SELECT p.id, p.nome, p.preco, u.nome_completo as vendedor FROM produtos p JOIN utilizadores u ON p.id_vendedor = u.id WHERE p.status_publicacao = 'ativo' LIMIT 4");
        
        if ($stmt->rowCount() > 0) {
            // Layout de grid flexível para cartões de produto
            echo '<div class="products-grid" style="
                display: grid; 
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); 
                gap: 20px;
                padding: 0 20px; /* Adicionar padding para não colar nas laterais */
            ">';
            
            while ($produto = $stmt->fetch()) {
                // Card de Produto estilizado com variáveis CSS para cores e sombras
                echo '<a href="' . SITE_URL . '/produto.php?id=' . $produto['id'] . '" class="product-card" style="
                    border: 1px solid var(--border-color, #e5e7eb); 
                    padding: 15px; 
                    border-radius: var(--radius-sm, 8px); 
                    transition: var(--transition, all 0.3s cubic-bezier(0.4, 0, 0.2, 1)); 
                    text-decoration: none; 
                    color: inherit; 
                    background: var(--white, #ffffff); 
                    box-shadow: var(--shadow-sm, 0 1px 2px 0 rgba(0, 0, 0, 0.05));
                    display: block; /* Garante que o link ocupe todo o espaço do cartão */
                ">';
                
                // Título em AZUL
                echo '<h4 style="
                    color: var(--primary-color, #3f83f8); 
                    margin-top: 0; 
                    margin-bottom: 10px;
                ">' . htmlspecialchars($produto['nome']) . '</h4>'; 
                
                echo '<p style="font-size: 1.1em;">Preço: <strong>MZN ' . number_format($produto['preco'], 2, ',', '.') . '</strong></p>';
                
                // Nome do vendedor com cor mais clara
                echo '<p style="
                    font-size: 0.9em; 
                    color: var(--text-light, #6b7280); 
                    margin-top: 5px;
                ">Vendido por: ' . htmlspecialchars(explode(' ', $produto['vendedor'])[0]) . '</p>';
                
                echo '</a>';
            }
            echo '</div>';
        } else {
            // Mensagem de não há produtos
            echo '<div style="
                background: var(--light-gray, #f1f5f9); 
                padding: 20px; 
                border-radius: var(--radius-sm, 8px); 
                text-align: center;
                max-width: 900px;
                margin: 0 auto;
                margin-top: 20px;
            ">';
            // Cor de texto escuro AZUL
            echo '<p style="
                color: var(--primary-dark, #1a56db); 
                font-weight: 600;
            ">Ainda não há produtos ativos. Seja o primeiro a vender! 🚀</p>'; 
            echo '</div>';
        }
    } catch (PDOException $e) {
        // Exceção para o caso de a tabela ainda não existir (erro de configuração inicial)
        echo '<div style="
            background: #fee2e2; 
            padding: 20px; 
            border-radius: var(--radius-sm, 8px); 
            border: 1px solid #fca5a5;
            max-width: 900px;
            margin: 0 auto;
            margin-top: 20px;
        ">';
        echo '<p style="
            color: #dc2626; 
            font-weight: 600;
        ">Não foi possível carregar os produtos. Certifique-se de que a tabela `utilizadores` e `produtos` foram criadas corretamente. ⚠️</p>';
        echo '</div>';
    }
    ?>
</section>

<?php
// 4. Incluir o rodapé (fecha o HTML e os scripts)
require_once 'includes/footer.php';
?>