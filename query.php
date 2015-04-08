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

$name = $_POST['name'];
$value = $_POST['value'];
$state = $_GET['state'];
if($state != null){
    if($state == 1){
        $queryPOST = "SELECT Player_Name FROM players";


        if(!mysqli_query($conn, $queryPOST)){
            die('Error: ' . mysqli_error($conn));
        }else{
            $result = mysqli_query($conn, $queryPOST);
            echo $result;
        }
    }
}else{


    $queryPOST = "INSERT INTO players(";
    for ($i = 1; $i <= $name.length; $i++) {
        if ($i == $name.length) {
            $queryPOST += $name . ") VALUE(";
        } else {
            $queryPOST += $name . ", ";
        }
    }

    #$queryPOST = "INSERT INTO players($name) VALUES('$value')";

    if(!mysqli_query($conn, $queryPOST))
    {
        die('Error: ' . mysqli_error($conn));
    }else{
        echo $name . "," . $value;
    }
}
mysqli_close($conn);