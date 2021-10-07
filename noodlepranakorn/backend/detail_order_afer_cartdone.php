<?php include('connections.php'); ?>
<?php
  error_reporting( error_reporting() & ~E_NOTICE );
session_start();
  //print_r($_SESSION);
// $query_buyer ="SELECT * FROM tbl_member WHERE  member_id = $member_id";
// $buyer =  mysqli_query($con, $query_buyer) or die ("Error in query: $query_buyer " . mysqli_error());
// $row_buyer = mysqli_fetch_assoc($buyer);
// $totalRows_buyer = mysqli_num_rows($buyer);

$order_id = $_GET['order_id'];

$query_cartdone ="
SELECT * FROM
tbl_order as o,
tbl_order_detail as d,
foods as p,
user  as m
WHERE o.order_id = $order_id
AND o.order_id=d.order_id
AND d.f_id=p.f_id
AND o.user_id = m.user_id
ORDER BY o.order_date ASC";
$cartdone = mysqli_query($con, $query_cartdone) or die ("Error in query: $query_cartdone " . mysqli_error());
 // echo($query_cartdone);
 //  exit();
$row_cartdone = mysqli_fetch_assoc($cartdone);
$totalRows_cartdone = mysqli_num_rows($cartdone);
?>
<table border="0" align="center" class="table">
  <tr>
    <td colspan="5" align="center"><p align="center">
      <button class="btn btn-info btn-block n-radius" onclick="window.print()">
        <span class="fas fa-print"></span> พิมพ์ </button> 
    </p></td>
  </tr>
  <tr>
    <td width="100%" colspan="5" align="center">
      <strong>รายการสั่งซื้อคุณ<?php echo $row_cartdone['f_name'];?>    <br />
      เบอร์โทร :  <?php echo $row_cartdone['phone'];?> <br />
      ที่อยู่ :<?php echo $row_cartdone['address'];?>  <br />
      วันที่ทำรายการ :   <?php echo $row_cartdone['order_date'];?> <br />
      <font color="red">  สถานะ :
      <?php
      $status =  $row_cartdone['order_status'];
      include('status.php');
      
      ?>
      <br />
      </font></strong>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top">
            <strong>
            ชำระเงิน ธ.<?php echo $row_cartdone['b_name'];?> <br />
            เลข บ/ช <?php echo $row_cartdone['b_number'];?> <br />
            จำนวน <?php echo $row_cartdone['pay_amount'];?><br />
            วันที่ชำระ <?php echo date('d/m/Y',strtotime($row_cartdone['pay_date']));?><br />
            เลขที่ออเดอร์ :  <?php echo $row_cartdone['order_id'];?>
            </strong>
          </td>
          <td>
          <img src="../member/pimg/<?php echo $row_cartdone['pay_slip'];?>" width="100%"/>
        </td>
        </tr>
      </table>
      <strong><font color="red">
      <div align="center"></div>
      
      </font></strong>
    </td>
  </tr>
</table>
<table class="table table-striped">
  <tr>
    <td align="center">รหัส</td>
    <td align="center">สินค้า</td>
    <td align="center">ราคา</td>
    <td align="center">จำนวน</td>
    <td align="center">รวม</td>
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
  $sum  = $row_cartdone['p_price']*$row_cartdone['p_c_qty'];
  $total  += $sum;
  //echo $total;
  ?>
  <?php } while ($row_cartdone = mysqli_fetch_assoc($cartdone)); ?>
  <tr>
    <td colspan="4" align="center">รวม</td>
    <td align="center"><b> <?php echo number_format($total,2);?></b></td>
  </tr>
  <tr>
    <td colspan="5">
      <?php
        //echo $status;
      if($status > 1) {?>
      
      <?php $p =  $_GET['p'];
      if($status==3){ }else{?>
      <h3> แจ้งเลขจัดส่งอาหาร </h3>
      <form id="form1" name="form1" method="post" action="add_postcode_db.php">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="11%">เลขจัดส่งอาหาร</td>
            <td width="42%">
              
              
              <input name="order_status" type="hidden" id="order_status" value="3" /></td>
              <td width="47%">
                <input type="submit" name="button" id="button" class="btn btn-primary" value="บันทึก" />
              </td>
            </tr>
          </table>
        </form>
      <?php } ?>
        <?php } ?>
      </td>
    </tr>
    
  </table>
<?php
mysqli_free_result($buyer);
mysqli_free_result($cartdone);
?>