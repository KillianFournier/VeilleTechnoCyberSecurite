<?php
ob_start();
$sous_titre = "Faille XSS";
?>
<?php
session_start();
require("FailleXSS/config.php");
if(isset($_POST["nom"])){
    $req = $bdd->prepare('INSERT INTO register (pseudo, mdp)
    VALUES (?, ?)'); 
    $req->execute(array($_POST['nom'], $_POST['pass']));
}

if(isset($_POST["pseudo"])){
    $req = $bdd->prepare('SELECT pseudo, mdp FROM register WHERE pseudo=? AND mdp=?');
    $req->execute(array($_POST['pseudo'], $_POST['mdp']));
    $row = $req->fetch(PDO::FETCH_ASSOC);

    if($row > 0){
        $_SESSION['mdp'] = $_POST['mdp'];
        $_SESSION['pseudo'] = $_POST['pseudo'];
    }else{
        echo("Pas d'utilisateur trouvé. <br/><br/>");
        echo("<b>Votre IP est conservée et sera retournée à l'hebergeur.</b>");
    }
}

?>

<style>
    form, p
    {
        text-align:center;
    }
    </style>
    <p><h3>Enregistrer</h3></p>
    <form class="xss" method="post" name="register">
    <div class="form-group">
        <p>
        <label for="nom">Pseudo</label> : <input class="form-control" type="text" name="nom" id="nom" required /><br />
        <label for="pass">Mot de passe</label> :  <input class="form-control" type="password" name="pass" id="pass" required /><br />
    </div>
        <input class ="btn btn-primary" type="submit" value="Envoyer" />
	</p>
    </form>
    <p><h3>Se connecter</h3></p>
    <form class="xss" method="post" name="login">
        <p>
        <label for="pseudo">Pseudo</label> : <input class="form-control" type="text" name="pseudo" id="pseudo" required /><br />
        <label for="mdp">Mot de passe</label> :  <input class="form-control" type="password" name="mdp" id="mdp" required /><br />

        <input class ="btn btn-primary" type="submit" value="Envoyer" />
	</p>
    </form>

<h4>Qu'est-ce que c'est ?</h4></br></br>
Le Cross-Site Scripting (abrégé XSS) est un type de faille de sécurité des sites web permettant d'injecter du contenu dans une page, provoquant ainsi des actions sur les navigateurs web visitant la page. 
</br>Cette faille est dû au fait que le serveur interprete les caractères spéciaux dans les formulaires.</br></br>
Il existe plusieur type de faille XSS, mais les plus connus/fréquentes sont la Reflected Cross-Site Scripting et la Stored Cross-Site Scripting.</br></br>
Reflected Cross-Site Scripting : Permet d'apporter des modification seueleuement sur le navigateur web. Afin de piéger un utilisateur (ou le Webmaster), il est obligatoire que ce dernier clic sur notre lien du site (Social Engineering) car la modification n'est pas permanente.</br></br>
Stored Cross-Site Scripting : Permet d'apporter des modifications qui seront concervées dans la base de donnée du site. Tous les visiteurs de la page attaquée executera alors la modification apportée sur la page.</br></br>
Le cross-site scripting est abrégé XSS pour ne pas être confondu avec le CSS (feuilles de style), X se lisant « cross » (croix) en anglais.
</br></br><h4>Qu'est-il possible de faire avec cette faille ?</h4></br></br>
L'exploitation d'une faille de type XSS permettrait à un intrus de réaliser les opérations suivantes :

<br>- Un hameçonnage de cookies avec une redirection (parfois de manière transparente) de l'utilisateur.
<br>- Actions sur le site cible à l'insu de la victime et sous son identité (envoi de messages, suppression de données…)
<br>- Rendre la lecture d'une page difficile (boucle infinie d'alertes par exemple).</br></br>
A noter que l'utilisation principale de la faille XSS est la récupération de cookie du Webmaster afin d'accéder à la partie administration du site.
</br></br><h4>Comment sécuriser la faille XSS ?</h4></br></br>
utiliser la fonction htmlspecialchars()​ qui filtre les '<' et '>'</p>
utiliser la fonction htmlentities()​ qui est identique à htmlspecialchars()​ sauf qu'elle filtre tous les caractères.
</br></br><h4>Des exemples où la faille a été exploitée</h4></br></br>
Discord
<?php
if(isset($_SESSION["pseudo"])){
    header("Location: indexXSS.php");
}
?>
<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>