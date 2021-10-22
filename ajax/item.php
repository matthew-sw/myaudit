<?php
require '../functions.php';
$keyword = $_GET["keyword"];

$query = "SELECT * 
            FROM item
            WHERE name LIKE '%$keyword%'";
$item = query($query);
?>

<table class="table text-center">
            <thead>
                <tr>
                    <th class="table-secondary">No.</th>
                    <th class="table-secondary">Name</th>
                    <th class="table-secondary">Quantity</th>
                    <th class="table-secondary">Quality</th>
                    <th class="table-secondary">Action</th>
                </tr>
            </thead>

            <?php $i = 1; ?>
            <?php foreach($item as $row) : ?>
                <tr>
                    <th><?= $i; ?></th>
                    <td><?= $row["name"]; ?></td>
                    <td><?= $row["quantity"]; ?></td>
                    <td><?= $row["quality"]; ?></td>
                    <td>
                        <a href="update-item.php?id=<?= $row["id"]; ?>" class="btn btn-warning">Update</a>
                        <a href="remove-item.php?id=<?= $row["id"]; ?>" onclick="return confirm('Are you sure?');" class="btn btn-danger">Delete</a>
                    </td>
                    <?php $i++; ?>
                    </tr>
            <?php endforeach; ?>
</table>
