<?php

include("conn.php");

if (isset($_GET["id"])) {
    $conn = new PelangganConn();
    
    $conn->deletePelangganWithId($_GET["id"]);
    header("Location: pelanggan.php?message=SuccessDelete");
    die();
} else {
    echo "FAIL....";
    header("Location: pelanggan.php?message=FailDelete");
}
exit();
