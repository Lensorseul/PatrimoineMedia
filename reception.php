<?php

    if ((isset($_POST["isbnaffich"]))) {
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=Patrimoire&Media;charset=utf8', 'root', 'root');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
            $val="non";
            $req = $bdd->prepare("UPDATE books SET News=:b");
            $req->bindParam("b", $val,PDO::PARAM_STR) ;
            $req->execute();

         $val="oui";
        foreach($_POST['isbnaffich'] as $valeur)
        {
            $req = $bdd->prepare("UPDATE books SET News=:b WHERE ISBN10=:a");
            $req->bindParam("a", $valeur,PDO::PARAM_INT) ;
            $req->bindParam("b", $val,PDO::PARAM_STR) ;
            $req->execute();
        }

        header("Location: index.php?Page=updatenews&action=uploadok");
       
        
    }else{
        header("Location: index.php?Page=updatenews&action=uploadnotok");
    }


?>