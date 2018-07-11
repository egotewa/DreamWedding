
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {

    		var myObj = JSON.parse(this.responseText);
    		var counter = 0;
    		
    	for(var i=0; i<myObj.length; i++)
    	{
    		var anchor = document.createElement("a");
		    var hyperLink = document.createAttribute("href");
		    hyperLink.value = "viewRestaurant.php?restaurant=" + myObj[i].id;
		    anchor.setAttributeNode(hyperLink);
		    var anchorID = document.createAttribute("id");
		    anchorID.value = counter;
		    anchor.setAttributeNode(anchorID);
		    document.getElementById("restaurantDiv").appendChild(anchor);
		    var newDiv = document.createElement("div");
		    var divClass = document.createAttribute("class");
		    divClass.value = "floating-box";
		    newDiv.setAttributeNode(divClass);
		    var divID = document.createAttribute("id");
		    var id = "d" + counter;
		    divID.value = id;
		    newDiv.setAttributeNode(divID);
		    document.getElementById(counter).appendChild(newDiv);
		    // var txt = document.createTextNode(restaurants[i].name);
		    // newDiv.appendChild(txt);
		    newDiv.innerHTML = myObj[i].name; 
		    var newImg = document.createElement("img");
		    var source = document.createAttribute("src");
		    source.value = myObj[i].img;
		    newImg.setAttributeNode(source);
		    document.getElementById(id).appendChild(newImg);
		    counter++;
    	}
  	}
	};
	xhttp.open("POST", "getRestaurants.php", true);
  	xhttp.send();

