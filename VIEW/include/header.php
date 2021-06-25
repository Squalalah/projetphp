<link rel="stylesheet" href="../asset/css/header.css">

<header>
<nav>
  <div class="topnav">
    <a class="active" href="index.php">Accueil</a>
    <a href="listeProduits.php">Produits</a>
    <?php if(isset($_SESSION['panier'])) {
        echo '<a href="detailPanier.php">Panier</a><?php } ?>';
    } ?>
  </div>
</nav>
</header>
