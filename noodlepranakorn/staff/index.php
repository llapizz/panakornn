<?php
include("../connect.php");
$sql_promotion = "SELECT pro_name FROM promotion";
$promotion = mysqli_query($conn, $sql_promotion)or die($sql_promotion);
$row_promotion = mysqli_fetch_assoc($promotion);
?>
<!DOCTYPE html>
<head>
  <?php include('h.php');?>
  
<style type="text/css">
  input[type=number]{
  width:40px;
  text-align:center;
  color:red;
  font-weight:600;
  }
  </style>
</head>
<body>
  <?php include('navbar.php'); ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="container" style="margin-top: 10px">
          <table align="center" class="n-table" style='color:white !important;'>
            <tr align="center">
              <th>โปรโมชั่น</th>
            </tr>
            <?php do{ ?>
            <tr height="50" style="font-size: 15px;">
              <td><?=$row_promotion['pro_name']?></td>
            </tr>
            <?php }while($row_promotion = mysqli_fetch_assoc($promotion)); ?>
          </table>
          <hr>
          <?php
          include('cart.php');
          ?>
        </div>
      </div>
      <div class="col-md-8">
        <div class="container" style="margin-top: 10px">
          <div class="row">
            <?php
            $act = (isset($_GET['act']) ? $_GET['act'] : '');
            $q = $_GET['q'];
            if($act=='showbytype'){
            include('list_prd_by_type.php');
            }
            else if($q!=''){
            include("show_product_q.php");
            }else{
            include('show_product.php');
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<?php include('script4.php');?>