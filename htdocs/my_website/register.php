<html>
<head>
	<title> Profile Registration </title>
</head>
<body>
	<?php
		//include file connect 
		require_once('libs/Connect.php');
		//utf-8
		header('Content-Type: text/html; charset=UTF-8');
		if(isset($_POST["btn_submit"])){
			//Get data from form by method POST
			//Keyword $_POST just get data of input tag by attribute NAME
			$username = $_POST["username"];
			$password = $_POST["pass"];
			$name = $_POST["name"];
			$email = $_POST["mail"];
			if($username == "" || $password == "" || $name == "" || $email == ""){
				echo "Please enter field required <a href='javascript: history.go(-1)'>Back</a>";
			} else {
				//Verify that user and email is exist or doesn't exist
				$sql_user = "SELECT * FROM user WHERE username = '$username'";
				$check_user = mysqli_query($conn, $sql_user);
				$sql_email = "SELECT * FROM user WHERE email = '$email'";
				$check_email = mysqli_query($conn, $sql_email);
				if(mysqli_num_rows($check_user) > 0){
					echo "User is exist! <a href='javascript: history.go(-1)'>Back</a>";
					exit;	
				}
				if (mysqli_num_rows($check_email) > 0){
					echo "Email is exist! <a href='javascript: history.go(-1)'>Back</a>";
					exit;
				}
				
				//Password encryption
				$password = md5($password);	
				$sql = "INSERT INTO user(username, password, name, email)
						VALUES ('$username', '$password', '$name', '$email')";
				mysqli_query($conn, $sql);
				echo "Sign Up Successful. <a href = 'Login.php' title = 'Login'> Sign in </a>";
				
			}
		}
	?>
	<form action="register.php?do=register" method = "post">
		<table>
			<tr>
				<td colspan = "2" align = "center"> Profile Registration </td>
			</tr>
			<tr>
				<td>UserName: </td>
				<td><input type = "text" id = "username" name = "username"></td>	
			</tr>
			<tr>
				<td>Password: </td>
				<td><input type = "password" id = "pass" name = "pass"></td>
			</tr>
			<tr>
				<td>Full name: </td>
				<td><input type = "text" id = "name" name = "name"></td>
			</tr>
			<tr>
				<td>Email: </td>
				<td><input type = "text" id = "mail" name = "mail"></td>
			</tr>
			<tr>
				<td colspan = "2" align = "center"><input type = "submit" name = "btn_submit" value = "Register"></td>
			</tr>
		</table>
	</form>
</body>
</html>