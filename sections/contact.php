<?php
// ============================================================
// ARCHIVO: sections/contact.php
// PROPÓSITO: Sección de contacto
// CONCEPTO: PHP maneja el envío del formulario (POST)
//           $_POST es un array superglobal de PHP — captura
//           los datos enviados por un formulario HTML
// ============================================================

// Inicializamos variables de estado
$mensaje_enviado = false;
$error = "";

// $_SERVER['REQUEST_METHOD'] nos dice si la página fue cargada
// normalmente (GET) o si se envió un formulario (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recuperamos los datos del formulario
    // $_POST['nombre'] → el valor del input con name="nombre"
    $nombre_contacto = trim($_POST['nombre'] ?? '');
    $email_contacto  = trim($_POST['email']  ?? '');
    $mensaje_texto   = trim($_POST['mensaje'] ?? '');
    // trim() elimina espacios al inicio y al final
    // ?? '' es el operador "null coalescing": si no existe, usa ''

    // Validación básica
    if(empty($nombre_contacto) || empty($email_contacto) || empty($mensaje_texto)) {
        $error = "Por favor completa todos los campos.";
    } elseif (!filter_var($email_contacto, FILTER_VALIDATE_EMAIL)) {
        $error = "El email no tiene un formato válido.";
        // filter_var() con FILTER_VALIDATE_EMAIL verifica que sea un email real
    } else {
        // Aquí normalmente enviarías el email con mail() o un servicio externo
        // Por ahora simulamos el éxito
        $mensaje_enviado = true;
    }
}
?>

<section class="contacto" id="contacto" style="scroll-margin-top: 80px;">
    <div class="container">

        <div class="section-header">
            <span class="section-tag">// get_in_touch</span>
            <h2 class="section-titulo">Contacto</h2>
        </div>

        <div class="contacto-grid">

            <!-- Info de contacto -->
            <div class="contacto-info">
                <p class="contacto-desc">
                    ¿Tienes algún proyecto, idea o simplemente quieres conectar?
                    Escríbeme, siempre estoy abierto a nuevas conversaciones.
                </p>

                <div class="contacto-items">
                    <a href="mailto:<?php echo $portfolio['email']; ?>" class="contacto-item">
                        <span class="contacto-icono">✉️</span>
                        <span><?php echo $portfolio['email']; ?></span>
                    </a>
                    <a href="<?php echo $portfolio['github']; ?>" target="_blank" class="contacto-item">
                        <span class="contacto-icono">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                                <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                            </svg>
                        </span>
                        <span>Diegoloy57</span>
                    </a>
                </div>
            </div>

            <!-- Formulario -->
            <div class="contacto-form-wrapper">

                <?php if($mensaje_enviado): ?>
                    <!-- Si el formulario se envió con éxito, mostramos esto -->
                    <div class="form-exito">
                        <span class="exito-icono">✅</span>
                        <h3>¡Mensaje enviado!</h3>
                        <p>Gracias por escribirme, te responderé pronto.</p>
                    </div>

                <?php else: ?>
                    <!-- Si hay error, lo mostramos -->
                    <?php if($error): ?>
                        <div class="form-error"><?php echo $error; ?></div>
                    <?php endif; ?>

                    <!-- El formulario envía a sí mismo (action="") con método POST -->
                    <form class="contacto-form" method="POST" action="">

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text"
                                   id="nombre"
                                   name="nombre"
                                   placeholder="Tu nombre"
                                   value="<?php echo htmlspecialchars($nombre_contacto ?? ''); ?>"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   placeholder="tu@email.com"
                                   value="<?php echo htmlspecialchars($email_contacto ?? ''); ?>"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="mensaje">Mensaje</label>
                            <textarea id="mensaje"
                                      name="mensaje"
                                      rows="5"
                                      placeholder="¿En qué puedo ayudarte?"
                                      required><?php echo htmlspecialchars($mensaje_texto ?? ''); ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-full">
                            Enviar mensaje →
                        </button>

                    </form>

                <?php endif; ?>
            </div>

        </div>
    </div>
</section>