<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database:
include('connections.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$user_id = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM user WHERE user_id='$user_id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>
<form name="register" action="member_form_edit_db.php" method="POST" class="form-horizontal">
  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
  <div class="form-group">
    <div class="col-md-12" align="center">
      <strong> Edit Member </strong>
    </div>
  </div>
  

  <!-- แก้ -->
   

  
  <div class="form-group">
    <div class="col-md-4" align="right"> E-mail  </div>
    <div class="col-md-6" align="left">
      <input  name="user_email" type="email" class="form-control" id="user_email" value="<?php echo $user_email; ?>"   placeholder="name@hotmail.com"/>
    </div>
  </div>

  <!-- <div class="form-group">
     <div class="col-md-4" align="right"> รหัสผ่าน </div> 
    <div class="col-md-6" align="left"> -->
      <input  name="user_password" type="hidden" required class="form-control" id="user_password" value="<?php echo $user_password; ?>" placeholder="ภาษาอังกฤษหรือตัวเลข" pattern="^[a-zA-Z0-9]+$" minlength="2" />
    <!-- </div>
  </div> -->
  <div class="form-group">
    <div class="col-md-4" align="right"> ชื่อ-สกุล  </div>
    <div class="col-md-6" align="left">
      <input  name="user_name" type="text" required class="form-control" id="user_name" value="<?php echo $user_name; ?>" placeholder="ภาษาอังกฤษหรือภาษาไทย" />
    </div>
  </div>
  
  
  
  <div class="form-group">
    <div class="col-md-4" align="right"> เบอร์ติดต่อ  </div>
    <div class="col-md-6" align="left">
      <input  name="user_tel" type="text" class="form-control" id="user_tel" value="<?php echo $user_tel; ?>"  placeholder="ตัวเลขเท่านั้น" />
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4" align="right"> ที่อยู่  </div>
    <div class="col-md-6" align="left">
      <textarea name="user_address" class="form-control"><?php echo $user_address; ?></textarea>
      
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-4"> </div>
    <div class="col-md-6"><br>
      <button type="submit" class="btn btn-warning btn-block n-radius" id="btn"><span class="glyphicon glyphicon-cog"></span> แก้ไข  </button>
      
    </div>
    
  </div>
</form>