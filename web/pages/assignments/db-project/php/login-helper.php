<?php
require "dbConnect.php";
$db = get_db();
session_start();

// Getting submitted user data from database
$func     = htmlspecialchars($_REQUEST['function']);
$username = htmlspecialchars($_REQUEST['username']);
$password = htmlspecialchars($_REQUEST['password']);
$returned_password = '';
$returned_id = '';

// if we are creating a new user then we need to add it so we will pass on the "check" later
if ($func === 'create' && $password !== '' && $username !== '') {
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

// Redirect them to the login page
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	
// verify user password
if ($password === $returned_password && $password !== '') {
    // set our SESSION variables that we will use throughout the page
    $_SESSION['user'] = $username;
    $_SESSION['userid'] = $returned_id;

    console_log('Pass');

    // send the user to the rooms
    $extra = 'rooms.php';
    header("Location: http://$host$uri/$extra");

    die();
}
else {
    console_log('Fail');

    // send the user back to the login page
    $extra = 'login.php';
    header("Location: http://$host$uri/$extra?fail=true");

    die();
}
?>