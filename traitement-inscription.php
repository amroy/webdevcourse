<?php
/**
 * Lorsqu'on utilise des sessions dans un script PHP, il faut appeler d'abord
 * la fonction session_start() qui permet de demarer une session. Pendant cette
 * operation de demarrage de session, PHP attribut un identifiant unique a la session
 * et envoir cet identifiant au navigateur du client sous forme de cookie.
 * Il est tres important de mettre cette fonction AU DEBUT DU SCRIPT, pour s'assurer
 * que rien n'a était envoyé au serveur avant cette ligne, autrement dit, il faut appeler
 * la fonction session_start avant tout autre code HTML et avant de faire echo.
 * 
 * Veuillez consulter le manuel officiel pour plus d'infos :
 * http://php.net/manual/fr/function.session-start.php
 */
session_start();

/**
 * Récupération des informations saisies par l'utilisateur à partir
 * du formulaire. Puisque le formulaire est de type POST, on récupère
 * les données à partir du tableau associatif $_POST
 * 
 * Pour plus d'infos :
 * http://php.net/manual/fr/reserved.variables.post.php
 */
$nom         = $_POST['nom'];
$prenom      = $_POST['prenom'];
$email       = $_POST['email'];
$identifiant = $_POST['identifiant'];
$password    = $_POST['password'];

/**
 * Pour sauvegarder les informations du nouvel utilisateur, on gardre les
 * données dans une session.
 * 
 * Pour plus d'infos :
 * http://php.net/manual/fr/reserved.variables.session.php
 */
$_SESSION['nom'] = $nom;
$_SESSION['prenom'] = $prenom;
$_SESSION['email'] = $email;
$_SESSION['identifiant'] = $identifiant;
$_SESSION['password'] = $password;

/**
 * Il faut rediriger l'utilisateur vers la page de login.
 * Cette redirection est réalisée grace au changement des headers de la réponse.
 * Pour changer le header de la réponse, on utilise la fonction header de PHP.
 * Cette fonction prends en paramètre la chaine de caractère du header.
 * Ici nous donnons la chaine de caractères suivante : "location: ./login.php"
 * qui signifie que nous allons rediriger l'utilisateur au script login.php
 * 
 * Pour plus d'infos :
 * http://php.net/manual/fr/function.header.php
 */
header('location: ./login.php');