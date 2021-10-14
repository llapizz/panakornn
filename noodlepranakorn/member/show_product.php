<?php
$q = $_GET['q'];
  include("../connect.php");
  $sql = "SELECT * FROM foods as f
  INNER JOIN type  as t ON f.type_id=t.type_id
  ORDER BY f.f_id DESC";  //เรียกข้อมูลมาแสดงทั้งหมด
  $result = mysqli_query($conn, $sql);
  while($row_prd = mysqli_fetch_array($result)){
?>
<div class="col-md-4" align="center">
  <a href="prd.php?id=<?php echo $row_prd[0]; ?>">
    <div class="card mb-3">
      <img class="card-img-top" src="<?php echo"../backend/img/".$row_prd['f_img'];?>">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row_prd["f_name"];?></h5>
        <p class="card-text text-danger">ราคา <?php echo $row_prd["f_price"];?> บาท</p>
      </div>
      <div class="card-footer">
        <a class="btn btn btn-warning n-link n-radius" href="prd.php?id=<?php echo $row_prd[0]; ?>">รายละเอียด</a>
        <?php include('outstock.php');?>
      </div>
    </div>
  </a>
</div>     
<?php } ?>
            