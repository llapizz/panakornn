<?php session_start();?>
<?php
include('h.php');
include("connect.php");
$f_id = $_GET["id"];
?>
<!DOCTYPE html>
<head>
  <?php include('boot4.php');?>
  
</head>
<body>
  <?php
  include('navbar.php');
  ?>
  <div class="container">
    <div class="row">
      
      
      <?php
      $sql = "SELECT * FROM foods as f 
          INNER JOIN type  as t ON f.type_id=t.type_id 
      AND f_id = $f_id
      ";
      $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
      $row = mysqli_fetch_array($result);

      ?>
      <div class="col-md-10">
        <div class="container" style="margin-top: 50px">
          <div class="row">
            <div class="col-md-6">
              <div class="zoom">
                <?php echo"<img src='backend/img/".$row['f_img']."'width='100%'>";?>
              </div>
            </div>
            <div class="col-md-6">
              <h3><b><?php echo $row["f_name"];?></b></h3>
              <p>
                ประเภท <?php echo $row["type_name"];?>
                <br>
                ราคา <font color="red"> <?php echo $row["f_price"];?> </font> บาท  <br>
                 <b>คงเหลือ</b> <?php echo $row["f_qty"];?> <?php echo $row["f_unit"];?>
              </p>
              <?php echo $row["f_detail"];?>

                 <p> <!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5500ee80057fdb99"></script>

        <!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox_sf2w"></div>
      </p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<?php include('script4.php');?>