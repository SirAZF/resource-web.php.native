<?php

include("conn.php");


$conn = new MenuConn();

$id = $_GET["id"];

$row = $conn->getOneMenu($id);

if (isset($_GET["id"])) {

    if(isset($_POST["nama"]) && isset($_POST["harga"])){

        $data = [
            "nama" => $_POST["nama"],
            "harga" => $_POST["harga"],
            
        ];

        
        $conn->updateMenubyID($id,$data);

        header("Location: menu.php?message=SuccessDelete");
        die();

    }

}
 else {
    echo "FAIL....";
    header("Location: karyawan.php?message=FailDelete");
}


?>



<form action="" method="post" style="display: flex; flex-direction: column; padding: 16px; gap: 8px; width: fit-content">
    <h1>Edit Menu</h1>
    <input type="text" name="nama" placeholder="Nama Menu" value="<?= $row["nama"] ?>" required>
    <input type="text" name="harga" placeholder="Harga Menu" value="<?= $row["harga"] ?>" required>
    <button type="submit">Simpan Perubahan</button>
</form>
