<?php
//1. เชื่อมต่อ database:
include('connections.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$b_id = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM bank WHERE b_id='$b_id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>
  <form name="register" action="bank_form_edit_db.php" method="POST" class="form-horizontal">
    <div class="form-group">
      <div class="col-md-4" align="right"> ธนาคาร </div>
      <div class="col-md-6" align="left">
        <input  name="b_name" type="text" required class="form-control" id="b_name" placeholder="ภาษาอังกฤษหรือไทย"  title="ภาษาอังกฤษหรือไทย"/ value="<?php echo $b_name; ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-4" align="right"> ประเภท  </div>
      <div class="col-md-6" align="left">
        <input  name="b_type" type="text"  class="form-control" id="b_type" value="<?php echo $b_type; ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-4" align="right"> เลขบัญชี </div>
      <div class="col-md-6" align="left">
        <input  name="b_number" type="number" required class="form-control" id="b_number" placeholder="ตัวเลขเท่านั้น" pattern="^[a-zA-Z0-9]+$"/ value="<?php echo $b_number; ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-4" align="right"> ชื่อ บ/ช  </div>
      <div class="col-md-6" align="left">
        <input  name="b_owner" type="text" required class="form-control" id="b_owner" placeholder="ภาษาอังกฤษหรือภาษาไทย" / value="<?php echo $b_owner; ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-4" align="right"> สาขา  </div>
      <div class="col-md-6" align="left">
        <input  name="bn_name" type="text" required class="form-control" id="bn_name" placeholder="ภาษาอังกฤษหรือภาษาไทย" / value="<?php echo $bn_name; ?>">
      </div>
    </div>
    <div class="form-group">
      <br>
      <div class="col-md-3"></div>
      <div class="col-md-7">
        <input type="hidden" name="b_id" value="<?php echo $b_id; ?>" />
        <button type="submit" class="btn btn-warning btn n-radius" id="btn"> <span class="fas fa-edit"></span> แก้ไข</button>
      </div>
    </div>
  </form>
</div>