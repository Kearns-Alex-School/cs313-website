<?php
require "dbConnect.php";

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
        //Create();
        break;

    default:
        echo 'fail';
}

function Refresh() {
    $db = get_db();

    $stmt = $db->prepare('select room_id, room_name from t_room');

    GetRows($stmt);
}

function Search() {
    $db = get_db();
    $roomName = htmlspecialchars($_POST['searchName']);

    $stmt = $db->prepare("select room_id, room_name from t_room where room_name LIKE '%$roomName%'");

    GetRows($stmt);
}

function GetRows($statement) {
    try
    {
        $statement->execute();
    }
    catch (PDOException $ex) {
        echo "Error connecting to DB. Details: $ex";
        return;
    }
    
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

/*function Create() {
    session_start();
    $db = get_db();

    $roomName = htmlspecialchars($_POST['searchName']);
    $roomPass = htmlspecialchars($_POST['roomPass']);
    $userID = $_SESSION['userid'];

    $sql = "insert into t_room (user_id, room_created, room_name, room_password) values (" . $userID . ", NOW(), '" . $roomName . "', '" . $roomPass . "')";

    $stmt = $db->prepare($sql);
    
    try {
        $stmt->execute();
    } catch (PDOException $ex) {
        echo "Error: $ex";
		die();
    }
}*/
?>