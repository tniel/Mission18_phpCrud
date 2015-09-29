<?php

    include 'controle/ControleurFrontal.php';
    session_start();
    
    // code "main" qui redirige vers une classe de traitement "doGet/doPost" 
    // de la classe Controleur
    
    //si c'est la première "connexion" à l'appli, on crée le controleur
    //sinon il existe déjà dans la variable de session
    //if (empty($_SESSION["controle"]))
        $_SESSION["controle"] = new ControleurFrontal();
  
    //on fait un code générique, si les infos sont passées en GET ou en POST
    //l'action sera identique
    if (!empty ($_POST["action"]))
        $_SESSION["controle"]->doGetPost($_POST);
    elseif (!empty ($_GET["action"]))
        $_SESSION["controle"]->doGetPost($_GET);
    else
        $_SESSION["controle"]->doGetPost(null);
    
?>
