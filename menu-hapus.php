<?php

include("conn.php");

if (isset($_GET["id"])) {
    $conn = new MenuConn();
    
    $conn->deleteMenuWithId($_GET["id"]);
    header("Location: menu.php?message=SuccessDelete");
    die();
} else {
    echo "FAIL....";
    header("Location: menu.php?message=FailDelete");
}
exit();