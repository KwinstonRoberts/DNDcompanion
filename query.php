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
	        $response = $response . "," .  $row[1];  
	    }
	    echo $response;
	    mysqli_free_result($result);
    }else{
        die(mysqli_error($conn));
    }
}else if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
	$name = $_POST['name'];
    if($_POST['header']==1){
    	$queryPOST = 'SELECT * FROM players WHERE Character_Name ="' . $character . '"';
    	$response = "";
        if($result = mysqli_query($conn, $queryPOST)){
    	    while($row = mysqli_fetch_row($result)){
    	        $response = $response . $row[2] . "," . $row[3] . "," . $row[4] 
                . "," . $row[5] . "," . $row[6] . "," . $row[7] . "," . $row[8]. "," . $row[9]
                . "," . $row[10] . "," . $row[11] . "," . $row[12] . "," . $row[13] . "," . $row[14]
                . "," . $row[15];          
            }
            $queryPOST = 'SELECT * FROM ability_scores WHERE Character_Name ="' . $name . '"';
            if($result = mysqli_query($conn, $queryPOST)){
                while($row = mysqli_fetch_row($result)){
                    $response = $response . "," . $row[3] . "," .  $row[4] . "," . $row[5]
                    . "," . $row[6] . "," . $row[7] . "," . $row[8];
                }
            }
            echo $response;
            mysqli_free_result($result);
        }
	}else if($_POST['header']==0){
        $queryPOST = 'SELECT * FROM players WHERE Player_Name ="' . $name . '"';
        $response = "";
        if($result = mysqli_query($conn, $queryPOST)){
            while($row = mysqli_fetch_row($result)){
                    $response = $response . $row[1] . ",";  
                echo $response;
                mysqli_free_result($result);
            }
        }else{
            die(mysqli_error($conn));
        }
    }else{
        $character = $_POST['character'];
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
        $strength = $_POST['strength'];
        $constitution = $_POST['constitution'];
        $dexterity = $_POST['dexterity'];
        $intelligence = $_POST['intelligence'];
        $wisdom = $_POST['wisdom'];
        $charisma = $_POST['charisma'];

        $data = array($character,$class,$paragon,$destiny,$exp,$race,$size,$age,$gender,$height,$weight,$alignment,$diety,$company);
        $data2 = array($character,$strength,$constitution,$dexterity,$intelligence,$wisdom,$charisma);

        mysqli_query($conn,"INSERT INTO players(Character_Name) VAlUES('$character')");
        mysqli_query($conn,"INSERT INTO ability_scores(Character_Name) VAlUES('$character')");
        $columns = array('Character_Name','Class','Paragon_Path','Epic_Destiny',
                      'Exp','Race','Size','Age','Gender','Height',
                      'Weight','Allignment','Deity','Adventuring_Company');

        $columns2 = array('Character_Name','Strength','Constitution','Dexterity','Intelligence','Wisdom','Charisma');

        for ($i=0; $i<count($data); $i++){
           	$query = "UPDATE players SET $columns[$i]='$data[$i]' WHERE Character_Name='$character'";	
            mysqli_query($conn, $query);
        }
        for($j=0;$j<count($data2); $j++){
            $query2 ="UPDATE ability_scores SET $columns2[$j]='$data2[$j]' WHERE Character_Name='$character'";
		    mysqli_query($conn, $query2);
        }
    }
}
mysqli_close($conn);
?>