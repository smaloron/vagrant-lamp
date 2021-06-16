<?php


namespace MyApp\Controller;


class HomeController extends AbstractController
{

    public function index(){
        echo $this->render("home/index.twig", [
            "name" => "Seb",
            "age" => 30,
            "fruits" => ["Pommes", "Oranges", "Abricots"]
        ]);
    }

    public function about(){
        $this->render("home/about.twig");
    }

}