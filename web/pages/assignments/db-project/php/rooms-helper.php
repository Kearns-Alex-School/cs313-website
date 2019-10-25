<?php
require "dbConnect.php";
$db = get_db();
session_start();

if (is_null($db))
{
    echo '$db is null';
}


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
    //$sql = 'select room_id, room_name from t_room';

    // trouble line
    //$stmt = $db->prepare($sql);

    echo 'indoRefresh';
    //GetRows($stmt);
}
?>