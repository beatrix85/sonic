<?php

class MainController extends CoreController
{
    // page d'accueil
    public function home()
    {
           // On va chercher les charactères de la home
           $dbdata = new DBData();
           $categories = $dbdata->getHomeCharacter();

           $this->show('home', [

               'name'=> $name,
               'image'=> $image,
               'type'=> $type,
               'description'=> $description,

           ]);
    }
}
