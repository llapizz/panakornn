<?php require_once('../connect.php'); ?>
<?php
//error_reporting( error_reporting() & ~E_NOTICE );
session_start(); 
// print_r($_SESSION);

$query_buyer = "SELECT * FROM user WHERE  user_id=$user_id " or die("Error:" . mysqli_error($con));
$buyer = mysqli_query($conn, $query_buyer) or die ("Error in query: $query_buyer " . mysqli_error($con));
$row_buyer = mysqli_fetch_assoc($buyer);
$totalRows_buyer = mysqli_num_rows($buyer);

	//echo 'ss'.$row_buyer;
	 
?>
<div class="container py-3">
  <div class="row">
    <div class="col-md-10 offset-md-1 n-radius">
      <table class="n-table">
        <tr align="center">
          
          <th colspan="6">สั่งซื้อสินค้า</th>
        </tr>
        <tr class="success" height="50">
          <td align="center" class="py-3 text-warning">ลำดับ</td>
          <td align="center" class="py-3 text-warning">ภาพ</td>
          <td align="center" class="py-3 text-warning">สินค้า</td>
          <td align="center" class="py-3 text-warning">ราคา</td>
          <td align="center" class="py-3 text-warning">จำนวน</td>
          <td align="center" class="py-3 text-warning">รวม/รายการ</td>
        </tr>
        <form  name="formlogin" action="saveorder.php" method="POST" id="login" class="form-horizontal">
        <?php
        require_once('../connect.php');
        $total=0;
        foreach($_SESSION['shopping_cart'] as $f_id=>$f_qty){
          $sql = "select * from foods where f_id=$f_id";
          $query = mysqli_query($conn, $sql);
          $row	= mysqli_fetch_array($query);
          $sum	= $row['f_price']*$f_qty;
          $total	+= $sum;
          echo "<tr>";
          echo "<td align='center'>";
          echo  $i += 1;
          echo "</td>";
          echo "<td align='center'>";
          echo "<img src='../backend/img/".$row['f_img']."' width='70'>";
          echo "</td>";
          echo "<td align='center'>" . $row["f_name"] . "</td>";
          echo "<td align='center'>" .number_format($row['f_price'],2) ."</td>";
          echo "<td align='center'>$f_qty</td>";
          echo "<td align='center'>".number_format($sum,2)."</td>";
          echo "</tr>";
          $type_count[$i] = $row['type_id'];
        ?>
          <input type="hidden"  name="f_name[]" value="<?php echo $row['f_name']; ?>" class="form-control" required placeholder="ชื่อ-สกุล" />
        <?php }
        $unique = array_unique($type_count);
        $len = count($type_count);
        $i=1;
        $col_type = '0';
        for($i;$i<=$len;$i++){ $unique[$i]?$col_type .= ','.$unique[$i]:''; }
        
        $sql_check = "SELECT * FROM promotion 
                      WHERE pro_price <= $total AND type_id IN($col_type) 
                      ORDER BY pro_price ASC";
        $check = mysqli_query($conn, $sql_check)or die($sql_check);
        $row_check = mysqli_fetch_assoc($check);
            echo "<tr>";
            
            echo "<td colspan='3' align='center'><h5 class='py-3 text-warning'>โปรโมชั่นแนะนำ</h5></td>";
            echo "<td align='center'><button type='submit' class='btn btn-warning btn n-radius btn-sm' id='btn' name='btn_voucher' value='none'>ไม่ใช้สิทธิ</button></td>";
            echo "<td align='center' height='70'><b>รวม</b></td>";
            echo "<td align='center'><b>".number_format($total,2)."</b></td>";
            echo "</tr>";
        $j=0;
        do{
             $mode = substr($row_check['pro_discount'],-1);
            if($mode=="%"){
              $totalsum[$j] = $total-$total/100*intval(substr($row_check['pro_discount'],0,-1));
            }else{
              $totalsum[$j] = $total-$row_check['pro_discount'];
            }
            echo "<tr>";
            echo "<td style='background-color:#33CC66' align='center' colspan='3'>".$row_check['pro_name']."</td>";
            if ($total != $totalsum[$j]){
            echo "<td><center><button type='submit' class='btn btn-success btn n-radius btn-sm' id='btn' name='btn_voucher' value='".$row_check['pro_id']."'>ใช้สิทธินี้</button></center></td>";
            echo "<td align='center'><b>เหลือ</b></td>";
            echo "<td align='center'><b>".number_format($totalsum[$j],2)."</b></td>";
            echo "<input type='hidden' id='total_dis' name='total_dis' value='".number_format($totalsum[$j],2)."'>";
          }else{
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
          }
            echo "</tr>";
        $j++; }while($row_check=mysqli_fetch_assoc($check));
            echo "<tr align='right'>";
            echo "<td colspan='6'><a href='index.php' class='btn btn-danger n-radius'>ยกเลิก</a></td>";
            echo "</tr>";
        ?>
      </table>
		</div>
	</div>
<tr align="center">
<div class="container py-3 " >
  <div class="row">
    <div class="col-md-10 offset-md-1 n-radius" style="background-color:#f4f4f4" align="center">
      <h3 align="center" class="py-3 text-warning">
      <span class="glyphicon glyphicon-shopping-cart"></span> รายละเอียดลูกค้า</h3>
        <div class="form-group" >
          <div class="col-sm-5">
            <h5><font color="black">ชื่อลูกค้า</font></h5><input type="text" name="name" value="<?php echo $row_buyer['user_name']; ?>" class="form-control" required placeholder="ชื่อ-สกุล" readonly/>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-5">
            <h5><font color="black">เบอร์โทรติดต่อ</font></h5><input type="text" name="phone" value="<?php echo $row_buyer['user_tel']; ?>" class="form-control" required placeholder="เบอร์โทรศัพท์" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12" align="center">
            <input name="user_id" type="hidden" id="user_id" value="<?php echo $row_buyer['user_id']; ?>">
          </div>
        </div>
      </form>
    </div>
  </div>
</tr>

<?php
mysqli_free_result($buyer);
mysqli_free_result($check);
?>