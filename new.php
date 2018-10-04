<?php?>

<html>
<head>
<style>
.error{color:red;}
</style>
</head>
<body>
<?php
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$nameErr = $fullnameErr = $emailErr = $genderErr = $phoneErr = $passErr ="";
$name = $fullname = $email = $gender = $phone = $password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["un"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["un"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
}
?>
<form name="application" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table align="center" >
	<tr>
		<td>
		username :
		</td>
		<td>
		 <input type ="text" name ="un" value="<?php echo $name;?>"/>
		 <span class="error"> <?php echo $nameErr;?></span>
		</td>
	</tr>
	<tr>
		<td>
		Fullname :
		</td>
		<td>
		 <input type ="text" name ="fn" value="<?php echo $fullname;?>"/>
		  <span class="error"> <?php echo $fullnameErr;?></span>
		</td>
	</tr>
	<tr>
		<td>
		Email :
		</td>
		<td>
		 <input type ="text" name ="ue" value="<?php echo $email;?>"/>
		 <span class="error"> <?php echo $emailErr;?></span>
		</td>
	</tr>
	<tr>
		<td>
		Phone :
		</td>
		<td>
		 <input type ="text" name ="up" value="<?php echo $phone;?>"/>
		 <span class="error"> <?php echo $emailErr;?></span>
		</td>
	</tr>
	<tr>
		<td>
		Password :
		</td>
		<td>
		 <input type ="password" name ="pw" value="<?php echo $password;?>"/>
		 <span class="error">* <?php echo $emailErr;?></span>
		</td>
	</tr>
	<tr>
		<td>
		Re-Password :
		</td>
		<td>
		 <input type ="password" name ="cpw" />
		  <span class="error">* <?php echo $emailErr;?></span>
		</td>
	</tr>
	<tr>
	<tr>
		<td>
		Gender :
		</td>
		<td>
		 <input type ="radio" name ="gen" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male"/>Male
		 <input type ="radio" name ="gen" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="Female"/>Female
		 <input type ="radio" name ="gen" <?php if (isset($gender) && $gender=="Other") echo "checked";?> value="Other"/>Other
		  <span class="error">* <?php echo $genderErr;?></span>
		</td>
	</tr>
	<tr>
		<td>
		Education :
		</td>
		<td>
		 <input type="checkbox" name="edu[]" value="SSC">SSC
		 <input type="checkbox" name="edu[]" value="HSC">HSC
		 <input type="checkbox" name="edu[]" value="BSC">BSC
		 <input type="checkbox" name="edu[]" value="MSC">MSC
		</td>
	</tr>
	<tr>
	<tr>
		<td>
		
		</td>
		<td>
		<input type="submit">
		</td>
	</tr>


</table>
</form>
</body>
</html>