<?php
														   	
	if (isset($_POST["numwords"])) { 
		$numwords = $_POST["numwords"];
		if (!is_numeric($numwords)) { // Check input for valid number and if not display an error message
			$msg = "There was a problem with the number of words. Please enter a number from 1 to 9 and try again."; 
		} else {
			if ($numwords == 0) { // Display error message if "0" is entered
				$msg = "The number must be greater than 0. Please try again.";
			} else {
				if (isset($_POST["uppercase"])) { //check if uppercase was selected
					$uppercase = true;
				} else {
					$uppercase = false;
				}

				if (isset($_POST["symbol"])) { //check if symbol was selected
					$symbol = true;
				} else {
					$symbol = false;
				}

				if (isset($_POST["number"])) { //check if number was selected
					$number = true;
				} else {
					$number = false;
				}
																	   
				if ($words = file("words.txt")) { // put each line of the file into an array
												  //(i.e. each word into an array) 
					$selected_words = array(); 
					$symbols = ["%", "!", "*", "$", "#", "@", "+"];  
					$numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

					// generate the password using random words selected from the words.txt file
					for ($i = 0; $i < $numwords; $i++) { 
						$max = count($words) - 1;
						$rand = rand(0, $max); // generate a random index from the file
						$word = $words[$rand]; // use that index to select a word from the array created
											   // from the words.txt file

						if ($uppercase && $i == 0) { // if uppercase was selected:
							$word = ucfirst($word);	// change the first letter of the password to uppercase
						}
						
						//check to see if on the last word and if so append a symbol and/or number, if selected
						if ($i == $numwords - 1) {
							if ($symbol) {
								$index = rand(0, count($symbols) - 1);
								$word = trim($word) . $symbols[$index];
							}
							if ($number) {
								$index = rand(0, count($numbers) - 1);
								$word = trim($word) . $numbers[$index];
							}
						}
						array_push($selected_words, trim($word));
					}	
					$password = join("-", $selected_words); 
				}
			}	
		}
	}
	
