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

    GetRows($stmt);
}

function GetRows($statement) {
    /*try
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
    echo $html_text;*/
}
?>