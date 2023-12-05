<?php

include("conn.php");

$conn = new RoleConn();

$result = $conn->getRole();

include("head.php");
?>
<a href="/role-tambah.php">Tambah Bagian</a>
<table>
    <tr>
        <th>No</th>
        <th>Bagian</th>
        <th>Action</th>
    </tr>

    <?php
    // var_dump($result);
    // echo "<br>";
    // var_dump($result->fetch_assoc());
    // echo "<br>";
    // var_dump($result->fetch_assoc());
    // echo "<br>";
    // var_dump($result->fetch_assoc());
    // echo "<br>";
    // var_dump($result->fetch_assoc());
    // echo "<br>";
    // var_dump($result->fetch_assoc());
    // echo "<br>";
    // var_dump($result->fetch_assoc());
    // echo "<br>";
    // var_dump($result->fetch_assoc());
    $no = 1;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $row["nama"] ?></td>
                <td>
                    <button>Edit</button>
                    <a href="/role-hapus.php?id=<?= $row["id"] ?>">Delete</a>
                </td>
            </tr>
    <?php
            $no++;
        }
    }
    ?>
</table>