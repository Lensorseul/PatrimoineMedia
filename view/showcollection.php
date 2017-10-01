<?php
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=patrimoire&media;charset=utf8', 'root', 'root');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                // Vérification des identifiants
                $req = $bdd->prepare('SELECT * FROM books inner join collection on books.Idcollection = collection.Id where Idcollection=:id');
                $req->bindParam("id", $id,PDO::PARAM_INT) ;
                $req->execute();
                $res = $req->fetchAll();
                ?>

<!-- Page title -->
<section id="page-title" data-parallax-image="images/menu/2.png">
    <div class="container">
    <div class="breadcrumb">
                    <h3><i class="fa fa-arrow-circle-left"></i><a href="#" onclick="history.go(-1);" style="text-decoration:none"> Retour</a></h3>
                </div>
        <div class="page-title">
            <h1>Collection spécifique</h1>
        </div>
    </div>
</section>
<!-- end: Page title -->


<section>
    <div class="container">
        <div class="row m-b-20">
        <div class="hr-title hr-long center">
<?php 
if(empty($res)){
  echo '<abbr>Collection incorrecte</abbr>';
}else{
    echo '<abbr>Catalogue complet pour la collection ' .$res[0]['Nomcollection']. '</abbr>';
}
?>
</div>
</div>
<div id="blog" class="grid-layout post-3-columns m-b-30" data-item="post-item">


            
        
<?php
    // On affiche chaque entrée une à une
        foreach ($res as $donnees) {
                ?>
        
<!-- Post item-->
                    <div class="post-item border">
                        <div class="post-item-wrap">
                            <div class="post-slider">
                                <div class="carousel dots-inside arrows-visible arrows-only" data-items="1" data-loop="true" data-autoplay="true" data-lightbox="gallery">
                                        <?php echo '<a href="images/books/'.$donnees['ISBN10'].'/'.$donnees['ISBN10'].'.'.$donnees['Format'].'" data-lightbox="gallery-item">' ?>
                                        <?php echo '<img alt="Shop product image!" class="img-responsive img-rounded" alt="" src="images/books/'.$donnees['ISBN10'].'/'.$donnees['ISBN10'].'.'.$donnees['Format'].'"></a>' ?>
                                    
                                    <?php echo '<a href="images/books/'.$donnees['ISBN10'].'/'.$donnees['ISBN10'].'-2.'.$donnees['Format2'].'" data-lightbox="gallery-item">' ?>
                                        <?php echo '<img alt="Shop product image!" class="img-responsive img-rounded" alt="" src="images/books/'.$donnees['ISBN10'].'/'.$donnees['ISBN10'].'-2.'.$donnees['Format2'].'"></a>' ?>
                                    
                                </div>
                            </div>

                            <div class="post-item-description">
                            <h2><?php echo '<a href="index.php?Page=showbook&id='.$donnees['ISBN10'].'">'.$donnees['Titre'] ."</a>"?></h2>
                                <p>Auteurs : <?php echo $donnees['Auteurs']; ?></p>
                                <p>Collection : <?php echo $donnees['Nomcollection']; ?></p>

                                <?php echo '<a class="item-link" href="index.php?Page=showbook&id='.$donnees['ISBN10'].'">Voir <i class="fa fa-arrow-right"></i></a>'?>

                            </div>
                        </div>
                    </div>
                    <!-- end: Post item-->
            


<?php
        }

        $req->closeCursor(); // Termine le traitement de la requête
        ?>

            </div>
            <hr>

        </div>






    </div>
</section>
<!-- end: Shop products -->
<?php 

}
?>