<?php
    include('include/connect_db.php'); // connexion à la base de donnée
?>

<!DOCTYPE html>
<html>
<head>
<title>Connexion</title>
<link rel="stylesheet" href="styles/connexion-style.css" />
<link rel="icon" type="image/x-icon" href="img/logo-onglet.svg">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!-- header des pages -->
<?php include('include/header.php'); ?>


<main>
<section>
    <div class="left_block">
        <div class="Bienvenue">Bienvenue</div>
        <div class="chez">
            <div >chez</div>
                <img src="img/logo_black_letters.svg" class="accueil-logo">
            </div>
            <p>Conseil et expertise en Système d'information</p>
    </div>
    <div class="right_block">
        <form action="verif.php" method="POST">  
            <h2>Connexion</h2>
            <div class="input-container">
                <i class="fa fa-user icon"></i>
                <input class="input-field" type="text" placeholder="Nom d'utilisateur" name="login" >
            </div>
            <div class="input-container">
                <i class="fa fa-key icon"></i>
                <input class="input-field" type="password" placeholder="Mot de passe" name="password" >
            </div>
            <button type="submit" name="submit" class="button">Se connecter</button>
        </form>
        <?php
            if(isset($_GET['erreur'])){
                $err = $_GET['erreur'];
                if($err==1 || $err==2)
                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
            }              
        ?> 
    </div>
</section>
</main>

<!-- footer des pages -->
<?php include('include/footer.php'); ?>

</body>
</html>
