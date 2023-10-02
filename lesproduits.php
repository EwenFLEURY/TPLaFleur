<?php
    include 'header.php' ;
    require_once 'menu.php' ;

    if (isset($_GET['cat'])) {
        $lib=$_GET['lib'];
        $produits = getProduits($_GET['cat']);
        }
    else {
        $lib=" Toutes";
        $produits = getTousProduits();
        }
?>
    <main class="page">
        <h3>Catégorie :  <?= $lib ; ?></h3>
        <div class="cards">
        <?php
            foreach ($produits as $ligne):  
                $img = $ligne['pdt_image'] ; 
                $src = "assets/images/$img.jpg";
                $nom = $ligne['pdt_designation'] ;
                ?>
                <div class="item">
                    <img src="<?= $src ; ?>" >
                    <p> <?= $nom ; ?></p>
                </div>
            <?php
            endforeach ;
          ?>
          </div>
    </main>
    <?php
        include 'piedpage.php' ;
    ?>