<?php
require_once 'data/portfolio_data.php';
?>

<?php include 'includes/header.php'; ?>

<nav>
    <div class="nav-logo">
        <?php
        $partes = explode(" ", $portfolio['nombre']);
        echo $partes[0] . " " . $partes[2];
        ?>
    </div>

    <button class="nav-toggle" aria-label="Menú">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <ul class="nav-links">
        <li><a href="#inicio">Inicio</a></li>
        <li><a href="#sobre-mi">Sobre mí</a></li>
        <li><a href="#habilidades">Skills</a></li>
        <li><a href="#certificados">Certificados</a></li>
        <li><a href="#contacto">Contacto</a></li>
    </ul>
</nav>

<?php include 'sections/hero.php'; ?>

<div class="reveal">
    <?php include 'sections/about.php'; ?>
</div>

<div class="reveal">
    <?php include 'sections/skills.php'; ?>
</div>

<?php include 'sections/certificates.php'; ?>

<div class="reveal">
    <?php include 'sections/contact.php'; ?>
</div>

<footer>
    <div class="container">
        <p>
            Hecho con <span>♥</span> por
            <?php echo $portfolio['nombre']; ?>
            &nbsp;·&nbsp;
            <?php echo date('Y'); ?>
        </p>
    </div>
</footer>

<?php include 'includes/footer.php'; ?>