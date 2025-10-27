<?php
// includes/header.php
declare(strict_types=1);

// CORREÇÃO: Iniciar a sessão apenas se ainda não estiver ativa.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ==========================
// Verificar autenticação
$user = null;
if (file_exists(__DIR__ . '/auth.php')) {
    require_once __DIR__ . '/auth.php';
    // Supondo que Auth::user() retorna ['full_name' => 'Nome', 'role' => 'estudante'/'admin'] ou null
    $user = Auth::user();
}

// ==========================
// Variáveis do header
$page_title       = "Z-EMPREENDE - Inovação e Propósito"; // Título ATUALIZADO
$page_description = "Plataforma de Empreendedorismo e Inovação da Geração Z."; // Descrição ATUALIZADA

// Construir URLs absolutas (https recomendado)
$scheme    = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host      = $_SERVER['HTTP_HOST'] ?? 'example.com';
$base_path = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? '/'), '/\\');
$base_url  = $scheme . '://' . $host . ($base_path ? $base_path : '');

// URL canónico da página
$page_url  = $scheme . '://' . $host . ($_SERVER['REQUEST_URI'] ?? '/');

// **Imagem para partilha**
$share_image = $base_url . "/assets/images/logo-z-empreende.jpg"; // Nome do logo ATUALIZADO

// Opcional: bust de cache quando alterar a imagem
$share_image_ver = $share_image . "?v=1";

// ==========================
// Cores Personalizadas (Azul Claro e Branco)
// Adaptado das suas preferências: azul claro e branco.
// Definir um azul claro como Primary Color
$primary_color_inline = '#60a5fa'; // Azul Claro (Blue-400) - Cor do Utilizador
$white_color_inline   = '#ffffff';
$text_color_inline    = '#1f2937';
$border_color_inline  = '#e5e7eb';
$header_height_var    = '80px';
$transition_var       = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
$shadow_var           = '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)';
$radius_sm_var        = '8px';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <style>
        /* Manter o CSS Original/Estrutural */
        :root {
            --primary-color: #1a56db; /* Cor de fallback/original */
            --white: #ffffff;
            --text-color: #1f2937;
            --border-color: #e5e7eb;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --radius-sm: 8px;
            --header-height: 80px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        /* ... (O restante do CSS estrutural/responsivo deve ser mantido aqui) ... */

        /* Apenas um subconjunto de regras que o inline CSS não consegue cobrir de forma eficiente: */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; scroll-padding-top: var(--header-height); }
        body { font-family: 'Inter', sans-serif; background: #f8fafc; color: var(--text-color); line-height: 1.7; overflow-x: hidden; font-weight: 400; }
        body.no-scroll { overflow: hidden; }
        .header { box-shadow: var(--shadow); padding: 0; position: fixed; top: 0; left: 0; right: 0; z-index: 1000; height: var(--header-height); transition: var(--transition); border-bottom: 1px solid var(--border-color); }
        .header .container { display: flex; justify-content: space-between; align-items: center; height: 100%; position: relative; padding: 0 20px; max-width: 1200px; margin: 0 auto; }
        .logo { font-size: 1.3rem; font-weight: 800; text-decoration: none; display: flex; align-items: center; gap: 0.75rem; transition: var(--transition); padding: 0.5rem 0; position: relative; z-index: 1002; }
        .nav-right { display: flex; align-items: center; gap: 1rem; z-index: 1001; position: relative; }
        .hamburger-btn { display: none; flex-direction: column; cursor: pointer; padding: 0.75rem; border: none; width: 3rem; height: 3rem; justify-content: center; align-items: center; position: relative; z-index: 1001; border-radius: 12px; transition: var(--transition); }
        .hamburger-line { width: 1.25rem; height: 2px; background-color: var(--white); margin: 2px 0; transition: var(--transition); border-radius: 2px; transform-origin: center; }
        /* ... (Classes .hamburger-btn.active, .nav-links, .nav-overlay, etc.) ... */
        
        /* Regras que dependem de variáveis e que vão ser mais difíceis de substituir no PHP: */
        .logo { color: <?= $primary_color_inline ?>; }
        .logo:hover { color: #3b82f6; } /* Um tom ligeiramente mais escuro do azul claro */
        .nav-link { color: <?= $text_color_inline ?>; background: transparent; }
        .nav-link:hover, .nav-link.active { color: <?= $white_color_inline ?>; background-color: <?= $primary_color_inline ?>; }
        .hamburger-btn { background: <?= $primary_color_inline ?>; }
        .nav-link-login { color: <?= $primary_color_inline ?> !important; border: 1px solid <?= $primary_color_inline ?> !important; }
        .nav-link-login:hover { color: <?= $white_color_inline ?> !important; background: <?= $primary_color_inline ?> !important; }

        /* Manter as media queries para responsividade */
        @media (min-width: 768px) {
            .nav-links { display: flex; gap: 0.5rem; }
            .nav-link i { display: none; }
            /* ... outros estilos desktop ... */
        }
        @media (max-width: 768px) {
            .hamburger-btn { display: flex; }
            .nav-links { display: none; flex-direction: column; width: 100%; background: <?= $white_color_inline ?>; /* ... */ }
            .nav-links.active { display: flex; }
            .nav-link i { color: <?= $primary_color_inline ?>; }
            .nav-link:hover i { color: <?= $white_color_inline ?>; }
            /* ... outros estilos mobile ... */
        }

    </style>
</head>
<body style="background: <?= $white_color_inline ?>; color: <?= $text_color_inline ?>; font-family: 'Inter', sans-serif;">

    <header class="header" style="background: <?= $white_color_inline ?>;">
        <div class="container">
            <a href="<?= $base_url ?>/home.php#home" class="logo" style="color: <?= $primary_color_inline ?>;">
                <strong>Z-EMPREENDE</strong> </a>
            
            <nav class="nav" role="navigation" aria-label="Navegação principal">
                <ul class="nav-links" id="nav-links">
                    <li><a href="<?= $base_url ?>/home.php#home" class="nav-link">
                        <i class="fas fa-home"></i>Início
                    </a></li>
                    <li><a href="<?= $base_url ?>/home.php#sobre" class="nav-link">
                        <i class="fas fa-info-circle"></i>Sobre
                    </a></li>
                    <li><a href="<?= $base_url ?>/contact.php" class="nav-link">
                        <i class="fas fa-envelope"></i>Contacto
                    </a></li>
                    <li><a href="<?= $base_url ?>/projetos.php" class="nav-link">
                        <i class="fas fa-lightbulb"></i>Ideias & Projetos
                    </a></li>
                    
                    <div class="mobile-auth">
                        <?php if ($user): ?>
                            <li><a href="<?= $base_url ?>/estudante/dashboard.php" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a></li>
                            <li><a href="<?= $base_url ?>/upload.php" class="nav-link">
                                <i class="fas fa-upload"></i>Upload
                            </a></li>
                            <li><a href="<?= $base_url ?>/estudante/perfil.php" class="nav-link">
                                <i class="fas fa-user"></i>Perfil
                            </a></li>
                            <?php if ($user['role'] === 'admin'): ?>
                                <li><a href="<?= $base_url ?>/admin/dashboard.php" class="nav-link">
                                    <i class="fas fa-cog"></i>Admin
                                </a></li>
                            <?php endif; ?>
                            <li><a href="<?= $base_url ?>/logout.php" class="nav-link">
                                <i class="fas fa-sign-out-alt"></i>Logout
                            </a></li>
                        <?php else: ?>
                            <li><a href="<?= $base_url ?>/estudante/login.php" class="nav-link nav-link-login" 
                                style="color: <?= $primary_color_inline ?> !important; border: 1px solid <?= $primary_color_inline ?> !important; background: transparent !important; transition: <?= $transition_var ?>;">
                                <i class="fas fa-sign-in-alt"></i>Entrar
                            </a></li>
                            <li><a href="<?= $base_url ?>/estudante/register.php" class="nav-link nav-link-register"
                                style="color: <?= $text_color_inline ?> !important; border: 1px solid <?= $border_color_inline ?> !important; background: transparent !important; transition: <?= $transition_var ?>;">
                                <i class="fas fa-user-plus"></i>Registo
                            </a></li>
                        <?php endif; ?>
                    </div>
                </ul>
            </nav>

            <div class="nav-right">
                <div class="desktop-auth">
                    <?php if ($user): ?>
                        <div class="user-menu">
                            <span class="user-greeting">Olá, <?= htmlspecialchars($user['full_name']) ?></span>
                            <a href="#" style="color: <?= $white_color_inline ?>; background-color: <?= $primary_color_inline ?>; padding: 0.5rem 0.75rem; border-radius: 50%; display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; text-decoration: none;" aria-label="Menu do utilizador">
                                <i class="fas fa-user" style="font-size: 1.1rem; color: <?= $white_color_inline ?>;"></i>
                            </a>

                            <div class="user-dropdown" 
                                style="display: none; position: absolute; top: 100%; right: 0; background: <?= $white_color_inline ?>; border-radius: 16px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); border: 1px solid <?= $border_color_inline ?>; padding: 0.5rem; min-width: 180px; z-index: 1000; margin-top: 0.5rem;">
                                <a href="<?= $base_url ?>/estudante/dashboard.php" class="nav-link">
                                    <i class="fas fa-tachometer-alt"></i> Dashboard
                                </a>
                                <a href="<?= $base_url ?>/upload.php" class="nav-link">
                                    <i class="fas fa-upload"></i> Upload
                                </a>
                                <a href="<?= $base_url ?>/estudante/perfil.php" class="nav-link">
                                    <i class="fas fa-user"></i> Perfil
                                </a>
                                <?php if ($user['role'] === 'admin'): ?>
                                    <a href="<?= $base_url ?>/admin/dashboard.php" class="nav-link">
                                        <i class="fas fa-cog"></i> Admin
                                    </a>
                                <?php endif; ?>
                                <a href="<?= $base_url ?>/logout.php" class="nav-link">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="auth-buttons">
                            <a href="<?= $base_url ?>/estudante/login.php" class="nav-link nav-link-login" 
                                style="color: <?= $primary_color_inline ?>; border: 1px solid <?= $primary_color_inline ?>; background: transparent; transition: <?= $transition_var ?>; font-weight: 600; padding: 0.75rem 1.25rem; border-radius: <?= $radius_sm_var ?>; text-decoration: none;">
                                <i class="fas fa-sign-in-alt" style="display: none;"></i> Entrar
                            </a>
                            <a href="<?= $base_url ?>/estudante/register.php" class="nav-link nav-link-register" 
                                style="color: <?= $text_color_inline ?>; border: 1px solid <?= $border_color_inline ?>; background: transparent; transition: <?= $transition_var ?>; font-weight: 600; padding: 0.75rem 1.25rem; border-radius: <?= $radius_sm_var ?>; text-decoration: none;">
                                <i class="fas fa-user-plus" style="display: none;"></i> Registo
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <button class="hamburger-btn" id="hamburger-btn" aria-label="Menu principal" aria-expanded="false" 
                    style="background: <?= $primary_color_inline ?>;">
                    <span class="hamburger-line" style="background-color: <?= $white_color_inline ?>;"></span>
                    <span class="hamburger-line" style="background-color: <?= $white_color_inline ?>;"></span>
                    <span class="hamburger-line" style="background-color: <?= $white_color_inline ?>;"></span>
                </button>
            </div>
        </div>
    </header>

    <div class="nav-overlay" id="nav-overlay"></div>

    <main style="margin-top: <?= $header_height_var ?>; min-height: calc(100vh - <?= $header_height_var ?>);">
    
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const hamburgerBtn = document.getElementById('hamburger-btn');
        const navLinks = document.getElementById('nav-links');
        const navOverlay = document.getElementById('nav-overlay');
        const body = document.body;

        // Função para alternar o menu
        function toggleMenu() {
            const isExpanded = hamburgerBtn.getAttribute('aria-expanded') === 'true';
            navLinks.classList.toggle('active');
            navOverlay.classList.toggle('active');
            hamburgerBtn.classList.toggle('active');
            hamburgerBtn.setAttribute('aria-expanded', !isExpanded);
            body.classList.toggle('no-scroll', !isExpanded);
        }

        // Função para fechar o menu
        function closeMenu() {
            navLinks.classList.remove('active');
            navOverlay.classList.remove('active');
            hamburgerBtn.classList.remove('active');
            hamburgerBtn.setAttribute('aria-expanded', 'false');
            body.classList.remove('no-scroll');
        }

        if (hamburgerBtn && navLinks) {
            // Clique no hamburger
            hamburgerBtn.addEventListener('click', toggleMenu);

            // Clique no overlay
            navOverlay.addEventListener('click', closeMenu);

            // Fechar menu ao clicar em um link
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', function () {
                    if (window.innerWidth <= 768) {
                        // Timeout para permitir o scroll antes de fechar o menu
                        setTimeout(closeMenu, 200); 
                    }
                });
            });

            // Fechar menu ao redimensionar para desktop
            window.addEventListener('resize', function () {
                if (window.innerWidth > 768) {
                    closeMenu();
                }
            });

            // Fechar menu com tecla Escape
            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape' && navLinks.classList.contains('active')) {
                    closeMenu();
                }
            });
        }

        // Smooth scrolling para âncoras (Ajustado para usar a variável do PHP)
        const headerHeight = <?= json_encode(substr($header_height_var, 0, -2)) ?>; // Remove 'px' para cálculo
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href.startsWith('#') && href !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        if (window.innerWidth <= 768) {
                            closeMenu();
                        }
                        const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });

        // Ativar link ativo baseado na scroll position
        function updateActiveNavLink() {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.nav-link[href^="#"]');
            // Usar o mesmo valor da variável PHP
            const headerHeightCalc = <?= json_encode(substr($header_height_var, 0, -2)) ?>; 
            
            let currentActive = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop - headerHeightCalc - 50;
                const sectionBottom = sectionTop + section.offsetHeight;
                
                if (window.scrollY >= sectionTop && window.scrollY < sectionBottom) {
                    currentActive = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                const href = link.getAttribute('href');
                // Lógica de ativação com ajuste para o link 'Início'
                if (href && (href.endsWith(`#${currentActive}`) || (currentActive === 'home' && href.endsWith('#home')))) {
                    // Nota: O .classList.add('active') aqui aciona a cor definida no <style>
                    link.classList.add('active');
                }
            });
        }

        // Atualizar link ativo no scroll
        window.addEventListener('scroll', updateActiveNavLink);
        
        // Atualizar na carga inicial
        updateActiveNavLink();
    });
</script>