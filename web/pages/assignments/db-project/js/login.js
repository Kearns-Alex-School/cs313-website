function Login()
{
	SendHTTP("function=login");
}

function Create()
{
	SendHTTP("function=create");
}

function SendHTTP(func)
{
	var xmlhttp  = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function ()
	{
    	if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
    	{
    		// once the request is done do nothing. The php will redirect
    	}
  	}

  	var paramaters = "?";

  	// grab all of the elements that we need to login or create
  	var formElements = document.getElementsByTagName("input");

  	for (var i = 0, element; element = formElements[i++];) {
  		// check for a blank entry
  		if (element.value === '') 
  		{
  			alert("Please do not leave blank fields.");
  			return;
  		}

  		// add the values to the parameter list
  		paramaters += element.getAttribute("name") + "=" + element.value + "&";
  	}

  	// add the function that will be called in the php file
  	paramaters += func;

  	// call the php function to verify or create
	xmlhttp.open("GET", "login-helper.php" + paramaters);
  	xmlhttp.send();
}