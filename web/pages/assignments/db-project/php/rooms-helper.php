<?php
//require "dbConnect.php";
$db = get_db();


session_start();

//$db = $_SESSION['db'];
$foo = $_SESSION['user'];

$func = htmlspecialchars($_POST['function']);

switch ($func)
{
    case "search":
        //Search();
        break;

    case "refresh":
        Refresh();
        break;

    case "create":
        //Create();
        break;

    default:
        echo 'fail';
}

function Refresh() {
    $sql = 'select room_id, room_name from t_room';

    // trouble line
    $stmt = $db->prepare($sql);

    echo 'in doRefresh    '.$foo;
    //GetRows($stmt);
}



function get_db() {
	$db = NULL;

	try {
		// default Heroku Postgres configuration URL
		$dbUrl = getenv('DATABASE_URL');

		// Get the various parts of the DB Connection from the URL
		$dbopts = parse_url($dbUrl);

		$dbHost = $dbopts["host"];
		$dbPort = $dbopts["port"];
		$dbUser = $dbopts["user"];
		$dbPassword = $dbopts["pass"];
		$dbName = ltrim($dbopts["path"],'/');

		// Create the PDO connection
		$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

		// this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
		$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch (PDOException $ex) {
		// If this were in production, you would not want to echo
		// the details of the exception.
		echo "Error connecting to DB. Details: $ex";
		die();
	}

	return $db;
}
?>