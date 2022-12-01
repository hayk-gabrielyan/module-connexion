<?php
session_start();

if(isset($_POST['submit']))
{
    if(!empty($_POST))
    {
        $login = $_POST['login'];
        $password= $_POST['password'];
        $bd = mysqli_connect("localhost","root","","moduleconnexion");
        $requete = mysqli_query($bd, "SELECT login, password FROM `utilisateurs` WHERE login='$login' ");

        //on va utiliser num_rows pour verifier que l'utilisateur existe
        $resultat = mysqli_num_rows($requete);

        //on fait un fetch row pour recup la ligne
        $resultat2 = mysqli_fetch_row($requete);

        //Decryptage du password
        $verify = password_verify($password, $resultat2[1]);
    }

    //si verify existe
    if($verify==true)
    {
        if($resultat2[0]=='admin') //on verifie seulement le login puisque le password à deja été verifié
        {
            // session_start();
            $_SESSION['admin'] = 'admin';
            header('location: admin.php');
            exit();
        }

        if($resultat==1);
        {
            // session_start();
            $_SESSION['connexion'] =  $login ;
            header('location: profil.php');
            exit();
        }
    }
}

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

<?php include('include/header.php'); ?>

<main>
<section>
    <div class="left_block">
        <div class="Bienvenue">Binevenue</div>
            <div class="chez">
                <div >chez</div>
                <img src="img/logo_black_letters.svg" class="accueil-logo">
            </div>
            <p>Conseil et expertise en Système d'information</p>
</div>
    <div class="right_block">
        <form action="" method="POST">  
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
</div>
</section>

</main>

<?php include('include/footer.php'); ?>

</body>
</html>
