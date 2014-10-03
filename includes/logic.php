<?php
														   	
	if (isset($_POST["numwords"])) {
		$numwords = $_POST["numwords"];
		if (!is_numeric($numwords)) {
			$msg = "There was a problem with the number of words. Please enter a number and try again."; 
		} else {
	
			if (isset($_POST["uppercase"])) {
				$uppercase = true;
			} else {
				$uppercase = false;
			}

			if (isset($_POST["symbol"])) {
				$symbol = true;
			} else {
				$symbol = false;
			}

			if (isset($_POST["number"])) {
				$number = true;
			} else {
				$number = false;
			}
																   
			if ($words = file("words.txt")) { // puts each line of the file into an array
																   //(i.e. each word into an array) 
				$selected_words = array(); 
				$symbols = ["%", "!", "*", "$", "#", "@", "+"];
				$numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

				for ($i = 0; $i < $numwords; $i++) {
					$max = count($words) - 1;
					$rand = rand(0, $max); // generate a random index from the file
					$word = $words[$rand];

					if ($uppercase && $i == 0) {
						$word = ucfirst($word);		
					}
					
					//check if on last word and if so append symbol and/or number if selected
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

	
