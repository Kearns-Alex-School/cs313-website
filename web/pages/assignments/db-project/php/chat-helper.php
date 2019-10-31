<?php
require "dbConnect.php";

// get our function data from the POST
$func = htmlspecialchars($_POST['function']);

// depending on what we got, call the associated function
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

// function responsible for grabbing all of the messages
function Refresh() {
    // connect to our database
    $db = get_db();

    // get our extra data from the POST
    $roomid = htmlspecialchars($_POST['id']);

    // set up our query to select the record from our table
    $query = '
SELECT 
  m.message
, m.message_created
, u.user_name 
FROM message m 
LEFT JOIN users u ON (m.user_id = u.user_id) 
WHERE room_id=:roomid
ORDER BY message_created DESC';

    // prepare our statement
    $statement = $db->prepare($query);

    // bind our values
    $statement->bindValue(':roomid', $roomid);

    GetRows($statement);
}

function GetRows($statement) {
    // run the query in a try/catch so we can see data if we fail
    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "Error selecting from DB. Details:<br> $ex";
        return;
    }
    
    // get all of the rows
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

    $html_text = "";

    // loop through each row
    foreach ($rows as $row)
    {
        // grab the required data from the row columns
        $user = $row['user_name'];
        $messageCreated = $row['message_created'];
        $message = $row['message'];

        // build our HTML
        $html_text .='
        <tr>
            <td width="30%">
                <p><b>' . $user . ': </b></p>
                <p>' . $messageCreated . '</p>
            </td>
            <td width="70%">
                <p>"' . $message . '"</p>
            </td>
        </tr>';
    }

    // send all of the results back to the caller.
    echo $html_text;
}

// function that handles inserting a message into the database
function SendMessage() {
    // connect to our database
    $db = get_db();

    // geat our extra data from the POST
    $userid = htmlspecialchars($_POST['userid']);
    $roomid = htmlspecialchars($_POST['id']);
    $message = htmlspecialchars($_POST['message']);

    $query = '
INSERT INTO message 
VALUES (:userid, :roomid, :message, NOW())';

    // prepare our statement
    $statement = $db->prepare($query);
        
    // bind our values
    $statement->bindValue(':userid', $userid);
    $statement->bindValue(':roomid', $roomid);
    $statement->bindValue(':message', $message);

    // run the query in a try/catch so we can see data if we fail
    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "Error inserting into DB. Details:<br> $ex";
		die();
    }
}
?>