<?php 
if($status==1){
		  echo "<button class='btn btn-danger btn-block n-radius'>";
		  echo "<i class='fas fa-hand-holding-usd'></i> รอชำระเงิน";
		  echo "</button>";
	  }elseif($status==2){
		  echo "<button class='btn btn-warning btn-block n-radius'>";
		  echo "<i class='fas fa-hourglass-half'></i> กำลังจัดเตรียมอาหาร";
		  echo "</button>";
	}elseif($status==3){
		  echo "<button class='btn btn-success btn-block n-radius'>";
		  echo "<i class='fas fa-shipping-fast'></i> จัดส่งอาหารแล้ว";
		  echo "</button>";
	  } 
?>