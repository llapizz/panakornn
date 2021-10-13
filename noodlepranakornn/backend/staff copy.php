<?php include('h.php');?>
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
        <h1><span class="fas fa-user-cog"></span> จัดการสมาชิก</h1>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box" style="margin-top: 0;">
              <div class="box-header">
                <h3 class="box-title" style="color:white;">Data Table With Member
                <a href="member.php?act=add" class="btn-info btn-sm n-radius">+ADD</a> </h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="col-sm-12">
                  <?php
                  $act = $_GET['act'];
                  if($act == 'add'){
                  include('staff_form_add.php');
                  }elseif ($act == 'edit') {
                  include('staff_form_edit.php');
                  }
                  else {
                  include('staff_list.php');
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