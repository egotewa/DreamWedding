var jsonSyntax='{"atelier" :[' +
				'{"id": "APlus","name": "A+ Atelier","town":"Sofia","address":"Konstantin Velichkov 55","divID":"APlusDiv","townID":"APlusTown","addressID":"APlusAddress","imageName":"img/APlusButtonImage.jpg","imageNameTemplate":"img/APlusButtonImageTemplate.jpg","phone":"0885 911 355","mail":"aplus@gmail.com","description":"Ние се стремим се предлагаме на клиентите си комплексно решение за всички онези малки детайли, които правят сватбения ден и денят на кръщението на детето, тържествен и специален.Към клиентите, които са ни се доверили се отнасяме с внимание и индивидуален подход и с радост приветстваме и техните идеи за да направим заедно всичко специално и уникално, съобразено с техните предпочитания и избрания стил, защото всеки такъв повод е сам по себе си уникален."},' +
				'{"id": "Bella","name": "Bella","town":"Plovdiv","address":"Ivan Ibrishimov 42","divID":"BellaDiv","townID":"BellaTown","addressID":"BellaAddress","imageName":"img/BellaButtonImage.jpg", "imageNameTemplate":"img/BellaButtonImageTemplate.jpg","phone":"0987 710 113","mail":"bella@yahoo.com","description":"И така, на ръката ви блести венчален пръстен, имате идеи, визия, желание и трепет да се потопите в море от красота и да подредите по вълнуващ, заинтригуващ и очарователен начин вашия сватбен ден!"},' +
				'{"id": "SD","name": "Special Day","town":"Varna","address":"Alexander Stefanov 41","divID":"SDDiv","townID":"SDTown","addressID":"SDAddress","imageName":"img/SpecialDayButtonImage.jpg", "imageNameTemplate":"img/SpecialDayButtonImageTemplate.jpg","phone":"0899 836 789","mail":"specialday@abv.bg","description":"Вече над четиринайсет години изработването на сватбените облекла, необходими за важните и неповторими поводи в нашия живот - Сватба и Кръщене са нашето професионално занимание."}]}';
	
var jsonAteliers=JSON.parse(jsonSyntax);
var html="";
var code="";
function createPage(pseudoId){
	
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
				jsonAteliers.atelier[pseudoId].name + 
				'</h1></div><img src="' + 
				jsonAteliers.atelier[pseudoId].imageName + 
				'" style="max-width:50%; max-height:550px; margin-left:10%; margin-top:15%;">' +
				'<div style="position:absolute; word-wrap:break-word; display:inline; width:40%; right:5%; top:30%; height:500px; font-size:25px;"><i class="fa fa-map-marker" style="font-size: 32px"></i>' +
				'<span style="font-size:23px; font-family: Pacifico, cyrillic;">' + 
				jsonAteliers.atelier[pseudoId].town +
				', ' + 
				jsonAteliers.atelier[pseudoId].address +				
				'</span><br><br><i class="fa fa-phone" style="font-size: 32px"></i><span style="font-size:23px; font-family: Pacifico, cyrillic;">' + 
				jsonAteliers.atelier[pseudoId].phone + 
				'</span><br><br><i class="fa fa-envelope" style="font-size: 32px"></i><span style="font-size:23px; font-family: Pacifico, cyrillic;">'+
				jsonAteliers.atelier[pseudoId].mail + 
				'</span><br><br><span style="position:absolute; font-family: Pacifico, cyrillic;">Описание:</span><span style="position:absolute; font-family: Pacifico, cyrillic; font-size:23px; margin-left:25%; margin-top:0.5%;" >'+
				jsonAteliers.atelier[pseudoId].description +
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
	jsonAteliers.atelier[pseudoId].imageNameTemplate + '">' + 
	'<img class="picturesDiv" style="position:relative; height:360px; width:250px; margin-left:5%; margin-bottom:5%;" src="' +
	jsonAteliers.atelier[pseudoId].imageNameTemplate + '">' + 
	'<img class="picturesDiv" style="position:relative; height:360px; width:250px; margin-left:5%; margin-bottom:5%;" src="' +
	jsonAteliers.atelier[pseudoId].imageNameTemplate + '">' + 
	'<img class="picturesDiv" style="position:relative; height:360px; width:250px; margin-left:5%; margin-bottom:5%;" src="' +
	jsonAteliers.atelier[pseudoId].imageNameTemplate + '">';
	
	document.getElementById("2").innerHTML=secondHtml;
}


for(var i=0; i<jsonAteliers.atelier.length; ++i)
		{
         html= '<div id="'+
				jsonAteliers.atelier[i].divID+
				'" class="atelierDivs"' +
				'style=\x27background-image: url("' +
				jsonAteliers.atelier[i].imageName +
				'");\x27>' +
				
				
				'<a id="'+ 
				jsonAteliers.atelier[i].townID +
				'" class="atelierTown"></a>'+
				'<br><br>' +
				
	
				'<a id="' + 
				jsonAteliers.atelier[i].addressID + 
				'" class="atelierAddress"></a>' +
				'<a class="atelierAnchors" id="' +
				jsonAteliers.atelier[i].id + '"'+
				' href="#" onclick=createPage("' + 
				i +
				'");></a></div>';
				
				
				code=code+html;
		}
		document.getElementById("1").innerHTML=code;
		
		for(var i=0; i<jsonAteliers.atelier.length; ++i)
		{
			document.getElementById(jsonAteliers.atelier[i].id).innerHTML =jsonAteliers.atelier[i].name;
			document.getElementById(jsonAteliers.atelier[i].townID).innerHTML =jsonAteliers.atelier[i].town;
			document.getElementById(jsonAteliers.atelier[i].addressID).innerHTML =jsonAteliers.atelier[i].address;
		}
		
		/*adding a new record to the existing ones via js
		jsonAteliers.atelier.push({"name":"Something New","town":"Burgas","address":"boulevard Georgi Benkovski 22","divID":"SNDiv",.....});*/
