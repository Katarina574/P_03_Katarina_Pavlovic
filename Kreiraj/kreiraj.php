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
    <link rel="stylesheet" href="./index.css">
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
   <button class='button' type='button'onclick="naruci('Po kreaciji')" >Naruči</button>
   <div class="container">
   <div class="zavrsetaknarucivanja">
    <div><a href="./prikaz.php">Prikaži korpu</a></div>
    <form method="POST" action="./isprazni.php">
        <input type="hidden" name="isprazni" />
        <input type="submit" class="isprazni" value="Isprazni korpu" />
    </form>
    </div>
    
    </div>
    <script>
        const naruci = (_ime) => {
            data = {
                ime: _ime
            };
            console.log("blabla");
            data = JSON.stringify(data);
            fetch('./porudzbina.php',{
                method: "POST",
                body: data,
            }).then((response) => {
                response.json().then((data)=> {
                    console.log(data);
                    if(data.response == 'success') {
                        alert('uspeh!');
                    } else {
                        alert('greska!');
                    }
                });
            })
        }
    </script>
    

    <div class="futer">
        <?php include '../footer2/footer.php'; ?>
    </div>





</body>

</html>