<?php
include('connect.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
	//สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
// print_r($_POST);
// exit();
	$type_id_user = '3';
	$user_email = $_REQUEST["user_email"];
	$user_password = $_REQUEST["user_password"];
	$user_name = $_REQUEST["user_name"];
	$user_tel = $_REQUEST["user_tel"];
	$user_address = $_REQUEST["user_address"];
	//เพิ่มเข้าไปในฐานข้อมูล
	$sql = "INSERT INTO user(type_id_user ,user_email, user_password, user_name,  user_tel, user_address)
			 VALUES('$type_id_user', '$user_email', '$user_password', '$user_name',  '$user_tel', '$user_address')";

	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($conn);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('สมัครสมาชิกเรียบร้อย !');";
	echo "window.location = 'index.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to register again');";
	echo "</script>";
	}
?>