<?php

require 'functions.php';

$id = $_GET["id"];

if(remove($id) > 0 ){
    echo"
    <script>
        alert('Success to delete item!');
        document.location.href = 'index.php';
    </script>
    ";
}
else{
    echo"
    <script>
        alert ('Failed to delete item!');
        document.location.href = 'index.php';
    </script>
    ";
}
?>