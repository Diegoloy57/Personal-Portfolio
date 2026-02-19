<?php
// ============================================================
// ARCHIVO: sections/skills.php
// PROPÓSITO: Mostrar habilidades con barras de progreso animadas
// CONCEPTO CLAVE: foreach() — recorre arrays automáticamente
//
// foreach($array as $elemento) → por cada item del array,
// ejecuta el bloque de código con ese item en $elemento
// ============================================================
?>

<section class="habilidades" id="habilidades">
    <div class="container">

        <div class="section-header">
            <span class="section-tag">// my_skills</span>
            <h2 class="section-titulo">Habilidades</h2>
        </div>

        <div class="skills-grid">

            <?php
            // ¡Aquí está la magia de PHP!
            // En lugar de escribir cada tarjeta a mano (repetitivo y propenso a errores),
            // PHP recorre el array y genera el HTML automáticamente.
            //
            // $habilidad es una variable temporal que toma el valor
            // de cada elemento del array en cada vuelta del loop.
            foreach($portfolio['habilidades'] as $habilidad):
            // NOTA: usamos foreach(): ... endforeach; (sintaxis alternativa)
            // Es igual a foreach() { } pero más legible mezclado con HTML
            ?>

                <div class="skill-card" data-nivel="<?php echo $habilidad['nivel']; ?>">
                    <div class="skill-header">
                        <span class="skill-icono"><?php echo $habilidad['icono']; ?></span>
                        <span class="skill-nombre"><?php echo htmlspecialchars($habilidad['nombre']); ?></span>
                        <span class="skill-pct"><?php echo $habilidad['nivel']; ?>%</span>
                    </div>

                    <!-- La barra de progreso: el ancho viene del nivel -->
                    <!-- data-nivel es un atributo personalizado que JS leerá para animar -->
                    <div class="skill-barra-bg">
                        <div class="skill-barra-fill"
                             style="--nivel: <?php echo $habilidad['nivel']; ?>%">
                        </div>
                        <!-- --nivel es una CSS Custom Property (variable CSS)
                             que pasamos directamente desde PHP. ¡PHP → CSS! -->
                    </div>
                </div>

            <?php endforeach; ?>
            <!-- endforeach cierra el loop. Todo lo de arriba se repitió
                 una vez por cada habilidad en el array. -->

        </div>
    </div>
</section>