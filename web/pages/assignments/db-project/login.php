<?php
require "dbConnect.php";
$db = get_db();
session_start();
$stmt = 'og';
$user = 'og';
$foo = 'og';

if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
        // Getting submitted user data from database
        $foo = htmlspecialchars($_POST['username']);

        $stmt = $db->prepare('SELECT * FROM t_user WHERE user_name=:id');
        $stmt->bind_Value(':id', $foo, PDO::PARAM_STR);
        $stmt->execute();

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        /*$result = $stmt->get_result();
        $user = $result->fetch_object();*/
        
        //console_log($stmt);
    		
    	// Verify user password and set $_SESSION
    	/*if ( password_verify( $_POST['password'], $user->password ) ) {
            $_SESSION['user_id'] = $user->ID;
            //console_log('Pass');
            //echo "<p>Pass <strong>$user :$_POST['password']</strong><p>";
        }*/
        /*else {
            //console_log('Fail');
            //echo "<p>Fail <strong>$user :$_POST['password']</strong><p>";
        }*/
    }
}
//$view_variable = 'a string here';
//console_log($view_variable);
?>

<!DOCTYPE html>
<html lang="en-US">
	
    <head>
        <title>Login</title>
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

            <!--form action="chat-rooms.php" method="post"-->
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="username">username:</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="username" />
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="password" />
                </div>
                
                <input type="submit" value="Login" class="btn btn-primary btn-lg btn-block">

                <input type="button" value="Create" class="btn btn-success btn-lg btn-block">
            </form>

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

echo "<p>$stmt</p>";
echo "<p>$user</p>";
if ( ! empty( $_POST ) ) {
    $foo = $_POST['username'];
    foreach ($_POST as $key => $value) {
        echo "<p>$key - $value</p>";
    }

    echo "<p>$foo</p>";
}

?>

        </div>

        <!-- Footer -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/footer.php");?>

	</body>

</html>