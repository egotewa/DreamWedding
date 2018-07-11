var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {

    		var myObj = JSON.parse(this.responseText);
            // var myObj = this.responseText;
            // document.body.innerHTML = myObj;
    		
    	for(var i=0; i<myObj.length; i++)
    	{
    		var header = document.createElement("h2");
    		header.innerHTML = "Ресторант " + myObj[i].name;
    		document.getElementById("body").appendChild(header);
            var divContainer = document.createElement("div");
            var containerClass = document.createAttribute("class");
            containerClass.value = "container";
            divContainer.setAttributeNode(containerClass);
            var containerID = document.createAttribute("id");
            containerID.value = "restaurant";
            divContainer.setAttributeNode(containerID);
            document.getElementById("body").appendChild(divContainer);
            for(var j=0; j<4; j++)
            {
                var newImg = document.createElement("img");
                var source = document.createAttribute("src");
                source.value = "img/" + myObj[i].id + "_" + j + ".jpg";
                newImg.setAttributeNode(source);
                var imgClass = document.createAttribute("class");
                imgClass.value = "displayImg mySlides";
                newImg.setAttributeNode(imgClass);
                document.getElementById("restaurant").appendChild(newImg);
            }
            var infDiv = document.createElement("div");
            var infDivClass = document.createAttribute("class");
            infDivClass.value = "information";
            infDiv.setAttributeNode(infDivClass);
            document.getElementById("restaurant").appendChild(infDiv);

            var addrParagraph = document.createElement("p");
            var addrIcon = document.createElement("i");
            var addrClass = document.createAttribute("class");
            addrClass.value = "fa fa-map-marker";
            addrIcon.setAttributeNode(addrClass);
            var addrStyle = document.createAttribute("style");
            addrStyle.value = "font-size: 32px";
            addrIcon.setAttributeNode(addrStyle);
    
            addrParagraph.appendChild(addrIcon);
            var addrText = document.createTextNode("   " + myObj[i].address);
            addrParagraph.appendChild(addrText);
            infDiv.appendChild(addrParagraph);

            var phoneParagraph = document.createElement("p");
            var phoneIcon = document.createElement("i");
            var phoneClass = document.createAttribute("class");
            phoneClass.value = "fa fa-phone";
            phoneIcon.setAttributeNode(phoneClass);
            var phoneStyle = document.createAttribute("style");
            phoneStyle.value = "font-size: 32px";
            phoneIcon.setAttributeNode(phoneStyle);
            phoneParagraph.appendChild(phoneIcon);
            var phoneText = document.createTextNode("   " + myObj[i].telephone);
            phoneParagraph.appendChild(phoneText);
            infDiv.appendChild(phoneParagraph);

            var mailParagraph = document.createElement("p");
            var mailIcon = document.createElement("i");
            var mailClass = document.createAttribute("class");
            mailClass.value = "fa fa-envelope";
            mailIcon.setAttributeNode(mailClass);
            var mailStyle = document.createAttribute("style");
            mailStyle.value = "font-size: 32px";
            mailIcon.setAttributeNode(mailStyle);
            mailParagraph.appendChild(mailIcon);
            var mailText = document.createTextNode("   " + myObj[i].email);
            mailParagraph.appendChild(mailText);
            infDiv.appendChild(mailParagraph);

            var hotelParagraph = document.createElement("p");
            var hotelIcon = document.createElement("i");
            var hotelClass = document.createAttribute("class");
            hotelClass.value = "fa fa-hotel";
            hotelIcon.setAttributeNode(hotelClass);
            var hotelStyle = document.createAttribute("style");
            hotelStyle.value = "font-size: 32px";
            mailIcon.setAttributeNode(hotelStyle);
            hotelParagraph.appendChild(hotelIcon);
            if(myObj[i].hotel == 0)
            {
                var hotelText = document.createTextNode("   има налична хотелска част");
                // hotelParagraph.innerHTML = "   има налична хотелска част";
                hotelParagraph.appendChild(hotelText);
                infDiv.appendChild(hotelParagraph);
            } else 
            {
                var hotelText = document.createTextNode("   няма налична хотелска част");
                // hotelParagraph.innerHTML = "   няма налична хотелска част";
                hotelParagraph.appendChild(hotelText);
                infDiv.appendChild(hotelParagraph);
            }
            
            var capacityParagraph = document.createElement("p");
            var capacityIcon = document.createElement("i");
            var capacityClass = document.createAttribute("class");
            capacityClass.value = "fa fa-users";
            capacityIcon.setAttributeNode(capacityClass);
            var capacityStyle = document.createAttribute("style");
            capacityStyle.value = "font-size: 32px";
            capacityIcon.setAttributeNode(capacityStyle);
            capacityParagraph.appendChild(capacityIcon);
            var capacityText = document.createTextNode("   " + myObj[i].capacity + " места");
            capacityParagraph.appendChild(capacityText);
            infDiv.appendChild(capacityParagraph);

            var gardenParagraph = document.createElement("p");
            var gardenParaClass = document.createAttribute("class");
            gardenParaClass.value = "label";
            gardenParagraph.setAttributeNode(gardenParaClass);
            gardenParagraph.innerHTML = "Зимна/лятна градина:";
            if(myObj[i].garden == 0)
            {
                var haveGarden = document.createElement("i");
                var haveGardenClass = document.createAttribute("class");
                haveGardenClass.value = "fa fa-check";
                haveGarden.setAttributeNode(haveGardenClass);
                var haveGardenStyle = document.createAttribute("style");
                haveGardenStyle.value = "font-size: 32px";
                haveGarden.setAttributeNode(haveGardenStyle);
                gardenParagraph.appendChild(haveGarden);
            } else 
            {
                var noGarden = document.createElement("i");
                var noGardenClass = document.createAttribute("class");
                noGardenClass.value = "fa fa-close";
                noGarden.setAttributeNode(noGardenClass);
                var noGardenStyle = document.createAttribute("style");
                noGardenStyle.value = "font-size: 32px";
                noGarden.setAttributeNode(noGardenStyle);
                gardenParagraph.appendChild(noGarden);
            }
            infDiv.appendChild(gardenParagraph);

            var poolParagraph = document.createElement("p");
            var poolParaClass = document.createAttribute("class");
            poolParaClass.value = "label";
            poolParagraph.setAttributeNode(poolParaClass);
            poolParagraph.innerHTML = "Басейн:";
            if(myObj[i].pool == 0)
            {
                var havePool = document.createElement("i");
                var havePoolClass = document.createAttribute("class");
                havePoolClass.value = "fa fa-check";
                havePool.setAttributeNode(havePoolClass);
                var havePoolStyle = document.createAttribute("style");
                havePoolStyle.value = "font-size: 32px";
                havePool.setAttributeNode(havePoolStyle);
                poolParagraph.appendChild(havePool);
            } else 
            {
                var noPool = document.createElement("i");
                var noPoolClass = document.createAttribute("class");
                noPoolClass.value = "fa fa-close";
                noPool.setAttributeNode(noPoolClass);
                var noPoolStyle = document.createAttribute("style");
                noPoolStyle.value = "font-size: 32px";
                noPool.setAttributeNode(noPoolStyle);
                poolParagraph.appendChild(noPool);
            }
            infDiv.appendChild(poolParagraph);

            var degustationParagraph = document.createElement("p");
            var degustationParaClass = document.createAttribute("class");
            degustationParaClass.value = "label";
            degustationParagraph.setAttributeNode(degustationParaClass);
            degustationParagraph.innerHTML = "Дегустация:";
            if(myObj[i].degustation == 0)
            {
                var haveDegustation = document.createElement("i");
                var haveDegustationClass = document.createAttribute("class");
                haveDegustationClass.value = "fa fa-check";
                haveDegustation.setAttributeNode(haveDegustationClass);
                var haveDegustationStyle = document.createAttribute("style");
                haveDegustationStyle.value = "font-size: 32px";
                haveDegustation.setAttributeNode(haveDegustationStyle);
                degustationParagraph.appendChild(haveDegustation);
            } else 
            {
                var noDegustation = document.createElement("i");
                var noDegustationClass = document.createAttribute("class");
                noDegustationClass.value = "fa fa-close";
                noDegustation.setAttributeNode(noDegustationClass);
                var noDegustationStyle = document.createAttribute("style");
                noDegustationStyle.value = "font-size: 32px";
                noDegustation.setAttributeNode(noDegustationStyle);
                degustationParagraph.appendChild(noDegustation);
            }
            infDiv.appendChild(degustationParagraph);

            var descrDiv = document.createElement("div");
            var descrID = document.createAttribute("id");
            descrID.value = "description";
            descrDiv.setAttributeNode(descrID);

            var descrPara = document.createElement("p");
            var descrParaClass = document.createAttribute("class");
            descrParaClass.value = "label";
            descrPara.setAttributeNode(descrParaClass);
            var descrParaText = document.createTextNode("Описание:");
            descrPara.appendChild(descrParaText);
            
            descrDiv.appendChild(descrPara);
            var descrDivText = document.createTextNode(myObj[i].description);
            descrDiv.appendChild(descrDivText);
            divContainer.appendChild(descrDiv);
            document.getElementById("body").appendChild(divContainer);

            var slideshowDiv = document.createElement("div");
            var slideshowDivClass = document.createAttribute("class");
            slideshowDivClass.value = "w3-row-padding w3-section";
            slideshowDiv.setAttributeNode(slideshowDivClass);
            var slideshowDivStyle = document.createAttribute("style");
            slideshowDivStyle.value = "float: clear";
            slideshowDiv.setAttributeNode(slideshowDivStyle);
            document.getElementById("body").appendChild(slideshowDiv);

            for(var j=0; j<4; j++)
            {
                var slideDivImg = document.createElement("div");
                var slideDivImgClass = document.createAttribute("class");
                slideDivImgClass.value = "w3-col s3";
                slideDivImg.setAttributeNode(slideDivImgClass);
                slideshowDiv.appendChild(slideDivImg);

                var slideImg = document.createElement("img");
                var slideImgClass = document.createAttribute("class");
                slideImgClass.value = "demo w3-opacity w3-hover-opacity-off";
                slideImg.setAttributeNode(slideImgClass);
                var slideImgStyle = document.createAttribute("style");
                slideImgStyle.value = "border-radius: 10px;height:200px;width:100%;cursor:pointer";
                slideImg.setAttributeNode(slideImgStyle);
                var slideImgSrc = document.createAttribute("src");
                slideImgSrc.value = "img/" + myObj[i].id + "_" + j + ".jpg";
                slideImg.setAttributeNode(slideImgSrc);
                var slideImgEvent = document.createAttribute("onclick");
                var current = j + 1;
                slideImgEvent.value = "currentDiv(" + current + ")";
                slideDivImg.setAttributeNode(slideImgEvent);
                slideDivImg.appendChild(slideImg);
                slideshowDiv.appendChild(slideDivImg);
            }

    	}
  	}
	};
	xhttp.open("POST", "getForView.php", true);
  	xhttp.send();
