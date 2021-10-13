<?php
include("connect.php");
$type_id = $_GET['type_id'];

$sql = "SELECT * FROM foods
        WHERE type_id= $type_id
        ORDER BY f_id DESC
";
// echo($sql);
// exit();
$result = mysqli_query($conn, $sql);
 while($row_prd = mysqli_fetch_array($result)){
//echo $query;
?>

<div class="col-sm-3" align="center">
  <a href="prd.php?id=<?php echo $row_prd[0]; ?>">
    <div class="card mb-3">
      <img class="card-img-top" src="<?php echo"backend/img/".$row_prd['f_img'];?>">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row_prd["f_name"];?></h5>
        <p class="card-text text-danger">ราคา <?php echo $row_prd["f_price"];?> บาท</p>
      </div>
      <div class="card-footer">
        <a class="btn btn-block btn-warning n-link n-radius" href="">รายละเอียด</a>
      </div>
    </div>
  </a>
</div>
<?php } ?>
            