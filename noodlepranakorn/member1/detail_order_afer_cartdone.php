<?php require_once('../connect.php'); ?>
<?php
  error_reporting( error_reporting() & ~E_NOTICE );
    session_start(); 
  //print_r($_SESSION);

$query_buyer = "SELECT * FROM tbl_member WHERE member_id = $member_id";
$buyer = mysqli_query($conn, $query_buyer) or die ("Error in query: $query_buyer " . mysqli_error());
$row_buyer = mysqli_fetch_assoc($buyer);
$totalRows_buyer = mysqli_num_rows($buyer);


$query_rb = "SELECT * FROM tbl_bank";
$rb =mysqli_query($conn, $query_rb) or die ("Error in query: $query_rb " . mysqli_error());
$row_rb = mysqli_fetch_assoc($rb);
$totalRows_rb = mysqli_num_rows($rb);


  $order_id = $_GET['order_id'];
  $pro_id = $_GET['pro_id'];
  
$query_cartdone ="
SELECT * FROM 
tbl_order as o, 
tbl_order_detail as d, 
tbl_product as p,
tbl_member  as m
WHERE o.order_id = $order_id
AND o.order_id=d.order_id 
AND d.p_id=p.p_id
AND o.member_id = m.member_id 
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
<form class="form bg-light" action="add_payslip_db.php" method="post" enctype="multipart/form-data" name="formpay" id="formpay">
  <table class="table table-dark table-striped">
    <tr>
      <td colspan="5" align="center"><strong>รายการสั่งซื้อล่าสุด คุณ<?php echo $row_cartdone['m_name'];?> <br />
          <font color="red"> สถานะ :
          <?php 
      $status =  $row_cartdone['order_status'];
      include('../backend/status.php');
      ?>
        </font></strong></td>
    </tr>
    <tr>
        <td colspan="5" align="center">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <?php if($row_cartdone['pay_slip']){ ?>
            <tr>
              <td>
                <img src="pimg/<?php echo $row_cartdone['pay_slip'];?>" class="img w-100"/>
              </td>
            </tr>
            <?php } ?>
            <tr>
              <td valign="top">
                <strong>
                  ชำระเงิน ธ.<?php echo $row_cartdone['b_name'];?> <br />
                  เลข บ/ช <?php echo $row_cartdone['b_number'];?> <br />
                  จำนวน <?php echo $row_cartdone['pay_amount'];?><br />
                  วันที่ชำระ <?php echo date('d/m/Y',strtotime($row_cartdone['pay_date']));?><br /><br />
                  <h4 class="text-light">
                    เลขที่ออเดอร์ :  <?php echo $row_cartdone['postcode'];?>
                  </h4>
                </strong>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr class="success">
      <td width="99" align="center">รหัส</td>
        <td width="120" align="center">สินค้า</td>
        <td width="118" align="center">ราคา</td>
        <td width="238" align="center">จำนวน</td>
        <td width="100" align="center">รวม</td>
      </tr>
      <?php do { ?>
      <tr>
        <td align="center"><?php echo $row_cartdone['d_id'];?></td>
        <td><?php echo $row_cartdone['p_name'];?></td>
        <td align="center"><?php echo $row_cartdone['p_price'];?></td>
        <td align="center"><?php echo $row_cartdone['p_c_qty'];?></td>
        <td align="center"><?php echo number_format($row_cartdone['total'],2);?></td>
      </tr> 
      <?php 
          $sum  = $row_cartdone['p_price']*$row_cartdone['f_c_qty'];
          $total  += $sum;
          //echo $total;
          ?>
    <?php } while ($row_cartdone = mysqli_fetch_assoc($cartdone)); ?>
      <tr>
        <td colspan="4" align="right">รวม</td>
        <td align="center"><b> <?php echo number_format($total,2);?></b></td>
      </tr>
    <?php if($pro_id){ 
      $sql_check = "SELECT * FROM tbl_promotion WHERE pro_id = $pro_id";
      $check = mysqli_query($conn, $sql_check)or die($sql_check);
      $row_check = mysqli_fetch_assoc($check);

      echo $mode = substr($row_check['pro_discount'],-1);
      if($mode=="%"){
        $total -= $total/100*intval(substr($row_check['pro_discount'],0,-1));
      }else{
        $total -= $row_check['pro_discount'];
      }
    ?>
      <tr>
        <td colspan="3"><?=$row_check['pro_name']?></td>
        <td align="right">รวม</td>
        <td align="center"><b> <?php echo number_format($total,2);?></b></td>
      </tr>
    <?php mysqli_free_result($check); } ?>
      
  </table>
  <?php 
    // $status =  $row_cartdone['order_status'];
      if($status > 1){ }else{ ?> 
  <table class="" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="6">
        <h4>รายละเอียดการโอนเงิน<br>
        <small class="text-danger">*เลือกบัญชีที่โอนเงิน</small>
        </h4>
      </td>
    </tr>
    <?php do { ?>
      <tr class="text-dark">
        <td width="5%" align="center">
          <input <?php if (!(strcmp($row_rb['b_name'],"b_bank"))) {echo "checked=\"checked\"";} ?> type="radio" name="bank"  value="<?php echo $row_rb['b_name'].'-'.$row_rb['b_number'];?>" required="required" />
        </td>
        <td width="22%">ธนาคาร <?php echo $row_rb['b_name']; ?></td>
        <td width="17%"><?php echo $row_rb['b_number']; ?></td>
        <td width="15%"><strong>สาขา</strong> <?php echo $row_rb['bn_name']; ?></td>
        </tr>
    <?php } while ($row_rb = mysqli_fetch_assoc($rb)); ?>
    <tr class="text-dark">
      <td colspan="5"><hr>
        <label for="pay_date">วันที่ชำระเงิน</label>
        <input class="form-control" type="date" name="pay_date" id="pay_date" value="<?php echo date('Y-m-d');?>"/>
      </td>
    </tr>
    <tr class="text-dark">
      <td colspan="5"><br>
        <label for="pay_amount">จำนวนเงิน</label>
        <input class="form-control" type="number" name="pay_amount" id="pay_amount"  value="<?php echo $total; ?>" required="required"/>
      </td>
    </tr>
    <tr class="text-dark">
      <td colspan="5"><br>
        <label for="pay_slip">หลักฐานการโอน</label>
        <input name="pay_slip" type="file"  required="required"/><br>
        (ไฟล์ .jpg, gif, png, pdf&nbsp;ไม่เกิน 2mb)
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
  <p align="center"><br />
    <button type="submit" name="add" class="btn btn-success btn-block"> บันทึก</button>
  </p>
</form>
<?php } ?>
    </div>
  </div>
</div>

<?php  
mysqli_free_result($buyer);
mysqli_free_result($rb);
mysqli_free_result($cartdone);
?>