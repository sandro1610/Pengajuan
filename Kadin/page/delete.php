<?php
if (isset($_GET['id_user'])) {
    $id_user     = $_GET['id_user'];
    $sql    = "DELETE FROM tb_user WHERE id_user='$id_user'";
    $query  = mysqli_query($link,$sql);
    if($query){
		echo "<script>alert('Data Successfully Deleted');</script>";
		echo "<script>window.location='?p=dashboard';</script>";
	}else{
		echo "<script>alert('Data Failed To Delete');</script>";
		echo "<script>window.location='?p=dashboard';</script>";
	}
}
?>