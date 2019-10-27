<?php
require "dbConnect.php";

$roomid = htmlspecialchars($_POST['submit'][0]);

echo "<p>Roomid: $roomid</p>";

echo "<p>
SELECT 
room_password 
FROM t_room 
WHERE room_id = $roomid</p>";

$db = get_db();

$stmt = $db->prepare("
SELECT 
room_password 
FROM t_room 
WHERE room_id = $roomid");

try
{
    $stmt->execute();
}
catch (PDOException $ex) {
    echo "Error connecting to DB. Details: $ex";
    die();
}

$returned_password = '';
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row)
{
   $returned_password = $row['room_password'];
}


echo "<p>Password: $returned_password</p>";

if ($returned_password == '')
{
    header("Location: ../chat.php?roomid=$roomid");
    die();
}
else {
    echo "<p>need password</p>";
}

?>