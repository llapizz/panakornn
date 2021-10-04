<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('connections.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
	$b_id = $_REQUEST["b_id"];
	$b_name = $_REQUEST["b_name"];
	$b_type = $_REQUEST["b_type"];
	$b_number = $_REQUEST["b_number"];
	$b_owner = $_REQUEST["b_owner"];
	$bn_name = $_REQUEST["bn_name"];


//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
	
	$sql = "UPDATE bank SET  
			b_name='$b_name', 
			b_type='$b_type', 
			b_number='$b_number', 
			b_owner='$b_owner',
			bn_name='$bn_name'
			WHERE b_id='$b_id' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Update Succesfuly');";
	echo "window.location = 'bank.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to Update again');";
	echo "</script>";
}
?>