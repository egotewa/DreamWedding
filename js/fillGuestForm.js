
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {

    		//document.body.innerHTML = this.responseText;
    		var myObj = JSON.parse(this.responseText);
    		document.getElementById("guestName").value = myObj[0].name;
    		// document.body.innerHTML = myObj[0].location;
    		document.getElementById("guestLocation").value = myObj[0].location;
    		// document.getElementById("group").innerHTML = myObj;
    		document.getElementById("group").value = myObj[0].catName;
    		if(myObj[0].gender == "male")
    		{
    			document.forms['guestElement'].gender[0].checked = true;
    		}
    		if(myObj[0].gender == "female")
    		{
    			document.forms['guestElement'].gender[1].checked = true;
    		}
    		if(myObj[0].gender == "girl")
    		{
    			document.forms['guestElement'].gender[2].checked = true;
    		}
    		if(myObj[0].gender == "boy")
    		{
    			document.forms['guestElement'].gender[3].checked = true;
    		}

  
  	}
	};
	xhttp.open("POST", "getGuestForEdit.php", true);
  	xhttp.send();