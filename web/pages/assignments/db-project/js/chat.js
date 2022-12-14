function Setup() {
    // set up our refresh interval to get any new messages
    window.instance   = false;
    Refresh();
    window.intervalid = setInterval('Refresh()', 1000);
}

// function that handles refreshing the messages
function Refresh()
{
    // check to see if we are already in this update
    if (!instance)
    {
        // set our flag so we do not walk on ourself
        instance = true;

        // create our ajax
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // populate our results
                document.getElementById("results").innerHTML = this.responseText;

                // grab out div area with our results
                var chat = document.getElementById("chat");

                // scroll to show the most recent message that was added
                chat.scrollTop = chat.scrollHeight;

                // reset the flag
                instance = false;
            }
        };

        // grab our data
        var roomid = document.getElementById("roomid").value;

        // create and send our request to our helper script
        xhttp.open("POST", "php/chat-helper.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('function=refresh&id=' + roomid);
    }
}

function CheckEnterPressed() {
    // check for the enterkey
    var key = window.event.keyCode;
  
    // If the user has pressed enter
    if (key === 13) {
      // send out message
      SendMessage();
  
      // return false so we do not add the '/n'
      return false;
    }
    
    // return true so we add whatever key was pressed
    return true;
  }

function SendMessage()
{
    // create our ajax
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // reset our message box
            document.getElementById("message").value = '';
        }
    };

    // grab our data
    var roomid = document.getElementById("roomid").value;
    var userid = document.getElementById("userid").value;
    var message = document.getElementById("message").value;

    // create and send our request to our helper script
    xhttp.open("POST", "php/chat-helper.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('function=send&id=' + roomid + '&userid=' + userid + '&message=' + message);
}