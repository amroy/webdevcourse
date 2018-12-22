<?php
/**
 * Pour décider si un utilisateur existe ou non, il faut déjà avoir
 * une base de données des utilisateurs existants. Puisqu'on n'a pas
 * encore abordé les base de données mysal. On va seulement utiliser
 * un tableau des utilisateurs.
 */
$utilisateurs = [
    [ 'identifiant' => 'user1', 'password' => '1234' ],
    [ 'identifiant' => 'user2', 'password' => '1234' ],
    [ 'identifiant' => 'user3', 'password' => '1234' ]
];

/**
 * Récupération des données du formulaire
 */
$identifiant = $_POST['identifiant'];
$password    = $_POST['password'];

/**
 * Cette variable nous permet vers la fin du script de savoir
 * si l'utilisateur est connecté ou non.
 */
$logged_in = false;

/**
 * On parcours la liste des utilisateurs que nous avons deja
 * pour comparer les informations d'identification saisies par
 * l'utilisateur et celles que nous avons.
 */
for($i = 0; $i < count($utilisateurs); $i++)
{
    /**
     * On selectionne l'utilisateur courant. La variable $user est un tableau
     * associatif qui contient les infos suivantes : identifiant et mot de passe
     */
    $user = $utilisateurs[$i];
    if ($identifiant == $user['identifiant'] && $password == $user['password'])
    {
        /**
         * Notre utilisateur est trouvé. Meme identifiqnt et meme mot de passe, alors
         * on modifie la variable logged_in
         */
        $logged_in = true;

        /**
         * On arrete parce qu'on a trouvé l'utilisateur, alors pas la peine de
         * continuer la recherche.
         * Break permet d'arreter le parcours de la boucle
         */
        break;
    }
}

/**
 * Maintenant que nous avons parcourus notre liste des utilisateurs, on finis par deux cas possibles.
 * Soit aucun utilisateur n'est trouvé avec le même identifiant et mot de passe, dans ce cas la valeur
 * de la variable logged_in  reste false. Sinon, un utilisateur est trouvé et dans ce cas la variable
 * logged_in devient true.
 */
if ($logged_in == true) {
    header('location: ./index.php');
} else {
    header('location: ./login.php');
}

?>