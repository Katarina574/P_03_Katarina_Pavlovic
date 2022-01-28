<?php 
session_start();

unset($_COOKIE['user']);
setcookie('user','',time()-3600);

session_destroy();
?>

Uspesno ste se izlogovali. Kliknite <a href='./login.php'>ovde</a> da bi ste se ulogovali.