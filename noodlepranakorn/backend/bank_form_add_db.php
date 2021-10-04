
<?php
	// echo "<pre>";
	// print_r($_POST);
	// echo "</pre>";
	// exit();

//1. เชื่อมต่อ database:
include('connections.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
	//รับค่าไฟล์จากฟอร์ม
$b_name = $_REQUEST['b_name'];
$b_type = $_REQUEST['b_type'];
$b_number = $_REQUEST['b_number'];
$b_owner = $_REQUEST['b_owner'];
$bn_name = $_REQUEST['bn_name'];
//img
	// เพิ่มไฟล์เข้าไปในตาราง uploadfile
	
		$sql = "INSERT INTO bank
		(
		b_name,
		b_type,
		b_number,
		b_owner,
		bn_name
		)
		VALUES
		(
		'$b_name',
		'$b_type',
		'$b_number',
		'$b_owner',
		'$bn_name')";
		
		$result = mysqli_query($con, $sql);// or die ("Error in query: $sql " . mysqli_error());
	
	mysqli_close($con);
	// javascript แสดงการ upload file
	
	
	if($result){
echo "<script type='text/javascript'>";
echo "alert('Add Succesfuly');";
echo "window.location = 'bank.php'; ";
echo "</script>";
}
else{
echo "<script type='text/javascript'>";
echo "alert('Error back to upload again');";
echo "window.location = 'bank.php'; ";
echo "</script>";
}
?>