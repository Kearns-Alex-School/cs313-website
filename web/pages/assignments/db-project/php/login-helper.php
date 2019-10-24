<?php
require "dbConnect.php";
$db = get_db();
session_start();

// Getting submitted user data from database
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$submit = htmlspecialchars($_POST['submit'][0]);
$returned_password = '';
$returned_id = '';

/*
echo '<p>submit: ' . $submit . '</p>';
echo '<p>user: ' . $username . '</p>';
echo '<p>pass: ' . $password . '</p>';
*/

// if we are creating a new user then we need to add it so we will pass on the "check" later
if ($submit === 'create' && $password !== '' && $username !== '') {
	$sql = "insert into t_user (user_name, user_password) values ('" . $username . "', '" . $password . "')";

	$stmt = $db->prepare($sql);
	$stmt->execute();
}

// grab the username from the database if there is a match
$sql = "select * from t_user where user_name='" . $username . "'";

$stmt = $db->prepare($sql);
$stmt->execute();

// go through the results and see if we have data
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row)
{
   $returned_password = $row['user_password'];
   $returned_id = $row['user_id'];
}

console_log($username);
	
// verify user password
if ($password === $returned_password && $password !== '') {
    // set our SESSION variables that we will use throughout the page
    $_SESSION['user'] = $username;
    $_SESSION['userid'] = $returned_id;

    // send the user to the rooms
    header("Location: ../rooms.php");

    die();
}
else {
    // send the user back to the login page
    header("Location: ../login.php?fail=true");

    die();
}
?>