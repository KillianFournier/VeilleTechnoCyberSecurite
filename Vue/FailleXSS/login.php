<?php
ob_start();
$sous_titre = "Login";
?>
<?php
require("config.php");
if(isset($_POST["pseudo"])){
    $req = $bdd->prepare('SELECT pseudo, mdp FROM register WHERE pseudo=? AND mdp=?');
    $req->execute(array($_POST['pseudo'], $_POST['mdp']));
    $row = $req->fetch(PDO::FETCH_ASSOC);

    if($row > 0){
        $_SESSION['pseudo'] = $_POST['pseudo'];
    }else{
        echo("Pas d'utilisateur trouvé. <br/><br/>");
        echo("<b>Votre IP est conservée et sera retournée à l'hebergeur.</b>");
    }
}

?>

<style>
    form
    {
        text-align:center;
    }
    </style>

    
    <form method="post" name="login">
        <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" required /><br />
        <label for="mdp">Mot de passe</label> :  <input type="password" name="mdp" id="mdp" required /><br />

        <input class ="btn btn-primary" type="submit" value="Envoyer" />
	</p>
    </form>

<?php
if(isset($_SESSION["pseudo"])){
    echo("Bonjour " . $_POST["pseudo"]);
    echo "<script type='text/javascript'>document.location.replace('FalleXSS/indexXSS.php');</script>";
}
?>
<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>