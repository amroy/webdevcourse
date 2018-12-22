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

    if (isset($_SESSION['logged_in'])) {
        $logged_in = true;
        $identifiant = $_SESSION['identifiant'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login :: Cours PHP/HTML/CSS/Javascript</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <!-- Element de navigation -->
    <nav>
        <img src="./img/logo.png" height="70px">
        <ul class="menu">
            <li id="element-menu"><a href="./index.php">Acueil</a></li>
            <li><a href="./a-propos.php">A propos</a></li>
            <li><a class="bouton-login" href="./login.html">Connexion</a></li>
        </ul>
    </nav>

    <?php if($logged_in == false): ?>
    <form id="formulaire-login" class="formulaire-login" 
        action="traitement-login.php" 
        style="text-align: center;" method="POST">
        
        <div class="form-group">
            <label class="control-label">Identifiant</label>
            <input type="text" name="identifiant" class="form-control">
        </div>
        
        <div class="form-group">
            <label class="control-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <input type="submit" value="Login">
        </div>
        
    </form>
    <?php endif; ?>
</body>
</html>
