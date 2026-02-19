<?php
// ============================================================
// ARCHIVO: index.php — EL CORAZÓN DEL PROYECTO
// PROPÓSITO: Orquesta todos los archivos del portafolio
// CONCEPTO: Este es el "punto de entrada" (entry point)
//
// Cuando el usuario visita localhost/portafolio/,
// Apache busca automáticamente index.php primero.
// Desde aquí, PHP ensambla toda la página con include/require.
// ============================================================

// require_once garantiza que este archivo se cargue UNA sola vez
// y lanza error fatal si no existe (más seguro que include)
require_once 'data/portfolio_data.php';
// Ahora $portfolio está disponible en TODOS los archivos que incluyamos
?>

<?php include 'includes/header.php'; ?>
<!-- ↑ Esto pega aquí todo el contenido de header.php -->
<!-- El navegador recibe el DOCTYPE, <html>, <head> y el <body> abierto -->

<!-- ===================== NAVEGACIÓN ===================== -->
<nav>
    <!-- Logo: usa PHP para mostrar las iniciales del nombre -->
    <div class="nav-logo">
        <?php
        $partes = explode(" ", $portfolio['nombre']);
        // Mostramos nombre + primer apellido como logo
        echo $partes[0] . " " . $partes[2];
        ?>
    </div>

    <!-- Botón hamburguesa para móvil -->
    <button class="nav-toggle" aria-label="Menú">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <!-- Links de navegación -->
    <ul class="nav-links">
        <li><a href="#inicio">Inicio</a></li>
        <li><a href="#sobre-mi">Sobre mí</a></li>
        <li><a href="#habilidades">Skills</a></li>
        <li><a href="#contacto">Contacto</a></li>
    </ul>
</nav>

<!-- ===================== SECCIONES ===================== -->
<!-- Cada include trae la sección correspondiente.
     Como ya cargamos $portfolio arriba, está disponible
     en todos los archivos incluidos automáticamente. -->

<?php include 'sections/hero.php'; ?>

<div class="reveal">
    <?php include 'sections/about.php'; ?>
</div>

<div class="reveal">
    <?php include 'sections/skills.php'; ?>
</div>

<div class="reveal">
    <?php include 'sections/contact.php'; ?>
</div>

<!-- ===================== FOOTER ===================== -->
<footer>
    <div class="container">
        <p>
            Hecho con <span>♥</span> por
            <?php echo $portfolio['nombre']; ?>
            &nbsp;·&nbsp;
            <?php echo date('Y'); ?>
            <!-- date('Y') → PHP imprime el año actual automáticamente -->
        </p>
    </div>
</footer>

<?php include 'includes/footer.php'; ?>
<!-- ↑ Cierra el <body> y el <html>, y carga el JS -->