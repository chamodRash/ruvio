<?php
    $con = mysqli_connect('localhost', 'root', '', 'ruvio');

    if (!$con) {
        echo "<script>alert('Connection Failed.')</script>";
    }

?>