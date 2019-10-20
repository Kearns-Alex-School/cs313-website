function Login(user, password) {
    var thisUser = document.getElementById(user).value;
    var thisPassword = document.getElementById(password).value;

    if (thisUser === "" || thisPassword === "")
    {
        alert("Please enter a username and password");
        return;
    }

    var data =
    'action=login' +
    'user=' + thisUser + '&' +
    'password=' + thisPassword;

    var xmlhttp = new XMLHttpRequest();
    
    

    // check the database to see if we have a match
    $.ajax({
        
    })
    
        
    return true;
}


function Create(user, password) {
    var thisUser = document.getElementById(user).innerHTML;
    var thisPassword = document.getElementById(password).innerHTML;

    // try to add the new user to the database
        
    return true;
}