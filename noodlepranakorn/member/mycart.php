<?php  
require_once('../connect.php');
require_once('../backend/trandate.php');
// $m_user = $_GET['m_user'];
$query_mm ="SELECT * FROM user WHERE user_id = $user_id";
$mm = mysqli_query($conn, $query_mm) or die ("Error in query: $query_mm " . mysqli_error());
$row_mm = mysqli_fetch_assoc($mm);
$totalRows_mm = mysqli_num_rows($mm);
// echo ($query_mm);
// exit();

$user_id = $row_mm['user_id'];

$query_mycart ="
SELECT 
o.order_id as oid, o.user_id, o.order_status, o.order_date,
d.order_id , COUNT(d.order_id) as coid, SUM(d.total) as ctotal
FROM tbl_order  as o, tbl_order_detail as d
WHERE o.user_id =$user_id 
AND o.order_id=d.order_id
GROUP BY o.order_id
ORDER BY o.order_id DESC";
$mycart = mysqli_query($conn, $query_mycart) or die ("Error in query: $query_mycart " . mysqli_error());
$row_mycart = mysqli_fetch_assoc($mycart);
$totalRows_mycart = mysqli_num_rows($mycart);

?>
<?php include('datatable.php');?>
<h4 class="text-light">ประวัติการสั่งซื้อ <button class="btn btn-danger btn-sm n-radius" onclick="window.print()">พิมพ์</button>  </h4>

<table id="example3" class="n-table" cellspacing="0">
  <tr>
    <th>วันที่ทำรายการ</th>
    <th>จำนวนรายการ</th>
    <th>ราคารวม</th>
    <th>สถานะ</th>
    <th>ชำระเงิน</th>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo tranDate($row_mycart['order_date']); ?></td>
     
      <td align="center">
      <?php echo $row_mycart['coid'];?>
      </td>
       <td align="right">
      <?php echo number_format($row_mycart['ctotal'],2);?>
      </td>
      <td align="center">
        <?php 
          $status =  $row_mycart['order_status'];
          include('../backend/status.php');
        ?>
      </td>
      
    <td>
      <a class="btn btn-outline-warning n-radius" href="my_order.php?order_id=<?php echo $row_mycart['oid']; ?>&act=show-order">
     ชำระเงิน
      </a>
    </td>
    </tr>
    <?php } while ($row_mycart = mysqli_fetch_assoc($mycart)); ?>
    <tr><td colspan="6" align="center">ก๋วยเตี๋ยวเรือใหญ่พระนคร</td></tr>
</table>


<?php
mysqli_free_result($mycart);

mysqli_free_result($mm);
?>
