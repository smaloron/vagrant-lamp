<?php
namespace MyApp\Controller;


use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class ErrorController extends AbstractController
{

    public function notFound(){
        echo $this->render("notFound.twig", []);
    }

}