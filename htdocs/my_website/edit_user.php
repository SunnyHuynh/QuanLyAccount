<html lang = "en">
	<head>
		<meta charset = "utf-8">
		<meta http-equiv = "X-UA-Compatible" content = "IE=edge">
		<meta name = "viewport" content = "width = device-width, initial-scale=1">
		<title>Member Information</title>
		 <!-- Bootstrap core CSS -->
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class = "container">
			<div class = "row">
				
				<?php 
					require_once('libs/Connect.php');

					 if (isset($_POST["save"])) {
		    				$id_user = $_POST["id_user"];
		    				$name = $_POST["name"];
		    				$level = $_POST["level"];
		    				$sql = "update user set name = '$name', level = '$level' where id = $id_user";
		    				mysqli_query($conn, $sql);
		  			  }

					$id = "";
					$name = "";
					$level = "";
					if (isset ($_GET["id"])){
						//Get the user information
						$id = $_GET["id"];
						$sql = "SELECT * FROM user WHERE id = $id";
						$query = mysqli_query($conn, $sql);
						while($data = mysqli_fetch_array($query)){
							$name = $data["name"];
							$email = $data["email"];
							$level = $data["level"];
						}
					}
				?>
				
				<h3>Member Information</h3>
				<form method = "POST" name = "fr_update">
					<table class = "table">
						<tr>
							<input type="hidden" name="id_user" value="<?php echo $id; ?>">
							<td>
								Name : 
							</td>
							<td>
								<input type = "text" name = "name" value = "<?php echo $name; ?>" />
							</td>
						</tr>
						<tr>
							<td>
								Email : 
							</td>
							<td>
								<input type = "text" name = "email" value = "<?php echo $email ?>" />
							</td>
						</tr>
						<tr>
							<td>
								Level : 
							</td>
							<td>
								<select name = "level">
									<option value = "0" <?php echo ($level == 0)? "selected" : ""; ?>>Member</option>
									<option value = "1" <?php echo ($level == 1)? "selected" : ""; ?> >Administrator</option>
								</select>
							</td>
						</tr>
						<tr>
							<td clospan = "2"><input type = "submit" name = "save" value = "save infomation"></td>
						</tr>
					</table>
				</form>	
			</div>
		</div><!-- /.container -->
 
 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
		
	</body>
</html>