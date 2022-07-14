<?php 
require 'conn.php';
if (isset($_POST["submit"]) ){ 
	$email = $_POST['email'];
	$password = $_POST['password'];
	$query = mysqli_query($link,"SELECT * FROM tb_user WHERE email = '$email' ");
	if (mysqli_num_rows($query) == 1) {
		if ($result = mysqli_fetch_assoc($query)) {
			if (password_verify($password, $result["password"])) {
				session_start();
					$_SESSION['id_user'] = $result["id_user"];
					$_SESSION['nama'] = $result["nama"];
					$_SESSION['email'] = $result["email"];
	                $_SESSION['password'] = $result["password"];
	                $_SESSION['level'] = $result['level'];
                if ($result['level'] == 'Admin') {
                	echo "<script>window.location='../Admin/index.php';</script>";
                }elseif ($result['level'] == 'Kadin') {
                	echo "<script>window.location='../Kadin/index.php';</script>";
                }elseif ($result['level'] == 'Pengaju') {
                	echo "<script>window.location='../Pengaju/index.php';</script>";
                }elseif ($result['level'] == 'Kabag') {
                	echo "<script>window.location='../Kabag/index.php';</script>";         
                }else{
	                echo "<script>alert('Login Failed');</scrixpt>";
	                echo "<script>window.location='../index.php';</script>";	
            	}
			}else{
				echo "<script>alert('Wrong Password');</script>";
                echo "<script>window.location='../index.php';</script>";
			}
		}
	}else{
		echo "<script>alert('User 0');</script>";
		echo "<script>window.location='../index.php';</script>";
	}
}
 ?>