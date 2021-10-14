<?php
error_reporting( error_reporting() & ~E_NOTICE );
//1. เชื่อมต่อ database:
include('connections.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
// <<<<<<< HEAD
// // 2. query ข้อมูลจากตาราง tb_admin:
// // $query_mm = "SELECT * FROM user WHERE user_id = $user_id";
// // $mm = mysqli_query($con, $query_mm) or die ("Error in query: $query_mm " . mysqli_error());
// // $row_mm = mysqli_fetch_assoc($mm);
// // $totalRows_mm = mysqli_num_rows($mm);

// $user_id = $row_mm['user_id'];
// =======
// //2. query ข้อมูลจากตาราง tb_admin:
// // $query_mm = "SELECT * FROM user WHERE user_id = $user_id";

// // $mm = mysqli_query($con, $query_mm) or die ("Error in query: $query_mm " . mysqli_error());
// // $row_mm = mysqli_fetch_assoc($mm);
// // $totalRows_mm = mysqli_num_rows($mm);

// // $user_id = $row_mm['user_id'];
// >>>>>>> 4a10a87cd9c71d4d8900dc31e1ad8081d77a092e

$query_mycart ="
SELECT 
o.order_id as oid, o.user_id, o.order_status, o.order_date, o.name, d.total_dis as discount,
d.order_id , COUNT(d.order_id) as coid, SUM(d.total) as ctotal
FROM orderr  as o, order_detail as d 
WHERE o.order_id=d.order_id
AND o.order_status=1
GROUP BY o.order_id
ORDER BY o.order_id DESC";
$mycart = mysqli_query($con, $query_mycart) or die ("Error in query: $query_mycart " . mysqli_error());
//$row_mycart = mysqli_fetch_assoc($mycart);
$totalRows_mycart = mysqli_num_rows($mycart);

// echo ($query_mycart);
// exit();
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
echo ' <table id="example1" class="table table-striped">';
  //หัวข้อตาราง
  echo "<thead>";
    echo "<tr align='center'>
      <th width='15%'>วันที่ทำรายการ</th>
      <th>เวลา</th>
      <th width=20%>ชื่อลูกค้า</th>
      <th width='5%'>จำนวน</th>
      <th>ราคารวม</th>
      <th>ราคาโปรโมชั่น</th>
      <th>สถานะ</th>
      <th>รหัสสั่งซื้อ</th>
      <th width='5%'>เปิด</th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($mycart)) {
    $oid = $row['oid'];
  echo "<tr>";
    echo "<td align='left'>" . date('d/m/', strtotime($row["order_date"])). (date('Y', strtotime($row["order_date"])) + 543) . "</td> ";
    echo "<td align='left'>" . date('H:i:s', strtotime($row["order_date"]))."</td> ";
    echo "<td align='left'>" .$row["name"] .  "</td> ";
    echo "<td align='center'>" .$row["coid"] .  "</td> ";
    echo "<td align='center'>" .$row["ctotal"] .  "</td> ";
    echo "<td align='center'>" .$row["discount"] .  "</td> ";
    echo "<td>" 
    ."<button class='btn btn-danger btn-block btn-xs n-radius'>รอชำระเงิน</button>".  "</td> ";
    echo "<td>" .$row["oid"] .  "</td> ";
    echo "<td><a href='order.php?order_id=$oid&act=show-order' class='btn btn-danger btn-xs n-radius'>เปิด</a></td> ";
  }
echo "</table>";
//5. close connection
mysqli_close($con);
?>



