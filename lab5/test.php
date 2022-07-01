<?php 
//print_r($_POST);
//echo $_POST["sastavdalja"];
session_start();
$_SESSION['int'][]=$_POST["sastavdalja"];
print_r($_SESSION);

?>
<!DOCTYPE html>
<html>
<head>
   
    <title>Lab5</title>
    <h1>Course Manager</h1>
</head>
<body>

    <form action='test.php' method='post'>
        <p>Add integrent:</p><input type='text' name='sastavdalja' value='' class='auto'>

        <input type="submit" name="submit" value="Submit" />
        <br />
        <p>Added integrents</p>
    </form>
</body>
</html>
