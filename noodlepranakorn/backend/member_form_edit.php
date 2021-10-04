<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database:
include('connections.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$member_id = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM tbl_member WHERE member_id='$member_id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>
<form name="register" action="member_form_edit_db.php" method="POST" class="form-horizontal">
  <input type="hidden" name="member_id" value="<?php echo $member_id; ?>" />
  <div class="form-group">
    <div class="col-md-12" align="center">
      <strong> Edit Member </strong>
    </div>
  </div>
  
   <div class="form-group">
    <div class="col-md-4" align="right"> สถานะ </div>
    <div class="col-md-6" align="left">
         <select name="m_level" class="form-control" required>
       <option value="<?php echo $form-group['m_level'];?>">
          <?php echo $form-group['m_level'];?>
        </option>
        <option value="" selected>-เลือกข้อมูล-</option>
        <option value="admin">admin</option>
        <option value="member">member</option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-4" align="right"> ชื่อผู้ใช้ </div>
    <div class="col-md-6" align="left">
      <input  name="m_user" type="text" required class="form-control" id="m_user" value="<?php echo $m_user; ?>" placeholder="ภาษาอังกฤษหรือตัวเลข" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2"  />
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-md-4" align="right"> รหัสผ่าน </div>
    <div class="col-md-6" align="left">
      <input  name="m_pass" type="text" required class="form-control" id="m_pass" value="<?php echo $m_pass; ?>" placeholder="ภาษาอังกฤษหรือตัวเลข" pattern="^[a-zA-Z0-9]+$" minlength="2" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4" align="right"> ชื่อ-สกุล  </div>
    <div class="col-md-6" align="left">
      <input  name="m_name" type="text" required class="form-control" id="m_name" value="<?php echo $m_name; ?>" placeholder="ภาษาอังกฤษหรือภาษาไทย" />
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-md-4" align="right"> E-mail  </div>
    <div class="col-md-6" align="left">
      <input  name="m_email" type="email" class="form-control" id="m_email" value="<?php echo $m_email; ?>"   placeholder="name@hotmail.com"/>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4" align="right"> เบอร์ติดต่อ  </div>
    <div class="col-md-6" align="left">
      <input  name="m_tel" type="text" class="form-control" id="m_tel" value="<?php echo $m_tel; ?>"  placeholder="ตัวเลขเท่านั้น" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4" align="right"> ที่อยู่  </div>
    <div class="col-md-6" align="left">
      <textarea name="m_address" class="form-control"><?php echo $m_address; ?></textarea>
      
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4"> </div>
    <div class="col-md-6"><br>
      <button type="submit" class="btn btn-warning btn-block n-radius" id="btn"><span class="glyphicon glyphicon-cog"></span> แก้ไข  </button>
      
    </div>
    
  </div>
</form>