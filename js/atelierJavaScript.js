var html="" ;
		var code="" ;
		//get certain atelier
			function createPage(pseudoId){
				xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
								var jsonAteliers= JSON.parse(this.responseText);
								var newHtml="";
								document.getElementById("ateliersImageDiv").innerHTML= "";
								document.getElementById("ateliersImageDiv").style.display='none';
								//document.getElementById("1").style.border="2px solid grey";
								document.getElementById("1").style.position="relative";
								document.getElementById("1").style.width="90%";
								document.getElementById("1").style.marginTop="3%";
								document.getElementById("1").style.height="auto";
								document.getElementById("1").style.marginLeft="5%";
								
								newHtml= '<div style="position:absolute; display:flex; justify-content:center; align-items:center; text-align:center; width:100%; height:120px;">'+
											'<h1 style="position:absolute; font-family: Pacifico , cyrillic; font-size:120px; color:purple;">' + 
											jsonAteliers[0].name + 
											'</h1></div><img src="' + 
											jsonAteliers[0].imageName + 
											'" style="max-width:50%; max-height:550px; margin-left:10%; margin-top:15%;">' +
											'<div style="position:absolute; word-wrap:break-word; display:inline; width:40%; right:5%; top:30%; height:500px; font-size:25px;"><i class="fa fa-map-marker" style="font-size: 32px"></i>' +
											'<span style="font-size:23px; font-family: Pacifico, cyrillic;">' + 
											jsonAteliers[0].town +
											', ' + 
											jsonAteliers[0].address +				
											'</span><br><br><i class="fa fa-phone" style="font-size: 32px"></i><span style="font-size:23px; font-family: Pacifico, cyrillic;">' + 
											jsonAteliers[0].phone + 
											'</span><br><br><i class="fa fa-envelope" style="font-size: 32px"></i><span style="font-size:23px; font-family: Pacifico, cyrillic;">'+
											jsonAteliers[0].mail + 
											'</span><br><br><span style="position:absolute; font-family: Pacifico, cyrillic;">Описание:</span><span style="position:absolute; font-family: Pacifico, cyrillic; font-size:23px; margin-left:25%; margin-top:0.5%;" >'+
											jsonAteliers[0].description +
											'</span><br></div><h1 style="position:absolute; font-family: Pacifico, cyrillic; font-size:50px; color:purple; margin-top:6%; margin-left:45%;">Галерия<h1></div>';
											
											document.getElementById("1").innerHTML=newHtml;	
												
											document.getElementById("2").style.position="absolute";
											document.getElementById("2").style.width="80%";
											document.getElementById("2").style.height="auto";
											document.getElementById("2").style.display="inline";
											document.getElementById("2").style.marginLeft="14%";
											document.getElementById("2").style.marginTop="13%";
											
											var secondHtml="";
											
											secondHtml='<img class="picturesDiv" style="position:relative; height:360px; width:250px; margin-left:5%; margin-bottom:5%;" src="' +
											jsonAteliers[0].imageNameTemplate + '">' + 
											'<img class="picturesDiv" style="position:relative; height:360px; width:250px; margin-left:5%; margin-bottom:5%;" src="' +
											jsonAteliers[0].imageNameTemplate + '">' + 
											'<img class="picturesDiv" style="position:relative; height:360px; width:250px; margin-left:5%; margin-bottom:5%;" src="' +
											jsonAteliers[0].imageNameTemplate + '">' + 
											'<img class="picturesDiv" style="position:relative; height:360px; width:250px; margin-left:5%; margin-bottom:5%;" src="' +
											jsonAteliers[0].imageNameTemplate + '">';
											
											document.getElementById("2").innerHTML=secondHtml;
						}
			};
				xhttp.open("GET", "getCertainAtelier.php?atelId=" + pseudoId, true);
				xhttp.send();
		}
		
		//get All ateliers 
			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
						var jsonAteliers= JSON.parse(this.responseText);
						for(var i=0; i<jsonAteliers.length; ++i)
						{
						 html= '<div id="'+
								jsonAteliers[i].divID+
								'" class="atelierDivs"' +
								'style=\x27background-image: url("' +
								jsonAteliers[i].imageName +
								'");\x27>' +
								
								
								'<a id="'+ 
								jsonAteliers[i].townID +
								'" class="atelierTown"></a>'+
								'<br><br>' +
								
					
								'<a id="' + 
								jsonAteliers[i].addressID + 
								'" class="atelierAddress"></a>' +
								'<a class="atelierAnchors" id="' +
								jsonAteliers[i].id + '"'+
								' href="#" onclick=createPage("' + 
								jsonAteliers[i].id +
								'");></a></div>';
								
								
								code=code+html;
						}
						document.getElementById("1").innerHTML=code;
						
						for(var i=0; i<jsonAteliers.length; ++i)
						{
							document.getElementById(jsonAteliers[i].id).innerHTML =jsonAteliers[i].name;
							document.getElementById(jsonAteliers[i].townID).innerHTML =jsonAteliers[i].town;
							document.getElementById(jsonAteliers[i].addressID).innerHTML =jsonAteliers[i].address;
						}
				}
			};
				xmlhttp.open("GET", "getAllAteliers.php", true);
				xmlhttp.send();
				