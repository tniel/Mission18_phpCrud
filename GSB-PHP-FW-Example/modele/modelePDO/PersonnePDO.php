<?php
/**
 * Description of PersonnePDO
 *
 * @author Fabrice Missonnier
 */
require_once 'modele/ModeleExceptions.php';

class PersonnePDO {
    
    public function getLesPersonnes(){
        $maConnexion = new ConnexionBD();
        
        $select = $maConnexion->getConnexion()->query("SELECT * FROM Personne");

        //mode de récupération par défaut
        $select->setFetchMode(PDO::FETCH_OBJ);
        $i=0;
        //traite les résultats en boucle
        $enregistrement = $select->fetch();
        
        $tabElem = NULL;
        while( $enregistrement )
        { 
            $tabElem[$i]["NumP"] = $enregistrement->NumP;
            $tabElem[$i]["NomP"] = $enregistrement->NomP;
            $tabElem[$i]["PrenomP"] = $enregistrement->PrenomP ;
            $tabElem[$i]["SexeP"] = $enregistrement->SexeP ;
            $enregistrement = $select->fetch();
            $i++;
        }
       
        if ($tabElem == NULL){
            throw new ModeleExceptions (0);
        }
        else{     
            return $tabElem;
        }
    }
    
   
    public function setUnePersonne($nomP, $prenomP, $sexeP){
        $maConnexion = new ConnexionBD();

        //applique la méthode query sur l’objet $connection
        $req2 = "INSERT INTO Personne (NomP, PrenomP, SexeP) VALUES
            ('".$nomP."', '".$prenomP."', '".$sexeP."');";
        
        $res = $maConnexion->getConnexion()->exec($req2);

        if (!$res){
            throw new ModeleExceptions (1);
        }
    }
    
    public function deleteUnePersonne($numP, $nomP, $prenomP, $sexeP) {
        $maConnexion = new ConnexionBD();
        $req3= "DELETE FROM Personne WHERE NumP = ".$numP." AND NomP ='".$nomP."' AND PrenomP ='".$prenomP."' AND SexeP ='".$sexeP."';";

        $res = $maConnexion->getConnexion()->exec($req3);

        if (!$res){
            throw new ModeleExceptions (1);
        }
    }
}
?>
