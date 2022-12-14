<!DOCTYPE html>
<html>
    <head>
        <title>CS 313 Checkout</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/shopping-cart.css">
        <script src="js/checkout.js"></script>
    </head>
    
    <body class="container-fluid">
        <!-- Header -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/header.php");?>

        <!-- Navigation Bar -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/nav.php");?>
        
        <!-- Content -->
        <br>
        <div id="content" class="container">
            <h1>CS 313 PHP Review Cart</h1>
            
            <br>

            <div class="row">
                <div class="col-sm-8">
                    <br>

                    <table class="table table-striped table-hover table-items">
                        <thead>
                            <tr>
                                <th width="25%">Name</th>
                                <th width="10%">Price</th>
                                <th width="25%">Qty</th>
                                <th width="40%">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody id="table-contents">

                            <!-- Run JS to populate table rows -->

                        </tbody>
                    </table>
                </div>
                <div class="col-sm-4">
                    <h1 class="display-4 text-center">Total</h1>

                    <h2 class="display-4 text-center" id="total-price">$0.00</h2>
                    <form action="confirmation.php" method="post">
                    <div class="form-group">
                        <label for="fname">First Name:</label>
                        <span id="fnamevalid" class="text-danger"> *</span>
                        <input type="text" name="fname" id="fname" class="form-control" onInput="checkName('fname', 'fnamevalid')" placeholder="First Name..." />
                    </div>

                    <div class="form-group">
                        <label for="lname">Last Name:</label>
                        <span id="lnamevalid" class="text-danger"> *</span>
                        <input type="text" name="lname" id="lname" class="form-control" onInput="checkName('lname', 'lnamevalid')" placeholder="Last Name..." />
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <span id="addressvalid" class="text-danger"> *</span>
                        <input type="text" name="address" id="address" class="form-control" onInput="checkAddress('address', 'addressvalid')" placeholder="12345 road rd. City, ST 12345" />
                    </div>
                    
                    <input type="submit" value="Checkout" class="btn btn-success btn-lg btn-block" onclick="return checkAll()">

                    <a type="button" class="btn btn-danger btn-lg btn-block" onclick="history.back()">Go Back</a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/footer.php");?>

	</body>
</html>