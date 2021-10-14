<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	error_reporting( error_reporting() & ~E_NOTICE );
    @session_start();  
	
	// echo "<pre>";
	// print_r($_SESSION);
	// echo "<hr>";
	// print_r($_POST);
	// echo "</pre>";
	// exit();

?>



<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php
   
require_once('../connect.php');

//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
	$user_id = $_POST['user_id'];
	$user_name = $_POST["name"]; 
	$address = $_POST["user_address"];
	$email = $_POST["user_email"];
	$phone = $_POST["phone"];
	$f_qty = $_POST["f_qty"];
	$total = $_POST['total'];
	$total_dis = $_POST['total_dis'];
	$order_date = date("Y-m-d H:i:s");
	$status = 1;
	$pay_slip ='';
	$b_name ='';
	$b_number ='';
	$pay_date ='';
	$pay_amount ='';
	$f_name = $_POST['f_name'];
	$pro_id = $_POST['btn_voucher'];

	
	//บันทึกการสั่งซื้อลงใน order_detail
	 mysqli_query($conn, "BEGIN"); 
	$sql1 = "INSERT  INTO orderr VALUES
	(NULL,
	'$user_id',  
	'$user_name',
	'$address',
	'$email',
	'$phone',
	'$status',
	'$pay_slip',
	'$b_name',
	'$b_number',
	'$pay_date',
	'$pay_amount',
	'$order_date' 
	)";
	
	$query1	= mysqli_query($conn, $sql1 ) or die ("Error in query: $query1 " . mysqli_error($con));

 
 
	$sql2 = "SELECT MAX(order_id) AS order_id FROM orderr  WHERE user_id='$user_id'";
	$query2	= mysqli_query($conn, $sql2) or die ("Error in query: $sql2 " . mysqli_error($con));
	$row = mysqli_fetch_array($query2);
	$order_id = $row['order_id'];
	
	
	foreach($_SESSION['shopping_cart'] as $f_id=>$f_qty)
	 
	{
		$sql3	= "SELECT * FROM foods where f_id=$f_id";
		$query3 = mysqli_query($conn, $sql3) or die ("Error in query: $sql3 " . mysqli_error($con));
		$row3 = mysqli_fetch_array($query3);
		$total=$row3['f_price']*$f_qty;
		$count=mysqli_num_rows($query3);
		
	
	 //  for($k=0; $k<$count; $k++){  	
		// if(isset($p_name[$k])){

		
		$sql4	= "INSERT INTO  order_detail 
		values(null, 
		'$order_id', 
		'$f_id',
		'$f_name', 
		'$f_qty', 
		'$total',
		'$total_dis',
		'$pro_id',
		'$order_date')";
		$query4	= mysqli_query($conn, $sql4) or die ("Error in query: $query4 " . mysqli_error($con));

		$sqlpname ="UPDATE order_detail t2, 
		(
		SELECT f_name, f_id FROM foods
		) 
		t1 
		SET t2.f_name = t1.f_name WHERE t1.f_id = t2.f_id";

	    $querypanem	= mysqli_query($conn, $sqlpname) or die ("Error in query: $querypanem " . mysqli_error($con));

//ตัดสต๊อก
  for($i=0; $i<$count; $i++){
  $have =  $row3['f_qty'];
  
  $stc = $have - $f_qty;
  
  $sql9 = "UPDATE foods SET  
     f_qty=$stc
     WHERE  f_id=$f_id ";
  $query9 = mysqli_query($conn, $sql9) or die ("Error in query: $query9 " . mysqli_error($con));
 
  }
    

 
 }




// exit;
	
	if($query1 && $query4){
		mysqli_query($conn, "COMMIT");
		//$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
		foreach($_SESSION['shopping_cart'] as $f_id)
		{	
			unset($_SESSION['shopping_cart']);
			echo "<script>";
			echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
			echo "window.location ='my_order.php?order_id=$order_id&act=show-order&pro_id=$pro_id';";
			echo "</script>";
		}
	}
	else{
		mysqli_query($conn, "ROLLBACK");  
			echo "<script>";
			echo "alert('บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่');";
			echo "window.location ='confirm_order.php'; ";
			echo "</script>";	
	}

	mysqli_close($conn);
?>
