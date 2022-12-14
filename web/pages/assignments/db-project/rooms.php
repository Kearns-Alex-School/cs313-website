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
        <link rel="stylesheet" href="css/db-project.css">
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
                    <div class="form-group">
                        <label for="searchName">Search Rooms:</label>
                        <input type="text" name="searchName" id="searchName" class="form-control" placeholder="search rooms" />
                    </div>
                    
                    <button type="button" value="search" class="btn btn-primary" onclick="Search();">Search</button>

                    <button type="button" value="refresh" class="btn btn-primary" onclick="Refresh();">Refresh</button>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="roomName">New Room:</label>
                        <input type="text" name="roomName" id="roomName" class="form-control" placeholder="new room" />
                    </div>
                
                    <button type="button" value="create" class="btn btn-primary" onclick="DoCreate();">Create</button>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="roomPass">Password:</label>
                        <input type="password" name="roomPass" id="roomPass" class="form-control" placeholder="room pass" />
                    </div>
                </div>
            </div>

            <h2>Chatrooms</h2>

            <table class="table table-striped table-hover table-items">
                <tr>
                    <th width="40%">Room</th>
                    <th width="30%">Creator</th>
                    <th width="10%">Pass</th>
                    <th width="20%"> </th>
                </tr>
            </table>

            <div class="table-responsive scroll">
                <form method="post" target="_blank" action="php/password-helper.php">
                    <table class="table table-striped table-hover table-items">

                    <tbody id="results">

                    </tbody>
                    
                    </table>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/footer.php");?>

	</body>

</html>

<script>Refresh();</script>