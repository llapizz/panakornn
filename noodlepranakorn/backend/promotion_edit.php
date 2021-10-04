<?php 
require_once('h.php');

if(isset($_GET['id'])){
  $col_id = $_GET['id'];
}

$sql_type = "SELECT * FROM type";
$type = mysqli_query($con, $sql_type)or die($sql_type);
$row_type = mysqli_fetch_assoc($type);

$sql_promotion = "SELECT * FROM promotion WHERE pro_id = '$col_id'";
$promotion = mysqli_query($con, $sql_promotion)or die($sql_promotion);
$row_promotion = mysqli_fetch_assoc($promotion);

if(isset($_POST['btn_edit'])){
  $type = $_POST['pro_type'];
  $name = $_POST['pro_name'];
  $price = $_POST['pro_price'];
  $discount = $_POST['pro_discount'];

  $update_sql = "UPDATE promotion SET 
                type_id='$type',
                pro_name='$name',
                pro_price='$price',
                pro_discount='$discount' 
                WHERE pro_id='$col_id'";
  mysqli_query($con, $update_sql)or die($update_sql);

  header("Location: promotion.php");
}
?>
<body class="hold-transition skin-red sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <?php error_reporting( error_reporting() & ~E_NOTICE ); ?>
      <!-- Header Navbar: style can be found in header.less -->
      <?php include('navbar.php');?>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include('menu_left.php');?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <i class="fas fa-cogs"></i> จัดการโปรโมชั่น
        </h1>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="box" style="margin-top:0;">
              <div class="box-header">
                <h3 class="box-title" style="color:white;">แก้ไขโปรโมชั่น
              </div>
              <div class="box-body">
                <form method="post" action="">
                  <div class="row" style="margin-bottom: 2rem;">
                    <div class="col-md-12">
                      <input class="form-control" type="text" name="pro_name" placeholder="ชื่อโปรโมชั่น" value="<?=$row_promotion['pro_name']?>"/>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 2rem;">
                    <div class="col-md-4">
                      <select class="form-control" name="pro_type">
                        <option value="0">ประเภทใดก็ได้</option>
                        <?php do{ ?>
                        <option value="<?=$row_type['type_id']?>" 
                          <?=$row_promotion['type_id']==$row_type['type_id']?'selected':'';?>>
                          <?=$row_type['type_name']?>
                        </option> <?php }while($row_type=mysqli_fetch_assoc($type)); ?>
                      </select>
                    </div>
                    <div class="col-md-3">เมื่อซื้อมากกว่า</div>
                    <div class="col-md-3">
                      <input class="form-control" type="number" name="pro_price" placeholder="ราคา" min="0" value="<?=$row_promotion['pro_price']?>"/>
                    </div>
                    <div class="col-md-2">บาท</div>
                  </div>
                  <div class="row" style="margin-bottom: 2rem;">
                    <div class="col-md-2">ส่วนลด</div>
                    <div class="col-md-4">
                      <input class="form-control" type="text" name="pro_discount" placeholder="ส่วนลด"value="<?=$row_promotion['pro_discount']?>"/>
                    </div>
                    <div class="col-md-6">(ใส่ % ตามหลังเพื่อลดเป็นเปอร์เซ็น)</div>
                  </div>
                  <div class="row" style="margin-bottom: 2rem;">
                    <div class="col-md-12">
                      <button type="submit" name="btn_edit" class="btn btn-info btn-block n-radius">
                        <span class="fas fa-save"></span> บันทึกโปรโมชั่น</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  <?php 
  include('footer.php');
  mysqli_free_result($promotion);
  mysqli_free_result($type);
?>