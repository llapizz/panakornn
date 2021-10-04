<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('connections.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
	$user_id = $_REQUEST["user_id"];
	$type_id_user = $_REQUEST["type_id_user"];
	$user_name = $_REQUEST["user_name"];
	$user_password = $_REQUEST["user_password"];
	
	$user_email = $_REQUEST["user_email"];
	$user_tel = $_REQUEST["user_tel"];
	$user_address = $_REQUEST["user_address"];
	

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
	
	$sql = "UPDATE user SET  
			type_id_user='$type_id_user', 
			user_name='$user_name', 
			user_password='$user_password', 
			user_email='$user_email',
			user_tel='$user_tel', 
			user_address='$user_address' 
			WHERE user_id='$user_id' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Update Succesfuly');";
	echo "window.location = 'member.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to Update again');";
	echo "</script>";
}
?>