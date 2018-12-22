<?php
    /**
     * Lorsqu'on utilise des sessions dans un script PHP, il faut appeler d'abord
     * la fonction session_start() qui permet de demarer une session. Pendant cette
     * operation de demarrage de session, PHP attribut un identifiant unique a la session
     * et envoir cet identifiant au navigateur du client sous forme de cookie.
     * Il est tres important de mettre cette fonction AU DEBUT DU SCRIPT, pour s'assurer
     * que rien n'a était envoyé au serveur avant cette ligne, autrement dit, il faut appeler
     * la fonction session_start avant tout autre code HTML et avant de faire echo.
     */
    session_start();
    $logged_in = false;
    $identifiant = '';

    /**
     * Normalement si un utilisateur est connecté, pas la peine de lui afficher un formulaire
     * d'inscription. Alors on vérifie si note utilisateur est déjà connecté grace à la valeur
     * "logged_in" qui deverait être présente parmi les données de la session. Si l'utilisateur est
     * connecté, dans ce cas la valeur de la session existe et égale à true. Sinon, elle n'existe pas
     * ou bien elle est égale à false.
     */
    if (isset($_SESSION['logged_in'])) {
        /**
         * Si l'utilisateur est connecté, il faut le rediriger vers une page membre ou simplement
         * vers la page d'accueil index.php
         * Cette redirection est réalisée grace au changement des headers de la réponse.
         * Pour changer le header de la réponse, on utilise la fonction header de PHP.
         * Cette fonction prends en paramètre la chaine de caractère du header.
         */
        header('location: index.php');
    }

    /**
     * Sinon, PHP continue l'execution de la page.
     */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inscription :: Cours PHP/HTML/CSS/Javascript</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <!-- Element de navigation -->
    <nav>
        <img src="./img/logo.png" width="200px">
        <ul class="menu">
            <li id="element-menu"><a href="#">Acueil</a></li>
            <li><a href="#">A propos</a></li>
            <li><a class="bouton-login" href="./login.php">Connexion</a></li>
            <li><a href="./inscription.php">Inscription</a></li>
        </ul>
    </nav>

    <form action="traitement-inscription.php" method="post">
        <div class="form-group">
            <label>Nom</label>
            <input type="text" name="nom" > 
        </div>

        <div class="form-group">
            <label>Prenom</label>
            <input type="text" name="prenom">
        </div>

        <div class="form-group">
            <label>Identifiant</label>
            <input type="text" name="identifiant">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password">
        </div>

        <div class="form-group">
            <input type="submit" value="Valider mon inscription">
        </div>

    </form>
</body>
</html>
