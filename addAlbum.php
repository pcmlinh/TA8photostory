<?php
header("Content-Type:application/json");
require 'database-config.php';
if (isset($_POST["product_name"]) && isset($_POST["product_description"])) {
	$name = $_POST["product_name"];
	$description= $_POST["product_description"];
	$sql = "INSERT INTO photostories(name, description) VALUES('".$name."','".$description."')";
	$result = mysqli_query($conn,$sql);
	if ($result) {
		$data["result"] = true;
		$data["message"]  ="Add product successfully";
        header("Location: album.php");
        
	}else{
		$data["result"] = false;
		$data["message"]  ="Cannot add product. Error: ".mysql_error($conn);
	}
}else{
	$data["result"] = false;
	$data["message"]  ="Invalid";
}
echo json_encode($data)
?>