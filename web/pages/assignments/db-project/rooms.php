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
    // send the user to the rooms
    header("Location: ../login.php?test=test");

    die();
}

require "php/dbConnect.php";
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
        <script src="js/rooms.js"></script>
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

            <div class="row">
                <div class="col-sm-6">
                    <form>
                        <div class="form-group">
                            <label for="searchName">Search Rooms:</label>
                            <input type="text" name="searchName" id="searchName" class="form-control" placeholder="search rooms" />
                        </div>
                        
                        <button type="submit[]" value="search" class="btn btn-primary">Search</button>
                        <button type="submit[]" value="refresh" class="btn btn-primary">Refresh</button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <form>
                        <div class="form-group">
                            <label for="roomName">New Room:</label>
                            <input type="text" name="roomName" id="roomName" class="form-control" placeholder="new room" />
                        </div>
                        <div class="form-group">
                            <label for="roomPass">Password:</label>
                            <input type="password" name="roomPass" id="roomPass" class="form-control" placeholder="room pass" />
                        </div>
                    
                        <button type="submit[]" value="create" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
            
            <h2>Chatrooms</h2>

            <div class="row">
                <div class="col-sm-12">
                    <!--table-- id="results">
                    
                    </!--table-->
                    <div id="results">
                    
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/footer.php");?>

	</body>

</html>

<script Refresh(); >