/*

		This script is used to modify and delete categories in guestList; categories are added 
		via the form and addCategory.php

*/



/*function showAllCategories(){
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
}*/
//delete category by a given index
function deleteCat(index)
{
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
			alert(this.responseText);
			window.open('guestList.php','_self');
		}
	};
	
	xmlhttp.open("GET", "deleteCategory.php?ind=" + index, true);
	xmlhttp.send();
}	
//modify category function - makes the new form appear once the "Change" button is clicked
function modifyCat(index)
{
	var button=document.getElementById("changeCatButton");
	button.onclick = function(){
		changeCategory(index);
	}
	//button.onclick=changeCategory(index);
	//console.log("modify "+index);
	document.getElementById("category").style.display="none";
	document.getElementById("categoryModify").style.display="block";
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
			var myCat=JSON.parse(this.responseText);
			document.getElementById("catInput2").value = myCat[0].name;
		}
	};
	xmlhttp.open("GET", "getCertainCategory.php?id=" + index, true);
	xmlhttp.send();
}	

// change the selected category (name) in the DB
function changeCategory(ind){
	var myInput=document.getElementById("catInput2").value;
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
		}
	};
	xhttp.open("GET", "modifyCategory.php?id=" + ind + "&newName=" + myInput, true);
	xhttp.send();
	alert("Категорията беше успешно преименувана!");
}		
				
				
				
				
				/*if(temp=="")
				{
					alert("Името на категорията е задължително!");
					for(var i=0; i<catArray.length; ++i)
					{
						selectHTML= '<option value="">' +
						catArray[i] + 
						'</option>';
						
						selectCode=selectCode+selectHTML;
					}
				}
				else
				{
					catArray.push(temp);
					for(var i=0; i<catArray.length; ++i)
					{
						selectHTML= '<option value="">' +
						catArray[i] + 
						'</option>';
						
						selectCode=selectCode+selectHTML;
					}
					alert("Категорията е добавена успешно!");
				}*/
				//document.getElementById("group").innerHTML=selectCode;

