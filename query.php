
 <?php
$conn = parse_url($_ENV['CLEARDB_DATABASE_URL']);

//database server
define('DB_SERVER', $connection_info['host']);

//database name
define('DB_DATABASE', substr($connection_info['path'], 1));

//database login name
define('DB_USER', $connection_info['user']);

//database login password
define('DB_PASS', $connection_info['pass']);

$conn = mysqli_connect($server, $username, $password, $db);

    if(!$conn){
        die("Connection Failed" . echo mysqli_error($conn));
    }

    $name = $_POST['name'];
    $value = $_POST['value'];
    
    $queryPOST = "INSERT INTO players('" . $name . "') VALUES('" . $value . "')";
    
    if(mysqli_query($queryPOST))
    {
        die('Error: ' . mysqli_error($conn));
    }else{
        echo $name . "," . $value;
    }
    mysqli_close($conn);

    
?>