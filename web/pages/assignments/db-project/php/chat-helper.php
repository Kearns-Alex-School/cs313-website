<?php
require "dbConnect.php";

$func = htmlspecialchars($_POST['function']);

switch ($func)
{
    case "refresh":
        Refresh();
        break;

    case "send":
        SendMessage();
        break;

    default:
        echo 'fail';
}

function Refresh() {
    $db = get_db();

    $roomid = htmlspecialchars($_POST['id']);

    $stmt = $db->prepare('
SELECT 
  m.message
, m.message_created
, u.user_name 
FROM t_messages m 
LEFT JOIN t_user u ON (m.user_id = u.user_id) 
WHERE room_id=:roomid');
    $stmt->bindValue(':roomid', $roomid, PDO::PARAM_INT);

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
        $html_text .='
        <tr>
            <td width="40%">
                <p><b>' . $row['user_name'] . ': </b></p>
                <p>' . $row['message_created'] . '</p>
            </td>
            <td width="60%">
                <p>"' . $row['message'] . '"</p>
            </td>
        </tr>';
    }

    // send all of the results back to the caller.
    echo $html_text;
}

function SendMessage() {
    $db = get_db();

    $roomid = htmlspecialchars($_POST['id']);
    $userid = htmlspecialchars($_POST['userid']);
    $message = htmlspecialchars($_POST['message']);

    $stmt = $db->prepare("
INSERT INTO t_messages VALUES (
  ".$userid."
, ".$roomid."
, '".$message."'
, NOW()" );

    try {
        $stmt->execute();
    } catch (PDOException $ex) {
        echo "Error: $ex";
        die();
    }
}
?>