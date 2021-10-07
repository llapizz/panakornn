<?php
error_reporting( error_reporting() & ~E_NOTICE );
//1. เชื่อมต่อ database:
include('connections.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_admin:
$query = "SELECT * FROM user WHERE type_id_user = 2"  ;
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
echo ' <table id="example1" class="table table-striped">';
  //หัวข้อตาราง
  echo "<thead>";
    echo "<tr>
      <th>รหัสสมาชิก</th>
      <th width=20%>ชื่อ-สกุล</th>
      <th>E-mail</th>
      <th>เบอร์ติดต่อ</th>
      <th width='30%'>ที่อยู่</th>
      <th width=5%>แก้ไข</th>
      <th width=5%>ลบ</th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
    echo "<td>" .$row["user_id"]."</td>";
    echo "<td align='left'>" .$row["user_name"]."</td>"; 
    echo "<td align='left'>" .$row["user_email"]."</td>";
    echo "<td>" .$row["user_tel"]."</td>";
    echo "<td align='left'>" .$row["user_address"]."</td>";
    //แก้ไขข้อมูล
    echo "<td><a href='staff.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs n-radius'>แก้ไข</a></td> ";
    
    //ลบข้อมูล
    echo "<td><a href='staff_form_del_db.php?ID=$row[0]' onclick=\"return confirm('คุณต้องกรจะลบรายการนี้ใช่หรือไม่ ?')\" class='btn btn-danger btn-xs n-radius'>ลบ</a></td> ";
  echo "</tr>";
  }
echo "</table>";
//5. close connection
mysqli_close($con);
?>