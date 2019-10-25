function Refresh()
{
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("results").innerHTML = this.responseText;
        }
    };

    xhttp.open("POST", "php/rooms-helper.php");
    xhttp.send('function=refresh');
}

function Search() 
{

}

function Create() 
{
    Refresh();
}