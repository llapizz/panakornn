 <meta charset="UTF-8" />
<?php
include('connections.php'); 
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting( error_reporting() & ~E_NOTICE );

$order_id = $_POST['order_id'];
$order_status = $_POST['order_status'];

 
$sql ="UPDATE orderr SET	 
		order_status='$order_status'
		WHERE order_id=$order_id";
			
		$result = mysqli_query($con, $sql);// or die ("Error in query: $sql " . mysqli_error());
	
	mysqli_close($con);
 echo $sql;
// exit();
	
		if($result){
			echo "<script>";
			echo "alert('จัดส่งอาหารเรียบร้อยแล้ว !');";
			echo "window.location ='order.php?act=show-post'; ";
			echo "</script>";
		} else {
			
			echo "<script>";
			echo "alert('ERROR!');";
			echo "window.location ='index.php'; ";
			echo "</script>";
		}
		


?>