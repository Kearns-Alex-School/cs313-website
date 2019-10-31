<?php
require "dbConnect.php";

// always begin our session
session_start();

// connect to our database
$db = get_db();

// get the data from the POST
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

// check that we have recieved values to work with
if (!isset($username) || $username == ""
	|| !isset($password) || $password == "") {
    // send the user back to the login page
    header("Location: ../login.php");
    
    // we always include a die after redirects
	die(); 
}

// special way to find out which submit button was pressed
$submit = htmlspecialchars($_POST['submit'][0]);

// if we are creating a new user, add it so we will pass on the "check" later
if ($submit == 'create') {
    // hash the entered password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // set up our query to insert the record into our table
	$query = '
INSERT INTO users 
VALUES (:username, :password)';

    // prepare our statement
    $statement = $db->prepare($query);

    // bind our values
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $hashedPassword);
    
    // run the query in a try/catch so we can see data if we fail
    try {
        $statement ->execute();
    } catch (PDOException $ex) {
        echo "Error inserting into DB. Details:<br> $ex";
		die();
    }
}

// set up our query to select the record from our table
$query = '
SELECT user_password, user_id 
FROM users 
WHERE user_name = :username';

// prepare our statement
$statement = $db->prepare($query);

// bind our values
$statement->bindValue(':username', $username);

// run the query in a try/catch so we can see data if we fail
try {
    $result = $statement->execute();
} catch (PDOException $ex) {
    echo "Error selecting from DB. Details:<br> $ex";
    die();
}

if (!$result) {
    // send the user back to the login page
    header("Location: ../login.php?fail=true");

    // we always include a die after redirects
    die();
}

// grab the first result
$row = $statement->fetch();

// grab the required data from the row
$hashedPasswordFromDB = $row['user_password'];
$returned_id = $row['user_id'];

// check the password entered and the one returned from the database
if (!password_verify($password, $hashedPasswordFromDB)) {
    // send the user back to the login page
    header("Location: ../login.php?fail=true");

    // we always include a die after redirects
    die();
}

// set our session data
$_SESSION['user'] = $username;
$_SESSION['userid'] = $returned_id;

// send the user to the room page
header("Location: ../rooms.php");

// we always include a die after redirects
die();
?>