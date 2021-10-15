
<div class="col-md-8 offset-md-4">
  <form  name="register" action="member_form_add_db.php" method="POST" class="form-horizontal">
    <div class="form-group">
      <div class="col-sm-6" align="center">
        <h4 class="text-warning"> สมัครสมาชิก </h4>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-3"><i class="far fa-envelope"></i> อีเมลล์</div>
      <div class="col-sm-6">
        <input name="user_email" type="email" class="form-control" id="user_email" required  placeholder="email@email.com"/>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-2"><i class="fas fa-key"></i> รหัสผ่าน</div>
      <div class="col-sm-6">
        <input name="user_password" type="password" required class="form-control" id="user_password"/>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-3"><i class="fas fa-file-signature"></i> ชื่อ - นามสกุล</div>
      <div class="col-sm-6">
        <input name="user_name" type="text" required class="form-control" id="user_name" placeholder="ภาษาอังกฤษหรือภาษาไทย" />
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-2" align=""><i class="fas fa-phone-square-alt"></i> เบอร์โทร</div>
      <div class="col-sm-6" align="left">
        <input name="user_tel" type="text" class="form-control" id="user_tel" required  placeholder="ตัวเลขเท่านั้น" maxlength="10" pattern="^[0-9]+$" title="ตัวเลขเท่านั้น" />
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-2"><i class="fas fa-house-user"></i> ที่อยู่</div>
      &nbsp;&nbsp;&nbsp;<small class="text-danger">** หมายเหตุ: กรุณากรอกที่อยู่ ** </small>
      <div class="col-sm-6" align="left">
        <textarea name="user_address" class="form-control" id="user_address" required></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-6">
        <button type="submit" class="btn btn-warning btn-block" id="btn">
          <span class="glyphicon glyphicon-saved"></span> สมัครสมาชิก
        </button>
        <a href="index.php" type="button" class="btn btn-block btn-outline-warning" id="btn">
          <span class="glyphicon glyphicon-saved"></span> ยกเลิก
        </a>
      </div>
    </div>
  </form>
</div>