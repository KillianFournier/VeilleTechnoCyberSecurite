<?php

$sous_titre = "Faille SQL";

ob_start(); 
require('FailleSQL/config.php');


session_start();
if (isset($_POST['username'])){
  $username = ($_REQUEST['username']);
//$username = mysqli_real_escape_string($conn, $username);
  $password = ($_REQUEST['password']);
//$password = mysqli_real_escape_string($conn, $password);


  $query = "SELECT * FROM `users` WHERE username='$username' AND password='$password' ";

  $result = mysqli_query($conn,$query) or die(mysql_error());

  $rows = mysqli_num_rows($result);
   if($rows==1){
      $logged_in_user = mysqli_fetch_assoc($result);
      if($logged_in_user['user_type'] == 'admin'){

         $_SESSION['username'] = $username;
         header("Location: FailleSQL/admin.php");
      }else{

         $_SESSION['username'] =  $username;
         header("Location: FailleSQL/user.php");
      }
   }else{
      $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
   }
}


/*
session_start();
if(!empty($_SESSION['username'])) {
   header('location:plan.php');
}


if(isset($_POST['login'])) {

   $user = $_POST['username'];
   $pass = $_POST['password'];

   if(empty($user) || empty($pass)) {
      $message = 'All field are required';
   } else {
      $query = $conn->prepare("SELECT username, password FROM users WHERE 
      username=? AND password=? ");
      $query->execute(array($user,$pass));
      $row = $query->fetch(PDO::FETCH_BOTH);

      if($query->rowCount() > 0) {
         $_SESSION['username'] = $user;
         header('location:user.php');
      } else {
         $message = "Username/Password is wrong";
      }
   }
}
*/
?>

<!-- Le formulaire -->
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username"  class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password"  class = "box" /><br/><br />
                  <input type = "submit" name="login" value="Login"/><br />
               </form>
               <?php
                  if(isset($message)) {
                     echo $message;
                  }
               ?>
               
					
            </div>
				
         </div>
			
      </div>
<h4>Qu'est-ce que c'est ?</h4>
<div class=def>
<p class="flotte">
 <img src="http://veilletechnobts.fr/Contenu/images/sql.png" alt="sql" />
</p>
<br> <br> <br> <br> <br> <br> <br>  
<p> La faille SQLi, abréviation de SQL Injection, soit injection SQL en français, est un groupe de méthodes d'exploitation de faille de sécurité d'une application interagissant
 avec une base de données. Elle permet d'injecter dans la requête SQL en cours un morceau de requête non prévu par le système et pouvant en compromettre la sécurité.
 Lorsqu'on évoque l'injection SQL, on parle tout le temps de faille dans un site Web, mais il n'y a pas que les sites qui sont touchés par cette faille: n'importe quelle application dialoguant avec une base de données en utilisant des requêtes sur lesquelles l'utilisateur a une influence peut être vulnérable aux injections SQL.</p>
 </div class=def>
 <br> <br> <br> <br>
 <h4>Comment sécuriser la faille SQL ?</h4>
 <br>
 <p>La première solution consiste à échapper les caractères spéciaux contenus dans les chaînes de caractères entrées par l'utilisateur.En PHP on peut utiliser pour cela la fonction mysqli_real_escape_string</p>
 La seconde solution consiste à utiliser des requêtes préparées : dans ce cas, une compilation de la requête est réalisée avant d'y insérer les paramètres et de l'exécuter, ce qui empêche un éventuel code inséré dans les paramètres d'être interprété.
 De nombreux frameworks sont équipés d'un ORM qui se charge entre autres de préparer les requêtes.
 <br> <br> <br> <br>
 <h4>Une faille plus d'actualité </h4>
 <br>
 Selon Netcraft, il y aurait à ce jour plus de 500 millions de sites web sur la toile. La plupart de ces sites utilisent du contenu dynamique, c'est à dire qu'une partie de la page qu'on reçoit du serveur a été générée par un programme ou un script exécuté par le serveur lui même. Par exemple, environ 30% des sites utilisent PHP et 20% utilisent ASP. Bien souvent, ces scripts vont aller chercher (ou/et stocker) des informations dans une base de données (les informations de votre compte client, les articles proposés par le site marchand, les dernières "news" écrites, les messages qu'un autre membre vous a envoyés, etc.).
Pensez un instant à toutes les informations que vous confiez aux bases de données des sites que vous avez consultés ... Combien connaissent votre nom ? votre adresse ? votre numéro de téléphone ? votre numéro de carte bancaire ? et sans aller si loin, sur combien de sites avez-vous un compte (dont le login et le mot de passe sont bien évidemment stockés dans une base de données) ?
Le monde numérique d'aujourd'hui nous incite à laisser des traces un peu partout sur internet, et nombreuse sont les personnes qui ont une confiance aveugle en Internet et qui se disent que ces données très privées sont à l'abri des yeux indiscrets. La réalité est bien moins rose, à en croire cette statistique de White Hat Security (entreprise spécialisée dans la sécurité informatique) disant qu' un site sur cinq est vulnérable à l'injection SQL.
<br> <br> <br> <br>
 <h4>Injections Classique </h4>
 <br> 
 En utilisant une injection SQL, on peut se connecter à n'importe quel compte sans savoir son mot de passe. On peut par exemple taper « admin'#» en login, et « n'importe quoi » en mot de passe. On se connecte alors au compte admin.
 <br> <br> <br> <br>
 <h4>Injections à l'aveuglette </h4>
 <br>
 Les Blind injections (ou injections à l'aveuglette) sont utilisées lorsqu'une application est vulnérable à l'injection SQL mais que le résultat de l'injection n'est pas visible par l'attaquant.
C'est par exemple le cas pour tous les scripts à réponse binaire, comme les formulaires d'authentification: soit l'authentification a réussie, soit elle a échouée, mais dans tous les cas, aucune donnée de la base n'est affichée sur la page, ce qui complique évidemment l'exploitation de la faille.

La seule chose que l'on peut faire est donc d'injecter une évaluation, et de constater grâce à la réponse binaire de l'application si elle était vraie ou fausse.
Comme cette technique hasardeuse s'appuie sur des essais successifs, elle est souvent automatisée par des scripts.<br>
Pour trouver la longueur du mot de passe de admin on va rentré : "<b>admin' AND LENGTH(password)=2#</b>" dans le login. Si le mot de passe possède 2 caractères, vous aurez accès au compte de l'utilisateur admin.
<br>Ensuite, maintenant que nous savons combien de charactère est constitué le mot de passe,nous allons testé par force brute tous les charactère disponible pour découvrir le mot de passe.
<br> pour cela, on utilise "<b>admin' AND password LIKE 'e%'# </b>"
<br> <br> <br> <br>
 <h4>Cas réel </h4>
 <br>
 En 2010, la nasa a été victime d'une attaque SQL mais n'a pas voulu s'exprimé plus sur ce sujet.
</body>
</html>

<?php


$contenu = ob_get_clean();



require 'gabarit.php'; ?>

