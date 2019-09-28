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
	</head>

    <body class="bg-primary container-fluid">
        <!-- Header -->
        <?php include ('../php/header.php');?>

        <!-- Navigation bar -->
        <?php include ('../php/nav.php');?>
        
        <!-- Content -->
        <br>
        <div id="content" class="container">
            <h1>CS 313 Assignments</h1>
            <p>
                This is the main page of where you can find all of the assignments that I have worked on for this class. You can click on an assignment title to go to its page. Check back often to see if there have been any new additions to the site!!
            </p>
            
            <h2>Coming Soon!</h2>
            <p>
                You may have noticed some "broken" links on this site. Do not be afraid!! These are just temporary placeholders for things to come! Each week something new will be added and maybe more of these placeholders will be populated with actual names. This is to get you excited to come back and see each of these assignments completed and fully functioning!
            </p>

            <!-- Assignment List -->
            <?php include ('../php/assignment-list.php');?>

        </div>

        <!-- Footer bar -->
        <?php include ('../php/footer.php');?>
        
	</body>

</html>