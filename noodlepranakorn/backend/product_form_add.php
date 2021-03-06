<?php
//1. เชื่อมต่อ database:
include('connections.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM type ORDER BY type_id asc" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
<div class="container">
  <div class="row">
    <div class="col-md-10">
      <strong> เพิ่มอาหาร </strong>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10">
      <form  name="addproduct" action="product_form_add_db.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group">
          <div class="col-md-4" align="right">ชื่อสินค้า</div>
          <div class="col-md-6">
            <input type="text" name="f_name" class="form-control" required placeholder="ชื่อสินค้า" />
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
            <input type="text"  name="f_price" class="form-control" required placeholder="ราคา" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4" align="right">จำนวน</div>
          <div class="col-md-6">
            <input class="form-control" type="number" name="f_qty" id="f_price" required/></td>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4" align="right">หน่วยสินค้า</div>
          <div class="col-md-6">
            <select class="form-control" name="f_unit" id="f_unit" required>
              <option value="" selected>กรุณาเลือก</option>
              <option value="ชิ้น">ถ้วย</option>
              <option value="กล่อง">จาน</option>
              <option value="อัน">ขวด</option>
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-md-4" align="right">ภาพสินค้า</div>
          <div class="col-md-6">
            <input type="file" name="f_img" id="f_img" class="form-control" />
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