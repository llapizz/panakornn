
<?php
include('h.php');
include("../condb.php");
$f_id = $_GET["id"];
?>
<!DOCTYPE html>
<head>
  <?php include('boot4.php');?>
  <style>
  * {
  box-sizing: border-box;
  }
  .zoom {
  padding: 50px;
  transition: transform .2s;
  width: 400px;
  height: 400px;
  margin: 0 auto;
  }
  .zoom:hover {
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(1.5);
  }
  </style>
</head>
<body>
<?php include('navbar.php');?>
  <div class="row">
    <?php
<<<<<<< Updated upstream
    $sql = "SELECT * FROM foods as f 
        INNER JOIN type  as t ON f.type_id=t.type_id 
    AND f_ids = $f_ids
=======
    $sql = "SELECT * FROM foods as p 
        INNER JOIN tbl_type  as t ON p.type_id=t.type_id 
    AND f_id = $f_id
>>>>>>> Stashed changes
    ";
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
    $row = mysqli_fetch_array($result);
    ?>
    <div class="col-md-12">
      <div class="container" style="margin-top: 50px">
        <div class="row">
          <div class="col-md-5">
            <div class="zoom">
              <?php echo"<img src='../backend/img/".$row['f_img']."'width='100%'>";?>
            </div>
          </div>
          <div class="col-md-6"><br><br>
            <h3 class="n-link"><?php echo $row["f_name"];?></h3>
            <p>
              ประเภท <?php echo $row["type_name"];?><br>
              ราคา <font color="red"> <?php echo $row["f_price"];?> </font><br>
              <b>คงเหลือ</b> <?php echo $row["f_qty"];?> <?php echo $row["f_unit"];?> 
            </p>
            <?php echo $row["f_detail"];?>
            <p> <!-- Go to www.addthis.com/dashboard to customize your tools --> 
              <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5500ee80057fdb99"></script>
              <!-- Go to www.addthis.com/dashboard to customize your tools --> 
            <div class="addthis_inline_share_toolbox_sf2w"></div>
            </p>
<<<<<<< Updated upstream
            <a href="index.php?f_ids=<?php echo $row['f_ids'];?>&act=add" class="btn btn-danger btn-xs n-radius">
=======
            <a href="index.php?f_id=<?php echo $row['f_id'];?>&act=add" class="btn btn-danger btn-xs n-radius">
>>>>>>> Stashed changes
              <span class="glyphicon glyphicon-shopping-cart"></span> หยิบใส่ตะกร้า
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<?php include('script4.php');?>