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
<!-- Header -->
<header id="header" class="header-fullwidth header-transparent dark">
    <div id="header-wrap">
        <div class="container">
            <!--Logo-->
            <div id="logo">
                <a href="index.html" class="logo" data-dark-logo="images/logo_1.png">
                    <img src="images/logo_1-dark.png" alt="P&M Logo">
                </a>
            </div>
            <!--End: Logo-->
            <!--Top Search Form-->
            <div id="top-search">
                <form action="search-results-page.html" method="get">
                    <input type="text" name="q" class="form-control" value="" placeholder="Commencer a écrire puis taper sur Entrer">
                </form>
            </div>
            <!--end: Top Search Form-->

            <!--Header Extras-->
            <!--
			<div class="header-extras">
                <ul>
                    <li>
                        <a id="top-search-trigger" href="#" class="toggle-item">
                            <i class="fa fa-search"></i>
                            <i class="fa fa-close"></i>
                        </a>
                    </li>
                </ul>
            </div>-->
            <!--end: Header Extras-->

            <!--Navigation Resposnive Trigger-->
            <div id="mainMenu-trigger">
                <button class="lines-button x"> <span class="lines"></span> </button>
            </div>
            <!--end: Navigation Resposnive Trigger-->

            <!--Navigation-->
            <div id="mainMenu" class="menu-lines">
                <div class="container">
                    <nav>
                        <ul>
                            <li class="dropdown"><a href="index.php">Accueil</a></li>
                            <li class="dropdown"> <a href="index.php?Page=news">Nouveautés</a>
                            <li class="dropdown"> <a href="index.php?Page=catalogue">Catalogue</a>
                            <li class="dropdown"> <a href="index.php?Page=collection">Collections</a>
                                <ul class="dropdown-menu">
                                <?php 
                                    while ($donnees = $req->fetch()) {
                                 ?>
                                    <li><?php echo '<a href="index.php?Page=showcollection&id='.$donnees['Id'].'">'.$donnees['Nomcollection'].'</a>' ?></li>
                                 <?php
                                      }
                                      $req->closeCursor();
                                  ?>    
                                </ul>
                            </li>
                            <li class="dropdown"> <a href="index.php?Page=quisommesnous">Qui sommes-nous ?</a>
                            <li class="dropdown"> <a href="index.php?Page=admin">Administration</a>
                        </ul>
                    </nav>
                </div>
            </div>
            <!--end: Navigation-->

        </div>
    </div>
</header>