<?php
// ============================================================
// ARCHIVO: sections/hero.php
// PROPÓSITO: La sección principal — lo primero que ve el visitante
// CONCEPTO: echo en PHP → imprime texto/HTML en la página
//           htmlspecialchars() → seguridad: evita inyección de código
// ============================================================
?>

<section class="hero" id="inicio">

    <!-- Fondo animado con partículas/burbujas -->
    <div class="hero-bg">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
    </div>

    <div class="hero-content">

        <!-- Saludo animado -->
        <p class="hero-saludo">👋 Hola, soy</p>

        <!-- PHP imprime el nombre desde el array $portfolio -->
        <h1 class="hero-nombre">
            <?php echo htmlspecialchars($portfolio['nombre']); ?>
        </h1>

        <!-- El rol con efecto de escritura (typewriter) via JS -->
        <h2 class="hero-rol">
            <span class="typewriter" data-text="<?php echo htmlspecialchars($portfolio['rol']); ?>"></span>
        </h2>

        <!-- Tagline -->
        <p class="hero-tagline">
            <?php echo htmlspecialchars($portfolio['tagline']); ?>
        </p>

        <!-- Botones de acción -->
        <div class="hero-btns">
            <a href="#sobre-mi" class="btn btn-primary">Conóceme</a>
            <a href="mailto:<?php echo $portfolio['email']; ?>" class="btn btn-outline">Contáctame</a>
        </div>

        <!-- Links sociales -->
        <div class="hero-sociales">
            <a href="<?php echo $portfolio['github']; ?>" target="_blank" class="social-link" title="GitHub">
                <!-- SVG de GitHub -->
                <svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                    <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                </svg>
            </a>
        </div>

    </div>

    <!-- Indicador scroll -->
    <div class="scroll-indicator">
        <span>Scroll</span>
        <div class="scroll-line"></div>
    </div>

</section>