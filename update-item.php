<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';
$id = $_GET["id"];

$item = query("SELECT * FROM item WHERE id=$id")[0];
if(isset($_POST["submit"])){
    if(change($_POST) > 0 ){
        echo"
        <script>
            alert('Success Update Data!');
            document.location.href = 'index.php';
        </script>
        ";
    }
    else{
        echo"
        <script>
            alert ('Failed Update Data!');
            document.location.href = 'index.php';
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Update Item</title>
</head>
<body class="bg-light">
    <div class="container-md mt-5">
        <h1>Update Item</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $item["id"]?>">

            <div class="mb-3">
                <label for="name" class="form-label">Item Name</label>
                <input type="text" name="name" class="form-control" id="name" value="<?= $item["name"]?>">
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Item Quantity</label>
                <input type="number" name="quantity" class="form-control" id="quantity" value="<?= $item["quantity"]?>">
            </div>
            <div class="mb-3">
                <label for="quality" class="form-label">Item Quality</label>
                <input type="text" name="quality" class="form-control" id="quality" value="<?= $item["quality"]?>">
            </div>
            <button type="submit" name="submit" class="btn btn-warning">Update Item</button>
        </form>
    </div>
</body>
</html>