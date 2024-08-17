<?php
// Autoload de classes and libraries, do not change this lines.
require_once __DIR__ . '/../vendor/autoload.php';
use App\Utils\TwigUtils;
$twig = new TwigUtils();

// Your variables.
$title = 'Aula Inicial PHP + Twig';
$content = 'Neste curso você aprenderá a criar aplicações web com PHP e Twig.';

// Render the template.
echo $twig->render('home.html.twig', [
    'title' => $title,
    'content' => $content
]);

