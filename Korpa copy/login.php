<?php
include_once('./initdb.php');
session_start();


//ako korisnik vec postoji u sesiji
if(isset($_SESSION['user'])) {
    header('Location: ./index.php');
}

//ako korisnik vec postoji u cookies
if(isset($_COOKIE['user'])) {
    $_SESSION['user'] = $_COOKIE['user'];
    header('Location: ./index.php');
}

//ako se korisnik upravo ulogovao
if(isset($_POST['user']) && isset($_POST['pass'])) {
    if($connection->proveriKorisnika($_POST['user'],$_POST['pass'])) {
        //ako je checkiran keep me logged in
        if(isset($_POST['keep'])) {
            setcookie("user",$_POST['user'],time()+60*60*24);
        }
        $_SESSION['user'] = $_POST['user'];
        header('Location: ./index.php');
    }
    $greska = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../navigacija2/nav.css">
    <link rel="stylesheet" href="./login.css">
    <link rel="stylesheet" href="../footer2/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Style+Script&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="navigacija">
        <?php include '../Navigacija2/nav.php'; ?>
    </div>
    <form method="POST" action="./login.php">
        <label for="user" >Username: </label>
        <input class="userr" type="email" id="user" name="user" />
        <br>
        <label for="pass" >Password: </label>
        <input type="password" id="pass" name="pass" />
        <br>
        <label for="keep" >Keep me logged in: </label>
        <input type="checkbox" name="keep" id="keep" /> 
        <br> 
        <input type="submit" class="sbmt" value="Login" />
    </form>
    <?php if(isset($greska) && $greska) :?>
        <div id='greska'>Pogrešan unos. Proveri lozinku ili korisničko ime.</div>
    <?php endif; ?>
    <div class=futer>
        <?php include '../footer2/footer.php'; ?>
    </div>
</body>
</html>