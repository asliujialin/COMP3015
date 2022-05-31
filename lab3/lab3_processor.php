<!DOCTYPE html>
<html>

<head>
  <title>Lab3 Result</title>
</head>

<body>
  <h1>Lab3 Result</h1>
  <span>
    <?php
		const MINIMUM_NAME_LENGTH 	= 2;
		const PASSWORD 				= "bcit";

		if (
			!isset($_POST['username'])
			|| !isset($_POST['password'])
			|| !isset($_POST['studentNumber'])
		) {
			die("the form fields dont exist<br />");
		}
		//normalize data with trim()
		$name 			=  ucfirst(trim($_POST['username']));
		$passwd 		=  trim($_POST['password']);
		$studentNum 	=  trim($_POST['studentNumber']);

		function redirect($msg){
			$Message = urlencode($msg);
			header("Location:lab3_processor2.php?Message=".$Message);
			die;
		}
		//Username field must be 2 characters or more
		if (
			strlen($name) < MINIMUM_NAME_LENGTH
		) {
			redirect("Username field must be 2 characters or more");
		}
		//Password field must match the lowercase string ¡°bcit¡±
		if (
			$passwd !== "bcit"
		) {
			redirect("wrong Password ");
		}
		//Student number must match BCIT student number pattern
		if (
			strlen($studentNum) != 9 || substr($studentNum, 0, 2) != 'A0'
		){
			redirect("Invalid student number");
		}
		//gender must be selected
		if (!isset($_POST['gender'])){
			redirect("A gender must be selected");
		}
		//display a specific message using the data from the username field
		if ($_POST['gender'] == "Male"){
			echo "<p>Hello, Mr." . $name . "!</p>";
		}else{
			echo "<p>Hello, Ms." . $name . "!</p>";
		}

		//check checkboxes
		if (!isset($_POST['languages'])){
			echo "<p>You are not studying any computer language</p>";
		}else{
			$arrayOflanguages = $_POST['languages'];
			foreach ($arrayOflanguages as $x) {
				echo "<br />" . $x;
			}
			if (count($arrayOflanguages) > 2 && count($arrayOflanguages) < 5){
				echo "<p>You are multilingual</p>";
			}elseif (count($arrayOflanguages) > 5){
				echo "<p>Impressive. You have been studying quite a few computing languages</p>";
			}
		}

		

		?>



</body>

</html>