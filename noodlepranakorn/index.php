<?php
include('h.php');
include("connect.php");
?>
<!DOCTYPE html>
<head>
  <?php include('boot4.php');?>
</head>
<body class="body">
 <?php
  include('navbar.php');
  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="container" style="margin-top: 20px">
          <div class="row">
            <?php
            $act = (isset($_GET['act']) ? $_GET['act'] : '');
            $q = $_GET['q'];
            if($act=='showbytype'){
            include('list_prd_by_type.php');
            }
            else if($q!=''){
            include("show_product_q.php");
             }else if($act=='add'){
            include("member_form_add.php");
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

