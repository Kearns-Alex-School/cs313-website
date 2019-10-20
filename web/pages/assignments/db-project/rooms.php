<?php
// You'd put this code at the top of any "protected" page you create

// Always start this first
session_start();
$username = '';
$userid = '';

/*Check to see if $_SESSION['visited'] has already been set during this users visit.
Store the result of that check in to the variable $visited.
*/
$visited = isset($_SESSION['visited']);
/* Set $_SESSION['visited'] so that the above check will return true on future visits. */
$_SESSION['visited'] = true;

if ( isset( $_SESSION['user'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
    $username = $_SESSION['user'];
    $userid = $_SESSION['userid'];
} else {
    // Redirect them to the login page
    header("Location: https://kearns-cs313.herokuapp.com/pages/assignments/db-project/login.php");
}

require "dbConnect.php";
$db = get_db();
?>

<!DOCTYPE html>
<html lang="en-US">
	
    <head>
        <title>Chatrooms</title>
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
            <h2>ChatRooms</h2>

            <form>
                <div class="form-group">
                    <input type="text" name="roomName" id="roomName" class="form-control" placeholder="search rooms" />
                </div>
                
                <input type="submit" value="Search" class="btn btn-primary">
            </form>

            <?php

            // Search 
            $roomName = $_GET['roomName'];
            $stmt = $db->prepare('select * from t_room');

            /*if ($visited == false)
            {
                $stmt = $db->prepare('select * from t_room');
            }
            else {
                $stmt = $db->prepare("select * from t_room WHERE room_name like '%:roomName%");
                $stmt->bindValue(':roomName', $roomName, PDO::PARAM_STR);
            }*/
            
            $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($rows as $row)
            {
                echo '<p>';
                echo '<a href="chat.php?room=' . $row['room_name'] . '&roomid=' . $row['room_id'].'">';
                echo '<b>' . $row['room_name'] . '</b>';
                echo '</a>';
                echo '</p>';
                echo '<br>';
            }

            ?>

        </div>

        <!-- Footer -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/footer.php");?>

	</body>

</html>