<?php


namespace MyApp\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class AbstractController
{

    protected Environment $twig;

    /**
     * AbstractController constructor.
     */
    public function __construct()
    {
        $loader = new FilesystemLoader(VIEW_PATH);
        $this->twig = new Environment($loader, [
            //"cache" => TWIG_CACHE
        ]);
    }

    protected function render(string $template, array $args = []): string{
        return $this->twig->render($template, $args);
    }


}