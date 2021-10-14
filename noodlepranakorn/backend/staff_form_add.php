<form  name="register" action="staff_form_add_db.php" method="POST" class="form-horizontal">
  <div class="form-group">
    <div class="col-md-12" align="center">
    
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-4" align="right"> สถานะ </div>
    <div class="col-md-6" align="left">
        <select name="m_level" class="form-control" required>
        <option value="">เลือกข้อมูล</option>
        <option value="admin">admin</option>
        <option value="member">member</option>
      </select>
    </div>
  </div>

 <div class="form-group">
    <div class="col-md-4" align="right"> E-mail  </div>
    <div class="col-md-6" align="left">
      <input  name="user_email" type="email" class="form-control" id="user_email"   placeholder="name@hotmail.com"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4" align="right"> ชื่อ-สกุล  </div>
    <div class="col-md-6" align="left">
      <input  name="user_name" type="text" required class="form-control" id="user_name" placeholder="ภาษาอังกฤษหรือภาษาไทย" />
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-md-4" align="right"> รหัสผ่าน </div>
    <div class="col-md-6" align="left">
      <input  name="user_password" type="password" required class="form-control" id="user_password" placeholder="ภาษาอังกฤษหรือตัวเลข" pattern="^[a-zA-Z0-9]+$" minlength="2" />
    </div>
  </div>

  
  
  
  
  <div class="form-group">
    <div class="col-md-4" align="right"> เบอร์โทร  </div>
    <div class="col-md-6" align="left">
      <input  name="user_tel" type="text" class="form-control" id="user_tel"  placeholder="ตัวเลขเท่านั้น" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4" align="right"> ที่อยู่  </div>
    <div class="col-md-6" align="left">
      <textarea name="user_address" class="form-control" id="user_address" required></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4"> </div>
    <div class="col-sm-6"><br>
      <button type="submit" class="btn btn-info btn-block n-radius" id="btn"><span class="glyphicon glyphicon-saved"></span> บันทึก  </button>
    </div>
    
  </div>
</form>