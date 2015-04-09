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
	}else if($_POST['header']==0){
        $queryPOST = 'SELECT * FROM players WHERE Player_Name ="' . $name . '"';
        $response = "";
        if($result = mysqli_query($conn, $queryPOST)){
            while($row = mysqli_fetch_row($result)){
                    $response = $response . $row[1] . ",";  
                echo $response;
                mysqli_free_result($response);
            }
        }else{
        	$queryPOST = 'SELECT * FROM players WHERE Player_Name ="' . $name . '"';
        	if(!$result = mysqli_query($conn, $queryPOST)){
        		mysqli_query($conn,"INSERT INTO players(PLayer_Name) VAlUES('$row[i]')");
        	}
        	while($row = mysqli_fetch_row($result)){
        	 	for ($i=0; $i<length($row); $i++){
       		 		$columns = array('Character_Level','Class','Paragon_Path','Epic_Destiny',
                        'Exp','Race','Size','Age','Gender','Height',
                        'Weight','Alignment','Diety','Adventuring_Company');
        	 		if($row[i]==null){
       		 			mysqli_query($conn,"INSERT INTO players($columns[i]) VAlUES('$row[i]'')");
        	 		}else{
       		 			mysqli_query($conn,"UPDATE players set $columns[i]='$row[i]'");

        		 	}
        		}
        		echo "inserted data";
        	}
        }
    }
}

mysqli_close($conn);

?>