<?php
	include 'config.php';
	$id = $_GET['id'];
	$sql = "Delete from products where md5(id) = '$id'";
	if($db_link->query($sql) === true){
		echo "Sucessfully deleted data";
		header('location:products.php');
	}else{
		echo "Oopps something error ";
	}
	$db_link->close();
?>