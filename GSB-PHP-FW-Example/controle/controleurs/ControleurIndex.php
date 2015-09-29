<?php
require_once 'ControleurInterface.php';


/**
 * Description of ControleurIndex
 *
 * @author Fabrice Missonnier
 */
class ControleurIndex implements ControleurInterface {
   
    public function dispatch($vue, $modele, $tabParametres) {
         $vue->getGeneral()->afficheIndex();
    }
}

?>
