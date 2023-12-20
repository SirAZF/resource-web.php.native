<?php

include("conn.php");

session_start();

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
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["harga"] ?></td>
                <td>
                    <a href="/tambah-session-menu.php?id=<?= $row["id"] ?>"><button>Add to Cart</button></a>
                    <a href="/menu-hapus.php?id=<?= $row["id"] ?>"><button>Delete</button></a>
                    <a href="/menu-edit.php?id=<?= $row["id"] ?>"><button>Edit</button></a>
                </td>
            </tr>
    <?php
            $no++;
        }
    }
    ?>
</table>

<h1>Keranjang</h1>
<table>
    <tr>
        <th>No</th>
        <th>Menu</th>
        <th>QTY</th>
        <th>Action</th>
    </tr>
    <?php
    $no = 1;
    var_dump($_SESSION["cart"]);
    if (sizeof($_SESSION["cart"]) > 0) {
        foreach($_SESSION["cart"] as $row1) {
    ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $row1["id"] ?></td>
                <td><a href="minus-qty.php?id=<?= $row1["id"] ?>"><button>-</button></a><?= $row1["qty"] ?? "0" ?><a href="tambah-qty.php?id=<?= $row1["id"] ?>"><button>+</button></a></td>
                <td><a href="hapus-cart.php?id=<?= $row1["id"] ?>"><button>remove</button></a></td>
            </tr>
    <?php
            $no++;
        }
    }
    ?>
</table>