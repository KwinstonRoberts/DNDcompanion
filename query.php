<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($server, $username, $password, $db);

if(!$conn){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die("Failed to connect:" . mysqli_connect_error());
}

if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

    $queryPOST = "SELECT Player_Name FROM players";

    if($conn->query($queryPOST)){
        echo $conn->query($queryPOST);
    }else{
        die(mysqli_error());
    }
}

mysqli_close($conn);

?>