<?php 
include('h.php');

$sql_type = "SELECT * FROM type";
$type = mysqli_query($con, $sql_type)or die($sql_type);
$row_type = mysqli_fetch_assoc($type);

$sql_promotion = "SELECT * FROM promotion p LEFT JOIN type t ON p.type_id = t.type_id";
$promotion = mysqli_query($con, $sql_promotion)or die($sql_promotion);
$row_promotion = mysqli_fetch_assoc($promotion);

if(isset($_POST['btn_add'])){
  $type = $_POST['pro_type'];
  $name = $_POST['pro_name'];
  $price = $_POST['pro_price'];
  $discount = $_POST['pro_discount'];

  $insert_sql = "INSERT INTO promotion VALUES(null,'$type','$name','$price','$discount')";
  mysqli_query($con, $insert_sql)or die($insert_sql);

  header("Location: promotion.php");
}

if(isset($_POST['btn_del'])){
  $del = $_POST['btn_del'];
  $del_sql = "DELETE FROM promotion WHERE pro_id = $del";
  mysqli_query($con, $del_sql)or die($del_sql);

  header("Location: promotion.php");
}
?>
<body class="hold-transition skin-red sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <?php error_reporting( error_reporting() & ~E_NOTICE ); ?>
      <!-- Header Navbar: style can be found in header.less -->
     
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
          <div class="col-md-6">
            <div class="box" style="margin-top:0;">
              <div class="box-header">
                <h3 class="box-title" style="color:white;">เพิ่มโปรโมชั่น
              </div>
              <div class="box-body">
                <form method="post" action="">
                  <div class="row" style="margin-bottom: 2rem;">
                    <div class="col-md-12">
                      <input class="form-control" type="text" name="pro_name" placeholder="ชื่อโปรโมชั่น"/>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom: 2rem;">
                    <div class="col-md-4">
                      <select class="form-control" name="pro_type">
                        <option selected>เลือกหมวดหมู่</option>
                        <option value="0">ประเภทใดก็ได้</option>
                        <?php do{ ?>
                        <option value="<?=$row_type['type_id']?>"><?=$row_type['type_name']?></option> <?php }while($row_type=mysqli_fetch_assoc($type)); ?>
                      </select>
                    </div>
                    <div class="col-md-3">เมื่อซื้อมากกว่า</div>
                    <div class="col-md-3">
                      <input class="form-control" type="number" name="pro_price" placeholder="ราคา" min="0" />
                    </div>
                    <div class="col-md-2">บาท</div>
                  </div>
                  <div class="row" style="margin-bottom: 2rem;">
                    <div class="col-md-2">ส่วนลด</div>
                    <div class="col-md-4">
                      <input class="form-control" type="text" name="pro_discount" placeholder="ส่วนลด"/>
                    </div>
                    <div class="col-md-6">(ใส่ % ตามหลังเพื่อลดเป็นเปอร์เซ็น)</div>
                  </div>
                  <div class="row" style="margin-bottom: 2rem;">
                    <div class="col-md-12">
                      <button type="submit" name="btn_add" class="btn btn-info btn-block n-radius">เพิ่มโปรโมชั่น</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <table class="table table-striped">
              <thead>
                <tr align="center">
                  <td>ชื่อโปรโมชั่น</td>
                  <td>สินค้า</td>
                  <td>เมื่อซื้อมากกว่า</td>
                  <td>ส่วนลด</td>
                  <td colspan="2">จัดการ</td>
                </tr>
              </thead>
              <tbody>
                <?php do{ ?>
                <form method="post" action="">
                  <tr>
                    <td><?=$row_promotion['pro_name']?></td>
                    <td><?=$row_promotion['type_name']?></td>
                    <td align="right"><?=$row_promotion['pro_price']?> บาท</td>
                    <td align="right"><?=$row_promotion['pro_discount']?></td>
                    <td>
                      <a class="btn btn-warning btn-block n-radius btn-xs" href="promotion_edit.php?id=<?=$row_promotion['pro_id']?>">แก้ไข</a>
                    </td>
                    <td>
                      <button class="btn btn-danger btn-block n-radius btn-xs" type="submit" name="btn_del" value="<?=$row_promotion['pro_id']?>">ลบ</button>
                    </td>
                  </tr>
                </form>
                <?php }while($row_promotion = mysqli_fetch_assoc($promotion)); ?>
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </div>
  <?php 
  include('footer.php');
  mysqli_free_result($promotion);
  mysqli_free_result($type);
?>