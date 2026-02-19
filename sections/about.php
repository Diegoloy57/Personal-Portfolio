<?php
// ============================================================
// ARCHIVO: sections/about.php
// PROPÓSITO: Sección "Sobre mí"
// CONCEPTO: Mezcla de HTML estático + variables PHP dinámicas
//           La bio viene del array, el diseño es fijo en HTML
// ============================================================
?>

<section class="sobre-mi" id="sobre-mi">

    <div class="container">

        <div class="section-header">
            <span class="section-tag">// about_me</span>
            <h2 class="section-titulo">Sobre Mí</h2>
        </div>

        <div class="sobre-mi-grid">

            <!-- Lado izquierdo: avatar decorativo -->
            <div class="sobre-mi-visual">
                <div class="avatar-container">
                    <div class="avatar-ring"></div>
                    <div class="avatar-inner">
                        <!-- Iniciales como avatar (sin necesidad de foto) -->
                        <span class="avatar-iniciales">
                            <?php
                            // Extraemos las iniciales del nombre usando explode()
                            // explode(" ", string) → divide el string por espacios
                            // Resultado: ["Diego", "Andrés", "Loyo", "Osorio"]
                            $partes = explode(" ", $portfolio['nombre']);
                            // Tomamos la primera letra de nombre y primer apellido
                            echo strtoupper(substr($partes[0], 0, 1) . substr($partes[2], 0, 1));
                            // substr(string, inicio, largo) → extrae parte de un string
                            // strtoupper() → convierte a mayúsculas
                            ?>
                        </span>
                    </div>
                    <!-- Badges flotantes decorativos -->
                    <div class="badge badge-1">⚡ JS</div>
                    <div class="badge badge-2">⚛️ React</div>
                    <div class="badge badge-3">🔧 Git</div>
                </div>
            </div>

            <!-- Lado derecho: texto -->
            <div class="sobre-mi-texto">
                <p class="bio-texto">
                    <?php echo htmlspecialchars($portfolio['bio']); ?>
                </p>

                <div class="info-chips">
                    <div class="chip">
                        <span class="chip-icon">🎓</span>
                        <span>Ingeniería Informática</span>
                    </div>
                    <div class="chip">
                        <span class="chip-icon">📍</span>
                        <span>Envigado, Antioquia</span>
                    </div>
                    <div class="chip">
                        <span class="chip-icon">💡</span>
                        <span>Open to learn</span>
                    </div>
                </div>

                <a href="mailto:<?php echo $portfolio['email']; ?>" class="btn btn-primary">
                    Escribeme →
                </a>
            </div>

        </div>
    </div>
</section>