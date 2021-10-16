
<?php
include('h.php');
include("connect.php");
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

<!-- Google font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Charm&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
<style>
    .f{
      font-family: 'Charm', cursive;
    }
    body{
      font-family: 'Itim', cursive;
    }
</style>
<!-- Google font -->
<body>
<?php include('navbar.php');?>
  <div class="row">
    <?php
    $sql = "SELECT * FROM foods as p 
        INNER JOIN type  as t ON p.type_id=t.type_id AND f_id";
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
    $row = mysqli_fetch_array($result);
    ?>
    <div class="col-md-12" >
      <div class="container" style="margin-top: 50px">
        <div class="row">
          <div class="col-md-5">
            <div class="zoom">
              <?php echo"<img src='backend/img/".$row['f_img']."'width='100%'>";?>
            </div>
          </div>
          <div class="col-md-6"><br><br>
            <h3 class="n-link" ><?php echo $row["f_name"];?></h3>
            <p style="font-size:25px">
              <!-- ประเภท <?php echo $row["type_name"];?><br> -->
              ราคา <font color="red"> <?php echo $row["f_price"];?> </font><br>
            </p>
            <!-- <a href="index.php?f_id=<?php echo $row['f_id'];?>&act=add" class="btn btn-danger btn-xs n-radius">
              <span class="glyphicon glyphicon-shopping-cart"></span> หยิบใส่ตะกร้า
            </a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<?php include('script4.php');?>

