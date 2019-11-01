<?php
// put this code at the top of any page you want to "protect"
// always begin our session
session_start();

// check to see if we have our user session variable set
if (!isset( $_SESSION['user'])) {
    // send the user to the login page
    header("Location: login.php");

    // we always include a die after redirects
    die();
}

// grab session data 
$username = $_SESSION['user'];
$userid = $_SESSION['userid'];
$roomname = $_SESSION['room'];
$roomid = $_SESSION['roomid'];
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

    <body class="container-fluid" onload="Setup()">
        <!-- Content -->
        <input type="hidden" id="roomid" name="roomid" value="<?php echo $roomid; ?>">
        <input type="hidden" id="userid" name="userid" value="<?php echo $userid; ?>">

        <br>
        <div id="content" class="container">
            <h1>Welcome <?php echo $username; ?>!</h1>
            <h2 class="text-center"><?php echo $roomname; ?></h2>

            <div class="table-responsive scroll">
                <table class="table table-striped table-hover table-items">
                    <tbody id="results">

                    </tbody>
                </table>
            </div>

            <br>

            <div class="form-group">
                <textarea rows="5" name="message" id="message" class="form-control" placeholder="message" onkeypress="return CheckEnterPressed();"></textarea>
            </div>
            
            <button class="btn btn-primary btn-lg" onclick="SendMessage();">Send</button>
        </div>

        <!-- Footer -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/footer.php");?>

	</body>

</html>