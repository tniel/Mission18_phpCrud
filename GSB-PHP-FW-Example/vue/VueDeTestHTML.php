<?php


/**
 * Classe d'affichage HTML
 *
 * @author F. Missonnier
 */

require_once 'VueInterface.php';

class VueDeTestHTML implements VueInterface {

    public function __construct() {
        //on récupère tous les fichiers du répertoire vue/VueDeTestHTML
        //pour les inclure et pouvoir les utiliser
        
        if ($handle = opendir(getcwd().DIRECTORY_SEPARATOR."vue".DIRECTORY_SEPARATOR."vueDeTestHTML" )) { 
            while (false !== ($file = readdir($handle))) { 
                //tant qu'il y a des fichiers dans le dossier
                if ($file != "." && $file != "..") {
                    //on inclue le fichier
                    require_once("vue".DIRECTORY_SEPARATOR."vueDeTestHTML".DIRECTORY_SEPARATOR.$file); 
                }   
            }
        }
        //on ferme le dossier
        closedir($handle); 
    }
    
    public function getPersonne(){
        return new PersonneHTML();
    }

    public function getGeneral(){
        return new GeneralHTML();
    }
}
?>   
