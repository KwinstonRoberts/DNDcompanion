<?php
    $host = "us-cdbr-iron-east-02.cleardb.net";
    $user = "be321624304dab";
    $pass = "0d023e8d";
    $dbhost = "heroku_e5f1f5a101fb1b4";
    
    $conn = mysqli_connect($host, $user, $pass, $dbhost);
    $name = $_POST[0];
    $value = $_POST[1];
    
    $queryPOST = "INSERT INTO players VALUES(" . "LOOOOOL" . ");";
    mysqli_query($conn, $queryPOST);
    mysqli_close($conn);