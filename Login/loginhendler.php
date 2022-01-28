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
    <h1>Hvala!</h1>
    <?php
    if (isset($_GET["name"]) && isset($_GET["email"]) && isset($_GET["pass"]) && isset($_GET["pass2"])) {
        $name = $_GET["name"];
        $email = $_GET["email"];
        $pass = $_GET["pass"];
        $pass2 = $_GET["pass2"];
        if ($pass == $pass2) {
            echo "<div style='margin-bottom:50px; margin-top: 50px'>Welcome!.</div>";
        } else {
            echo "<div style='margin-bottom:50px; margin-top: 50px'>Lozinke se ne poklapaju.</div>";
        }
    }




    ?>
</body>
<div class="futer">
    <?php include '../footer2/footer.php'; ?>
</div>

</html>