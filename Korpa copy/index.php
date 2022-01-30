

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./pocetna.css">
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="../navigacija2/nav.css">
    <link rel="stylesheet" href="../footer2/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Style+Script&display=swap" rel="stylesheet">
</head>
</head>
<body>
    
<div class="navigacija">
        <?php include '../Navigacija2/nav.php'; ?>
    </div>
    <div class="container">
    <?php 
include_once('./initdb.php');
session_start();
if(isset($_COOKIE['user'])) {
    $_SESSION['user'] = $_COOKIE['user'];
}

if(!isset($_SESSION['user'])) {
    die('<div class="logovde">Molimo vas da kliknete <a href="./login.php">ovde</a> da se ulogujete</div>');
}
?>
</div>
    <div class="zavrsetaknarucivanja">
    <a href="./prikaz.php">Prikaži korpu</a> <br>
    <form method="POST" action="./isprazni.php">
        <input type="hidden" name="isprazni" />
        <input type="submit" class="isprazni" value="Isprazni korpu" />
    </form>
    <form action="./logout.php"><input type="submit" value="Logout"/></form></div>
    <div class="container">
    
    <?php 
    $lokacije = $connection->nizSlika();
    foreach($lokacije as $lokacija) {
        
        echo "<div class='stavka'>";
        echo "<p>Ime čestitke: <span>" . $lokacija[1] . "</span></p>";
        echo "<img width='250px' style='margin-top: 50px; margin-bottom: 50px; display: inline-block;' src='" . $lokacija[4] ."'/>";
        echo "<p>Cena: <span style='color:orange'>" . $lokacija[2] . "</span></p>";
        echo "<p>Rok izrade: <span style='color:orange'>" . $lokacija[3] . " dana</span></p>";
        echo "<button class='button' type='button' onclick='naruci(\"". $lokacija[1] ."\")' >Naruči</button>"; //akcija
        echo "</div>";

        // function prekoID($id) {
        //     $select = "SELECT * FROM `cestitke` WHERE `id`=?";
        //     $upit_select->bind_param("i",$id);
        //     $upit_select->execute();
        //     echo "Proizvod ima id: $id";
        // }   

    }   
   
    ?>
    
    <script>
        const naruci = (_ime) => {
            console.log("ime test",_ime);
            data = {
                ime: _ime
            };
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
    </div>
    <div class=futer>
        <?php include '../footer2/footer.php'; ?>
    </div>
</body>
</html>
