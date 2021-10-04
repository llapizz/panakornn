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
   
require_once('../condb.php');

//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
	$member_id = $_POST['member_id'];
	$name = $_POST["name"]; 
	$address = $_POST["address"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$p_qty = $_POST["p_qty"];
	$total = $_POST['total'];
	$order_date = date("Y-m-d H:i:s");
	$status = 1;
	$pay_slip ='';
	$b_name ='';
	$b_number ='';
	$pay_date ='';
	$pay_amount ='';
	$p_name = $_POST['p_name'];
	$postcode='';
	$pro_id = $_POST['btn_voucher'];

	
	//บันทึกการสั่งซื้อลงใน order_detail
	 mysqli_query($conn, "BEGIN"); 
	$sql1 = "INSERT  INTO tbl_order VALUES
	(NULL,
	'$member_id',  
	'$name',
	'$address',
	'$email',
	'$phone',
	'$status',
	'$pay_slip',
	'$b_name',
	'$b_number',
	'$pay_date',
	'$pay_amount',
	'$postcode',
	'$order_date' 
	)";
	
	$query1	= mysqli_query($conn, $sql1) or die ("Error in query: $query1 " . mysqli_error());

 
 
	$sql2 = "SELECT MAX(order_id) AS order_id FROM tbl_order  WHERE member_id='$member_id'";
	$query2	= mysqli_query($conn, $sql2) or die ("Error in query: $sql2 " . mysqli_error());
	$row = mysqli_fetch_array($query2);
	$order_id = $row['order_id'];
	
	
	foreach($_SESSION['shopping_cart'] as $p_id=>$p_qty)
	 
	{
		$sql3	= "SELECT * FROM tbl_product where p_id=$p_id";
		$query3 = mysqli_query($conn, $sql3) or die ("Error in query: $sql3 " . mysqli_error());
		$row3 = mysqli_fetch_array($query3);
		$total=$row3['p_price']*$p_qty;
		$count=mysqli_num_rows($query3);
		
	
	 //  for($k=0; $k<$count; $k++){  	
		// if(isset($p_name[$k])){

		
		$sql4	= "INSERT INTO  tbl_order_detail 
		values(null, 
		'$order_id', 
		'$p_id',
		'$p_name', 
		'$p_qty', 
		'$total',
		'$order_date')";
		$query4	= mysqli_query($conn, $sql4) or die ("Error in query: $query4 " . mysqli_error());

		$sqlpname ="UPDATE tbl_order_detail t2, 
		(
		SELECT p_name, p_id FROM tbl_product
		) 
		t1 
		SET t2.p_name = t1.p_name WHERE t1.p_id = t2.p_id";

	    $querypanem	= mysqli_query($conn, $sqlpname) or die ("Error in query: $querypanem " . mysqli_error());

//ตัดสต๊อก
  for($i=0; $i<$count; $i++){
  $have =  $row3['p_qty'];
  
  $stc = $have - $p_qty;
  
  $sql9 = "UPDATE tbl_product SET  
     p_qty=$stc
     WHERE  p_id=$p_id ";
  $query9 = mysqli_query($conn, $sql9) or die ("Error in query: $query9 " . mysqli_error());
 
  }
    

 
 }




// exit;
	
	if($query1 && $query4){
		mysqli_query($conn, "COMMIT");
		//$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
		foreach($_SESSION['shopping_cart'] as $p_id)
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
