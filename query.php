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

    $queryPOST = "SELECT * FROM players";
    $response = "";
    while($row = mysqli_fetch_row($conn->query($queryPOST))){
        $response += $row[0];
        echo $response;
    }
}

mysqli_close($conn);

?>