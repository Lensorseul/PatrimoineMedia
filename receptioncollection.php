<?php

    if ((isset($_POST["nomcol"]))) {

            try {
                $bdd = new PDO('mysql:host=localhost;dbname=patrimoire&media;charset=utf8', 'root', 'root');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
            $nomcol = $_POST['nomcol'];
            $req = $bdd->prepare("INSERT INTO collection(Nomcollection) VALUES (:nomcol)");
            $req->bindParam("nomcol", $nomcol,PDO::PARAM_STR) ;
            $req->execute();

        header("Location: index.php?Page=createcollection&action=uploadok");
        
    }else{
        header("Location: index.php?Page=createcollection&action=uploadnotok");
    }


?>