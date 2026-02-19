<?php

// ============================================================
// ARCHIVO: data/portfolio_data.php
// PROPÓSITO: Centralizar TODOS los datos personales del portafolio
// CONCEPTO: Array asociativo en PHP — como una "ficha de datos"
// ============================================================

// $portfolio es un ARRAY ASOCIATIVO (clave => valor)
// Funciona como un diccionario: cada "llave" tiene un "valor"
$portfolio = [

    // --- INFORMACIÓN PRINCIPAL ---
    "nombre"    => "Diego Andrés Loyo Osorio",
    "rol"       => "Estudiante de Ingeniería Informática",
    "tagline"   => "En formación como ingeniero informático, enfocado en crear tecnología útil, escalable y bien pensada.",
    "email"     => "Diegoloyo57@gmail.com",
    "github"    => "https://github.com/Diegoloy57",

    // --- BIO ---
    "bio" => "Estudiante de Ingeniería Informática en octavo semestre, con interés en el desarrollo de software y la arquitectura de sistemas. Cuento con conocimientos en desarrollo web y conocimientos de inglés, lo que me permite acceder a documentación técnica y diferentes entornos. Me motiva comprender los sistemas desde sus fundamentos y construir soluciones eficientes, escalables y bien estructuradas. Actualmente enfocado en fortalecer mis bases técnicas y participar en proyectos que representen nuevos desafíos.",

    // --- HABILIDADES ---
    // Array de arrays: cada habilidad es un array con sus propios datos
    "habilidades" => [
        ["nombre" => "HTML & CSS",      "nivel" => 95, "icono" => "🎨"],
        ["nombre" => "JavaScript",      "nivel" => 75, "icono" => "⚡"],
        ["nombre" => "React",           "nivel" => 70, "icono" => "⚛️"],
        ["nombre" => "Git & GitHub",    "nivel" => 100, "icono" => "🔧"],
        ["nombre" => "SQL",             "nivel" => 55, "icono" => "🗄️"],
        ["nombre" => "Android Studio",  "nivel" => 40, "icono" => "📱"],
    ],
];
?>