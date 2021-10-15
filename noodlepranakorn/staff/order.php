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
        <tr align="center" >
          
          <th colspan="6"><font size="5px"color="#B0BEC5"><i class="fas fa-archive"></i> รายการสั่งซื้อ อาหาร </font></th>
        </tr>
        <tr class="success" height="50" style="font-size:17px">
          <td align="center"><font size="3px"color="#FFC107"><i class="fas fa-list-ol"></i> ลำดับ </font></td>
          <td align="center"><font size="3px"color="#FFC107"><i class="fas fa-file-image"></i> ภาพ </font></td>
          <td align="center"><font size="3px"color="#FFC107"><i class="fas fa-utensils"></i> อาหาร </font></td>
          <td align="center"><font size="3px"color="#FFC107"><i class="fas fa-money-bill-alt"></i> ราคา</font></td>
          <td align="center"><font size="3px"color="#FFC107"><i class="fas fa-archive"></i> จำนวน </font></td>
          <td align="center"><font size="3px"color="#FFC107"><i class="fas fa-money-bill-alt"></i> รวม </font></td>
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
          echo "<tr style='font-size:14px'>";
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
            
            echo "<td colspan='3' align='center'><h5><font size='4px'color='#EF5350'> <i class='fas fa-gift'></i>  โปรโมชั่นแนะนำ</font></h5></td>";
            echo "<td align='center'><button type='submit' class='btn btn-warning btn n-radius btn-sm' id='btn' name='btn_voucher' value='none'><i class='fas fa-times-circle'></i> ไม่ใช้สิทธิ</button></td>";
            echo "<td align='center' height='70'><b> <font size='3px'color='#FFC107'><i class='fas fa-money-bill-alt'></i> รวมสุทธิ </font></b></td>";
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
            if ($total != $totalsum[$j]){
            echo "<td style='background-color:#33CC66' align='center' colspan='3'> ".$row_check['pro_name']."</td>";
            echo "<td><center><button type='submit' class='btn btn-success btn n-radius btn-sm' id='btn' name='btn_voucher' value='".$row_check['pro_id']."'><i class='fas fa-check'></i> ใช้สิทธินี้</button></center></td>";
            echo "<td align='center'><b><font size='3px'color='#FFC107'><i class='fas fa-money-bill-alt'></i> รวมโปรโมชั่น </font></b></td>";
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
            echo "<td colspan='6'><a href='index.php' class='btn btn-danger n-radius'><i class='fas fa-times-circle'></i> ยกเลิก</a></td>";
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
      <span class="glyphicon glyphicon-shopping-cart"></span><i class="fas fa-address-card"></i> รายละเอียดการสั่งซื้อ</h3>
        <div class="form-group" >
          <div class="col-sm-5">
            <h5><font color="black"><i class="fas fa-user"></i> ชื่อลูกค้า</font></h5><input type="text" name="name" value="" class="form-control" required placeholder="ชื่อ-สกุล"/>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-5"><h5><font color="black">เลขโต๊ะที่สั่งอาหาร</font></h5></div>
            <div class="col-sm-3" align="left">
              <select name="table" class="form-control" required ="กรุณากรอก เลขที่โต๊ะ">
                <option value="">-เลือกเลขที่โต๊ะ-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>
            </div>
                  <p align="center"><br />
                    <button type="submit" name="btn_voucher" class="btn btn-success btn n-radius" value='none'> ยืนยัน</button>
                  </p>
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