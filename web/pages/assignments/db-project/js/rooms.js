// function that handles getting all of the rooms in the database
function Refresh()
{
    // create our ajax
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // populate our results 
            document.getElementById("results").innerHTML = this.responseText;
        }
    };

    // create and send our request to our helper script
    xhttp.open("POST", "php/rooms-helper.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('function=refresh');
}

// function that handles searching for a room in the database
function Search() 
{
    // create our ajax
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // populate our results
            document.getElementById("results").innerHTML = this.responseText;
        }
    };

    // grab our data
    var searchName = document.getElementById("searchName").value;

    // create and send our request to our helper script
    xhttp.open("POST", "php/rooms-helper.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('function=search&searchName=' + searchName);
}

// function that handles creating a new chatroom in the database
function DoCreate() 
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // check to see if we got an error while adding
            if (this.responseText.includes("Error: ")) {
                // post the error to the screen
                document.getElementById("results").innerHTML = this.responseText;

                return;
            }

            // get all of the rooms
            Refresh();

            // clear our entered text
            document.getElementById("roomName").value = '';
            document.getElementById("roomPass").value = '';
        }
    };

    // grab our create values
    var roomName = document.getElementById("roomName").value;
    var roomPass = document.getElementById("roomPass").value;

    // makesure that the roomName has a value
    if (roomName == '') {
        alert("Please do not leave the room name blank.");
        return;
    }

    // create and send our request to our helper script
    xhttp.open("POST", "php/rooms-helper.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('function=create&roomName=' + roomName + '&roomPass=' + roomPass);
}