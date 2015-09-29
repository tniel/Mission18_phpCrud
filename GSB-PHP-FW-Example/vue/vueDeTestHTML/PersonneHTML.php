<?php
require_once 'GeneralHTML.php';

/**
 * Description of PersonneHTML
 *
 * @author Fabrice Missonnier
 */
 class PersonneHTML {
    private $general;
    
    function __construct() {
       $this->general = new GeneralHTML();
    }

    
    public function afficheLesPersonnes ($tabElements){
        $this->general->getDebutPage("Affichage des personnes");
        
        $nb = count ($tabElements);
        
        for($i=0;$i<$nb;$i++ ){
            echo($tabElements[$i]["NumP"]." ". $tabElements[$i]["NomP"]." "
                 .$tabElements[$i]["PrenomP"]." ");
            if ($tabElements[$i]["SexeP"] == "M")
                 echo ("Masculin <BR/>");
            else
                 echo ("Feminin <BR/>");
        }
        $this->general->getRetourAccueil();
        $this->general->getFinPage();
    }
    
    public function afficheFormSuppressionPersonne(){
        $this->general->getDebutPage("Suppression d'une personne");
        //attention : dans le formulaire, l'action envoyée est 
        //de la forme do.php?action=inserePersonne&nomP=MyTaylorIsRich&Prenom=Very&sexeP="M"
        //pour envoyer le paramètre inserePersonne, il faut le placer dans un input caché
        
        $connect = mysql_connect('localhost', 'root', 'gsb$generique,1234') or die("Erreur de connexion avec le serveur.");
        $marequete=  mysql_select_db("GSB_Test");
        $marequete2=  mysql_query("SELECT * FROM Personne");


        echo '<select name="numGenre" style = "width : 500px">';


        while ($row = mysql_fetch_object($marequete2)) 
        {  
           echo '<option value="'.$row->NumP.'">'.$row->NomP.'</option>'; 
        }
        echo '<option selected="selected" value=""</option>';
        echo '</select>';
        echo '<input type=hidden name=afficher value=ok>';
        echo '<input type="submit" value="Valider">';
        echo '</form>';
            
    }
    
    public function afficheFormInsertionPersonne(){
        $this->general->getDebutPage("Insertion d'une personne");
        //attention : dans le formulaire, l'action envoyée est 
        //de la forme do.php?action=inserePersonne&nomP=MyTaylorIsRich&Prenom=Very&sexeP="M"
        //pour envoyer le paramètre inserePersonne, il faut le placer dans un input caché
        
        ?>
            <form action="do.php " method="GET">
                    Nom 
                    <input type="text" name="nomP" size="20" ><BR/><BR/>
                    Prenom
                    <input type="text" name="prenomP" size="20" ><BR/><BR/>
                    Sexe <BR/>
                    <INPUT type='radio' name='sexeP' value='M'> Masculin <BR/>
                    <INPUT type='radio' name='sexeP' value='F'> Feminin <BR/>
                    <br/><br/>
                    <input type="hidden" name="action" value="inserePersonne">
                    <input type="submit" value="Envoyer" >
                    <input type="reset" value="Annuler" >
                </form>
        <?php
        
        $this->general->getFinPage();
    }
    
    public function afficheInsertPersonneOK(){
        $this->general->getDebutPage("Insertion OK");
        ?>
        La personne est bien insérée dans la base
        <?php
        $this->general->getRetourAccueil();
        $this->general->getFinPage();
    }
    
    public function afficheSupressionPersonneOK(){
        $this->general->getDebutPage("Supression OK");
        ?>
        La personne est bien supprimer de la base.
        <?php
        $this->general->getRetourAccueil();
        $this->general->getFinPage();
    }
    
    public function afficheSupressionPersonneNonOK(){
        $this->general->getDebutPage("Echec de la suppression");
        ?>
        La personne n'a pas été supprmier.
        <?php
        $this->general->getRetourAccueil();
        $this->general->getFinPage();
    }
     
    public function afficheInsertPersonneNonOK(){
        $this->general->getDebutPage("Insertion pas bien déroulée");
        ?>
        La personne n'a pas été insérée dans la base
        <?php
        $this->general->getRetourAccueil();
        $this->general->getFinPage();
    }
    
}
?>
