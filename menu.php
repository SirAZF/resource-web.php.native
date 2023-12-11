<?php

include("conn.php");

$conn = new MenuConn();

$result = $conn->getMenu();

include("head.php")

?>
<a href="/menu-tambah.php">Tambah Menu</a>
<table>
    <tr>
        <th>No</th>
        <th>Menu</th>
        <th>Harga</th>
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
                <td><?= $row["harga"] ?></td>
                <td>
                    <a href="/menu-edit.php?id=<?= $row["id"] ?>"><button>Edit</button></a>
                    <a href="/menu-hapus.php?id=<?= $row["id"] ?>">Delete</a>
                </td>
            </tr>
        <?php
            $no++;
        }
    }
    ?>
</table>