<?php
include("conn.php");

if (isset($_POST["nama"]) && isset($_POST["harga"])) {
    $data = [
        "nama" => $_POST["nama"],
        "harga" => $_POST["harga"],
    ];
    $conn = new MenuConn();

    $conn->createMenu($data);
    header("Location: menu.php?message=SuccessDelete");
    die();
}

$conn = new MenuConn();

$roles = $conn->getMenu();
?>

<form action="" method="post" style="display: flex; flex-direction: column; padding: 16px; gap: 8px; width: fit-content">
    <h1>Tambah Menu Baru</h1>
    <input type="text" name="nama" placeholder="Nama Menu" required>
    <input type="number" name="harga" placeholder="Harga" required>
    <button type="submit">Submit</button>
</form>