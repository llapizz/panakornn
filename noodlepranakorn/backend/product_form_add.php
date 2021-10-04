<?php
//1. เชื่อมต่อ database:
include('connections.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM tbl_type ORDER BY type_id asc" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
<div class="container">
  <div class="row">
    <div class="col-md-10">
      <strong> Edit Type </strong>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10">
      <form  name="addproduct" action="product_form_add_db.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group">
          <div class="col-md-4" align="right">ชื่อสินค้า</div>
          <div class="col-md-6">
            <input type="text" name="p_name" class="form-control" required placeholder="ชื่อสินค้า" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4" align="right">ประเภทสินค้า</div>
          <div class="col-md-6">
            <select name="type_id" class="form-control" required>
              <option value="type_id">ประเภทสินค้า</option>
              <?php foreach($result as $results){?>
              <option value="<?php echo $results["type_id"];?>">
                <?php echo $results["type_name"]; ?>
              </option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4" align="right">ราคา</div>
          <div class="col-md-6">
            <input type="text"  name="p_price" class="form-control" required placeholder="ราคา" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4" align="right">จำนวน</div>
          <div class="col-md-6">
            <input class="form-control" type="number" name="p_qty" id="p_price" required/></td>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4" align="right">หน่วยสินค้า</div>
          <div class="col-md-6">
            <select class="form-control" name="p_unit" id="p_unit" required>
              <option value="" selected>กรุณาเลือก</option>
              <option value="ชิ้น">ถ้วย</option>
              <option value="กล่อง">จาน</option>
              <option value="อัน">ขวด</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4"></div>
          <div class="col-sm-6">
            <p> รายละเอียดสินค้า </p>
            <!-- <textarea name="p_detail" class="form-control"  rows="3"  required placeholder="รายละเอียดสินค้า"></textarea> -->
            <textarea id="editor1" name="p_detail" rows="10" cols="80" style="visibility: hidden; display: none;">
            </textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4" align="right">ภาพสินค้า</div>
          <div class="col-md-6">
            <input type="file" name="p_img" id="p_img" class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4"></div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-danger btn-block n-radius" name="btnadd"><span class="glyphicon glyphicon-saved"></span> บันทึก </button>
            
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
mysqli_close($con);
?>