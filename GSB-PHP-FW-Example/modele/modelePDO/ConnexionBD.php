<?php

class ConnexionBD {
    private $dns;
    private $utilisateur ;
    private $motDePasse ;
    private $connexion ;

    public function __construct() {
        $myIniFile = parse_ini_file ("confBDD.ini",TRUE);
        $this->dns = $myIniFile["Section B"]["URLConnect"];
        $this->utilisateur = $myIniFile["Section B"]["Utilisateur"];
        $this->motDePasse = $myIniFile["Section B"]["MDP"];
        $this->connexion = new PDO( $this->dns, $this->utilisateur, $this->motDePasse, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" ));
    }
    
    /* on ferme la connexion PDO en la mettant à null 
     * obligatoire car sinon le session_start() plante
     * le __destruct de cette classe est appelé automatiquement
     * par php lorsque les traitements sont terminés et renvoyés à
     * l'utilisateur
     */
    function __destruct() { 
        $this->connexion = null; 
    }
    
    public function getConnexion() {
        return $this->connexion;
    }
}
?>
