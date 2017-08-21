<?php
define ('SITE_ROOT', realpath(dirname(__FILE__)));

$extension_upload = strtolower(  substr(  strrchr($_FILES['icone']['name'], '.')  ,1)  );
$extension_upload2 = strtolower(  substr(  strrchr($_FILES['icone2']['name'], '.')  ,1)  );

$target_dir = SITE_ROOT.'/images/books/'.$_POST['isbn10'].'/';
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
    chmod($target_dir,0777);
}else{
    chmod($target_dir,0777);
}



$target_file = $target_dir . $_FILES['icone']['name'];

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["reception"])) {
    $check = getimagesize($_FILES["icone"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        header("Location: index.php?Page=createbook&action=fileisnotimage");
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["icone"]["size"] > 5000000) {
        header("Location: index.php?Page=createbook&action=filetoolarge");
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
        header("Location: index.php?Page=createbook&action=fileformat");
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}




$target_file2 = $target_dir . $_FILES['icone2']['name'];

$uploadOk2 = 1;
$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["reception"])) {
    $check2 = getimagesize($_FILES["icone2"]["tmp_name"]);
    if($check2 !== false) {
        $uploadOk2 = 1;
    } else {
        header("Location: index.php?Page=updatenews&action=fileisnotimage");
        $uploadOk2 = 0;
    }
}

// Check file size
if ($_FILES["icone2"]["size"] > 5000000) {
        header("Location: index.php?Page=updatenews&action=filetoolarge");
    $uploadOk2 = 0;
}
// Allow certain file formats
if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
&& $imageFileType2 != "gif" ) {
        header("Location: index.php?Page=updatenews&action=fileformat");
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk2 = 0;
}

























// Check if $uploadOk is set to 0 by an error
if (($uploadOk == 0) || ($uploadOk2 ==0)) {
    header("Location: index.php?Page=createbook&action=uploadnotok");
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if ((isset($_POST["isbn10"]))&&(isset($_POST["description"]))&&(isset($_POST["namelivre"]))&&(isset($_POST["prix"]))&&(isset($_POST['dateparution']))&&(isset($_POST['auteurs']))&&(isset($_POST['photographes']))&&(isset($_POST['iconographes']))&&(isset($_POST['formatlivre']))&&(isset($_POST['nbpage']))&&(isset($_POST['reliure']))&&(isset($_POST["diffuseurlibrairies"]))&&(isset($_POST["collections"]))) {

    $isbn10 = $_POST["isbn10"];
    $description = $_POST["description"];
    $titre = $_POST["namelivre"];
    $prix = $_POST["prix"]; 
    $dateparution = $_POST["dateparution"]; 
    $auteurs = $_POST["auteurs"];
    $photo = $_POST["photographes"];
    $iconographes = $_POST["iconographes"];
    $formatlivre = $_POST["formatlivre"];
    $nbpages = $_POST["nbpage"];
    $reliure = $_POST["reliure"];
    $diffuseurlibrairies = $_POST["diffuseurlibrairies"];
    $news="non";
    $collectionlivre=$_POST['collections'];
    

    try {
            $bdd = new PDO('mysql:host=localhost;dbname=Patrimoire&Media;charset=utf8', 'root', 'root');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $req = $bdd->prepare("INSERT INTO books (ISBN10,Titre,Idcollection,Description,Dateparution,Auteurs,Photographes,Iconographes,Formatlivre,Nbpage,Reliure,Diffuseur,Prix,Format,Format2,News) VALUES (:isbn10, :titre, :collectionlivre, :description, :dateparution, :auteurs, :photographes, :iconographes, :formatlivre, :nbpage, :reliure, :diffuseur, :prix, :format, :format2, :news)");
        $req->bindParam("isbn10", $isbn10,PDO::PARAM_STR) ;
        $req->bindParam("titre", $titre,PDO::PARAM_STR) ;
        $req->bindParam("description", $description,PDO::PARAM_STR) ;
        $req->bindParam("dateparution", $dateparution,PDO::PARAM_STR) ;
        $req->bindParam("auteurs", $auteurs,PDO::PARAM_STR) ;
        $req->bindParam("photographes", $photo,PDO::PARAM_STR) ;
        $req->bindParam("iconographes", $iconographes,PDO::PARAM_STR) ;
        $req->bindParam("formatlivre", $formatlivre,PDO::PARAM_STR) ;
        $req->bindParam("nbpage", $nbpages,PDO::PARAM_STR) ;
        $req->bindParam("reliure", $reliure,PDO::PARAM_STR) ;
        $req->bindParam("diffuseur", $diffuseurlibrairies,PDO::PARAM_STR) ;
        $req->bindParam("collectionlivre", $collectionlivre,PDO::PARAM_STR) ;
        $req->bindParam("prix", $prix,PDO::PARAM_STR) ;
        $req->bindParam("format", $extension_upload,PDO::PARAM_STR) ;
        $req->bindParam("format2", $extension_upload2,PDO::PARAM_STR) ;
        $req->bindParam("news", $news,PDO::PARAM_STR) ;
        
        $req->execute();

        if (move_uploaded_file($_FILES["icone"]["tmp_name"], $target_dir.$_POST['isbn10'].'.'.$extension_upload) && move_uploaded_file($_FILES["icone2"]["tmp_name"], $target_dir.$_POST['isbn10'].'-2.'.$extension_upload2)) {
            header("Location: index.php?Page=createbook&action=uploadok");
        } else {
            header("Location: index.php?Page=createbook&action=uploadnotok");
            //echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>