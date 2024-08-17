<?php
// Autoload de classes and libraries, do not change this lines.
require_once __DIR__ . '/../vendor/autoload.php';
use App\Utils\TwigUtils;
use App\Utils\Routes;
use App\Entities\PersonEntity;
$twig = new TwigUtils();
$routes = new Routes();
$path = $routes->path;

// Your variables.
$title = 'Aula Inicial PHP + Twig';
$content = 'Neste curso você aprenderá a criar aplicações web com PHP e Twig.';

// Create a new instance of Pessoa.
$person = new PersonEntity('João', 25);
$personFinal = $person->getNameAndAge();

// Render the template.
echo $twig->render('home.html.twig', [
    'title' => $title,
    'paragrafo' => $content,
    'person' => $personFinal,
    'path' => $path
]);

