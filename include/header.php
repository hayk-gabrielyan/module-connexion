<link rel="stylesheet" href="styles/header-style.css" />
<!--header-->
<header>
    <div id="box1">
        <div id="logo-box">
            <a href=index.php><img src="img/logo_black_letters.svg" alt="logo"></a>
        </div>
    </div>
    <div id="box2">
    <!-- Si aucune Session n'est ouverte -->
    <?php if(!isset($_SESSION['login'])){ ?>
        <a href="index.php" class="active" href=index.html>Accueil</a>
        <a href="connexion.php"class="no_active" href="shazam.html" >Connexion</a>
        <a href="inscription.php"class="no_active" href="spotify.html" >Inscription</a>
    
        <!-- Sinon, si le login de la Session ouverte est "admin" -->
    <?php } elseif($_SESSION['login'] === "admin"){?>
                <a href="admin.php">Information Utilisateurs</a>
                <a href="deconnexion.php">Se déconnecter</a>

    <!-- Si une Session user est ouverte -->
        <?php } else{?>
            <a href="deconnexion.php">Se déconnecter</a>

        <?php } ?>
    </div>
</header>
<!--header end-->