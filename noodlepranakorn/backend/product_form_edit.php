<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database:
include('connections.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$p_id = $_GET["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT *
FROM tbl_product as p 
INNER JOIN tbl_type as t ON p.type_id = t.type_id
WHERE p.p_id = '$p_id'
ORDER BY p.type_id asc";
$result2 = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result2);
extract($row);


//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM tbl_type ORDER BY type_id asc" or die("Error:" . mysqli_error());
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
        <input type="hidden" name="p_id" value="<?php echo $p_id; ?>" />
        <input type="hidden" name="img2" value="<?php echo $p_img; ?>" />
        <div class="form-group">
          <div class="col-md-4" align="right">ชื่อสินค้า</div>
          <div class="col-md-6">
            <input type="text" name="p_name" value="<?php echo $p_name; ?>" class="form-control" required placeholder="ชื่อสินค้า" />
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
              <input type="text"  name="p_price" class="form-control" required placeholder="ราคา" value="<?php echo $row["p_price"];?>" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4" align="right"><p>จำนวน</p></div>
            <div class="col-md-6">
              <input type="number" name="p_qty" class="form-control" id="p_price" required/ value="<?php echo $row["p_qty"];?>" ></td>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4" align="right">
              <p> หน่วยสินค้า</p>
            </div>
            <div class="col-md-6">
              <select class="form-control" name="p_unit" id="p_unit" required>
                <option value="ชิ้น" <?php if($row["p_unit"]=="ชิ้น"){ echo 'selected'; } ?>>ชิ้น</option>
                <option value="กล่อง" <?php if($row["p_unit"]=="กล่อง"){ echo 'selected'; } ?>>กล่อง</option>
                <option value="อัน" <?php if($row["p_unit"]=="อัน"){ echo 'selected'; } ?>>อัน</option>
              </select>
            </div>
          </div>

        <div class="form-group">
          <div class="col-md-4"></div>
          <div class="col-sm-6">
            <p> รายละเอียดสินค้า </p>
            <textarea id="editor1" name="p_detail" rows="10" cols="80" style="visibility: hidden; display: none;">                                       
                    <?php echo $p_detail; ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <strong>ภาพสินค้า</strong>
            <br>
            <img src="img/<?php echo $row['p_img'];?>" width="100%">
            <br>
            <input type="file" name="p_img" id="p_img" class="form-control" />
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