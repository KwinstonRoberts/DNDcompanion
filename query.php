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
    if($result = mysqli_query($conn, $queryPOST)){
	    while($row = mysqli_fetch_row($result)){
	        $response = $response . "," .  $row[0];  
	    }
	    echo $response;
	    mysqli_free_result($result);
    }
}else if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
	$name = $_POST['name'];
	$queryPOST = 'SELECT * FROM players WHERE Player_Name ="' . $name . '"';
	$response = "";
    if($result = mysqli_query($conn, $queryPOST)){
	    while($row = mysqli_fetch_row($result)){
	    	    $response = $response . $row[1] . ",";  
	   	    echo $response;
	   	    mysqli_free_result($response);
		}
	}
}

mysqli_close($conn);

?>