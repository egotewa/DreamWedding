var selectHtml="" ;
var selectCode="";
var divHtml="";
var divCode="";
xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		
		
			var catArray=JSON.parse(this.responseText);
			
		
					for(var i=0; i<catArray.length; i++)
						{
							selectHtml= '<option value="' +
							catArray[i].name +  '">' + catArray[i].name +
							'</option>';

												
							divHtml= '<div class="row"><div class="catCell">' + 
							catArray[i].name +  '</div><div class="catCell catCellNumber">' + 
							catArray[i].numberOfGuests + '</div><a href="#" onclick="deleteCat(' + catArray[i].id + ')"> <i style="font-size:24px" class="fa">&#xf014;</i> </a>' + 
							'<a href="#" onclick="modifyCat( ' + catArray[i].id + ')"> <i style="font-size:24px" class="fa">&#xf044;</i> </a></div>';
							selectCode=selectCode+selectHtml;
							divCode= divCode + divHtml;
						}
						
						document.getElementById("group").innerHTML=selectCode;
						document.getElementById("viewCategories").innerHTML=divCode;
						
						
			}
	};
			xmlhttp.open("GET", "getAllCategories.php", true);
			xmlhttp.send();