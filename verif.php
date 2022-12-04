<?php
    session_start();

    if (isset($_POST['login']) && isset($_POST['password'])) {
        // Connexion à la base de données
        include 'include/connect_db.php';

        // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
        // pour éliminer toute attaque de type injection SQL et XSS
        $login = mysqli_real_escape_string($connect, htmlspecialchars($_POST['login'])); 
        $password = mysqli_real_escape_string($connect, htmlspecialchars($_POST['password']));
        $password = password_hash($password, PASSWORD_BCRYPT);

        if($login !== "" && $password !== ""){
            //$requete = "SELECT count(*) FROM utilisateurs WHERE login = '" . $login . "' AND password = '".$password."' ";
            $requete = "SELECT count(*) FROM `utilisateurs` WHERE `login`='". $login ."' AND `password` = '" . $password . "'";
            $reponse = $connect->query($requete);
            $count = mysqli_num_rows($reponse);

            if($count != 0) { // nom d'utilisateur correct
                $requete = "SELECT password FROM utilisateurs where login = '".$login."'";
                $exec_requete = $connect -> query($requete);
                $reponse      = mysqli_fetch_array($exec_requete);
                $password_hash = $reponse['password'];
                
                // stockage des infos de l'utilisateur dans des variables session
                $requete = "SELECT login, prenom, nom, password FROM utilisateurs where login = '".$login."'";
                $exec_requete = $connect -> query($requete);
                $reponse      = mysqli_fetch_array($exec_requete);
                $_SESSION['login'] = $login;
                $_SESSION['prenom'] = $reponse['prenom'];
                $_SESSION['nom'] = $reponse['nom'];
                $_SESSION['password'] = $reponse['password'];
                // variable de protection
                $_SESSION['loginOK'] = true;
                header('Location: user.php');
                
            }
            else{
                header('Location: connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
            }
        }
        else{
            header('Location: connexion.php?erreur=2'); // utilisateur ou mot de passe vide
        }
    }
    else{
        header('Location: connexion.php');
    }
    mysqli_close($connect); // fermer la connexion




    