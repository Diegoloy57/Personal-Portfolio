<?php
// ============================================================
// ARCHIVO: includes/header.php
// PROPÓSITO: El <head> HTML — metadatos, fuentes, CSS
// CONCEPTO: require_once → incluir archivo solo una vez
//           Evita cargar el mismo archivo dos veces por error
// ============================================================

// Necesitamos los datos del portafolio aquí para el <title>
require_once __DIR__ . '/../data/portfolio_data.php';
// __DIR__ = la carpeta donde está ESTE archivo (includes/)
// '/../' = sube un nivel (a portafolio/)
// Así la ruta es siempre correcta sin importar desde dónde se llame
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- PHP echando su magia: el título usa la variable del array -->
    <title><?php echo $portfolio['nombre']; ?> | Portafolio</title>

    <!-- Google Fonts: Syne (display) + DM Sans (cuerpo) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

    <!-- Nuestro CSS principal -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>