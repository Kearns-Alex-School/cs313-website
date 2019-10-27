<?php
require "dbConnect.php";

$roomid = htmlspecialchars($_POST['roomid']);

echo "Roomid: $roomid";

echo "
SELECT 
room_password 
FROM t_room 
WHERE room_id = $roomid";

/*$db = get_db();

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


echo "Password: $returned_password";

if ($returned_password == '')
{
    header("Location: ../chat.php?roomid=$roomid");
    die();
}
else {
    echo "need password";
}*/

?>