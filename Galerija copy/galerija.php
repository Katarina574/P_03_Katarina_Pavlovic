<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./kreiraj.css">
    <link rel="stylesheet" href="./forma.css">
    <link rel="stylesheet" href="./galerija.css">
    <link rel="stylesheet" href="../navigacija2/nav.css">
    <link rel="stylesheet" href="../footer2/footer.css">
</head>


<body>
    <div class="navigacija">
        <?php include '../Navigacija2/nav.php'; ?>
    </div>

    <div class="containerr">
        <div class="filtriraj">
            <form action="./galerija.php" method="GET">
                <select class="input" name="filter">
                    <option selected disabled>Prikaži po:</option>
                    <option value="cena" name="cena">Ceni (najmanje)</option>
                    <option value="rok" name="rok">Roku izrade (najbrže)</option>
                </select>
                <input type="submit" class="submit" value="Sortiraj">
            </form>
        </div>


        <?php
        $galerija = array(
            array(
                "ime" => "Iskakalica",
                "cena" => 200,
                "rokizrade" => 5,
                "src" => "../slike/r-srca.png"
            ),
            array(
                "ime" => "Šejker čestitka",
                "cena" => 500,
                "rokizrade" => 2,
                "src" => "../slike/p-srca.png"
            ),
            array(
                "ime" => "Iskakalica",
                "cena" => 300,
                "rokizrade" => 3,
                "src" => "../slike/b-srca.png"
            )
        );

        ?>

        <?php
        if (isset($_GET["filter"])) {
            if ($_GET["filter"] == "cena") {
                $sortiraj_cena = function ($a, $b) {
                    if ($a["cena"] > $b["cena"]) {
                        return 1;
                    } elseif ($a["cena"] < $b["cena"]) {
                        return -1;
                    }
                    return 0;
                };
                usort($galerija, $sortiraj_cena);
                foreach ($galerija as $slika) {
                    foreach ($slika as $key => $value) {
                        if ($key == "src") {
                            echo "<img width='250px' style='margin-top: 50px; margin-bottom: 50px; display: inline-block;' src=$value>";
                            echo "<div>
                            <form action='./korpa/korpa.php' method='GET'>
                    <input type='checkbox' id='korpa' name='korpa[]' value='$value'>
                    <label for='korpa'>Spremi za korpu</label>
                    </form>
                  </div>";
                        }
                        if ($key == "ime") {
                            echo "<div style='display: block;'>$value</div>";
                        } elseif ($key == "cena") {
                            echo "<div>$value</div>";
                        } else continue;
                    }
                }
            } elseif (($_GET["filter"] == "rok")) {
                $sortiraj_cena = function ($a, $b) {
                    if ($a["rokizrade"] > $b["rokizrade"]) {
                        return 1;
                    } elseif ($a["rokizrade"] < $b["rokizrade"]) {
                        return -1;
                    }
                    return 0;
                };
                usort($galerija, $sortiraj_cena);
                foreach ($galerija as $slika) {
                    foreach ($slika as $key => $value) {
                        if ($key == "src") {
                            echo "<img width='250px' style='margin-top: 50px; margin-bottom: 50px; margin-right:20px; display: inline-block;' src=$value>";
                            echo "<div>
                            <form action='./korpa/korpa.php' method='GET'>
                    <input type='checkbox' id='korpa' name='korpa[]' value='$value'>
                    <label for='korpa'>Spremi za korpu</label>
                    </form>
                  </div>";
                        }
                    }
                }
            } else {
                echo "";
            }
        } else {
            foreach ($galerija as $slika) {
                foreach ($slika as $key => $value) {
                    if ($key == "src") {
                        echo "<img width='250px' style='margin-top: 50px; margin-bottom: 50px; display: inline-block;' src=$value>";
                        echo "<div>
                        <form action='./korpa/korpa.php' method='GET'>
                <input type='checkbox' id='korpa' name='korpa[]' value='$value'>
                <label for='korpa'>Spremi za korpu</label>
                </form>
              </div>";
                    }
                }
            }
        }
        ?>
        <form action='../login/login.php' method='GET'>
            <input type="submit" class="submit" value="Naruci">
        </form>

    </div>
    <div class="futer">
        <?php include '../footer2/footer.php'; ?>
    </div>
</body>

</html>