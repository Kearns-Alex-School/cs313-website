<?php
require "dbConnect.php";
$db = get_db();
session_start();

$func = htmlspecialchars($_GET['function']);

switch ($func)
{
    case "search":
        echo 'search';
        //Search();
        break;

    case "refresh":
        echo 'refresh';
        Refresh();
        break;

    case "create":
        echo 'create';
        //Create();
        break;

    default:
        echo 'fail';
}

function Refresh() {
    $stmt = $db->prepare('select room_id, room_name from t_room');

    //GetRows($stmt);
}


?>