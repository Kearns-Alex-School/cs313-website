<?php
// You'd put this code at the top of any "protected" page you create

// Always start this first
session_start();
$username = '';
$userid = '';
$roomname = '';
$roomid = '';

if ( isset( $_SESSION['user'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
    $username = $_SESSION['user'];
    $userid = $_SESSION['userid'];
    $roomname = $_SESSION['room'];
    $roomid = $_SESSION['roomid'];

} else {
    // send the user to the rooms
    header("Location: login.php");
    die();
}

require "php/dbConnect.php";
$db = get_db();
?>

<!DOCTYPE html>
<html lang="en-US">
	
    <head>
        <title>Chat <?php echo $roomname; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT'];?>/css/style.css">
        <link rel="stylesheet" href="css/db-project.css">
        <script src="js/chat.js"></script>
	</head>

    <body class="container-fluid">
        <!-- Header -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/header.php");?>

        <!-- Navigation Bar -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/nav.php");?>
        
        <!-- Content -->
        <input type="hidden" id="roomid" name="roomid" value="<?php echo $roomid; ?>">
        <input type="hidden" id="userid" name="userid" value="<?php echo $userid; ?>">

        <br>
        <div id="content" class="container">
            <h1>Welcome <?php echo $username; ?>!</h1>
            <h2>Chat <?php echo $roomname; ?></h2>

            <div class="table-responsive scroll">
                <table class="table table-striped table-hover table-items">
                    <tbody id="results">

                    </tbody>
                </table>
            </div>

            <div class="form-group">
                <input type="text" name="message" id="message" class="form-control" placeholder="message" />
            </div>
            
            <button class="btn btn-primary btn-lg" onclick="SendMessage();">Send</button>
        </div>

        <!-- Footer -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/footer.php");?>

	</body>

</html>

<script>setTimeout(Refresh(), 5000);</script>