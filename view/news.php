<!-- Page title -->
<section id="page-title" data-parallax-image="images/menu/2.png">
    <div class="container">
        <div class="breadcrumb">
                    <h3><i class="fa fa-arrow-circle-left"></i><a href="#" onclick="history.go(-1);" style="text-decoration:none"> Retour</a></h3>
                </div>
        <div class="page-title">
            <h1>A la une</h1>
        </div>
    </div>
</section>
<!-- end: Page title -->


<section>
    <div class="container">
<div class="row m-b-20">
            <div class="hr-title hr-long center"><abbr>Liste des nouveautés</abbr> </div>
        </div>
    

        <?php
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=patrimoire&media;charset=utf8', 'root', 'root');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
// Vérification des identifiants
        $val="oui";
        $req = $bdd->prepare('SELECT * FROM books inner join collection on books.Idcollection = collection.Id where News=:val');
        $req->bindParam("val", $val,PDO::PARAM_INT) ;
        $req->execute();


// On affiche chaque entrée une à une
        $a = 0;
        while ($donnees = $req->fetch()) {
            if ($a == 1) {
                ?>
                <section class="p-b-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 text-right">
                                <h1 class="heading-jumbo"><?php echo $donnees['Titre']; ?></h1>
                                <p class="lead">Auteurs : <?php echo $donnees['Auteurs']; ?></p>
                                <p class="lead">Collection :<?php echo $donnees['Nomcollection']; ?></p>
                                <?php echo '<a class="btn" href="index.php?Page=showbook&id='.$donnees['ISBN10'].'">Voir <i class="fa fa-arrow-right"></i></a></div>'?>
                            <div class="col-md-5"> <?php echo '<img class="img-responsive img-rounded" alt="" src="images/books/'.$donnees['ISBN10'].'/'.$donnees['ISBN10'].'.'.$donnees['Format'].'">' ?> </div>
                        </div>
                    </div>
                </section>
            <?php 
            $a=0;
            } else { ?>
                <section class="p-b-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5"> <?php echo '<img class="img-responsive img-rounded" alt="" src="images/books/'.$donnees['ISBN10'].'/'.$donnees['ISBN10'].'.'.$donnees['Format'].'">' ?></div>
                            <div class="col-md-7">
                                <h1 class="heading-jumbo"><?php echo $donnees['Titre']; ?></h1>
                                <p class="lead">Auteurs : <?php echo $donnees['Auteurs']; ?></p>
                                <p class="lead">Collection :<?php echo $donnees['Nomcollection']; ?></p>
                                <?php echo '<a class="btn" href="index.php?Page=showbook&id='.$donnees['ISBN10'].'">Voir <i class="fa fa-arrow-right"></i></a></div>'?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php $a=1;}
            ?>

            <?php
        }

        $req->closeCursor(); // Termine le traitement de la requête
        ?>


        
    </div>
</section>
<!-- end: Content -->
