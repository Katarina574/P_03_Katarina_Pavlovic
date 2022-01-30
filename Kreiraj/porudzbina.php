<?php 
    include_once('./cart.php');
    $data = json_decode(file_get_contents("php://input"));
    if(isset($data->ime)) {
        $korpa->dodajUKorpu($data->ime,1);
        echo '{"response": "success"}';
    } else {
        echo '{"response":"error"}';
    }
?>