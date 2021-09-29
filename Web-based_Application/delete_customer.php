<?php
	include 'config.php';
	$id = $_GET['id'];
	$sql = "Delete from customers where md5(id) = '$id'";
	if($db_link->query($sql) === true){
		echo "Sucessfully deleted data";
		header('location:customers.php');
	}else{
		echo "Oopps something error ";
	}
	$db_link->close();
?>