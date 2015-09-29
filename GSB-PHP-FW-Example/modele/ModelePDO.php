<?php
require_once 'ModeleInterface.php';
require_once 'modelePDO/ConnexionBD.php';


/**
 * Description of ModelePDO
 *
 * @author Fabrice Missonnierlocal
 */
class ModelePDO implements ModeleInterface{
    public function __construct() {

        //on récupère tous les fichiers du répertoire modele/PDO
        //pour les inclure et pouvoir les utiliser
        if ($handle = opendir(getcwd().DIRECTORY_SEPARATOR."modele".DIRECTORY_SEPARATOR."modelePDO" )) { // Si le dossier includes/fichiers/ est accessible
            while (false !== ($file = readdir($handle))) { 
                //tant qu'il y a des fichiers dans le dossier
                if ($file != "." && $file != ".."  && $file != "confBDD.ini") {
                    //on inclue le fichier
                    require_once("modele".DIRECTORY_SEPARATOR."modelePDO".DIRECTORY_SEPARATOR.$file); 
                }   
            }
        }
        //on ferme le dossier
        closedir($handle); 

    }
    
    public function getPersonne(){
        return new PersonnePDO();
    }
    
     public function getAliment(){
        return new AlimentPDO();
    }
}

?>
