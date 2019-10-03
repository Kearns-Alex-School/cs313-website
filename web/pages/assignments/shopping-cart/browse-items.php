<!DOCTYPE html>
<html lang="en-US">
	
    <head>
        <title>CS 313 Home Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT'];?>/css/style.css">
	</head>

    <body class="bg-primary container-fluid">
        <!-- Header -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/header.php");?>

        <!-- Navigation Bar -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/nav.php");?>
        
        <!-- Content -->
        <br>
        <div id="content" class="container">
            <h1>CS 313 PHP Shopping Cart</h1>
            
            <br>

            <h2>Candy Shop</h2>

            <br>

            <div class="row">
                <div class="col-sm-9">

                    <!-- Product Table -->
                    <?php include ($_SERVER['DOCUMENT_ROOT']."/php/shopping-cart/items.php");?>
                </div>
                <div class="col-sm-3">
                
                </div>
            </div>

        </div>

        <!-- Footer -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/footer.php");?>

	</body>

</html>