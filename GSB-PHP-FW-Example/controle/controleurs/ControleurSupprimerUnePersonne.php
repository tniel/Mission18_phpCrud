<?php
require_once 'ControleurInterface.php';


/**
 * Description of ControleurInserePersonne
 *
 * @author Fabrice Missonnier
 */
class ControleurSupprimerUnePersonne implements ControleurInterface {
   
    public function dispatch($vue, $modele, $tabParametres) {
        // insereAliment?descFR=Cantal&descAN=Cantal&numGenre=06.6
        try {
            $ok = $modele->getPersonne()->deleteUnePersonne($tabParametres["numP"], $tabParametres["nomP"], $tabParametres["prenomP"], $tabParametres["sexeP"]);
            $vue->getPersonne()->afficheSupressionPersonneOK();
        }
        catch(ModeleExceptions $ex){
            $vue->getPersonne()->afficheInsertPersonneNonOK();
        }
    }
}

?>