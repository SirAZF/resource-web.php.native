<?php

include("conn.php");


$conn = new PelangganConn();

$id = $_GET["id"];

$row = $conn->getOnePelanggan($id);

if (isset($_GET["id"])) {

    if(isset($_POST["nama"])){

        $data = [
            "nama" => $_POST["nama"],
        ];

        
        $conn->updatePelangganbyID($id,$data);

        header("Location: pelanggan.php?message=SuccessDelete");
        die();

    }

}
 else {
    echo "FAIL....";
    header("Location: pelanggan.php?message=FailDelete");
}


?>



<form action="" method="post" style="display: flex; flex-direction: column; padding: 16px; gap: 8px; width: fit-content">
    <h1>Edit Pelanggan</h1>
    <input type="text" name="nama" placeholder="Nama Pelanggan" value="<?= $row["nama"] ?>" required>
    <button type="submit">Simpan Perubahan</button>
</form>