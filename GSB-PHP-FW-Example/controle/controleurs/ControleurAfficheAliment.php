<?php
require_once 'ControleurInterface.php';


/**
 * Description of ControleurAffichePersonne
 *
 * @author Fabrice Missonnier
 */
class ControleurAfficheAliment implements ControleurInterface {
   
    public function dispatch($vue, $modele, $tabParametres) {
        try {
            //on va chercher les infos dans le modèle
            $result = $modele->getAliment()->getLesAliment();
            //on les affiche à la vue
            $vue->getPersonne()->afficheLesPersonnes($result);
        }
        catch(ModeleExceptions $ex){
            $vue->getGeneral()->afficheException($ex->getMessageErreur());
        }       
    }
}

?>
