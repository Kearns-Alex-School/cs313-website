<?php
require "dbConnect.php";
session_start();

$roomid = htmlspecialchars($_POST['submit'][0]);
if ($roomid =='' && isset( $_SESSION['roomid'] ) ) {
    $roomid = $_SESSION['roomid'];
}
else 
{
    $_SESSION['roomid'] = $roomid;
}

$db = get_db();
$stmt = $db->prepare("
SELECT 
  room_password 
, room_name
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
$returned_name = '';

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row)
{
   $returned_password = $row['room_password'];
   $returned_name = $row['room_name'];
}

$wrong = false;

if ($returned_password == '')
{
    $_SESSION['roomid'] = $roomid;
    $_SESSION['room'] = $returned_name;
    header("Location: ../chat.php");
    die();
}
else if (isset( $_GET['password']))
{
    if ($_GET['password'] == $returned_password)
    {
        $_SESSION['roomid'] = $roomid;
        $_SESSION['room'] = $returned_name;
        header("Location: ../chat.php");
        die();
    }
    else {
        $wrong = true;
    }
}
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
            if ($wrong == true)
            {
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