<?php
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=Patrimoire&Media;charset=utf8', 'root', 'root');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        // Vérification des identifiants
        $req = $bdd->prepare('SELECT * FROM collection');
        $req->execute();
        // On affiche chaque entrée une à une
        ?>


<!-- Page title -->
<section id="page-title" data-parallax-image="images/menu/2.png">
    <div class="container">
        <div class="breadcrumb">
                    <h3><i class="fa fa-arrow-circle-left"></i><a href="#" onclick="history.go(-1);" style="text-decoration:none"> Retour</a></h3>
                </div>
        <div class="page-title">
            <h1>Collection</h1>
            <span></span>
        </div>
    </div>
</section>
    <section>
  <div class="container"> 

    <!--Square colored icons-->
                <div class="hr-title hr-long center"><abbr>Liste des collections disponibles</abbr> </div>


    <?php 
                                    while ($donnees = $req->fetch()) {
                                    ?>
                                    <div class="row">
                                    <div class="col-md-6">
                                      <div class="icon-box effect medium square color">
                                      <div class="icon"> <?php echo '<a href="index.php?Page=showcollection&id='.$donnees['Id'].'"><i class="fa fa-book"></i></a>' ?> </div>
                                      <p>Collection :</p>
                                      <?php echo '<h3>'.$donnees['Nomcollection'].'</h3>' ?>
                                              </div>
      </div>
                                      <?php
                                      }
                                      $req->closeCursor();
                                      ?>    <!--End: Square colored icons-->

    </div>
            <div class="container">

                <!--Grid system -->
                <div class="grid-system-demo-live">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>NOS COLLECTIONS : <br><br>

Châteaux, Manoirs et Logis : ﻿en France, tous les départements regorgent de châteaux, manoirs et logis nobles, bâtis en grande majorité entre le XIVe et le XIXe siècle. Plusieurs centaines dans chaque département ! Tout le monde en connaît au moins un… mais personne ne les connaît tous. Ou plutôt ne les connaissait tous car c’est justement le but de cette collection de révéler un recensement tendant à l’exhaustivité de l’ensemble de ces bâtiments, classés par cantons, présentés par au moins une photo­graphie en couleurs, avec une notice historique et architecturale.
Chaque ouvrage est enrichi d’un glossaire, d’une bibliographie et d’une introduction générale.<br><br>

Châteaux et Demeures : ﻿Venez découvrir de nombreux châteaux au travers d’images d’ensemble, d’ambiance, de détails ou d’intérieurs, à chaque fois accompagnées d’un texte relatant l’histoire du bâtiment et décrivant l'architecture.<br><br>

Il y a 100 ans en cartes postales anciennes : ﻿les cartes postales anciennes présentées en couleurs dans ces ouvrages datent d’avant 1930. à cet époque, la France, était sillonnée par des photographes, véritables reporters qui ont gravé pour la postérité les mille et un visages du pays.
Ils nous offrent aujourd'hui un regard à la fois sensible et nostalgique de nombreuses villes et un irremplaçable témoignage de la vie d’autrefois.<br><br>

Richesses à découvrir :﻿ ces livres vous proposent deux parcours parallèles : celui du texte et celui de l’image. Chacun d’eux revendiquent leurs partis pris et leurs choix, et n’ont d’autre but que d’éveiller votre curiosité et vous donner envie d’en savoir plus. Les départements français regorgent de richesses, et il serait prétentieux de prétendre en dévoiler l’intégralité au travers d’un seul ouvrage. Il ne s’agit donc pas d’encyclopédies, pas même de guides. Juste une flânerie émaillée de quelques évocations, une façon de vous inviter à regarder par le trou de la serrure avant d’ouvrir grand la porte de ces richesses. L’Histoire, les paysages, le patrimoine bâti, les savoir-faire et les activités de chaque composante de chaque département sont seulement effleurés, afin que le lecteur trouve la place de son propre point de vue. Un livre pour donner envie, s’il en était besoin, de découvrir la beauté inépuisable des départements de France.<br><br>

Balades aériennes : ﻿qui n’a pas rêvé de prendre un jour un peu de hauteur ? Découvrir un département, perché sur un nuage, apercevoir ses châteaux, ses vallées, ses plages, ses villages... tels qu’on ne les a jamais vus. Rien que des images en très grand format, juste ce qu’il faut de commentaires pour bien comprendre et connaître ce que l’on découvre : de merveilleuses balades aériennes, rien que pour le plaisir !</div>
                    </div>
                </div>
             </div>

</section>