<h4>Qu'est-ce que c'est ?</h4></br>
Local File Include (LFI) est une faille de la fonction Php Include() permettant à l'attaquant de rediriger une page incluse afin de consulter d'autre pages du site normalement inaccessible. 
</br>La faille est possible via l'URL de type : http://site_cible/?page=index.php</br>
Il suffirait de rajouter le path d'un fichier local pour l'inclure dans la page, et donc sur le serveur. Suivant la demande faîte, l'attaquant a un contrôle quasi total sur le serveur. 

</br></br>Remote File Include (RFI) est une faille semblable à la faille LFI mais concerne les pages et les fichiers distants. Là où la faille LFI ne permet d'inclure seulement des fichiers en local présent sur le serveur, la faille RFI permet d'executer du code d'un serveur exterieur (le plus souvent du site de l'attaqaunt).</br>
</br><h4>Qu'est-il possible de faire avec cette faille ?</h4></br>
La faille Local File Include permet de récupérer des fichiers sensibles du serveur, en voici quelques exemples (nous parlerons que de fichier sous Linux) :</br></br>
    - /etc/passwd  </br>
    - /etc/group</br>
    - /etc/shadow</br>
    - /etc/resolv.conf</br>
    - /etc/fstab</br>
    - /etc/nsswitch.conf</br>
    - les fichiers apaches (configuration, logs, erreurs)</br>

</br>
Quant il s'agit de la faille Remote File Include, la faille permet souvent de placer un shell php sur le serveur afin de l’administrer à distance.

Des commandes peuvent donc être exécutées et d’une manière générale n’importe qui peut contrôler votre site web.
Il est bien sûr possible d’inclure n’importe quel autre fichier sur un tel serveur. </br>Il est donc possible d’effectuer beaucoup d’actions diverses et variées en exploitant cette faille :</br></br>
    - deface</br>
    - déni de services</br>

</br><h4>Comment sécuriser la faille LFI/RFI ?</h4></br>
L'attaque serait blocable depuis Apache2.x en modifiant les propriétés des pages incluses: </br></br>

    allow_url_fopen = On </br>
    allow_url_include = On</br></br>

Sinon, il suffit d’inclure les fichiers sans passer directement par une URL</br></br>
<h4>Petite vidéo</h4>
https://pentestschool.teachable.com/courses/hacking-ethique-cours-debutant/lectures/12334558