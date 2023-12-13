<?php

include("role-conn.php");

include("head.php");

$conn = new RoleConn();

$result = $conn->getRoleWithGaji();
?>


<a href="/role-tambah.php">Tambah Bagian</a>
<table>
    <tr>
        <th>No</th>
        <th>Bagian</th>
        <th>Gaji</th>
        <th>Action</th>
    </tr>

    <?php

    $no = 1;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["gaji"] ?? "-" ?></td>
                <td>
                    <a href="/role-edit.php?id=<?= $row["id"] ?>"><button>Edit</button></a>
                    <a href="/role-hapus.php?id=<?= $row["id"] ?>">Delete</a>
                </td>
            </tr>
    <?php
            $no++;
        }
    }
    ?>
</table>