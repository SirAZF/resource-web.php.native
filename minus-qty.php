<?php
session_start();

function minusCart($id)
{
    $index = array_search($id, array_column($_SESSION["cart"], 'id'));
    if ($_SESSION["cart"][$index]["qty"] > 0) {
        $_SESSION["cart"][$index]["qty"]--;
    }
}

if (isset($_GET["id"])) {
    minusCart($_GET["id"]);
    header("Location: menu.php");
}

?>