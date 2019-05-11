<?php

class CoreController
{
    // private $router;

    //  /**
    //  * On profite du constructeur pour initialiser des propriétés
    //  */
    // public function __construct($router)
    // {
    //     $this->router = $router;
    // }

    protected function show($view,$viewVars = [])
    {
        // $router = $this->router;
        extract($viewVars);


        include(__DIR__.'/../../views/'. $view. '.tpl.php');
    }
}
