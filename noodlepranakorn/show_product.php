<?php
$q = $_GET['q'];
      include("connect.php");
      $sql = "SELECT * FROM foods as f
      INNER JOIN type  as t ON f.type_id=t.type_id
      ORDER BY f.f_id DESC";  //เรียกข้อมูลมาแสดงทั้งหมด
      $result = mysqli_query($conn, $sql);
      while($row_prd = mysqli_fetch_array($result)){
?>
<div class="col-sm-3" align="center">
  <a href="prd.php?id=<?php echo $row_prd[0]; ?>">
    <div class="card mb-3">
      <img class="card-img-top" src="<?php echo"backend/img/".$row_prd['f_img'];?>">
      <div class="card-body">
        <h5 class="card-title"><font color="#3E2723"><?php echo $row_prd["f_name"];?></font></h5>
        <h5 class="card-text text-danger">ราคา<font color="#2E7D32"><b> <?php echo $row_prd["f_price"];?>.- </b></font> บาท</h5>
      </div>
      <div class="card-footer">
        <a class="btn btn-block btn-warning n-link n-radius" href="prd.php">รายละเอียด</a>
      </div>
    </div>
  </a>
</div>     
<?php } ?>    