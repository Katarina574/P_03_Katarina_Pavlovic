<?php 
include_once('./initdb.php');

session_start();
class Korpa {
    function __construct() {
        if(!isset($_SESSION['item_cart'])) { 
            $_SESSION['item_cart'] = [];
        }
    }

    function dodajUKorpu($ime,$amount) {
        if(isset($_SESSION['item_cart'][$ime])) {
            $_SESSION['item_cart'][$ime] += $amount;
        } else {
            $_SESSION['item_cart'][$ime] = $amount;
        }
    }

    function listajKorpu() {
        foreach ($_SESSION['item_cart'] as $ime => $amount) {
            echo "Narucili ste cestitku: $ime; Kolicina: $amount puta<br>";
        }
    }

    function isprazniKorpu() {
        $_SESSION['item_cart'] = [];
    }
}


$korpa = new Korpa();
?>