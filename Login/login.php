<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./login.css">
    <link rel="stylesheet" href="../footer2/footer.css">
    <link rel="stylesheet" href="../navigacija2/nav.css">
    <link href="https://fonts.googleapis.com/css2?family=Style+Script&display=swap" rel="stylesheet">
</head>

<body>
    <div class="navigacija">
        <?php include '../Navigacija2/nav.php'; ?>
    </div>
    <h1>Potrebno je ulogovati se za naručivanje.</h1>
    <div class="kontakt">
        <form action="./loginhendler.php" method="GET">
            <input type="text" name="name" placeholder="Unesi ime" required>
            <input type="text" name="email" placeholder="Unesi email adresu" required>
            <input type="password" name="pass" class="pass" placeholder="Unesi sifru" required>
            <input type="password" name="pass2" class="pass2" placeholder="Potvrdi sifru" required>
            <input type="submit" placeholder="Kontaktiraj me" class="sbmt">
        </form>
    </div>
</body>
<div class="futer">
    <?php include '../footer2/footer.php'; ?>
</div>

</html>