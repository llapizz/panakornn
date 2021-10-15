<style>
	table {
		border-radius: 3em;
		overflow: hidden;
		}
</style>
<?php
    error_reporting( error_reporting() & ~E_NOTICE );
    @session_start(); 
    $f_id = $_GET['f_id']; 
	$act = $_GET['act'];

	if($act=='add' && !empty($f_id)){
		if(!isset($_SESSION['shopping_cart'])){
			$_SESSION['shopping_cart']=array();
		}
		if(isset($_SESSION['shopping_cart'][$f_id])){
			$_SESSION['shopping_cart'][$f_id]++;
		}else{
			$_SESSION['shopping_cart'][$f_id]=1;
		}
		echo "<script>";
		echo "window.location ='index.php'; ";
		echo "</script>";
	}

	if($act=='remove' && !empty($f_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['shopping_cart'][$f_id]);
	}

	if($act=='update'){
		$amount_array = $_POST['amount'];
		foreach($amount_array as $f_id=>$amount){
			$_SESSION['shopping_cart'][$f_id]=$amount;
		}
	}
	?>
	<form id="frmcart" name="frmcart" method="post" action="?act=update">
	<table align="center" class="n-table">
	<tr align="center">
		<th colspan="5""><font size="5px"color="#B0BEC5"><i class="fas fa-shopping-cart"></i> ตระกร้า อาหาร </font></th>
		
	</tr>
	<tr align="center" height="50">
		<td><font size="4px"color="#00BCD4"> อาหาร </font></td>
		<td><font size="4px"color="#FF9800"> ราคา </font></td>
		<td><font size="4px"color="#FDD835"> จำนวน</font></td>
		<td><font size="4px"color="#4CAF50"> ราคารวม</font></td>
		<td><font size="4px"color="#EF5350"> ลบ</font></td>
	</tr>
    <?php
		if(!empty($_SESSION['shopping_cart'])){
			require_once('../connect.php');
			foreach($_SESSION['shopping_cart'] as $f_id=>$f_qty){
				$sql = "select * from foods where f_id=$f_id";
				$query = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_array($query)){
				
				$sum = $row['f_price'] * $f_qty;
				$pqty = $row['f_qty'];
				$total += $sum;
				echo "<tr align='center'>";
				echo "<td>";
				echo "<img src='../backend/img/".$row['f_img']."' width='70'>";
				echo "</td>";
				//echo "<td width='334'>"." " . $row["p_name"] . "</td>";
				echo "<td>" .number_format($row["f_price"]) . "</td>";
				
				echo "<td>";  
				echo "<input type='number' name='amount[$f_id]' value='$f_qty' max='$pqty'  width='20px'/></td>";
				
				echo "<td>";
				echo  number_format($sum). ' &nbsp; ';
				// echo "<a href='index.php?f_id=$f_id&act=remove' class='btn btn-danger btn-sm'>
				// ลบ</a>";
				echo "</td>";
				echo "<td align='center'><a href='index.php?f_id=$f_id&act=remove' class='btn btn-danger btn-sm n-radius'>x</a></td>";
				
				echo "</tr>";
				}
		
			}
			echo "<tr>";
			echo "<td colspan='3' align='center' class='py-3 text-warning'><font size='5px' color='#EC407A'> รวม </font></td>";
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
          <button type="submit" name="button" id="button" class="btn btn-warning btn-block n-radius"><i class="fas fa-calculator"></i> คำนวณ</button>
          <?php $chk = $_GET['act'];
		      if($chk=='update'){?>
            <button type="button" name="Submit2"  onclick="window.location='confirm_order.php';" class="btn btn-danger btn-block n-radius"> 
            <span class="glyphicon glyphicon-shopping-cart"> </span> <i class="fas fa-cart-plus"></i> สั่งซื้อ </button>
               <?php }else{ }?>
            </td>
            <?php }else { 
			echo "<font color='#FFFFF' size='4px'>";
			echo "*";
			echo "<font color='red'>";
			echo " ลูกค้ายังไม่ได้ทำการเลือกเมนูอาหาร ";
			echo "</font>";
			echo "*";
			echo "</font>";
			} ?>
          </p>
      </form>
 
 