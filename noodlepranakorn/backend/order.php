<?php 
include('h.php');
require_once('trandate.php');
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
        <span class="glyphicon glyphicon-list-alt"></span> รายการสั่งซื้ออาหาร
        &nbsp; <a href="order.php" class="btn btn-info btn n-radius"> รายการใหม่ </a>  ||
        <a href="order.php?act=show-payed" class="btn btn-warning btn n-radius"> กำลังจัดเตรียมอาหาร </a> ||
        <a href="order.php?act=show-post" class="btn btn-success btn n-radius"> ส่งของแล้ว </a>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box" style="margin-top: 0;">
              <!-- /.box-header -->
              <div class="box-body">
                <div class="col-sm-12">
                 <?php
                  $act = $_GET['act'];
                  if($act=='show-order'){
                  include('detail_order_afer_cartdone.php');
                  }elseif($act=='show-payed'){
                  include('show_cart_pay.php');
                  }elseif($act=='show-post'){
                  include('show_cart_post.php');
                  }else{
                  include('show_new_cart.php');
                  }
                  ?>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
  <?php include('footer.php');?>