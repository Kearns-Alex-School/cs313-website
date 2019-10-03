<!DOCTYPE html>
<html lang="en-US">
	
    <head>
        <title>CS 313 Assignments</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/style.css">
	</head>

    <body class="bg-primary container-fluid">
        <!-- Header -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/header.php");?>

        <!-- Navigation bar -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/nav.php");?>
        
        <!-- Content -->
        <br>
        <div id="content" class="container">

            <!-- Assignment List -->
            <?php include ($_SERVER['DOCUMENT_ROOT']."/php/assignment-list.php");?>

        </div>

        <!-- Footer bar -->
        <?php include ($_SERVER['DOCUMENT_ROOT']."/php/footer.php");?>
        
	</body>

</html>