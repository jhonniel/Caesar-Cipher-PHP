<?php  
// check which button is pressed
// if the encryption button
if (isset($_POST["enkripsi"])) {
	// create a function that accommodates input data
	function cipher($char, $key){
		// check whether what is inputted is an alphabet
		if (ctype_alpha($char)) {
			// if yes, check again whether it is a capital letter or not
			$nilai = ord(ctype_upper($char) ? 'A' : 'a'); // if yes, the value is A, otherwise the value is a | conversion to ASCII and accommodate into variables
// convert the input char to ASCII
			$ch = ord($char);
			// make modulus calculations and accommodate them into variables
			$mod = fmod($ch + $key - $nilai, 26); // number of alphabets = 26
			// the result of the modulus is added with the value and the conversion to alphabetical form, accommodated in the variable
			$hasil = chr($mod + $nilai);
			// return results
			return $hasil;
		} // if what is inputted is not an alphabet then return char
		else{
			return $char;
		}
	} 

	// create encryption function
	function enkripsi($input, $key){
		// create a variable that holds the string
		$output = "";
		// create variables that accommodate the data array
		$chars = str_split($input); // contains input data that is converted into an array
		// loop to display array data
		foreach($chars as $char){
			// output holds the looping results of the array data
			$output .= cipher($char, $key); // which is filled with the results of the cipher function ()
		} // restore output
		return $output;
	}
	// and if the decryption button is pressed
} else if (isset($_POST["dekripsi"])) {
	// create another cipher and encryption function
	function cipher($char, $key){
		// check whether what is inputted is an alphabet
		if (ctype_alpha($char)) {
			// if yes, check again whether it is a capital letter or not
			$nilai = ord(ctype_upper($char) ? 'A' : 'a'); // if yes, the value is A, otherwise the value is a | conversion to ASCII and accommodate into variables
// convert the input char to ASCII
			$ch = ord($char);
			// make modulus calculations and accommodate them into variables
			$mod = fmod($ch + $key - $nilai, 26); // number of alphabets = 26
// the result of the modulus is added with the value and converted to alphabetical form, accommodated in the variable
			$hasil = chr($mod + $nilai);
			// return results
			return $hasil;
		} // if what is inputted is not an alphabet then return char
		else{
			return $char;
		}
	} 

	// create encryption function
	function enkripsi($input, $key){
		// create a variable that holds the string
		$output = "";
		// create variables that accommodate the data array
		$chars = str_split($input); // contains input data that is converted into an array
// loop to display array data
		foreach($chars as $char){
			// output holds the looping results of the array data
			$output .= cipher($char, $key); // which is filled with the results of the cipher function ()
		} // restore output
		return $output;
	}
	// then create a decryption function
	function dekripsi($input, $key){
		// Return the value of the encryption function, but the number of alphabets minus the key
		return enkripsi($input, 26 - $key);
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cesar Cipher</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<style>
		.label{
			background-color: #5fabf0; 
			color: white; 
			text-align: center; 
			padding: 5px 10px; 
			border-radius: 5px;
		}
	</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-26" style="">Caesar Cipher</span>		
					<div class="label">Pesan </div>

					<!-- form input Message -->
					<div class="wrap-input100">
						<textarea style="padding-top: 15px;" class="input100" type="text" name="plain"></textarea>
					</div>
					<div class="label">Key</div>

					<!-- form input key -->
					<div class="wrap-input100">
						<input class="input100" type="number" name="key">
					</div>
					<div class="login100-form-title" style="padding-bottom: 30px;">

						<!-- encryption and decryption button -->
	                    <button type="submit" name="enkripsi" class="btn btn-success">Enkripsi</button>
	                    <button type="submit" name="dekripsi" class="btn btn-secondary">Dekripsi</button>
				    </div>
				</form>
					<div class="label">Hasil</div>
				    <div style=" padding-top: 10px;" class="wrap-input100">

				    	<!-- encryption / decryption result -->
                        <!-- create the output condition -->
						
						<textarea style="padding-top: 15px;" class="input100" type="text" name="">
						<?php  

						if (isset($_POST["enkripsi"])) { // if the encryption button is pressed
							// show the encryption results
							echo enkripsi($_POST["plain"], $key=2);
						} // and if the decryption
						else if (isset($_POST["dekripsi"])) {
							echo dekripsi($_POST["plain"], $key=2);
						}

						?></textarea>
					</div>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</body>
</html>