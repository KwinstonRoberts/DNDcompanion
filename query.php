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
	    }else{
            die(mysqli_error($conn))
        }
	    echo $response;
	    mysqli_free_result($result);
    }
}else if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
	$name = $_POST['name'];
    if($_POST['header']==1){
    	$queryPOST = 'SELECT * FROM players WHERE Character_Name ="' . $name . '"';
    	$response = "";
        if($result = mysqli_query($conn, $queryPOST)){
    	    while($row = mysqli_fetch_row($result)){
    	    	    $response = $response . $row[2] . "," . $row[3] . "," . $row[4] 
                    . "," . $row[5] . "," . $row[6] . "," . $row[7] . "," . $row[8]. "," . $row[9]
                    . "," . $row[10] . "," . $row[11] . "," . $row[12] . "," . $row[13] . "," . $row[14]
                    . "," . $row[15];  
    	   	        echo $response;
    	   	        mysqli_free_result($response);
                }
            }
		}
	}else if($_POST['header']==0){
        $queryPOST = 'SELECT * FROM players WHERE Player_Name ="' . $name . '"';
        $response = "";
        if($result = mysqli_query($conn, $queryPOST)){
            while($row = mysqli_fetch_row($result)){
                    $response = $response . $row[1] . ",";  
                echo $response;
                mysqli_free_result($response);
            }
        }
    }else{
        $queryPOST = 'SELECT * FROM players WHERE Player_Name ="$name"';
       	    $result = mysqli_query($conn, $queryPOST);
            if(count(mysqli_fetch_row($result))<1){
        	mysqli_query($conn,"INSERT INTO players(Player_Name) VAlUES('$name')") or die(mysqli_error($conn));
        	}
       	while($row = mysqli_fetch_row($result)){
       		$response = "";
         	for ($i=0; $i<count($row); $i++){
       	 		$columns = array('Player_Name','Character_Name','Character_Level','Class','Paragon_Path','Epic_Destiny',
                      'Exp','Race','Size','Age','Gender','Height',
                      'Weight','Alignment','Diety','Adventuring_Company');
         		
     			mysqli_query($conn,"UPDATE players set $columns[i]='$row[i]' WHERE Player_Name = '$name'");
                $response = $response . $row[i];
        	}
        }
        echo $response;
        mysqli_free_result($response);
    }
mysqli_close($conn);
?>