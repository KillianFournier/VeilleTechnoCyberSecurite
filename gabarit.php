<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!doctype html>
<html lang="fr">
<link rel="icon" type="image/png" href="/Contenu/images/logo.png" />
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="/Contenu/style.css"/>
    <title>Veille Technologique</title>   <!-- Élément spécifique -->
  </head>
    <div id="global">
      <header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="vuePresentation.php">Veille Technologique</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="vuePresentation.php">Présentation</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="vueFailleSQL.php">Faille SQL</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="vueLFI.php?fichier=">Faille RFI/LFI</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="vueFailleXSS.php">
          Faille XSS
        </a>
      </li>
    </ul>
  </div>
</nav>


<body>


        <p><h2><?php echo $sous_titre; ?></h2></p>
      </header>
      <div id="contenu">
        <?= $contenu ?>   <!-- Élément spécifique -->
      </div>
      <footer id="piedBlog">
        Site réalisé par Thomas Adriao et Killian Fournier.
      </footer>
    </div> <!-- #global -->
  </body>
</html>
