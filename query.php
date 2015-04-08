<?php

$server = "us-cdbr-iron-east-02.cleardb.net";
$username = "be321624304dab";
$password = "0d023e8d";
$db = "heroku_e5f1f5a101fb1b4";

$conn = mysqli_connect($server, $username, $password, $db);

if(!$conn){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die("Failed to connect:" . mysqli_connect_error());
}

if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

    $queryPOST = "SELECT Player_Name FROM players";

    if(mysqli_query($conn, $queryPOST)){
        echo mysqli_query($conn, $queryPOST);
    }else{
        die(mysqli_error());
    }
}

mysqli_close($conn);

?>