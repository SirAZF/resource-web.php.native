<?php
include("conn.php");

if (isset($_POST["nama"])) {
    $data = [
        "nama" => $_POST["nama"],
    ];
    $conn = new PelangganConn();

    $conn->createPelanggan($data);
    header("Location: pelanggan.php?message=SuccessDelete");
    die();
}

$conn = new PelangganConn();

?>

<form action="" method="post" style="display: flex; flex-direction: column; padding: 16px; gap: 8px; width: fit-content">
    <h1>Tambah Pelanggan Baru</h1>
    <input type="text" name="nama" placeholder="Nama Pelanggan" required>
    <button type="submit">Submit</button>
</form>

