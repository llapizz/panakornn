<?php include('connections.php'); ?>
<?php
  error_reporting( error_reporting() & ~E_NOTICE );
session_start();
  //print_r($_SESSION);
// $query_buyer ="SELECT * FROM user WHERE  user_id = $user_id";
// $buyer =  mysqli_query($con, $query_buyer) or die ("Error in query: $query_buyer " . mysqli_error());
// $row_buyer = mysqli_fetch_assoc($buyer);
// $totalRows_buyer = mysqli_num_rows($buyer);


$order_id = $_GET['order_id'];

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
$cartdone = mysqli_query($con, $query_cartdone) or die ("Error in query: $query_cartdone " . mysqli_error());
 // echo($query_cartdone);
 //  exit();
$row_cartdone = mysqli_fetch_assoc($cartdone);
$totalRows_cartdone = mysqli_num_rows($cartdone);
?>
<table border="0" align="center" class="table">
  <tr>
    <td colspan="5" align="center"></td>
  </tr>
  <tr>
    <td width="100%" colspan="5" align="center">
      <strong>รายการสั่งซื้อคุณ : <?php echo $row_cartdone['user_name'];?>    <br />

      <?php
              if($row_cartdone['phone']!=0){
                 echo "เบอร์โทร : ".$row_cartdone['phone']."<br>";
              }else{
                echo "โต๊ะ : ".$row_cartdone['table']."<br>";
              }
          ?>

      


      วันที่ทำรายการ :   <?php echo date('d/m/Y',strtotime($row_cartdone['order_date']));?> <br />
      <font color="red">  สถานะ :
      <?php
      $status =  $row_cartdone['order_status'];
      $pay_amount = $row_cartdone['pay_amount'];
      $total = $row_cartdone['total'];
      $total_dis = $row_cartdone['total_dis'];
      $promotion = $row_cartdone['pro_id'];
      include('status.php');
      
      ?>
      <br />
      </font></strong>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center" valign="top">
            <strong>
            <?php echo $row_cartdone['b_name'];?> <br />
            <!-- เลข บ/ช <?php echo $row_cartdone['b_number'];?> <br /> -->
            จำนวนเงิน :  <?php echo $pay_amount;?><br />
            วันที่ชำระ : <?php echo date('d/m/Y',strtotime($row_cartdone['pay_date']));?><br />
            เลขที่ออเดอร์ :  <?php echo $row_cartdone['order_id'];?>
            </strong>
          </td>
          
          <td align="center">
          หลักฐานการโอน
            <br>
          <img src="../member/pimg/<?php echo $row_cartdone['pay_slip'];?>" width="35%"/>
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
    <td><?php echo $row_cartdone['f_name'];?></td>
    <td align="center"><?php echo $row_cartdone['f_price'];?></td>
    <td align="center"><?php echo $row_cartdone['f_c_qty'];?></td>
    <td align="center"><?php echo number_format($row_cartdone['total'],2);?></td>
  </tr>
  <?php
  $sum  = $row_cartdone['f_price']*$row_cartdone['f_c_qty'];
  $total  += $sum;
  //echo $total;
  ?>
  <?php } while ($row_cartdone = mysqli_fetch_assoc($cartdone)); ?>
  <tr>
    <td colspan="4" align="center">ราคารวมสุทธิ</td>
    <td align="center"><b>
    <?php 
    if($status==1){
      
    }elseif($status==2){
      echo $pay_amount;
    }elseif($status==3){
      echo $pay_amount;
    } 
    ?>
        <!-- <?php
              if($status!=1){
                echo $pay_amount;
              }else{
                echo $total_dis;
              }
          ?> -->
    <!-- <?php echo $total_dis;?></b></td> -->
  </tr>
  <tr>
    <td colspan="5">
      <?php
        //echo $status;
      if($status > 1) {?>
      
      <?php $p =  $_GET['p'];
      if($status!=3){ ?>
      <h3><font color="white"> จัดส่งอาหาร</font> </h3>
      <form id="form1" name="form1" method="post" action="add_postcode_db.php">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
              <td width="100%" align="center">

                <input type="hidden" name="order_status" value="<?=$status+1;?>" />
                <input type="hidden" name="order_id" value="<?=$order_id;?>" />
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

mysqli_free_result($cartdone);
?>