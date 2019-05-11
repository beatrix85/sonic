<?php

class MainController extends CoreController
{
    // page d'accueil
    public function home()
    { 
        
           // On va chercher les charactères de la home
           $dbdata = new DBData();

           die('toto');
           $characters = $dbdata->getHomeCharacters();

           $this->show('index', ['characters'=> $characters]);
    }
}
