<?php
    ob_start();//cached output, tranh loi khi su dung header(...)
	session_start();
	require('database-config.php');
	error_reporting(E_ALL);//develop mode
	error_reporting(0);//product mode

	$id=$_GET['id'];
	
	//Xoa file anh
	$sql='select `title`, `description`, `image`, `phstories_id`, `timeline` from `photos` where `id`='.$id;
	$rs=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($rs);
	
	if(is_file($row["image"]))
	unlink($row["image"]);
	
	//Xoa khoi DB
	$sql='delete from `photos` where `id`='.$id;
	mysqli_query($conn,$sql);
	
	//Chuyen trang
	header("Location:  /TA8photostory/");	
?>