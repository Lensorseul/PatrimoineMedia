<?php

    if ((isset($_POST["nomcol"]))) {

            try {
                $bdd = new PDO('mysql:host=localhost;dbname=Patrimoire&Media;charset=utf8', 'root', 'root');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
            $nomcol = $_POST['nomcol'];
            print_r($nomcol);
            $req = $bdd->prepare("INSERT INTO collection(Nomcollection) VALUES (:nomcol)");
            $req->bindParam("nomcol", $nomcol,PDO::PARAM_STR) ;
            $req->execute();
        

        header("Location: index.php?Page=createcollection&action=uploadok");
        
    }else{
        header("Location: index.php?Page=createcollection&action=uploadnotok");
    }


?>