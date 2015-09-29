<?php
require_once 'ControleurInterface.php';

/**
 * Description of ControleurAfficheActionVideNonReconnue
 *
 * @author Fabrice Missonnier
 */
class ControleurAfficheActionVideNonReconnue implements ControleurInterface {
   
    public function dispatch($vue, $modele, $tabParametres) {
        //on a besoin de récupérer les genres pour les affichier
        $vue->getGeneral()->afficheActionVideNonReconnue();
    }
}

?>
