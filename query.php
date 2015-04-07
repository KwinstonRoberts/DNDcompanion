
 <?php
$conn = parse_url($_ENV['CLEARDB_DATABASE_URL']);

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = mysqli_connect($server, $username, $password, $db);

    if(mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

    $name = $_POST['name'];
    $value = $_POST['value'];
    
    $queryPOST = "INSERT INTO players('" . $name . "') VALUES('" . $value . "')";
    
    if(!mysqli_query($queryPOST))
    {
        die('Error: ' . mysqli_error($conn));
    }else{
        echo $name . "," . $value;
    }
    mysqli_close($conn);

    
?>