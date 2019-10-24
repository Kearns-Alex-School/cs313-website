<?php
$name = htmlspecialchars($_POST["fname"]).' '.htmlspecialchars($_POST["lname"]);
$address = htmlspecialchars($_POST["address"]);
?>

<!DOCTYPE html>
<html lang="en-US">
	
    <head>
        <title>CS 313 Shopping Cart</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/shopping-cart.css">
        <script src="js/confirmation.js"></script>
	</head>

    <body class="container-fluid">
        <!-- Header -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/header.php");?>

        <!-- Navigation Bar -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/nav.php");?>
        
        <!-- Content -->
        <br>
        <div id="content" class="container">
            <h1>CS 313 PHP Shopping Cart</h1>
            
            <br>

            <div class="row">
                <div class="col-sm-8">

                    <h1 h1 class="display-4 text-left">Thank you <?=$name ?> for your purchase!</h1>

                    <p>
                    I hope you understand that because there was no need for a method of payment, this is completely fake. You will not receive any kind of candy that you have tried to purchase. I am sorry if you are disappointed but this is a school assignment. I hope you understand. Thank you for trying my site out! These items would have shipped to:
                    </p>

                    <p><?=$address ?></p>

                    <div id="recipt"></div>

                </div>
                <div class="col-sm-4">
                    
                    <a href="browse-items.php" type="button" class="btn btn-primary btn-lg btn-block" >Browse Products</a>

                </div>
            </div>

        </div>

        <!-- Footer -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/footer.php");?>

	</body>

</html>