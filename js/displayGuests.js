
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {

    		var myObj = JSON.parse(this.responseText);
    		var male = 0;
    		var female = 0;
    		var girls = 0;
    		var boys = 0;
    	for(var i=0; i<myObj.length; i++)
    	{
		if(myObj[i].gender == "male")
    		{
    			male++;
    		}
    		if(myObj[i].gender == "female")
    		{
    			female++;
    		}
    		if(myObj[i].gender == "girl")
    		{
    			girls++;
    		}
    		if(myObj[i].gender == "boy")
    		{
    			boys++;
    		}
    		var divRow = document.createElement("div");
			var row = document.createAttribute("class");
			row.value = "row";
			divRow.setAttributeNode(row);
			document.getElementById("gTable").appendChild(divRow);
			var divCellName = document.createElement("div");
			var cellName = document.createAttribute("class");
			cellName.value = "guestCell";
			divCellName.setAttributeNode(cellName);
			document.getElementById("gTable").lastChild.appendChild(divCellName);
			var lastRow = document.getElementById("gTable").lastChild;
			lastRow.lastChild.innerHTML = myObj[i].guestName;
			var divCellLocation = document.createElement("div");
			var cellLocation = document.createAttribute("class");
			cellLocation.value = "guestCell";
			divCellLocation.setAttributeNode(cellLocation);
			document.getElementById("gTable").lastChild.appendChild(divCellLocation);
			var lastRow = document.getElementById("gTable").lastChild;
			lastRow.lastChild.innerHTML = myObj[i].location;
			var divCellCategory = document.createElement("div");
			var cellCategory = document.createAttribute("class");
			cellCategory.value = "guestCell";
			divCellCategory.setAttributeNode(cellCategory);
			document.getElementById("gTable").lastChild.appendChild(divCellCategory);
			var lastRow = document.getElementById("gTable").lastChild;
			lastRow.lastChild.innerHTML = myObj[i].categoryName;
			var trashAnchor = document.createElement("a");
			var trashLink = document.createAttribute("href");
			trashLink.value = "deleteGuest.php?guest=" + myObj[i].guestID;
			trashAnchor.setAttributeNode(trashLink);
			var trashAnchorStyle = document.createAttribute("style");
			trashAnchorStyle.value = "text-decoration: none; color: black";
			trashAnchor.setAttributeNode(trashAnchorStyle);
			var trashIcon = document.createElement("i");
			var trashStyle = document.createAttribute("style");
			trashStyle.value = "font-size:24px";
			trashIcon.setAttributeNode(trashStyle);
			var trashClass = document.createAttribute("class");
			trashClass.value = "fa";
			trashIcon.setAttributeNode(trashClass);
			trashIcon.innerHTML = "&#xf014;";
			trashAnchor.appendChild(trashIcon);
			document.getElementById("gTable").lastChild.appendChild(trashAnchor);
			var editAnchor = document.createElement("a");
			var editLink = document.createAttribute("href");
			editLink.value = "editGuest.php?guest=" + myObj[i].guestID;
			editAnchor.setAttributeNode(editLink);
			var editAnchorStyle = document.createAttribute("style");
			editAnchorStyle.value = "text-decoration: none; color: black";
			editAnchor.setAttributeNode(editAnchorStyle);
			var editIcon = document.createElement("i");
			var editStyle = document.createAttribute("style");
			editStyle.value = "font-size:24px";
			editIcon.setAttributeNode(editStyle);
			var editClass = document.createAttribute("class");
			editClass.value = "fa";
			editIcon.setAttributeNode(editClass);
			editIcon.innerHTML = "&#xf044;";
			editAnchor.appendChild(editIcon);
			document.getElementById("gTable").lastChild.appendChild(editAnchor);
    	}
    	    document.getElementById("total").innerHTML = "Мъже(" + male + ")   Жени(" + female + ")   Момичета(" + girls + ")   Момчета(" + boys + ")";

  	}
	};
	xhttp.open("POST", "certainUserGuests.php", true);
  	xhttp.send();

