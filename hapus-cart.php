<?php
session_start();

function hapusCart($id)
{
    $index = array_search($id, array_column($_SESSION["cart"], 'id'));
    unset($_SESSION["cart"][$index]);
    $_SESSION["cart"] = array_values($_SESSION["cart"]);
}

if (isset($_GET["id"])) {
    hapusCart($_GET["id"]);
    header("Location: menu.php");
}
