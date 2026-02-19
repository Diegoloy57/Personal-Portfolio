<?php
// ============================================================
// ARCHIVO: sections/certificates.php
// PROPÓSITO: Mostrar certificados como tarjetas con modal
// CONCEPTOS NUEVOS:
//   - Rutas de imágenes servidas por PHP
//   - Atributos data-* para pasar datos de PHP a JavaScript
//   - Modal: ventana emergente controlada por JS
// ============================================================
?>

<section class="certificados" id="certificados" style="scroll-margin-top: 80px;">
    <div class="container">

        <div class="section-header">
            <span class="section-tag">// my_certificates</span>
            <h2 class="section-titulo">Certificados</h2>
            <p class="section-subtitulo">Formación verificada y en constante crecimiento</p>
        </div>

        <div class="certs-grid">

            <?php
            // foreach recorre cada certificado del array
            // $i es el índice (0, 1, 2...) — lo usamos para identificar el modal
            foreach($portfolio['certificados'] as $i => $cert):
            ?>

                <!-- Tarjeta del certificado -->
                <!-- data-* son atributos personalizados: PHP pasa datos a JS -->
                <div class="cert-card reveal"
                     data-index="<?php echo $i; ?>"
                     style="--cert-color: <?php echo $cert['color']; ?>;">

                    <!-- Imagen del certificado -->
                    <div class="cert-imagen-wrapper">
                        <img
                            src="/portafolio/img/certificados/<?php echo $cert['imagen']; ?>"
                            alt="<?php echo htmlspecialchars($cert['nombre']); ?>"
                            class="cert-imagen"
                            loading="lazy"
                        >
                        <!-- loading="lazy" → el navegador solo carga la imagen
                             cuando está a punto de entrar en pantalla.
                             Mejora el rendimiento (performance) de la página. -->

                        <!-- Overlay con botón "ver" al hacer hover -->
                        <div class="cert-overlay">
                            <button class="cert-ver-btn" onclick="abrirModal(<?php echo $i; ?>)">
                                🔍 Ver certificado
                            </button>
                        </div>
                    </div>

                    <!-- Info del certificado -->
                    <div class="cert-info">
                        <span class="cert-icono"><?php echo $cert['icono']; ?></span>
                        <div class="cert-texto">
                            <h3 class="cert-nombre">
                                <?php echo htmlspecialchars($cert['nombre']); ?>
                            </h3>
                            <p class="cert-institucion">
                                <?php echo htmlspecialchars($cert['institucion']); ?>
                            </p>
                            <div class="cert-meta">
                                <span class="cert-fecha">📅 <?php echo $cert['fecha']; ?></span>
                                <span class="cert-duracion">⏱ <?php echo $cert['duracion']; ?></span>
                            </div>
                        </div>
                    </div>

                </div>

            <?php endforeach; ?>

        </div>
    </div>

    <!-- ===================== MODAL ===================== -->
    <!-- El modal está OCULTO por defecto (display:none en CSS)
         JS lo muestra cuando el usuario hace clic en una tarjeta -->
    <div class="modal-overlay" id="certModal" onclick="cerrarModal(event)">
        <div class="modal-contenido">

            <!-- Botón de cerrar -->
            <button class="modal-cerrar" onclick="cerrarModal()">&times;</button>

            <!-- La imagen se rellena dinámicamente por JS -->
            <img src="" alt="" class="modal-imagen" id="modalImagen">

            <div class="modal-info">
                <h3 id="modalNombre"></h3>
                <p id="modalInstitucion"></p>
                <div class="modal-meta">
                    <span id="modalFecha"></span>
                    <span id="modalDuracion"></span>
                </div>
            </div>

        </div>
    </div>

</section>

<?php
// ============================================================
// CONCEPTO: PHP generando un array JavaScript
//
// Necesitamos que JS conozca los datos de los certificados
// para poder rellenar el modal dinámicamente.
// PHP "imprime" un array JS con los datos — así los dos
// lenguajes se comunican: PHP escribe datos, JS los lee.
// ============================================================
?>
<script>
// Este array JavaScript fue generado por PHP
// PHP lo escribió en el HTML y JS lo puede leer
const certificadosData = <?php echo json_encode($portfolio['certificados']); ?>;
// json_encode() convierte el array PHP a formato JSON (JavaScript Object Notation)
// Resultado: [{"nombre":"...","institucion":"..."}, {...}, {...}]
</script>