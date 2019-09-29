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
        <link rel="stylesheet" href="css/style.css">
	</head>

    <body class="bg-primary container-fluid">
        <!-- Header -->
        <?php include ('php/header.php');?>

        <!-- Navigation Bar -->
        <?php include ('php/nav.php');?>
        
        <!-- Content -->
        <br>
        <div id="content" class="container">
            <h1>CS 313 Home Page</h1>

            <p>Welcome to my homepage for CS 313 - Web Engineering II! Thank you so much for visiting. It really means a lot to me.</p>

            <h2>A Little About Myself</h2>

            <div class="media">
                <img src="content/images/profile.jpg" width="200" class="mr-3" alt="...">
                <div class="media-body">
                    <h5 class="mt-0">Basic Information</h5>
                    My name is Alex Kearns and I am pursuing a bachelor’s degree in Software Engineering. I will be graduating in April of 2020. My current residence is in the snowy state of Michigan. I have been programming since my freshman year of high school and love/hate it. Even though I have this relationship, I would not imagine myself doing anything other than this. It presents to me a challenge or puzzle for me to complete.
                </div>
            </div>

            <br>

            <div class="media">
                <img src="content/images/slct.jpg" width="200" class="mr-3" alt="...">
                <div class="media-body">
                    <h5 class="mt-0">Married Life</h5>
                    I was married to my wonderful wife in July of 2017 and sealed in the Salt Lake Temple a year later. We have no kids at the moment and are not planning on any for a few more years. But whatever comes will come. Some things that we both like to do in our free time include watching anime, playing video games, and cuddle while thinking of what our lives have in store for us.
                </div>
            </div>

            <br>

            <div class="media">
                <img src="content/images/alttp-banner.jpg" width="200" class="mr-3" alt="...">
                <div class="media-body">
                    <h5 class="mt-0">Conclusion</h5>
                    I hope you enjoyed learning a little about myself! Please come back often to check out the many assignments that will be added to this site. I cannot wait for us to see how much I have grown since day one of this semester. 
                </div>
            </div>

        </div>

        <!-- Footer -->
        <?php include ('php/footer.php');?>

	</body>

</html>