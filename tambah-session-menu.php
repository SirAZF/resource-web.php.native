<?php
session_start();
function cart_is_on_session()
{
    return isset($_SESSION["cart"]);
}

function addtoCart($id)
{
    if (!cart_is_on_session()) {
        $_SESSION["cart"] = [];
    }

    $index = array_search($id, array_column($_SESSION["cart"], 'id'));
    if ($index == null) {
        $data = [
            "id" => $id,
            "qty" => 1
        ];
        array_push($_SESSION["cart"], $data);
    } else {
        $_SESSION["cart"][$index]["qty"]++;
    }
}

if (isset($_GET["id"])) {
    addtoCart($_GET["id"]);
    header("Location: menu.php");
}
