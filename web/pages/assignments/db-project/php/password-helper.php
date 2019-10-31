<?php
// put this code at the top of any page you want to "protect"
require "dbConnect.php";

// always begin our session
session_start();

// special way to find out which join button was pressed
$roomid = htmlspecialchars($_POST['submit'][0]);

// this is our continual check if we keep entering the wrong password to keep
// the room id associated
// if the roomid is not in the POST data, then it is in our session
if ($roomid == '' && isset($_SESSION['roomid'])) {
    $roomid = $_SESSION['roomid'];
// if our session does not have a roomid, then we need to create one
} else {
    $_SESSION['roomid'] = $roomid;
}

// connect to our database
$db = get_db();

// set up our query to select the record from our table
$query = '
SELECT 
  room_password 
, room_name
FROM room 
WHERE room_id = :roomid';

// prepare our statement
$statement = $db->prepare($query);

// bind our values
$statement->bindValue(':roomid', $roomid);

// run the query in a try/catch so we can see data if we fail
try{
    $result = $statement->execute();
}catch (PDOException $ex) {
    echo "Error selecting from DB. Details: $ex";
    die();
}

// grab the first result
$row = $statement->fetch();

// grab the required data from the row
$hashedPasswordFromDB = $row['room_password'];
$returned_name = $row['room_name'];

// check to see if there is no password on this room
if ($hashedPasswordFromDB == '')
{
    // set our session data
    $_SESSION['roomid'] = $roomid;
    $_SESSION['room'] = $returned_name;

    // send the user to the chat page
    header("Location: ../chat.php");

    // we always include a die after redirects
    die();
}

$wrong = false;

// get the data from the GET
$password = htmlspecialchars($_GET['password']);

// check to see if the user entered a password yet
if (!isset($password) || $password == "") {
    // break out because we have password to compare
    return;
}

// check the password entered and the one returned from the database
if (password_verify($password, $hashedPasswordFromDB)) {
    // set our session data
    $_SESSION['roomid'] = $roomid;
    $_SESSION['room'] = $returned_name;

    // send the user to the chat page
    header("Location: ../chat.php");

    // we always include a die after redirects
    die();
}

// if we get it this far, we entered the wrong password
$wrong = false;
?>

<!DOCTYPE html>
<html lang="en-US">
	
    <head>
        <title>Enter Password</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT'];?>/css/style.css">
        <link rel="stylesheet" href="css/db-project.css">
	</head>

    <body class="container-fluid">
        <!-- Content -->
        <br>
        <div id="content" class="container">
            <h1>Please enter the password for <?php echo $returned_name; ?></h1>

            <?php 
            if ($wrong == true) {
                echo '<p class="text-danger">Password was incorrect. Please try again.</p>';
            }
            ?>

            <form>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="password" />
                </div>
                
                <input type="submit" value="Submit" class="btn btn-primary btn-lg">
            </form>
        </div>

        <!-- Footer -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/footer.php");?>

	</body>

</html>