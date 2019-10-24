<?php
require "dbConnect.php";
$db = get_db();
session_start();

// Getting submitted user data from database
//$func     = htmlspecialchars($_POST['function']);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$submit = htmlspecialchars($_POST['submit']);
$returned_password = '';
$returned_id = '';






echo '<p>submit: ' . $submit[0] . '</p>';
echo '<p>user: ' . $username . '</p>';
echo '<p>pass: ' . $password . '</p>';

// if we are creating a new user then we need to add it so we will pass on the "check" later
/*if ($submit[0] === 'create' && $password !== '' && $username !== '') {
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

    //console_log('Pass');

    //echo $username . ' : ' . $returned_id + 'Pass';

    // send the user to the rooms
    header("Location: ../rooms.php");

    die();
}
else {
    //console_log('Fail');

    //echo $username . ' : ' . $returned_id + 'Fail';

    // send the user back to the login page
    header("Location: ../login.php?fail=true");

    die();
}*/
?>