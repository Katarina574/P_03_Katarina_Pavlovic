<?php 
include_once('./initdb.php');
session_start();
if(isset($_COOKIE['user'])) {
    $_SESSION['user'] = $_COOKIE['user'];
}

if(!isset($_SESSION['user'])) {
    die('Molimo vas da kliknete <a href="./login.php">ovde</a> da se ulogujete');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $lokacije = $connection->nizSlika();
    foreach($lokacije as $lokacija) {
        echo "<div class='stavka'>";
        echo "<p>Ime: <span style='color:lime'>" . $lokacija[1] . "</span></p>";
        echo "<p>Cena: <span style='color:orange'>" . $lokacija[2] . "</span></p>";
        echo "<p>Rok izrade: <span style='color:orange'>" . $lokacija[3] . "</span></p>";
        echo "<button type='button' onclick='naruci(". $lokacija[3] .")' >Naruči</button>";
        echo "</div><hr>";
    }   
    
    ?>
    <a href="./prikaz.php">Prikaži korpu</a> <br>
    <hr>
    <form method="POST" action="./isprazni.php">
        <input type="hidden" name="isprazni" />
        <input type="submit" value="Isprazni korpu" />
    </form>
    <form action="./logout.php"><input type="submit" value="Logout"/></form>
    <script>
        const naruci = (_id) => {
            data = {
                id: _id
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
</body>
</html>
