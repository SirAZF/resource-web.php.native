<?php

include("conn.php");

$conn = new PelangganConn();

$result = $conn->getPelanggan();

include("head.php")

?>
<a href="/pelanggan-tambah.php">Tambah Pelanggan</a>
<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Action</th>
    </tr>
    <?php
    $no = 1;
    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()){
    ?>
        <tr>
                <td><?= $no ?></td>
                <td><?= $row["nama"] ?></td>
                <td>
                    <a href="/pelanggan-edit.php?id=<?= $row["id"] ?>"><button>Edit</button></a>
                    <a href="/pelanggan-hapus.php?id=<?= $row["id"] ?>">Delete</a>
                </td>
            </tr>
        <?php
            $no++;
        }
    }
    ?>
</table>