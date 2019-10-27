function Refresh()
{
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("results").innerHTML = this.responseText;
        }
    };

    xhttp.open("POST", "php/rooms-helper.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('function=refresh');
}

function Search() 
{
    var xhttp = new XMLHttpRequest();

    var searchName = document.getElementById("searchName").value;

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("results").innerHTML = this.responseText;
        }
    };

    xhttp.open("POST", "php/rooms-helper.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('function=search&searchName=' + searchName);
}

function DoCreate() 
{
    var xhttp = new XMLHttpRequest();

    var roomName = document.getElementById("roomName").value;
    var roomPass = document.getElementById("roomPass").value;

    if (roomName == '')
    {
        alert("Please do not leave the room name blank.");
        return;
    }

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText.includes("Error: ")) {
                document.getElementById("results").innerHTML = this.responseText;
                return;
            }
            Refresh();

            document.getElementById("roomName").value = '';
            document.getElementById("roomPass").value = '';
        }
    };

    xhttp.open("POST", "php/rooms-helper.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('function=create&roomName=' + roomName + '&roomPass=' + roomPass);
}

function OpenRoom(id)
{
    //myWindow=window.open('lead_data.php?leadid=1','myWin','width=400,height=650');
}