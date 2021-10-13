<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('connections.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
  //Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());
	
//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
	$f_id = $_POST["f_id"];
	$f_name = $_POST["f_name"];
	$type_id = $_POST["type_id"];
	$f_qty = $_POST['f_qty'];
	$f_unit = $_POST['f_unit'];
	//$f_detail = $_POST["f_detail"];
	$f_price = $_POST['f_price'];
	$f_img = (isset($_POST['f_img']) ? $_POST['f_img'] : '');
	$img2 = $_POST['img2'];
	$upload=$_FILES['f_img']['name'];
	if($upload !='') { 
 
	//โฟลเดอร์ที่เก็บไฟล์
	$path="img/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['f_img']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname =$numrand.$date1.$type;
 
	$path_copy=$path.$newname;
	$path_link="img/".$newname;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['f_img']['tmp_name'],$path_copy);  
		
	}else {
		$newname = $img2;
	
	}
 
	

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
	
	$sql = "UPDATE foods SET  
			f_name='$f_name',
			type_id='$type_id', 
			f_qty='$f_qty', 
			f_unit='$f_unit', 
		
						f_price='$f_price',
			f_img='$newname'
			WHERE f_id='$f_id' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('Update Succesfuly');";
	echo "window.location = 'product.php'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to Update again');";
	echo "</script>";
}
?>