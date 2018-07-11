	<?php

		require('connection.php');

			
		function validate($method, $statement){

			$valid = array();
			$invalid = array();

			if($method){ 

				//check if conditions are accepted
				if(!isset($method['checkbox'])) {

					$invalid['checkbox'] = "Трябва да се съгласите с общите условия.";

				}else {

					$valid['checkbox'] = true;

				}


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


				//validate the username of the user 
				$username = $method['username'];
				if(trim($username) == ""){

					$invalid['username'] = "Това поле е задължително.";

				}elseif(strlen($username) < 3 || strlen($username) > 10){

					$invalid['username'] = "Потребителското име трябва да е между 3 и 10 символа.";

				}else { //username is between 3 and 10 symbols
				
					if(preg_match('/^[a-z0-9\_]+$/', $username, $usernameMatch)){

						$dbUsername = getData($statement);

						foreach($dbUsername as $key  => $user){
								
							if($user['username'] == $username){
	
								$valid['err'] = "Вече съществува потребител с това потребителско име. Моля опитайте отново.";

							} else {
								$valid['username'] = $username;	
										
							}								
						}

					} else {

						$invalid['username'] = "Потребителското име трябва да съдържа малки латински букви,цифри и '_'.";

					}
				}


				//validate the password of the user 
				$password = $method['pass'];
				if(strlen($password) === 0){

					$invalid['password'] = "Това поле е задължително.";

				}elseif(strlen($password) < 6){

					$invalid['password'] = "Паролата трябва да е повече от 6 символа.";

				}else { // when the length is more than 6 symbols

					$valid['password'] = $password;	
				
					if(preg_match('/[a-z]/', $password) !== 1){

						$invalid['password'] = "Паролата трябва да съдържа поне една малка буква.";

					} elseif(preg_match('/[A-Z]/', $password) !== 1){

						$invalid['password'] = "Паролата трябва да съдържа поне една главна буква.";

					}elseif(preg_match('/[0-9]/', $password) !== 1){

						$invalid['password'] = "Паролата трябва да съдържа поне една цифра.";

					}
				}


				// validate repeated password
				$confirmPass = $method['confirmPass'];
				if(strlen($confirmPass) === 0 ){

					$invalid['confirmPass'] = "Това поле е задължително.";

				} else if($confirmPass !== $password){

					$invalid['confirmPass'] = "Двете пароли не съвпадат.";

				}

				
				//validate the email of the user 
				$email = $method['email'];
				if(trim($email) == ""){

					$invalid['email'] = "Това поле е задължително.";

				}elseif(strlen($email) < 5){

					$invalid['email'] =  "Имейлът трябва да е поне 5 символа.";

				}else { //email is between more than 5 symbols
				
					if(preg_match('/^.+@.+[.].+$/', $email, $emailMatch)){

							$valid['email'] = $email;	

					} else {

							$invalid['email'] = "Имейлът не е с валидния формат.";
					}
				}


				//validate birthdate of the user 
				$birthdate = $method['birthdate'];
				if(trim($birthdate) == ""){

					$invalid['birthdate'] = "Това поле е задължително.";

				}else{
					$valid['birthdate'] = $birthdate;
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
		}

		
		function insertData($statement, $validatedData){

			
			//clear data
			foreach ($validatedData as $value) {
				
				$value = trim($value); //remove characters from both sides of a string
				$value = stripcslashes($value); //remove backslashes
				$value = htmlspecialchars($value); //convert predefined characters to HTML entities
			}


				
			$options = array(
				'salt' => bin2hex(random_bytes(15)), //function random_bytes generates cryptographically secure pseudo-random bytes
			);


			$hash = password_hash($validatedData['password'], PASSWORD_DEFAULT, $options);

			if($hash !== false){
			//insert data
					
				$statement->execute(['firstName' => $validatedData['firstName'], 'lastName' => $validatedData['lastName'], 'username' => $validatedData['username'], 'passHash' => $hash, 'email' => $validatedData['email'], 'birthdate' => $validatedData['birthdate'], 'confirmation' => $validatedData['checkbox'], 'salt' => $options['salt']]);

				return true;
			}
		}


		function getData($statement){
			
			$statement->execute();
			$result = $statement->fetchAll();

			return $result;
			
		}

		
	?>
