<?php
require_once('libs/Connect.php');
 
if (isset($_GET["id"])) {
	//Lay id

	$id = $_GET["id"];

	//Thuc thi cau lenh delete user

	$sql = "Delete from user where id = $id";
	$query = mysqli_query($conn, $sql);

	//Chuyen trang web ve trang thong tiin user.php

	header('Location: user.php');
}
 
 
?>