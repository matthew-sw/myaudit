<?php
require 'functions.php';

if (isset($_POST["register"])){

    if(register($_POST) > 0){
        echo"
            <script>
                alert('Registration Complete');
            </script>
            ";
    }else{
        echo"
            <script>
                alert ('Registration Failed');
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
    <title>Registration Page</title>
</head>
<body class="bg-light">
    <div class="container-md mt-5">
        <h1>Registration Page</h1>
        <p>Already have account? <a href="login.php">Login here!</a></p>
        <form action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">Password Confirmation</label>
                <input type="password" name="password2" class="form-control" id="password2">
            </div>
            <button type="submit" name="register" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>
</html>