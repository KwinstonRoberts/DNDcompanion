<?php

$server = "us-cdbr-iron-east-02.cleardb.net";
$username = "be321624304dab";
$password = "0d023e8d";
$db = "heroku_e5f1f5a101fb1b4";

$conn = mysqli_connect($server, $username, $password, $db);

    if(mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die("Failed to connect:" . mysqli_connect_error());
  }

if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

    $queryPOST = "SELECT Player_Name FROM players";

    if(!$result = mysqli_query($conn, $queryPOST));
        die(mysqli_error());
    }else{
        echo $result;
    }
}

mysqli_close($conn);

?>