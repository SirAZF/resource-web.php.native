<?php

include("role-conn.php");

if (isset($_GET["id"])) {
    $conn = new RoleConn();
    
    $conn->deleteGajiWithId($_GET["id"]);
    $conn->deleteRoleWithId($_GET["id"]);
    header("Location: role.php?message=SuccessDelete");
    die();
} else {
    echo "FAIL....";
    header("Location: karyawan.php?message=FailDelete");
}
exit();
