<?php session_start();?>
<!DOCTYPE html>
<head>
  <?php include('h.php'); ?>
</head>
<body style="background-color:#19050c;">
  <div class="container" style="padding-top:100px">
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <h3 align="center" class="text-warning py-3">
          <span class="glyphicon glyphicon-lock"></span> เข้าสู่ระบบ
        </h3>
        <form  name="formlogin" action="login_m.php" method="POST" id="login" class="form-horizontal">
          <div class="form-group">
            <div class="col-md-12">
              <input type="text"  name="user_email" class="form-control" required placeholder="ชือผู้ใช้งาน" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <input type="password" name="user_password" class="form-control" required placeholder="รหัสผ่าน" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <button type="submit" class="btn btn-warning btn-block" id="btn">
                <span class="glyphicon glyphicon-log-in"></span> เข้าสู่ระบบ 
              </button>
              <a class="btn btn-outline-warning btn-block" href="index.php?act=add">
                สมัครสมาชิก
              </a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="content text-light"><center>ร้านก๋วยเตี๋ยวเรือใหญ่พระนคร</center></div>
</body>