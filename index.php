<!DOCTYPE html>
<html>
	<?php include("header.php"); ?>
	<body>
		<div id="maincontent">
			<h1>Welcome to the xkcd Password Generator!</h1>
			<?php require("logic.php"); ?>			
			<?php if (isset($msg)): ?>
					<p class="error"><?php echo $msg ?></p>
			<?php endif ?>			

			<?php if (isset($password)): ?>
					<h2 class="pswdmsg">Your password is: <span class="password"><?=$password?></span></h2>
			<?php endif ?>			

			<div id="leftcolumn">
				<h2>What is it?</h2>
				<p>The xkcd password generator will create a password that is secure 
					and easy to remember! The idea came from a webcomic created by Randall Munroe 
					(see below) in which he believes a multi-word password is more secure
					than the traditional cryptic passwords AND of course, easier to remember!
				</p>
				<h2>How does it work?</h2>
				<p>A password will be generated from a random list of common words.  For additional
					security, you have the option to append the last word of your password with either
					a symbol and\or number and choose to capitalize the first letter of your password.
				</p>
			</div>

			<div id="rightcolumn">
				<h2>Generate a new password</h2>
				<form action="index.php" method="POST">
				
					<label for="numwords">Number of words: </label>
					<input type="text" name="numwords" id="numwords" maxlength="1" value="3" /><br>

					<label for="uppercase">Uppercase first letter?: </label>
					<input type="checkbox" name="uppercase" id="uppercase" value="uppercase" /><br>

					<label for="symbol">Include a symbol?: </label>
					<input type="checkbox" name="symbol" id="symbol" value="symbol" /><br>

					<label for="number">Include a number?: </label>
					<input type="checkbox" name="number" id="number" value="number" /><br>

					<input type="submit" id="submit" name="submit" value="Get Your Password!">
				</form>	
			</div>
			<div id="comic">
				<img src="img/xkcd.png" alt="xkcd Password Generator Comic">
			</div>	
		</div>
	</body>
</html>	