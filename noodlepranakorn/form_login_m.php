<?php session_start();?>
<!DOCTYPE html>
<head>
  <?php include('h.php'); ?>
  <?php include('boot4.php');?>
</head>



<body class="body">
  <div class="container" style="padding-top:100px">
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <h3 align="center" class="text-warning py-3">
          <span class="glyphicon glyphicon-lock"></span><font size="6px">เข้าสู่ระบบ</font> 
        </h3>
        <form  name="formlogin" action="login_m.php" method="POST" id="login" class="form-horizontal">
          <div class="form-group">
            <div class="col-md-12" align="center">
              <i class="far fa-envelope"></i> อีเมลล์ <input type="email"  name="user_email" class="form-control" required placeholder="อีเมลล์ ผู้ใช้งาน" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12" align="center">
            <i class="fas fa-key"></i> รหัสผ่าน <input type="password" name="user_password" class="form-control" required placeholder="รหัสผ่าน" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <button type="submit" class="btn-lg btn-success btn-block n-radius" id="btn">
                <span class="glyphicon glyphicon-log-in"></span> <font color="#fffff">เข้าสู่ระบบ <i class="fas fa-sign-in-alt"></i></font>
              </button>
              <br>
              <center>
              <a class="btn btn-info btn n-radius" href="index.php?act=add">
                <font color="#fffff">สมัครสมาชิก <i class="fas fa-address-card"></i></font>
              </a>
              </center>
            </div>
          
            <center><font color="red"> * <font color="#fffff">หากท่านยังไม่ได้เป็นสมัครสมาชิก</font> *</font></center>
          </div>
        </form>
      </div>
    </div>
  </div>
  <br>
  <div class="content text-warning"><center><font class="f" size="6px" >ร้านก๋วยเตี๋ยวเรือใหญ่พระนคร</font></center></div>
</body>