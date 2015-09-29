<?php
//include 'vue/VueAjax.php';
include 'vue/VueDeTestHTML.php';
include 'modele/ModelePDO.php';

class ControleurFrontal {
    private $vue;
    private $modele;
    private $lesControleurs;
    
    public function __construct() {
        //On va chercher tous les controleurs qui ont été écrits dans le répertoire controleurs
        //L'objectif est de n'avoir qu'un controleur de front (une instance de cette classe)
        //que personne ne touche. 
        
        //C'est le code ci-après qui inclue tous les controleurs automatiquement. Si on programme
        //avec svn, cela permet à chacun d'écrire ses controleurs de manière indépendante 
        //sans avoir à refaire de diff sur ce fichier
        
        //on récupère tous les fichiers du répertoire controleur
        $i=0;
        if ($handle = opendir(getcwd().DIRECTORY_SEPARATOR."controle".DIRECTORY_SEPARATOR."controleurs" )) { // Si le dossier includes/fichiers/ est accessible
            while (false !== ($file = readdir($handle))) { 
                //tant qu'il y a des fichiers dans le dossier
                if ($file != "." && $file != ".."  && $file != "ControleurInterface.php") {
                    //je garde les noms des controleurs sans l'extention .php à la fin
                    //pour comparer les actions dans le doGetPost
                    $this->lesControleurs[$i++] = strstr($file, '.', true);
                    //on inclue le fichier
                    require_once("controle".DIRECTORY_SEPARATOR."controleurs".DIRECTORY_SEPARATOR.$file); 
                }   
            }
        }
        //on ferme le dossier
        closedir($handle); 

        //on récupère le nom du modèle que l'on veut instancier dans le fichier .ini
        $myIniFile = parse_ini_file ("confModeleVue.ini",TRUE);
        $leModele = $myIniFile["Modele"]["nomModele"];
        $laVue = $myIniFile["Vue"]["nomVue"];
        
        switch ($laVue){
            case "Test":
                $this->vue = new VueDeTestHTML();
                break;
            case "Ajax":
                //Prochaine mission :)
                $this->vue = new VueAjax();
                break;
            default:
                $this->vue->afficheException("Erreur lors de la selection de la vue");
                break;
        }
        
        switch ($leModele){
            case "Propel":
                //Prochaine mission 
                //on passe à Propel son répertoire d'installation dans le rep modèle
                //(où les fichiers ont été générés
                //$this->modele = new ModelePropel($myIniFile["ModelePropel"]["cheminInstall"]);
                break;
            case "Doctrine":
                //Prochaine prochaine mission
                $this->modele = new ModeleDoctrine();
                break;
            case "PDO":
                $this->modele = new ModelePDO();
                break;
            default:
                $this->vue->afficheException("Erreur lors de la selection du modèle");
                break;
        }      
    }

    public function doGetPost($tabParametres){
        //Dans le constructeur, on a inclu toutes les classes controleurs pour
        //chaque action.
        //On construit un objet en fonction de l'action passée. 
        //Par exemple, si l'action est visualiserAliment, 
        //je crée une nouvelle instance $controle = new ControleurVisualiserAliment()
        //on applique ensuite la méthode générique dispatch qui exécute les actions 
        //du contrôleur.
        
        if ($tabParametres != null ){
            $nomClasse = "Controleur".ucfirst($tabParametres["action"]);

            //si une action ne correspond pas au nom d'un controleur, on redirige vers une 
            //le controleur par défaut
            $trouve = false;
            foreach ($this->lesControleurs as $unControleur){
                if ($unControleur == $nomClasse){
                    $trouve = true;
                }
            }

            if ($trouve){
                $controle = new $nomClasse();
                $controle->dispatch($this->vue, $this->modele, $tabParametres);
            }
            else {
                $controle = new ControleurAfficheActionVideNonReconnue();
                $controle->dispatch($this->vue, $this->modele, $tabParametres);
            } 
        }
        else{
            $controle = new ControleurAfficheActionVideNonReconnue();
            $controle->dispatch($this->vue, $this->modele, $tabParametres);
        } 
    }
   
}

?>
