<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
require 'functions.php';

if(isset($_POST["submit"])){
    if(add($_POST) > 0 ){
        echo"
        <script>
            alert('Success to add Item!');
            document.location.href = 'index.php';
        </script>
        ";
    }
    else{
        echo"
        <script>
            alert ('Failed to add Item!');
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
    <title>Add Item</title>
</head>
<body class="bg-light">
    <div class="container-md mt-5">
        <h1>Add Item</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Item Name</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Item Quantity</label>
                <input type="number" name="quantity" class="form-control" id="quantity">
            </div>
            <div class="mb-3">
                <label for="quality" class="form-label">Item Quality</label>
                <input type="text" name="quality" class="form-control" id="quality">
            </div>
            <button type="submit" name="submit" class="btn btn-success">Add Item</button>
        </form>
    </div>
</body>
</html>