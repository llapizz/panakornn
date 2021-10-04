<form  name="register" action="member_form_add_db.php" method="POST" class="form-horizontal">
  <div class="form-group">
    <div class="col-md-12" align="center">
      <strong> Add Member </strong >
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
    <div class="col-md-4" align="right"> ชื่อผู้ใช้ </div>
    <div class="col-md-6" align="left">
      <input  name="m_user" type="text" required class="form-control" id="m_user" placeholder="ภาษาอังกฤษหรือตัวเลข" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2"  />
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-md-4" align="right"> รหัสผ่าน </div>
    <div class="col-md-6" align="left">
      <input  name="m_pass" type="password" required class="form-control" id="m_pass" placeholder="ภาษาอังกฤษหรือตัวเลข" pattern="^[a-zA-Z0-9]+$" minlength="2" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4" align="right"> ชื่อ-สกุล  </div>
    <div class="col-md-6" align="left">
      <input  name="m_name" type="text" required class="form-control" id="m_name" placeholder="ภาษาอังกฤษหรือภาษาไทย" />
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-md-4" align="right"> E-mail  </div>
    <div class="col-md-6" align="left">
      <input  name="m_email" type="email" class="form-control" id="m_email"   placeholder="name@hotmail.com"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4" align="right"> เบอร์โทร  </div>
    <div class="col-md-6" align="left">
      <input  name="m_tel" type="text" class="form-control" id="m_tel"  placeholder="ตัวเลขเท่านั้น" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4" align="right"> ที่อยู่  </div>
    <div class="col-md-6" align="left">
      <textarea name="m_address" class="form-control" id="m_address" required></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4"> </div>
    <div class="col-sm-6"><br>
      <button type="submit" class="btn btn-info btn-block n-radius" id="btn"><span class="glyphicon glyphicon-saved"></span> บันทึก  </button>
    </div>
    
  </div>
</form>