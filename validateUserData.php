<?php
	require('connection.php');
	

	function validateUserData($method){

			$valid = array();
			$invalid = array();


			//validate the name of the user
			$firstName = $method['firstName'];
			if(trim($firstName) == ""){

				$invalid['firstName'] = "Това поле е задължително.";

			} elseif(strlen($firstName) > 50){

				$invalid['firstName'] = "Името не трябва да е повече от 50 символа";

			}else {

				if(preg_match('/^[а-яА-Я ]*$/u', $firstName, $firstNameMatch)){

					$valid['firstName'] = $firstName;	

				} else {

					$invalid['firstName'] = "Името трябва да съдържа само български букви";

				}			
			}


			//validate the name of the user 			
			$lastName = $method['lastName'];
			if(trim($lastName) == ""){

				$invalid['lastName'] = "Това поле е задължително.";

			}elseif(strlen($lastName) > 50){

				$invalid['lastName'] = "Фамилията не трябва да е повече от 50 символа";

			}else {
				
				if(preg_match('/^[а-яА-Я ]*$/u', $lastName, $lastNameMatch)){

						$valid['lastName'] = $lastName;	
						
				}else {

						$invalid['lastName'] = "Фамилията трябва да съдържа само български букви";

				}
			}

				
			//validate the email of the user 
			$email = $method['email'];
			if(trim($email) == ""){

				$invalid['email'] = "Това поле е задължително.";

			}elseif(strlen($email) < 5){

				$invalid['email'] =  "Имейлът трябва да е поне 5 символа.";

			}else{

				if(preg_match('/^.+@.+[.].+$/', $email, $emailMatch)){

					$valid['email'] = $email;				
				
				}else {

					$invalid['email'] = "Имейлът не е с валидния формат.";

				}
			}

			//validate the city of the user 
			$city = $method['city'];

			if(trim($city) == ""){

				$valid['city'] = "";

			} elseif(strlen($city) > 50){

				$invalid['city'] = "Името на градът Ви не трябва да е повече от 50 символа";

			}else {
					
				if(preg_match('/^[а-яА-Я ]*$/u', $city, $cityMatch)){

						$valid['city'] = $city;	

				} else {

						$invalid['city'] = "Името на градът Ви трябва да съдържа само български букви";

				}
			}


			//validate the telephone of the user 
			$telephone = $method['telephone'];
			if(trim($telephone) == ""){

				$valid['telephone'] = "";

			} elseif(strlen($telephone) > 20){

				$invalid['telephone'] = "Телефонният Ви номер не трябва да е повече от 20 цифри";

			}else {
					
				if(preg_match('/^[0-9]{1,20}$/', $telephone, $telephoneMatch)){

						$valid['telephone'] = $telephone;
				
				} else {

						$invalid['telephone'] = "Телефонният Ви номер трябва да съдържа само цифри";

				}
			}


			//validate the address of the user 
			$address = $method['address'];
			if(strlen($address) > 100){

				$invalid['address'] = "Адресът Ви не трябва да е повече от 100 символа. ";

			} else{

				$valid['address'] = $address;

			}


			//validate the interests of the user 
			$interests = $method['interests'];
			if(strlen($interests) > 2000){

				$invalid['interests'] = "Интересите Ви не трябва да са повече от 2000 символа. ";

			} else{
				$valid['interests'] = $interests;
			}
			


			if(empty($invalid)){

				//the input data is valid
				$valid['isValid'] = true;
				return $valid;

			}else{

				//the input data is invalid
				$invalid['isValid'] = false;
				return $invalid;
			}
						
	}

	function updateData($statement, $validatedData, $user){

		
		//clear data
		foreach ($validatedData as $value) {
				
			$value = trim($value); //remove characters from both sides of a string
			$value = stripcslashes($value); //remove backslashes
			$value = htmlspecialchars($value); //convert predefined characters to HTML entities
			echo $value;
		}


		$statement->execute(['firstName' => $validatedData['firstName'], 'lastName' => $validatedData['lastName'], 'email' => $validatedData['email'], 'city' => $validatedData['city'], 'telephone' => $validatedData['telephone'], 'address' => $validatedData['address'], 'interests' => $validatedData['interests'], 'username' => $user]);

		return true;
	}


?>
