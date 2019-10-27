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
        DoCreate();
        break;

    default:
        echo 'fail';
}

function Refresh() {
    $db = get_db();

    $stmt = $db->prepare("
SELECT 
  r.room_id
, r.room_name
, u.user_name
, r.room_password 
FROM t_room r 
LEFT JOIN t_user u ON (r.user_id = u.user_id) 
ORDER BY r.room_id");

    GetRows($stmt);
}

function Search() {
    $db = get_db();
    $roomName = htmlspecialchars($_POST['searchName']);

    $stmt = $db->prepare("
SELECT 
  r.room_id
, r.room_name
, u.user_name
, r.room_password 
FROM t_room r 
LEFT JOIN t_user u ON (r.user_id = u.user_id)
WHERE r.room_name LIKE '%$roomName%' 
ORDER BY r.room_id");

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
        $room_id = $row['room_id'];
        $room_name = $row['room_name'];
        $creator = $row['user_name'];
        $password = $row['room_password'];

        $html_text .='
        <tr>
            <td width="40%">
                <p>'.$room_name.'</p>
            </td>
            <td width="30%">
                <p>'.$creator.'</p>
            </td>
            <td width="10%">';

        if ($password !=='')
        {
            $html_text .='
                <img src="content/images/lock.png" alt="L" width="25px">';
        }

        $html_text .='
            </td>
            <td width="20%">
                <input type="hidden" name="roomid" value="'.$room_id.'">
                <button type="submit" class="btn btn-success btn-sm btn-block" name="submit[]" value="'.$room_id.'">Join</button>
            </td>
        </tr>';
    }

    // send all of the results back to the caller.
    echo $html_text;
}

function DoCreate() {
    session_start();
    $db = get_db();

    $roomName = htmlspecialchars($_POST['roomName']);
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
}
?>