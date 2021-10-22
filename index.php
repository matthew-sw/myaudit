<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';
$item = query("SELECT * FROM item");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Item List</title>
</head>
<body class="bg-light">
    <div class="container-md mt-5">

        <h1>MyAudit</h1>
        <a href="logout.php"><button class="btn btn-danger">Logout</button></a>
        <a href="add-item.php"><button class="btn btn-success">Add Item</button></a>
        <br><br>
        
        <form action="" method="post">
            <input type="text" name="keyword" size="40" autofocus="off" id="keyword">
        </form>
    
        <br>
        <div id="container">
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
                <tbody>
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
                    </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>