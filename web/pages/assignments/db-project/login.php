<?php
require "dbConnect.php";
$db = get_db();
session_start();
$login_error = false;

if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
        // Getting submitted user data from database
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $returned_password = '';
        $returned_id = '';

        $sql = "select * from t_user where user_name=" . $username;

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row)
        {
            $returned_password = $row['user_password'];
            $returned_id = $row['user_id'];
        }
        
        console_log($username);
    		
    	// Verify user password and set $_SESSION
    	if ($password === $returned_password && $password !== '') {
            $_SESSION['user'] = $username;
            $_SESSION['userid'] = $returned_id;

            console_log('Pass');

            $dir_path = 'https://kearns-cs313.herokuapp.com/pages/assignments/db-project/rooms.php';
            header('Location: ' . $dir_path);
        }
        else {
            console_log('Fail');
            $login_error = true;
        }
    }
}
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

            <?php 
            if ($login_error == true)
            {
                echo '<p class="text-danger">Username or Password was incorrect. Please try again.</p>';
            }
            ?>
            
            <br>

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

        </div>

        <!-- Footer -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/footer.php");?>

	</body>

</html>