<?php
session_start();
?>
<?php
require_once('libs/Connect.php');
header('Content-Type: text/html; charset=UTF-8');
//Check: if user click btn submit, handle
if(isset($_POST["btn_submit"])){
	//Get user infomation
	$username = $_POST["username"];
	$password = $_POST["password"];
	//Xử lý lỗi sql injection
	$username = strip_tags($username);
	$username = addslashes($username);
	$password = strip_tags($password);
	$password = addslashes($password);
	if($username == "" || $password == ""){
		echo "Username and Password cannot be empty. <a href='javascript: history.go(-1)'>Back</a>";
	}else{
		$password = md5($password);
		$sql = "select * from tb_user where username = '$username'";
		$query = mysqli_query($conn, $sql);
		$num_row = mysqli_num_rows($query);
		$data = mysqli_fetch_array($query);
		if($num_row == 0){
			echo "Username doesn't exist!";
		}else{
			if($password != $data["password"]){
				echo "Password is incorrect! <a href='javascript: history.go(-1)'>Back</a>";					
			}else{
				$_SESSION['username'] = $username;
				header('location: user.php');
			}
		}
	}
}
?>
<html>
<head></head>
<body>
	<form method = "POST" action = "login.php?do=login">
		<fieldset>
			<legend class = "form-control">LOGIN</legend>
				<table class = "table" align = "left", width = "50%"> 
					<tr>
						<td><label class = "lbUsername"><b> Username </label></b></td>
						<td><input class = "txtUsername" type = "text" name = "username" size = "30"></td>
					</tr>
					<tr>
						<td><b> Password </b></td>
						<td><input type = "password" name = "password" size = "30"></td>
					</tr>
					<tr>
						<td> <input type="submit" name="btn_submit" value="Login"> </td>
						<td>
							<a href = 'register.php' title = 'register'> Sign up </a>
						</td>
					</tr>
				</table>
		</fieldset>
	</form>
</body>
</html>