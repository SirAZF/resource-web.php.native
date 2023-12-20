<?php
session_start();

function plusCart($id)
{
    $index = array_search($id, array_column($_SESSION["cart"], 'id'));
    $_SESSION["cart"][$index]["qty"]++;
}

if (isset($_GET["id"])) {
    plusCart($_GET["id"]);
    header("Location: menu.php");
}

?>