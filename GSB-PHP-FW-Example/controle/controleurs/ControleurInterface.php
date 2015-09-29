<?php

/**
 *
 * @author Fabrice Missonnier
 */
interface ControleurInterface {
    public function dispatch($vue, $modele, $tabParametres);
}

?>
