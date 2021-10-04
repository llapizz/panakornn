<?php
    error_reporting( error_reporting() & ~E_NOTICE );
    @session_start(); 
    $p_id = $_GET['p_id']; 
	$act = $_GET['act'];

	if($act=='add' && !empty($p_id)){
		if(!isset($_SESSION['shopping_cart'])){
			$_SESSION['shopping_cart']=array();
		}
		if(isset($_SESSION['shopping_cart'][$p_id])){
			$_SESSION['shopping_cart'][$p_id]++;
		}else{
			$_SESSION['shopping_cart'][$p_id]=1;
		}
		echo "<script>";
		echo "window.location ='index.php'; ";
		echo "</script>";
	}

	if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['shopping_cart'][$p_id]);
	}

	if($act=='update'){
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount){
			$_SESSION['shopping_cart'][$p_id]=$amount;
		}
	}
	?>
	<form id="frmcart" name="frmcart" method="post" action="?act=update">
	<table align="center" class="n-table" style='color:white !important;'>
	<tr align="center">
		<th colspan="5"">ตะกร้าสินค้า</th>
	</tr>
	<tr align="center" height="50">
		<td>สินค้า</td>
		<td>ราคา</td>
		<td>จำนวน</td>
		<td>รวม</td>
		<td>ลบ</td>
	</tr>
    <?php
		if(!empty($_SESSION['shopping_cart'])){
			require_once('../condb.php');
			foreach($_SESSION['shopping_cart'] as $p_id=>$p_qty){
				$sql = "select * from tbl_product where p_id=$p_id";
				$query = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_array($query)){
				
				$sum = $row['p_price'] * $p_qty;
				$pqty = $row['p_qty'];
				$total += $sum;
				echo "<tr align='center'>";
				echo "<td>";
				echo "<img src='../backend/img/".$row['p_img']."' width='70'>";
				echo "</td>";
				//echo "<td width='334'>"." " . $row["p_name"] . "</td>";
				echo "<td>" .number_format($row["p_price"]) . "</td>";
				
				echo "<td>";  
				echo "<input type='number' name='amount[$p_id]' value='$p_qty' max='$pqty'  width='20px'/></td>";
				
				echo "<td>";
				echo  number_format($sum). ' &nbsp; ';
				// echo "<a href='index.php?p_id=$p_id&act=remove' class='btn btn-danger btn-sm'>
				// ลบ</a>";
				echo "</td>";
				echo "<td align='center'><a href='index.php?p_id=$p_id&act=remove' class='btn btn-danger btn-sm n-radius'>x</a></td>";
				
				echo "</tr>";
				}
		
			}
			echo "<tr>";
			echo "<td colspan='3' align='center'> รวม</td>";
			echo "<td colspan='2'>";
			echo "<b>";
			echo  number_format($total,2);
			echo "</b>";
			echo "</td>";
		
			echo "</tr>";
		}
	?>
          </table>
       <p align="right">   
        <?php if($total > 0){ ?>
          <td colspan="4">
          <button type="submit" name="button" id="button" class="btn btn-warning btn-block">คำนวณ</button>
          <?php $chk = $_GET['act'];
		      if($chk=='update'){?>
            <button type="button" name="Submit2"  onclick="window.location='confirm_order.php';" class="btn btn-danger btn-block"> 
            <span class="glyphicon glyphicon-shopping-cart"> </span> สั่งซื้อ </button>
               <?php }else{ }?>
            </td>
            <?php }else { 
			echo "<font color='red'>";
			echo "ไม่มีรายการสั่งซื้อ";
			echo "</font>";
			} ?>
          </p>
      </form>
 
 