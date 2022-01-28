<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./kreiraj.css">
    <link rel="stylesheet" href="./forma.css">
    <link rel="stylesheet" href="../navigacija2/nav.css">
    <link rel="stylesheet" href="../footer2/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Style+Script&display=swap" rel="stylesheet">
</head>

<body>
    <div class="navigacija">
        <?php include '../Navigacija2/nav.php'; ?>
    </div>
    <div class="hero container">
        <div class="kreiraj">
            <form action="./kreiraj.php" action="../Korpa/korpa.php" method="GET">
                <select class="input" name="boja">
                    <Option selected disabled>Odaberi boju:</Option>
                    <option value="pink" name="pink">Pink <img src="../slike/cestitka.png" alt=""></option>
                    <option value="plava" name="plava">Nezno plava</option>
                    <option value="breskva" name="breskva">Breskva</option>
                </select>

                <select class="input" name="dezen">
                    <Option selected disabled>Odaberi dezen:</Option>
                    <option value="zvezdice" name="zvezdice">Zvezdice<img src="../slike/cestitka.png" alt=""></option>
                    <option value="srca" name="srca">Srca</option>
                </select>

                <input class="input" type="text" name="ime" placeholder="Unesi ime ili tekst..." require>

                <input type="submit" class="submit" value="Primeni">

            </form>
        </div>
    </div>

    <?php
    $proizvodi = [];
    if (isset($_GET["boja"]) && isset($_GET["dezen"]) && isset($_GET["ime"])) {
        $boja = $_GET["boja"];
        $dezen = $_GET["dezen"];
        $ime = $_GET["ime"];
        if ($boja == "plava" && $dezen == "zvezdice") {
            $putanja = "../slike/p-zvezdice.png";
        } elseif ($boja == "pink" && $dezen == "zvezdice") {
            $putanja = "../slike/r-zvezdice.png";
        } elseif ($boja == "breskva" && $dezen == "zvezdice") {
            $putanja = "../slike/b-zvezdice.png";
        } elseif ($boja == "pink" && $dezen == "srca") {
            $putanja = "../slike/r-srca.png";
        } elseif ($boja == "breskva" && $dezen == "srca") {
            $putanja = "../slike/b-srca.png";
        } elseif ($boja == "plava" && $dezen == "srca") {
            $putanja = "../slike/p-srca.png";
        } else $putanja = "../slike/cest-prazna.png";
    } else {
        $putanja = "../slike/cest-prazna.png";
        echo "<div class='container'>Unesite sve parametre.</div>";
        $ime = "Vaše ime ili tekst biće ispisan ovde.";
    }
    ?>

    <div class="kreacija"><img class="cestitkanapravljena" src=<?php echo $putanja ?> alt="">
        <div class="tekst">
            <p><?php echo $ime ?></p>
        </div>
    </div>
    <div class="dodajukorpu">
        <form action="../login/login.php">
            <input type="submit" class="submit" name="submit" value="Naruči">
    </div>
    </form>

    <div class="futer">
        <?php include '../footer2/footer.php'; ?>
    </div>





</body>

</html>