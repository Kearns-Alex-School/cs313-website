<?php
require "dbConnect.php";
$db = get_db();
session_start();

$func = htmlspecialchars($_GET['function']);

switch ($func)
{
    case "search":
        Search();
        break;

    case "refresh":
        Refresh();
        break;

    case "create":
        Create();
        break;

    default:
        echo 'fail';
}

function Search() {
    $roomName = htmlspecialchars($_POST['searchName']);

    $stmt = $db->prepare("select room_id, room_name from t_room where room_name LIKE '%$roomName%'");

    GetRows($stmt);
}

function Refresh() {
    $stmt = $db->prepare('select room_id, room_name from t_room');

    GetRows($stmt);
}

function GetRows($statement) {
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

    $html_text = "";

    foreach ($rows as $row)
    {
        $room_name = $row['room_name'];
        $room_id = $row['room_id'];

        $html_text .= '<p>';
        $html_text .= '<a href="chat.php?room=' . $room_name . '&roomid=' . $room_id .'">';
        $html_text .= '<b>' . $room_name . '</b>';
        $html_text .= '</a>';
        $html_text .= '</p>';
    }

    // send all of the results back to the caller.
    echo $html_text;
}

function Create() {

}

?>