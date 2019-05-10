<?php

/**
 * Classe permettant de retourner des données stockées dans la base de données
 */
class DBData
{
    /** @var PDO */
    private $dbh; // DataBase Handler

    /**
     * Constructeur se connectant à la base de données à partir des informations du fichier de configuration
     */
    public function __construct()
    {
        // Récupération des données du fichier de config
        //   la fonction parse_ini_file parse le fichier et retourne un array associatif
        // Attention, "config.conf" ne doit pas être versionné,
        //   on versionnera plutôt un fichier d'exemple "config.dist.conf" ne contenant aucune valeur

        // (to) Parse = Analyser
        // Versionner = gestion de versions multiples du code source = Git
        $configData = parse_ini_file(__DIR__.'/../config.conf');
        
        try {
            $this->dbh = new PDO(
                "mysql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};charset=utf8",
                $configData['DB_USERNAME'],
                $configData['DB_PASSWORD'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING) // Affiche les erreurs SQL à l'écran
            );
        } catch (\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage().'<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }
    }

    public function getCharacter($charcterId)
    {
        $sql = 'SELECT `character`.*,`name`, `description`, `picture`,
         FROM `character`
         WHERE `name`, `description`, `picture`,';

           // On effectue la requête sur le serveur
        $result = $this->dbh->query($sql);
        // On récupère le résultat de la requête via $result
        $product = $result->fetch(PDO::FETCH_ASSOC);

        return $character;
    }


}