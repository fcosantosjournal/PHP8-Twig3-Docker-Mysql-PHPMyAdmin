<?php

namespace App\Utils;

use Twig\Environment;
use Twig\Extension\DebugExtension;

class TwigUtils {
    protected Environment $twig;
   
    public function __construct() {
        $this->twig = new Environment(new \Twig\Loader\FilesystemLoader(__DIR__ . '/../View/Templates'), [
            'debug' => true, 
            'cache' => false, 
        ]);
        $this->twig->addExtension(new DebugExtension());
    }

    public function render(string $template, array $data = []): string {
        return $this->twig->render($template, $data);
    }
}
