<?php
    session_start();
    include('include/connect_db.php');

    if (isset($_POST['login']) && isset($_POST['password'])) {//On verifie ici si l'utilisateur a rentré des informations
       //Nous allons mettres le login et le mot de passe dans des variables
        $login = $_POST['login']; 
        $password = $_POST['password'];
      //Nous allons verifier si les informations entrée sont correctes
        if($login !== "" && $password !== ""){
            //requete pour selectionner  l'utilisateur qui a pour login et mot de passe les identifiants qui ont été entrées
            $requete = "SELECT count(*) FROM utilisateurs where 
                    login = '".$login."'";// and password = '".$password."' ";
            $exec_requete = $connect -> query($requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(*)'];

            if($count!=0){ // nom d'utilisateur correct
                $requete = "SELECT password FROM utilisateurs where login = '".$login."'";
                $exec_requete = $connect -> query($requete);
                $reponse      = mysqli_fetch_array($exec_requete);
                $password_hash = $reponse['password'];
                if (password_verify($password, $password_hash)) { //mot de passe correct
                    // stockage des infos de l'utilisateur dans des variables session
                    $requete = "SELECT login, password FROM utilisateurs where login = '".$login."'";
                    $exec_requete = $connect -> query($requete);
                    $reponse = mysqli_fetch_array($exec_requete);
                    $_SESSION['login'] = $login;
                    $_SESSION['password'] = $reponse['password'];
                    header('Location: user.php');
                }
                else{
                    header('Location: connexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
                }
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