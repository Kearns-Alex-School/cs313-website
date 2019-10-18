<?php
require "dbConnect.php";
$db = get_db();
?>

<!DOCTYPE html>
<html lang="en-US">
	
    <head>
        <title>Message Home</title>
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
            <h1>Simple Chatroom</h1>
            
            <br>

            <form action="#" method="post">
                    <div class="form-group">
                        <label for="fname">User:</label>
                        <input type="text" name="user" id="user" class="form-control" placeholder="user name" />
                    </div>

                    <div class="form-group">
                        <label for="lname">Password:</label>
                        <input type="text" name="password" id="password" class="form-control" placeholder="Password" />
                    </div>
                    
                    <input type="submit" value="Login" class="btn btn-success btn-lg btn-block">

                    <input type="submit" value="Create" class="btn btn-success btn-lg btn-block">

            <?php
$statement = $db->prepare("SELECT user_name, user_password, user_email FROM t_user");
$statement->execute();

// Go through each result
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	// The variable "row" now holds the complete record for that
	// row, and we can access the different values based on their
	// name
	$user_name = $row['user_name'];
	$user_password = $row['user_password'];
	$user_email = $row['user_email'];

	echo "<p><strong>$user_name :$user_email</strong> - \"$user_password\"<p>";
}


?>

        </div>

        <!-- Footer -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/footer.php");?>

	</body>

</html>