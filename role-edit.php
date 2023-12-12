<?php

include("conn.php");


$conn = new RoleConn();

$id = $_GET["id"];

$row = $conn->getOne($id);

if (isset($_GET["id"])) {

    if(isset($_POST["nama"]) && isset($_POST["gaji"])){

        $data = [
            "nama" => $_POST["nama"],
            "gaji" => $_POST["gaji"]
        ];

        
        $conn->updateRolebyID($id,$data);

        header("Location: role.php?message=SuccessDelete");
        die();

    }

}
 else {
    echo "FAIL....";
    header("Location: karyawan.php?message=FailDelete");
}


?>



<form action="" method="post" style="display: flex; flex-direction: column; padding: 16px; gap: 8px; width: fit-content">
    <h1>Edit Bagian</h1>
    <input type="text" name="nama" placeholder="Nama Bagian" value="<?= $row["nama"] ?>" required>
    <input type="text" name="gaji" placeholder="Gaji" value="<?= $row["gaji"] ?>" required>
    <button type="submit">Simpan Perubahan</button>
</form>