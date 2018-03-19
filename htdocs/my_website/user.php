<?php
session_start(); 
if(!isset($_SESSION['username'])){
	header('location: Login.php');
}
?>

<html lang = "en">
<head>
	<meta charset = "utf-8">
	<meta http-equiv = "X-UA-Compatible" content = "IE = edge">
	<meta name = "viewport" content = "width = device-width, initial-scale = 1">
	<title>User Management</title>
	<!-- Bootstrap core CSS -->
	<link href = "../bootstrap/css/bootstrap.min.css" rel = "stylesheet">
</head>
<body>
	<?php
	require_once('libs/Connect.php');
	$sql = "select * from user";
	$query = mysqli_query($conn, $sql);
	?>
	<div class = "container">
		<div class = "row">
		<!--<h3>User Management</h3> -->
			<table align = "left", width = "80%">
			<thead>
				<tr>
					<td> User: <?php echo $_SESSION['username'];?> - <a href = 'Logout.php' title = 'Logout'> Logout </a></td>
				</tr>
			</thead>
			</table>
			<table align = "center", width = "90%">
				<thead>
					<tr>
					<td colspan = "7", align = "center"><b><font size = "50">INFORMATION</font><br /></b></td>
					</tr>
					<tr>
						<th>ID</th>
						<th>USER NAME</th>
						<th>PASSWORD</th>
						<th>NAME</th>
						<th>EMAIL</th>
						<th>LEVEL</th>
						<th>ACTION</th>
					</tr>
				</thead>	
				<tbody align = "center">
					<?php
					$i = 1;
					while($data = mysqli_fetch_array($query)){
						$id = $data['id'];
					?>		
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $data['username']; ?></td>
							<td><?php echo $data['password']; ?></td>
							<td><?php echo $data['name']; ?></td>
							<td><?php echo $data['email']; ?></td>
							<td>
								<?php 
									if ($data["level"] == 1) {
										echo "Administrator";
									} else {
										echo "Member";
									}
								?>
							</td>
							<td><a href = "edit_user.php?id=<?php echo $data["id"]; ?>"> Edit </a><a href = "delete_user.php?id=<?php echo $data["id"]; ?>"> Delete </a></td>
						</tr>
					<?php 
					$i++;
					}
					?>	
				</tbody>
			</table>
		</div>
	</div><!-- /.container -->
	<!-- Bootstrap core JavaScript
	======================================-->
	<!-- Placed at the end of the document so the page load faster -->
	<script src "https:////ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>