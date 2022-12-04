<!--connexion à la base de donnée-->
<?php 
session_start();
include 'include/connect_db.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Inscription</title>
<link rel="stylesheet" href="styles/profile.css" />
<link rel="icon" type="image/x-icon" href="img/logo-onglet.svg">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!--header des pages-->
<?php include('include/header.php'); ?>
<main>
<section>









<?php 


//rappel des variable contenant les informations de l'utilisateur
if (isset($_SESSION["login"])) {

    $login = $_SESSION['login'];
    $password = $_SESSION['password'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];

    $catchInfos = $connect->query("SELECT login, prenom, nom, password FROM utilisateurs WHERE login = '$login'");
    $displayInfos = $catchInfos->fetch_all();

    if (isset($_POST['submit'])) {
        $newNom = ($_POST['newNom']);
        $newPrenom = ($_POST['newPrenom']);
        $newLogin = ($_POST['newLogin']);
        $newPassword = ($_POST['newPassword']);
        $newPassword2 = ($_POST['newPassword2']);
        
        if(($password == $password2) && ($newPassword == $newPassword2)){
            $upInfo = $connect->query("UPDATE utilisateurs SET nom ='$newNom', prenom ='$newPrenom',  login ='$newlogin', password = '$newPassword' WHERE login='$login'");
            echo "Les modifications ont bien été prises en compte";
            $_SESSION['login'] = $newlogin;
            $_SESSION['password'] = $newPassword;
            echo "NO ERREUR";
            
        } else{
            echo "ERREUR";
        }
    }
}


//Message de bienvenue
echo "<p> Bonjour <span id='user'>$login</span> </p>";





?>










































    <form action="" method="POST">
    <div class="container">
        <div class="bold register">Formulaire de modification de vos informations</div>
        <hr>
        <label for="nom" class="bold">Changer le nom</label>
        <input type="text" placeholder="Saisissez ici le nouveau nom ..." name="nom" id="surname" value="<?=$nom?>" required>

        <label for="prenom" class="bold">Changer le prénom</label>
        <input type="text" placeholder="Saisissez ici le nouveau prénom ..." name="prenom" id="name" value="<?=$prenom?>" required>

        <label for="login" class="bold">Changer le nom d'utilisateur</label>
        <input type="text" placeholder="Saissisez ici le nouveau nom d'utilisateur ..." name="login" id="login" value="<?=$login?>" required >

        <label for="password" class="bold">Ancien mot de passe</label>
        <input class="space" type="password" name ="oldpassword"  value="" placeholder="Entrez votre ancien mot de passe" >

        <label for="password" class="bold">Nouveau mot de passe</label>
        <input type="password" placeholder="Saissisez ici le nouveau mot de passe ..." name="password" id="psw" required  >

        <label for="password2" class="bold">Confirmer le nouveau mot de passe</label>
        <input type="password" placeholder="Confirmer ici le nouveau mot de passe ..." name="password2" id="psw-repeat" required  >
        <hr>

        <button type="submit" class="registerbtn">Enregistrer les modifications</button>
    </div>

</form>
</div>
</section>

</main>

<?php include('include/footer.php'); ?>

</body>
</html>