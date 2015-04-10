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
    }else{
        die(mysqli_error($conn));
    }
}else if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
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
            die(mysqli_error($conn));
        }
    }else{
        $character = $_POST['character'];
        $level = $_POST['level'];
        $class = $_POST['Class'];
        $paragon = $_POST['Paragon'];
        $destiny = $_POST['Destiny'];
        $exp = $_POST['EXP'];
        $race = $_POST['Race'];
        $size = $_POST['size'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $alignment = $_POST['alignment'];
        $diety = $_POST['diety'];
        $company = $_POST['company'];
        $response = "";
        $data = array($character,$level,$class,$paragon,$destiny,$exp,$race,$size,$age,$gender,$height,$weight,$alignment,$diety,$company);

        $queryPOST = 'SELECT * FROM players WHERE Player_Name="$name"';
        $count = 'SELECT COUNT(*) FROM players WHERE Player_Name="$name"';
        $result = mysqli_query($conn, $count);
        if($count<1){
        	mysqli_query($conn,"INSERT INTO players(Player_Name) VAlUES('$name')");
            $result = mysqli_query($conn, $queryPOST);
        }
       	while($row = mysqli_fetch_row($result)){
       		
         	for ($i=0; $i<count($data); $i++){
       	 		$columns = array('Character_Name','Character_Level','Class','Paragon_Path','Epic_Destiny',
                      'Exp','Race','Size','Age','Gender','Height',
                      'Weight','Alignment','Diety','Adventuring_Company');
         		
     			mysqli_query($conn,"UPDATE players set $columns[$i] = '$data[$i]' WHERE Player_Name = '$name'");
                $response = $response . $data[$i];
        	}
        }
        echo $response;
        mysqli_free_result($response);
    }
}
mysqli_close($conn);
?>