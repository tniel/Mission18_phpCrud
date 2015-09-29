<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MesErreursDeModele
 *
 * @author Fabrice Missonnierlocal
 */
class ModeleExceptions extends Exception{
    private $messageErreur;
    private $numErreur;
    
    public function __construct($numErreur){
        $this->$numErreur = $numErreur;
        
        switch ($numErreur){
            case 0 : $this->messageErreur = "Pas d'élément dans la table";
                break;
            case 1 : $this->messageErreur = "Erreur à l'insertion";
                break;
            case 2 : $this->messageErreur = "Deux genres ont la même clé";
                break;
            default :$this->messageErreur = "Erreur indéfinie";
                break;
        }
            
    }
    
    public function getMessageErreur(){
        return $this->messageErreur;
    }
    
    public function getNumErreur(){
        return $this->numErreur;
    }
}

?>

