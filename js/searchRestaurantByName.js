var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		var myObj = JSON.parse(this.responseText);
		var counter = 0;
		var Found = 1;
		function isEmpty(obj) {
		    for(var key in obj) {
		        if(obj.hasOwnProperty(key))
		            return false;
		    }
    		return true;
		}
		for(var i = 0; i < myObj.length; i++)
		{
			if(!isEmpty(myObj))
			{
				var anchor = document.createElement("a");
			    var hyperLink = document.createAttribute("href");
			    hyperLink.value = "#";
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
			    newDiv.innerHTML = myObj[i].name; 
			    var newImg = document.createElement("img");
			    var source = document.createAttribute("src");
			    source.value = myObj[i].img;
			    newImg.setAttributeNode(source);
			    document.getElementById(id).appendChild(newImg);
			}
			counter++;
		}
		if(isEmpty(myObj))
		{
			var paragraph = document.createElement("p");
			paragraph.style.fontSize = "30px";
			paragraph.innerHTML = "Няма намерени резултати..";
			document.getElementById("restaurantDiv").appendChild(paragraph);
		}
	}
};
xhttp.open("POST", "getSearchedRestaurant.php", true);
xhttp.send();
