<?php require_once('../connect.php'); ?>
<?php
  error_reporting( error_reporting() & ~E_NOTICE );
    session_start(); 
  //print_r($_SESSION);

$query_buyer = "SELECT * FROM user WHERE user_id = $user_id";
$buyer = mysqli_query($conn, $query_buyer) or die ("Error in query: $query_buyer " . mysqli_error());
$row_buyer = mysqli_fetch_assoc($buyer);
$totalRows_buyer = mysqli_num_rows($buyer);


$query_rb = "SELECT * FROM bank";
$rb =mysqli_query($conn, $query_rb) or die ("Error in query: $query_rb " . mysqli_error());
$row_rb = mysqli_fetch_assoc($rb);
$totalRows_rb = mysqli_num_rows($rb);


  $order_id = $_GET['order_id'];
  $pro_id = $_GET['pro_id'];
  
$query_cartdone ="
SELECT * FROM 
orderr as o, 
order_detail as d, 
foods as p,
user  as m
WHERE o.order_id = $order_id
AND o.order_id=d.order_id 
AND d.f_id=p.f_id
AND o.user_id = m.user_id 
ORDER BY o.order_date ASC";
$cartdone = mysqli_query($conn, $query_cartdone) or die ("Error in query: $query_cartdone " . mysqli_error());

$row_cartdone = mysqli_fetch_assoc($cartdone);
$totalRows_cartdone = mysqli_num_rows($cartdone);

?>
<style type="text/css">
input[type='radio'] {
  -webkit-appearance: none;
  width: 20px;
  height: 20px;
  border: 1px solid darkgray;
  border-radius: 50%;
  outline: none;
  box-shadow: 0 0 5px 0px gray inset;
}
input[type='radio']:hover {
  box-shadow: 0 0 5px 0px orange inset;
}
input[type='radio']:before {
  content: '';
  display: block;
  width: 60%;
  height: 60%;
  margin: 20% auto;
  border-radius: 50%;
}
input[type='radio']:checked:before {
  background: red;
}
</style>
<form class="form bg-light" action="add_payslip_db.php?pro_id=<?=$_GET['pro_id']?>" method="post" enctype="multipart/form-data" name="formpay" id="formpay">
<table class="table table-dark table-striped">
    <tr>
      
      <td colspan="5" align="center"><h4> <font color="#fffff"><i class="fas fa-archive"></i> รายการสั่งซื้อ อาหาร</font></h4><br>
      <h5><font color="#fffff"><i class="fas fa-user"></i> คุณ</font>  <font color="#66BB6A">  <?php echo $row_cartdone['name'];?> </font> </h5><br />
          <h5><font color="red"><i class="fas fa-lightbulb"></i> สถานะ 
        </font></h5>
        <?php 
      $status =  $row_cartdone['order_status'];
      include('../backend/status.php');
      ?>
      </td>
    </tr>
    <tr>
        <td colspan="5" align="center">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <?php if($row_cartdone['pay_slip']){ ?>
            <tr>
              <td align="center">
                <img src="pimg/<?php echo $row_cartdone['pay_slip'];?>" width="35%"/>
              </td>
            </tr>
            <?php }
            if($status!=1){ ?>
            <tr style="font-size:17px">
              <td valign="top">
                <strong>
                  <center>ชำระเงิน : <font color="#1E88E5"><?php echo $row_cartdone['b_name'];?></font> <br/>
                  เลขที่บัญชีการชำระเงิน : <font color="#1E88E5"><?php echo $row_cartdone['b_number'];?> </font><br/>
                  วันที่ชำระ : <font color="#1E88E5"><?php echo date('d/m/Y',strtotime($row_cartdone['pay_date']));?></font><br ><br/>
                  <h4>
                  <strong><?php if ($status != 1){ echo "<font color='#43A047'>เลขที่โต๊ะ : </font><font color='#FFD54F'> " .$row_cartdone['table']; } ?></strong>
                     <br>
                  </h4>
                  <h4>
                  <strong><?php if ($status != 1){ echo "<font color='#43A047'>เลขที่ออเดอร์ : </font><font color='#FFD54F'> " .$row_cartdone['order_id']; } ?></strong>
                     <br>
                  </h4>
                <strong>
                 <font color="#FFFFF">* <font color="#E53935">โปรดนำเลขที่ออเดอร์ของท่านไปแสดงที่หน้าเค้าเตอร์ของทางร้าน</font> *</font> 
                </strong>
                </center>
              </td>
            </tr>
            <?php } ?>
          </table>
        </td>
      </tr>
      <tr class="success">
      <td width="99" align="center"><font size="3px"color="#FFC107"><i class="fas fa-list-ol"></i> รหัสอาหาร </font></td>
        <td width="120" align="center"><font size="3px"color="#FFC107"><i class="fas fa-utensils"></i> อาหาร </font></td>
        <td width="118" align="center"><font size="3px"color="#FFC107"><i class="fas fa-money-bill-alt"></i> ราคา </font></td>
        <td width="238" align="center"><font size="3px"color="#FFC107"><i class="fas fa-archive"></i> จำนวน </font></td>
        <td width="100" align="center"><font size="3px"color="#FFC107"><i class="fas fa-money-bill-alt"></i> รวม </font></td>
      </tr>
      <?php do { ?>
      <tr style="font-size:17px">
        <td align="center"><?php echo $row_cartdone['d_id'];?></td>
        <td align="center"><?php echo $row_cartdone['f_name'];?></td>
        <td align="center"><?php echo $row_cartdone['f_price'];?></td>
        <td align="center"><?php echo $row_cartdone['f_c_qty'];?></td>
        <td align="center"><?php echo number_format($row_cartdone['total'],2);?></td>
      </tr> 
      <?php 
          $sum  = $row_cartdone['f_price']*$row_cartdone['f_c_qty'];
          $total  += $sum;
          // echo $total;
          ?>
    <?php } while ($row_cartdone = mysqli_fetch_assoc($cartdone)); ?>
      <tr style="font-size:17px">
        <td colspan="4" align="right"><font size="3px"color="#FFC107"><i class="fas fa-money-bill-alt"></i> รวมสุทธิ </font></td>
        <td align="center"><b> <?php echo number_format($total,2);?></b></td>
      </tr>


    <?php if($pro_id!="none"&&isset($_GET['pro_id'])){ 
      $sql_check = "SELECT * FROM promotion WHERE pro_id = $pro_id";
      $check = mysqli_query($conn, $sql_check)or die($sql_check);
      $row_check = mysqli_fetch_assoc($check);

      $mode = substr($row_check['pro_discount'],-1);
      if($mode=="%"){
        $total -= $total/100*intval(substr($row_check['pro_discount'],0,-1));
      }else{
        $total -= $row_check['pro_discount'];
      }
    ?>
      <tr style="font-size:17px">
        <td colspan="3"><font color="#66BB6A">โปรโมชั่นที่ใช้งาน</font> <?=$row_check['pro_name']?></td>
        <td align="right"><font color="#66BB6A"><i class="fas fa-money-bill-alt"></i> รวมโปรโมชั่น </font></td>
        <td align="center"><b> <?php echo number_format($total,2);?></b></td>
      </tr>
    <?php mysqli_free_result($check); } ?>
      
  </table>
  <?php 
    // $status =  $row_cartdone['order_status'];
  if($status==1){ ?> 
  <br /><br />
  <table class="" border="0" align="center" cellpadding="5" cellspacing="0">
      <?php if($type_id_user!="3"){ ?>
    <tr>
      <td colspan="100" align="center">
        <h4><i class="fas fa-wallet"></i> รายละเอียดการชำระเงิน<br>
        <small class="text-danger">*กรณีลูกค้าโอนจ่าย*</small>
        </h4>
      </td>
      
    </tr>
    <?php do { ?>
      <tr class="text-dark" align="center" style="font-size:17px">
        <td width="33%" align="right"> <input <?php if (!(strcmp($row_rb['b_name'],"b_bank"))) {echo "checked=\"checked\"";} ?> type="radio" name="bank"  value="<?php echo $row_rb['b_name'].'-'.$row_rb['b_number'];?>"/>
        <i class="far fa-credit-card"></i> ธนาคาร : <font color="#2E7D32"><?php echo $row_rb['b_name']; ?></font></td>
        <td width="35%" align="center"><i class="far fa-credit-card"></i> เลขที่บัญชี  : <font color="#2E7D32"><?php echo $row_rb['b_number']; ?></font></td>
        <td width="32%" align="center"><i class="far fa-credit-card"></i> <strong> สาขา :</strong> <font color="#2E7D32"><?php echo $row_rb['bn_name']; ?></font></td>
        </tr>
    <?php } while ($row_rb = mysqli_fetch_assoc($rb)); } ?>
    <tr align="center" class="text-dark" style="font-size:17px">
      <td colspan="5"><hr>
        <div class="col-sm-5">
        <label for="pay_date"><i class="fas fa-clock"></i> วันที่ชำระเงิน</label>
        <input class="form-control" type="date" name="pay_date" id="pay_date" value="<?php echo date('Y-m-d');?>" readonly/>

      </td>
    </tr>
    <tr align="center" class="text-dark" style="font-size:17px">
      <td colspan="5"><br>
        <div class="col-sm-6">
        <label for="pay_amount"><i class="fas fa-money-bill-alt"></i> จำนวนเงิน</label>

        
        <input class="form-control" type="number" name="payment_amount" id="payment_amount"  value="<?php echo $total; ?>"  readonly/>
        <br><br><br>
        <center>
        <h4><i class="fas fa-file-image"></i> หลักฐานการโอน</h4>
        <font class="text-danger">* แนบสลิป กรณีลูกค้าโอนจ่าย&nbsp; *</font></center>
        <br><br>
        <i class="fas fa-file-import"></i>&nbsp;&nbsp;&nbsp;&nbsp; <input name="pay_slip" type="file"  /><br>
        
        
        <p align="center"><br />
          <button type="submit" name="add" class="btn btn-success btn n-radius"><i class="fas fa-save"></i> บันทึก</button>
        </p>
        </div>
      </td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td><input name="order_id" type="hidden" id="order_id" value="<?php echo $order_id; ?>" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      
    </tr>
  </table>
  
<?php } ?>
</form>
    </div>
  </div>
</div>

<?php  
mysqli_free_result($buyer);
mysqli_free_result($rb);
mysqli_free_result($cartdone);
?>