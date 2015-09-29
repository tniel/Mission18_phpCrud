<?php
require_once 'ControleurInterface.php';


/**
 * Description of ControleurInserePersonne
 *
 * @author Fabrice Missonnier
 */
class ControleurInserePersonne implements ControleurInterface {
   
    public function dispatch($vue, $modele, $tabParametres) {
        // insereAliment?descFR=Cantal&descAN=Cantal&numGenre=06.6
        try {
            $ok = $modele->getPersonne()->setUnePersonne($tabParametres["nomP"], $tabParametres["prenomP"], $tabParametres["sexeP"]);
            $vue->getPersonne()->afficheInsertPersonneOK();
        }
        catch(ModeleExceptions $ex){
            $vue->getAliment()->afficheInsertPersonneNonOK();
        }
    }
}

?>
