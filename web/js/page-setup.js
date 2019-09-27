// setup page that adds all of the common components to each web page that is created

$( document ).ready(function() {
    // Header
    $("#header").load("../php/header.php");

    // Navigation bar
    $("#nav").load("../php/nav.php");

    // Footer
    $("#footer").load("../php/footer.php");
});
