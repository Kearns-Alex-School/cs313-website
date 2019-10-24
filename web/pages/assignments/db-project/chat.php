<?php
// You'd put this code at the top of any "protected" page you create

// Always start this first
session_start();
$username = '';
$userid = '';
$roomname = $_GET['room'];
$roomid = $_GET['roomid'];

if ( isset( $_SESSION['user'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
    $username = $_SESSION['user'];
    $userid = $_SESSION['userid'];

} else {
    header("Location: http://kearns-cs313.herokuapp.com/pages/assignments/db-project/login.php");

    die();
}

require "php/dbConnect.php";
$db = get_db();
?>

<!DOCTYPE html>
<html lang="en-US">
	
    <head>
        <title>Chat</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT'];?>/css/style.css">
	</head>

    <body class="container-fluid">
        <!-- Header -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/header.php");?>

        <!-- Navigation Bar -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/nav.php");?>
        
        <!-- Content -->
        <br>
        <div id="content" class="container">
            <h1>Welcome <?php echo $username; ?>!</h1>
            <h2>Chat <?php echo $roomname; ?></h2>

            <?php

            //
            $stmt = $db->prepare('select m.message, m.message_created, u.user_name from t_messages m LEFT JOIN t_user u ON (m.user_id = u.user_id) WHERE room_id=:roomid');
            $stmt->bindValue(':roomid', $roomid, PDO::PARAM_INT);
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($rows as $row)
            {
                echo '<p>';
                echo '<b>' . $row['message_created'] . ': </b>';
                echo '' . $row['user_name'] . ' - ';
                echo '"' . $row['message'] . '"';
                echo '</p>';
            }

            ?>

            <form action="#" method="POST">
                <div class="form-group">
                    <input type="text" name="message" id="message" class="form-control" placeholder="message" />
                </div>
                
                <input type="submit" value="Send" class="btn btn-primary btn-lg">
            </form>
        </div>

        <!-- Footer -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/footer.php");?>

	</body>

</html>