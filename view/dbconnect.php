<?php
try
{
    
$bdd = new PDO('mysql:host=localhost;dbname=patrimoire&media;charset=utf8', 'root', 'root');

}
catch(Exception $e)
{
    var_dump($e);
        die('Erreur : '.$e->getMessage());
}

?>