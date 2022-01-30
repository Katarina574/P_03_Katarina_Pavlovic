<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../navigacija2/nav.css">
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
    <?php 
include_once('./cart.php');
echo "<div class='korpa' style='margin: 15px'>";
$korpa->listajKorpu();

?>
<hr>
<a href="./kreiraj.php"><-nazad</a>
</body>
</html>

<div style=></div>