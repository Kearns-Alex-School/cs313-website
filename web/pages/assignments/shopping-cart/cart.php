<!DOCTYPE html>
<html lang="en-US">
	
    <head>
        <title>CS 313 Cart Contents</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT'];?>/css/style.css">
        <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT'];?>/css/shopping-cart.css">
        <script src="../../../js/cart.js"></script>
	</head>

    <body class="container-fluid">
        <!-- Header -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/header.php");?>

        <!-- Navigation Bar -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/nav.php");?>
        
        <!-- Content -->
        <br>
        <div class="container">
            <h1>CS 313 PHP Cart Contents</h1>
            
            <br>

            <div class="row">
                <div class="col-sm-8" id="item-contents">

                    <!-- Product Table -->

                </div>
                <div class="col-sm-4">
                    <h1 class="display-4 text-center">Total</h1>

                    <h2 class="display-4 text-center" id="total-price">$0.00</h2>

                    <a href="../../../pages/assignments/shopping-cart/browse-items.php" type="button" class="btn btn-primary btn-lg btn-block" >Browse Products</a>

                    <a href="../../../pages/assignments/shopping-cart/checkout.php" type="button" class="btn btn-success btn-lg btn-block" id="checkout-btn" >Checkout</a>

                    <a type="button" class="btn btn-danger btn-lg btn-block" onclick="clearCart()">Remove All</a>
                </div>
            </div>

        </div>

        <!-- Footer -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/footer.php");?>

	</body>

</html>