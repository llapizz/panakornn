<?php
error_reporting( error_reporting() & ~E_NOTICE );
//1. เชื่อมต่อ database:
include('connections.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_admin:
$query = "SELECT * FROM tbl_bank ORDER BY b_id DESC" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
echo ' <table id="example1" class="table table-striped">';
  //หัวข้อตาราง
  echo "<thead>";
    echo "<tr>
      <th width='5%'>id</th>
      <th>ธนาคาร</th>
      <th>ชื่อ</th>
      <th>ประเภท</th>
      <th>เลขบัญชี</th>
      <th>สาขา</th>
      <th width=5%>edit</th>
      <th width=5%>delete</th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
    echo "<td>" .$row["b_id"] .  "</td> ";
    echo "<td>" .$row["b_name"] .  "</td> ";
    echo "<td>" .$row["b_owner"] .  "</td> ";
    echo "<td>" .$row["b_type"] .  "</td> ";
    echo "<td>" .$row["b_number"] .  "</td> ";
    echo "<td>" .$row["bn_name"] .  "</td> ";
    //แก้ไขข้อมูล
    echo "<td><a href='bank.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs n-radius'>แก้ไข</a></td> ";
    
    //ลบข้อมูล
    echo "<td><a href='bank_form_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs n-radius'>ลบ</a></td> ";
  echo "</tr>";
  }
echo "</table>";
//5. close connection
mysqli_close($con);
?>