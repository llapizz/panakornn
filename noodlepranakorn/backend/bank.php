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
        <h1>
        <span class="glyphicon glyphicon-briefcase"></span>
         จัดการธนาคาร  <a href="bank.php?act=add" class="btn btn-success n-radius"> +เพิ่มธนาคาร</a> 
      </h1>
     
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header">
      
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="col-md-12">
                <?php
                  $act = $_GET['act'];
                  if($act == 'add'){
                    include('bank_form_add.php');
                  }elseif ($act == 'edit') {
                    include('bank_form_edit.php');  
                  }
                  else {
                    include('bank_list.php');  
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
    