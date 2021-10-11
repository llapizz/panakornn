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
          <span class="glyphicon glyphicon-signal"></span>
     รายงานยอดขาย(ภาพรวม)
        
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box" style="margin-top:0;">
              <div class="box-header">
                <h3 class="box-title" style="color:white;">กราฟสรุปผลรายได้
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="col-md-12">
                <div class="container">
	<div class="row">
		<div class="col-md-12" >
		<a id="hid" href="report.php" class="btn btn-outline-primary n-radius">ย้อนกลับ</a>
			<a id="hid" href="report.php?p=daily" class="btn btn-info n-radius">รายวัน</a> 
			<a id="hid" href="report.php?p=monthy" class="btn btn-success n-radius">รายเดือน</a> 
			<a id="hid" href="report.php?p=yearly" class="btn btn-danger n-radius">รายปี</a> 
		</div>
	</div>
</div>
                <?php
                  $p = (isset($_GET['p']) ? $_GET['p'] : '');
                    if($p=='daily'){
                       include('r_daily.php');
                      }elseif($p=='monthy'){
                        include('r_monthy.php');
                      }elseif($p=='yearly'){
                        include('r_yearly.php');
                      }elseif($p=='day'){
                        include('r_day.php');
                      }else{
                        include('r_daily.php');
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