<?php
require "dbConnect.php";

// get our function data from the POST
$func = htmlspecialchars($_POST['function']);

// depending on what we got, call the associated function
switch ($func)
{
    case "create":
        DoCreate();
        break;

    case "refresh":
        Refresh();
        break;

    case "search":
        Search();
        break;

    default:
        echo 'fail';
}

// function that handles inserting a new room in the database
function DoCreate() {
    // start our session
    session_start();

    // connect to our database
    $db = get_db();

    // geat our extra data from the POST and session
    $userid = $_SESSION['userid'];
    $roomName = htmlspecialchars($_POST['roomName']);
    $roomPass = htmlspecialchars($_POST['roomPass']);
    
    // set up our query to insert the record into our table
    $query = '
INSERT INTO room 
VALUES (:userid, NOW(), :roomName, roomPass)';

    // prepare our statement
    $statement = $db->prepare($query);
    
    // bind our values
    $statement->bindValue(':userid', $userid);
    $statement->bindValue(':roomName', $roomName);
    $statement->bindValue(':roomPass', $roomPass);

    // run the query in a try/catch so we can see data if we fail
    try {
        $statement->execute();
    } catch (PDOException $ex) {
        echo "Error inserting into DB. Details:<br> $ex";
		die();
    }
}

// function responsible for grabbing all of the rooms
function Refresh() {
    // connect to our database
    $db = get_db();

    // set up our query to select the record from our table
    $query = '
SELECT 
  r.room_id
, r.room_name
, u.user_name
, r.room_password 
FROM room r 
LEFT JOIN users u ON (r.user_id = u.user_id) 
ORDER BY r.room_id';

    // prepare our statement
    $statement = $db->prepare(query);

    GetRows($statement);
}

function Search() {
    // connect to our database
    $db = get_db();

    // get our extra data from the POST
    $roomName = htmlspecialchars($_POST['searchName']);

    // set up our query to select the record from our table
    $query = '
SELECT 
  r.room_id
, r.room_name
, u.user_name
, r.room_password 
FROM room r 
LEFT JOIN users u ON (r.user_id = u.user_id)
WHERE r.room_name LIKE ''%:roomName%'' 
ORDER BY r.room_id';

    // prepare our statement
    $statement = $db->prepare($query);

    // bind our values
    $statement->bindValue(':roomName', $roomName);

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
        $room_name = $row['room_name'];
        $creator = $row['user_name'];
        $password = $row['room_password'];
        $room_id = $row['room_id'];

        // build our HTML
        $html_text .='
        <tr>
            <td width="40%">
                <p>'.$room_name.'</p>
            </td>
            <td width="30%">
                <p>'.$creator.'</p>
            </td>
            <td width="10%">';

        // check to see if we have a password on this room
        if ($password !=='')
        {
            $html_text .='
                <img src="content/images/lock.png" alt="L" width="25px">';
        }

        $html_text .='
            </td>
            <td width="20%">
                <button type="submit" class="btn btn-success btn-sm btn-block" name="submit[]" value="'.$room_id.'">Join</button>
            </td>
        </tr>';
    }

    // send all of the results back to the caller.
    echo $html_text;
}
?>