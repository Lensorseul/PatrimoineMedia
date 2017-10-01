<?php

if(isset($_GET['action'])){
    if(isset($_GET['action']) == 'logout'){
        unset($_SESSION['admin']);
    }
}


if ((isset($_POST["username"]))&&(isset($_POST["mdp"]))) {
    $login = $_POST["username"];
    // Hachage du mot de passe
    $pass_hache = sha1($_POST['mdp']);
	

    try {
            $bdd = new PDO('mysql:host=localhost;dbname=patrimoire&media;charset=utf8', 'root', 'root');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

// Vérification des identifiants
    $req = $bdd->prepare("SELECT pseudo,pass FROM administrateur WHERE pseudo = :pseudo AND pass = :pass");
	$req->bindParam("pseudo", $login,PDO::PARAM_STR) ;
	$req->bindParam("pass", $pass_hache,PDO::PARAM_STR) ;
    $req->execute();

	$count=$req->rowCount();
	$data=$req->fetch(PDO::FETCH_OBJ);
	$bdd = null;
	if($count)
	{
		$_SESSION['admin'] = $_POST['login'];
	}

}


if (isset($_SESSION['admin'])) {
    include ('adminpanel.php');
} else {
    include ('logon.php');
}
?>
