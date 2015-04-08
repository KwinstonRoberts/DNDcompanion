<?php 

	$server = "us-cdbr-iron-east-02.cleardb.net";
	$username = "be321624304dab";
	$password = "0d023e8d";
	$db = "heroku_e5f1f5a101fb1b4";



$conn = mysqli_connect($server, $username, $password, $db);

    if(mysqli_connect_errno())
  {
    die("Error:" . mysqli_connect_error());
  }


$queryPOST = "SELECT Player_Name FROM players";


  if(!mysqli_query($conn, $queryPOST))
{
    die('Error: ' . mysqli_error($conn));
}else{
	$result = mysqli_query($conn, $queryPOST);
    echo $result;
}
mysqli_close($conn);

?>
