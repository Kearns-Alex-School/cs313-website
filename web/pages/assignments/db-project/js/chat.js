window.intervalid = '';
window.instance   = false;


intervalid = setInterval('Refresh()', 1000);


function Refresh()
{
    // check to see if we are already in this update
    if (!instance)
    {
        // set our flag so we do not walk on ourself
        instance = true;

        console.log("inside");
        var roomid = document.getElementById("roomid").value;
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("results").innerHTML = this.responseText;

                // reset the flag
                instance = false;
            }
        };

        xhttp.open("POST", "php/chat-helper.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('function=refresh&id=' + roomid);
    }
}

function SendMessage()
{
    var roomid = document.getElementById("roomid").value;
    var userid = document.getElementById("userid").value;
    var message = document.getElementById("message").value;
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("message").value = '';
        }
    };

    xhttp.open("POST", "php/chat-helper.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('function=send&id=' + roomid + '&userid=' + userid + '&message=' + message);
}