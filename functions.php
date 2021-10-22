<?php
$conn = mysqli_connect("localhost", "root", "", "myaudit");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}


function add($data){
    global $conn;
    $name = htmlspecialchars($data["name"]);
    $quantity = htmlspecialchars($data["quantity"]);
    $quality = htmlspecialchars($data["quality"]);

    $query = "INSERT INTO item
                VALUES
                ('', '$name', '$quantity', '$quality')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function remove($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM item WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function change($data){
    global $conn;
    $id = $data["id"];
    $name = htmlspecialchars($data["name"]);
    $quantity = htmlspecialchars($data["quantity"]);
    $quality = htmlspecialchars($data["quality"]);

    $query = "UPDATE item SET
                name = '$name',
                quantity = '$quantity',
                quality = '$quality'
            WHERE id = $id;
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function register($data){
    global $conn;

    $username = htmlspecialchars(strtolower(stripslashes($data["username"])));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    if($password !== $password2){
        echo "
            <script>
                alert('Password and confirmation password doesn't match!);
            </script>
        ";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
?>