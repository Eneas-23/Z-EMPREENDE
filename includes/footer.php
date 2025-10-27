<!-- ========================================================== -->
<!-- SECÇÃO 6: FOOTER / CONTACTO -->
<!-- ========================================================== -->
<footer class="footer">
  <div class="footer-accent"></div>

  <div class="footer-main container">
    <!-- Coluna 1: Informações -->
    <div class="footer-col">
      <h4>AEISUTC 2026</h4>
      <p class="footer-slogan"><i>Unidos pela igualdade, movidos pela inclusão</i></p>

      <ul class="footer-list">
        <li><span class="label">Local:</span> Campus do ISUTC, Maputo</li>
        <li><span class="label">Email:</span> <a href="mailto:tranformacaoesucessoacademico@gmail.com">tranformacaoesucessoacademico@gmail.com</a></li>
      </ul>
    </div>

    <!-- Coluna 2: Redes sociais -->
    <div class="footer-col footer-col--center">
      <h3>Siga-nos</h3>
      <div class="social-icons">
        <!--<a href="#" aria-label="Facebook" class="social-link"><i class="fab fa-facebook-f"></i></a> -->
        <a href="https://www.instagram.com/listaz_aeisutc/?utm_source=ig_web_button_share_sheet" aria-label="Instagram" class="social-link"><i class="fab fa-instagram"></i></a>
        <a href="https://www.tiktok.com/@listaz_aeisutc?_t=ZM-90iGCQtJDcC&_r=1" aria-label="TikTok" class="social-link"><i class="fab fa-tiktok"></i></a>
        <a href="https://x.com/listaz25?t=ZR0INX-Z48cJE-gWO6x4tQ&s=08" aria-label="Twitter" class="social-link"><i class="fab fa-twitter"></i></a>
        <!--<a href="#" aria-label="LinkedIn" class="social-link"><i class="fab fa-linkedin"></i></a> -->
      </div>
    </div>


    <!-- Coluna 3: Links Rápidos -->
    <div class="footer-col footer-col--links">
      <h3>Links Rápidos</h3>
      <nav class="footer-links" aria-label="Links rápidos">
        <a href="#home">Início</a>
        <a href="#propostas">Propostas</a>
        <a href="#mensagens">Mensagens</a>
        <a href="#equipa">Equipa</a>
        <a href="#contacto">Contacto</a>
      </nav>
    </div>
  </div>

  <!-- Seção Legal -->
  <div class="footer-legal container">
    <p class="legal-links">
        <a href="politica-privacidade.php">Política de Privacidade</a>
        <span class="dot">•</span>
        <a href="termos-uso.php">Termos de Utilização</a>
        <span class="dot">•</span>
        <a href="transparencia.php">Transparência</a>
    </p>


    <p class="legal-text">&copy; 2025 LISTA Z AEISUTC - Associação de Estudantes do ISUTC. Todos os direitos reservados.</p>
    <p class="legal-text">Juntos construímos o futuro da nossa instituição.</p>

    <div class="footer-credit-separator"></div>

    <p class="en-interactive-credit">
      Powered by
      <a href="https://main.eninteractiveentertainment.space/" target="_blank" rel="noopener noreferrer" class="credit-link">
        <strong>EN Interactive Entertainment, SU, LDA</strong>
      </a>
    </p>
  </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>

<style>
  /* ================================ Footer Styles (clean & balanced) ================================ */
  :root {
    --footer-bg: #0f3a8a;
    --footer-accent: #3b82f6;
    --footer-text: #e6eefc;
    --footer-muted: #c9d6f5;
    --footer-white: #ffffff;
    --footer-line: rgba(255, 255, 255, 0.18);
  }

  .footer {
    background-color: var(--footer-bg);
    color: var(--footer-text);
    margin-top: 48px;
    position: relative;
    isolation: isolate;
  }

  .footer-accent {
    height: 4px;
    background: var(--footer-accent);
    width: 100%;
  }

  .footer-main {
    display: grid;
    grid-template-columns: 1.2fr 1fr 1fr;
    gap: 2rem;
    padding: 2.5rem 0 1.5rem;
    align-items: start;
  }

  .footer-col h4,
  .footer-col h3 {
    color: var(--footer-white);
    margin: 0 0 0.75rem 0;
    font-weight: 800;
    letter-spacing: 0.2px;
  }

  .footer-slogan {
    margin: 0 0 1rem 0;
    color: var(--footer-muted);
  }

  .footer-list {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .footer-list li {
    margin: 0.4rem 0;
  }

  .footer-list .label {
    color: var(--footer-white);
    font-weight: 700;
    margin-right: 0.35rem;
  }

  .footer a {
    color: var(--footer-text);
    text-decoration: none;
    transition: color 0.2s ease, opacity 0.2s ease, transform 0.2s ease;
  }

  .footer a:hover {
    color: var(--footer-white);
  }

  /* Social Icons */
  .social-icons {
    display: flex;
    gap: 0.75rem;
    margin-top: 0.5rem;
  }

  .social-link {
    width: 40px;
    height: 40px;
    border-radius: 999px;
    border: 1px solid var(--footer-line);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: transparent;
    color: var(--footer-text);
    backdrop-filter: saturate(120%);
  }

  .social-link i {
    font-size: 0.95rem;
  }

  .social-link:hover {
    background: var(--footer-white);
    color: var(--footer-bg);
    transform: translateY(-2px);
  }

  /* Links rápidos */
  .footer-col--links .footer-links {
    display: grid;
    gap: 0.4rem;
  }

  .footer-col--links .footer-links a {
    padding: 0.2rem 0;
    border-bottom: 1px solid transparent;
  }

  .footer-col--links .footer-links a:hover {
    border-bottom-color: var(--footer-line);
  }

  /* separadores verticais no desktop */
  .footer-main > .footer-col + .footer-col {
    position: relative;
  }

  .footer-main > .footer-col + .footer-col::before {
    content: "";
    position: absolute;
    left: -1rem;
    top: 0.25rem;
    bottom: 0.25rem;
    width: 1px;
    background: var(--footer-line);
  }

  /* Legal */
  .footer-legal {
    border-top: 1px solid var(--footer-line);
    text-align: center;
    padding: 1.25rem 0 1.2rem; /* ↓ menos espaço inferior */
  }

  .legal-links {
    display: inline-flex;
    align-items: center;
    gap: 0.6rem;
    margin: 0 0 0.5rem 0;
    color: var(--footer-text);
  }

  .legal-links .dot {
    opacity: 0.6;
  }

  .legal-text {
    margin: 0.2rem 0;
    font-size: 0.92rem;
    color: var(--footer-muted);
  }

  /* Separador antes do crédito */
  .footer-credit-separator {
    margin: 1rem auto 0.6rem; /* ↓ espaço mais curto */
    width: 120px;
    height: 1px;
    background: var(--footer-line);
  }

  /* Créditos */
  .en-interactive-credit {
    margin-top: 0.5rem; /* ↓ menos espaço inferior total */
    font-size: 0.9rem;
    color: var(--footer-muted);
  }

  .en-interactive-credit .credit-link strong {
    color: var(--footer-white);
    text-decoration: underline;
    font-weight: 700;
    transition: color 0.3s ease;
  }

  .en-interactive-credit .credit-link strong:hover {
    color: var(--footer-accent);
  }

  /* Responsividade */
  @media (max-width: 992px) {
    .footer-main {
      grid-template-columns: 1fr 1fr;
    }

    .footer-main > .footer-col + .footer-col::before {
      display: none;
    }
  }

  @media (max-width: 680px) {
    .footer-main {
      grid-template-columns: 1fr;
      gap: 1.5rem;
      text-align: center;
    }

    .footer-col--center .social-icons {
      justify-content: center;
    }

    .footer-col--links .footer-links {
      justify-items: center;
    }

    .legal-links {
      display: grid;
      gap: 0.35rem;
    }

    .legal-links .dot {
      display: none;
    }
  }
</style>
