<?php
require "dbConnect.php";
$db = get_db();
session_start();

$func = htmlspecialchars($_POST['function']);

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
        $html_text .= '<p>';
        $html_text .= '<a href="chat.php?room=' . $row['room_name'] . '&roomid=' . $row['room_id'].'">';
        $html_text .= '<b>' . $row['room_name'] . '</b>';
        $html_text .= '</a>';
        $html_text .= '</p>';
    }

    // send all of the results back to the caller.
    echo $html_text;
}

function Create() {

}

?>