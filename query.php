<?php
#$conn = parse_url($_ENV['CLEARDB_DATABASE_URL']);

#$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = "us-cdbr-iron-east-02.cleardb.net";
$username = "be321624304dab";
$password = "0d023e8d";
$db = "heroku_e5f1f5a101fb1b4";

$conn = mysqli_connect($server, $username, $password, $db);

    if(mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
//$dbase = mysql_select_db($db);


if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {

    $queryPOST = "SELECT Player_Name FROM players";


    $result = mysqli_query($conn, $queryPOST);
    echo $result;
    }

mysqli_close($conn);
?>