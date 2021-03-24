<?php
session_start();
session_destroy();
header('Location: https://www.veilletechnobts.fr/Vue/vueFailleSQL.php');
?>