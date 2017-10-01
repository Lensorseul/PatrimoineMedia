<?php

    if ((isset($_POST["isbndelete"]))) {
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=patrimoire&media;charset=utf8', 'root', 'root');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }

        foreach($_POST['isbndelete'] as $valeur)
        {
            $req = $bdd->prepare("DELETE FROM books WHERE ISBN10=:b");
            $req->bindParam("b", $valeur,PDO::PARAM_STR) ;
            $req->execute();
        }

        header("Location: index.php?Page=deletebook&action=deletedok");
       
        
    }else{
        header("Location: index.php?Page=deletebook&action=deletenotok");
    }


?>