<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./kontakt.css">
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
    if (isset($_GET["name"]) && isset($_GET["email"]) && isset($_GET["text"])) {
        $name = $_GET["name"];
        $email = $_GET["email"];
        $text = $_GET["text"];
        echo "<div style='margin-bottom:50px; margin-top: 50px'>Hvala na kontaktiranju, $name. Potrudicu se da na tvoju poruku: ' $text ' odgovorim u najkracem roku.</div>";
    } else echo "nisss";
    ?>
</body>


</html>