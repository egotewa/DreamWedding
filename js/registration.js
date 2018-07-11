
function validateForm(){

	/*check if the agreement is checked*/
	var checkAgreement = document.getElementById("checkbox").checked;
	if(checkAgreement){
		document.getElementById("ifNotChecked").innerHTML = "";

	}else{
		document.getElementById("ifNotChecked").innerHTML = "Трябва да се съгласите с Общите условия";
	}


	/*first name validation*/
	var validFirstName = true;
	var firstName = document.registration.firstName.value;
	var firstName = firstName.trim();

	if(firstName.length === 0 ){

		document.getElementById("invalidFirstName").innerHTML = "Това поле е задължително.";
		validFirstName = false;

	} else if(firstName.length > 0){

		document.getElementById("invalidFirstName").innerHTML=""; //clear the warning field	
		validFirstName = true;
  
		if(firstName.match(/^[а-я ]+$/gi) == null){  

			document.getElementById("invalidFirstName").innerHTML="Името ви трябва да съдържа само български букви";
	 		validFirstName = false;
		}

	}


	/*last name validation*/
	var validLastName = true;
	var lastName = document.registration.lastName.value;
	var lastName = lastName.trim();

	if(lastName.length === 0 ){

		document.getElementById("invalidLastName").innerHTML = "Това поле е задължително.";
		validLastName = false;
	} else if(lastName.length > 0) {

		document.getElementById("invalidLastName").innerHTML=""; //clear the warning field	
		validLastName = true;
  
		if(lastName.match(/^[а-я ]+$/gi) == null){   //trqbva li da pozvolim tire v imeto?

			document.getElementById("invalidLastName").innerHTML="Името ви трябва да съдържа само български букви";
	 		validLastName = false;
		}		
	}


	/*username validation*/
	var validUsername = true;
	var username = document.registration.username.value;
	username = username.trim();

	if(username.length === 0 ){

		document.getElementById("invalidUsername").innerHTML = "Това поле е задължително.";
		validUsername = false;

	} else if(username.length < 3 || username.length > 10){

		document.getElementById("invalidUsername").innerHTML = "Потребителското име трябва да е между 3 и 10 символа.";
		validUsername = false;

	} else { // when the length is between 3 and 10 symbols

		 	
	 	document.getElementById("invalidUsername").innerHTML=""; //clear the warning field	
	 	validUsername = true;

	 	if(username.match(/^[a-z0-9\_]+$/g) == null){

			document.getElementById("invalidUsername").innerHTML="Потребителското име трябва да съдържа малки латински букви,цифри и '_'.";
	  		validUsername = false;
		}

	}


	/*password validation*/
	var validPass = true;
	var pass = document.registration.pass.value;

	if(pass.length === 0 ){

		document.getElementById("invalidPass").innerHTML = "Това поле е задължително.";
		validPass = false;

	} else if(pass.length < 6){

		document.getElementById("invalidPass").innerHTML = "Паролата трябва да е повече от 6 символа.";
		validPass = false;

	} else { // when the length is more than 6 symbols

	 	document.getElementById("invalidPass").innerHTML=""; //clear the warning field	
	 	validPass = true;

		if(pass.match(/[a-z]/g) == null){

			document.getElementById("invalidPass").innerHTML="Паролата трябва да съдържа поне една малка буква.";
	  		validPass = false;

		} else if(pass.match(/[0-9]/g) == null){

			document.getElementById("invalidPass").innerHTML="Паролата трябва да съдържа поне една цифра.";
			validPass = false;

		} else if(pass.match(/[A-Z]/g) == null){

			document.getElementById("invalidPass").innerHTML="Паролата трябва да съдържа поне една главна буква.";
			validPass = false;

		}
	}


	/*confirmed password validation*/
	var validConfirmPass = true;
	var confirmPass = document.registration.confirmPass.value;

	if(confirmPass.length === 0 ){

		document.getElementById("invalidConfirmPass").innerHTML = "Това поле е задължително.";
		validConfirmPass = false;

	} else if(confirmPass !== pass){
		document.getElementById("invalidConfirmPass").innerHTML="Двете пароли не съвпадат.";
		validConfirmPass = false;

	} else{
		validConfirmPass = true;
	}


	/*email validation*/
	var validEmail = true;
	var email = document.registration.email.value;
	var email = email.trim();

	if(email.length === 0 ){

		document.getElementById("invalidEmail").innerHTML = "Това поле е задължително.";
		validEmail = false;

	} else if(email.length < 5){ //minimum 5 because o@o.p
	
		document.getElementById("invalidEmail").innerHTML = "Имейлът трябва да е поне 5 символа.";
		validEmail = false;

	}else{
	 	
	 	document.getElementById("invalidEmail").innerHTML=""; //clear the warning field	
	 	validEmail = true;
  
		if(email.match(/^.+@.+[.].+$/gi) == null){
				  
			document.getElementById("invalidEmail").innerHTML="Имейлът ви не е с валидния формат.";
			validEmail = false;
		}
	}


	/*birthdate validation*/
	var validBirthdate = true;
	var birthdate = document.registration.birthdate.value;

	if(birthdate.length === 0){

		document.getElementById("invalidBirthdate").innerHTML = "Това поле е задължително.";
		validBirthdate = false;

	} else{
		document.getElementById("invalidBirthdate").innerHTML="";
		validBirthdate = true;

		/*if the browser is IE and does not support the calendar for choosing a date*/
		if(navigator.userAgent.indexOf("MSIE") != -1){
	
			if(birthdate.match(/^[0-3]{1}[0-9]{1}\/[0-1]{1}[1-9]{1}\/[1][0-9]{3}\/$/g) == null){
		
				document.getElementById("invalidBirthdate").innerHTML = "Рождената ви дата не е в правилния формат.";
				validBirthdate = false;
			}
		}
	}


	/*if everything is valid, send it to the server*/
	if(validFirstName == true && validLastName == true && validUsername == true && validPass == true && validConfirmPass == true && validEmail == true && validBirthdate == true){

		document.registration.submit();

	} else {

		return false;

	}	
}

function showPasswordDetails(){
	
	var popup = document.getElementById("passDetailsID");
	popup.classList.toggle("show");
}

function capsLockEvent(){

	var counter = 1;

	document.addEventListener('keydown', function(event) {

		var pressedKey = event.key;

		console.log(pressedKey);
		if(pressedKey === "CapsLock" && counter%2!==0){
			document.getElementById("capsLockEvent").innerHTML = "'Caps Lock' бутонът е активен.";
		} else{
			document.getElementById("capsLockEvent").innerHTML = "";
		}

		counter++;
	});


}
