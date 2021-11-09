<?php
ob_start();
$sous_titre = "Présentation";
?>

<h4>Qui sommes-nous ?</h4>
Nous sommes des étudiants en dernnière année de BTS Services Informatiques aux Organisations. 
Nous sommes sensibilisés par la cybersécurité. Nous voudrions continuer nos études dans ce domaine. 
<br><br><br><br><br>
<h4>A quoi sert ce site ?</h4>
L'une de nos épreuves de BTS est la veille technologique. Dans cette épreuve nous devons nous intéresser à 
une technologie liée à notre BTS, plus globalement à l'informatique. Pour notre veille technologique nous avons 
décidés de travailler sur les failles de sécurité du web. Nous avons choisis trois failles connues et répendues à travers la toile.
Nous avons montés un site (qui est celui-ci) où nous avons simulé des cas proches de ce qu'on pourrait trouver sur des sites communs.
A travers ces cas, nous allons démontré et exploité les failles que nous voulons présenter lors de notre examen.

Ce site à pour but d'informer et de sensibiliser aux risques présent sur le web. Ce projet nous porte à coeur, et nous 
sommes prêt à faire évoluer ce site afin d'éduquer.  
<br><br><br><br><br>
<h4>Qu'est-ce qu'une Faille</h4>
Dans le domaine de la sécurité informatique, une vulnérabilité ou faille est une faiblesse dans un système informatique permettant à un attaquant de porter atteinte à l'intégrité de ce système, c'est-à-dire à son fonctionnement normal, à la confidentialité ou à l'intégrité des données qu'il contient.

Ces vulnérabilités sont la conséquence de faiblesses dans la conception, la mise en œuvre ou l'utilisation d'un composant matériel ou logiciel du système, mais il s'agit souvent d'anomalies logicielles liées à des erreurs de programmation ou à de mauvaises pratiques. Ces dysfonctionnements logiciels sont en général corrigés à mesure de leurs découvertes, mais l'utilisateur reste exposé à une éventuelle exploitation tant que le correctif (temporaire ou définitif) n'est pas publié et installé. C'est pourquoi il est important de maintenir les logiciels à jour avec les correctifs fournis par les éditeurs de logiciels. La procédure d'exploitation d'une vulnérabilité logicielle est appelée exploit.
<br><br><br><br><br>
<h4>D'autres failles qu'on aurait pu faire</h4>
<br>
La faille upload : <br>
Cette faille peut apparaître lors de l’upload de fichiers sur un site : photo de profil, document pdf, image dans un message, etc. Elle profite de l’action effectuée pour mettre en ligne des fichiers malveillants PHP qui vont permettre au « hacker » de prendre le contrôle total de notre site.

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>