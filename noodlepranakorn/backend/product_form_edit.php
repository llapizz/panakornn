<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database:
include('connections.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$f_id = $_GET["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT *
FROM foods as p 
INNER JOIN type as t ON p.type_id = t.type_id
WHERE p.f_id = '$f_id'
ORDER BY p.type_id asc";
$result2 = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result2);
extract($row);


//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM type ORDER BY type_id asc" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:


// $query2 = "SELECT p.*,t.type_name
// FROM tbl_product as p 
// INNER JOIN tbl_type as t ON p.type_id = t.type_id
// WHERE p_id = '$p_id';
// ORDER BY p.type_id asc" or die("Error:" . mysqli_error());
// //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
// $result2 = mysqli_query($con, $query2);
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
      <form  name="addproduct" action="product_form_edit_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
        <input type="hidden" name="f_id" value="<?php echo $f_id; ?>" />
        <input type="hidden" name="img2" value="<?php echo $f_img; ?>" />
        <div class="form-group">
          <div class="col-md-4" align="right">ชื่อสินค้า</div>
          <div class="col-md-6">
            <input type="text" name="f_name" value="<?php echo $f_name; ?>" class="form-control" required placeholder="ชื่อสินค้า" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4" align="right">
            <p> ประเภทสินค้า </p>
          </div>
          <div class="col-md-6">
            <select name="type_id" class="form-control" required>
              <option value="<?php echo $row["type_id"];?>">
                <?php echo $row["type_name"]; ?>
              </option>
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
            <div class="col-md-4" align="right">
              <p> ราคา</p>
            </div>
            <div class="col-md-6">
              <input type="text"  name="f_price" class="form-control" required placeholder="ราคา" value="<?php echo $row["f_price"];?>" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4" align="right"><p>จำนวน</p></div>
            <div class="col-md-6">
              <input type="number" name="f_qty" class="form-control" id="f_price" required/ value="<?php echo $row["f_qty"];?>" ></td>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4" align="right">
              <p> หน่วยสินค้า</p>
            </div>
            <div class="col-md-6">
              <select class="form-control" name="f_unit" id="f_unit" required>
                <option value="ชิ้น" <?php if($row["f_unit"]=="ชิ้น"){ echo 'selected'; } ?>>ชิ้น</option>
                <option value="กล่อง" <?php if($row["f_unit"]=="กล่อง"){ echo 'selected'; } ?>>กล่อง</option>
                <option value="อัน" <?php if($row["f_unit"]=="อัน"){ echo 'selected'; } ?>>อัน</option>
              </select>
            </div>
          </div>

        
        <div class="form-group">
          <div class="col-sm-12">
            <strong>ภาพสินค้า</strong>
            <br>
            <img src="img/<?php echo $row['f_img'];?>" width="100%">
            <br>
            <input type="file" name="f_img" id="f_img" class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12"><br>
            <button type="submit" class="btn btn-success btn-block n-radius" name="btnadd"> แก้ไข </button>
          </div>
        </div>
      </form>
      
    </div>
  </div>
</div>