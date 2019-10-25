<?php
require "dbConnect.php";
$db = get_db();
session_start();

$func = htmlspecialchars($_GET['function']);

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
    try
    {
        $stmt = $db->prepare($sql);
    }
    catch (PDOException $ex) {
		// If this were in production, you would not want to echo
		// the details of the exception.
		echo "Error connecting to DB. Details: $ex";
		return;
	}

    echo 'indoRefresh';
    //GetRows($stmt);
}


?>