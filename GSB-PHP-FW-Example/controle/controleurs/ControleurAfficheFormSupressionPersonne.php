<?php
require_once 'ControleurInterface.php';


/**
 * Description of ControleurAfficheFormeInserePersonne
 *
 * @author Fabrice Missonnier
 */
class ControleurAfficheFormSupressionPersonne implements ControleurInterface {
   
    public function dispatch($vue, $modele, $tabParametres) {
        //On n'affiche ici que le formulaire (on ne va rien chercher 
        //dans le modèle
        $vue->getPersonne()->afficheFormSuppressionPersonne();
    }
}

?>