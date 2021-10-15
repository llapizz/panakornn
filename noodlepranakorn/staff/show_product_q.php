       <?php
      $q = $_GET['q'];
            include("../connect.php");
            $sql = "SELECT * FROM foods as f
            INNER JOIN type  as t ON f.type_id=t.type_id
            AND `f_name` LIKE '%$q%'
            ORDER BY f.f_id DESC";  //เรียกข้อมูลมาแสดงทั้งหมด
            $result = mysqli_query($conn, $sql);
            while($row_prd = mysqli_fetch_array($result)){
            ?>
            
          <div class="col-sm-4" align="center">
          <div class="card border-danger mb-2" style="width: 17rem;">
            <br>
  <img class="card-img-top">
  <a href="prd.php?id=<?php echo $row_prd[0]; ?>"> <?php echo"<img src='../backend/img/".$row_prd['f_img']."'width='100' height='100'>";?></a>
  <div class="card-body">
    <a href="prd.php?id=<?php echo $row_prd[0]; ?>"> <?php echo $row_prd["f_name"];?> </a>   ราคา <font color="red"> <?php echo $row_prd["f_price"];?></font> บาท
    
    <br> 
                
  คงเหลือ <span class="badge badge-info"><?php echo $row_prd["f_qty"];?></span>
  <span class="sr-only">unread messages</span><?php echo $row_prd["f_unit"];?>


  </div>
  <div>
  <button type="button" class="btn btn-success btn-sm">
                        <a style="color: #fff" href="prd.php?id=<?php echo $row_prd[0]; ?>"> รายละเอียด </a></button>
                       <?php include('outstock.php');?>
                     </div>
                     <br>
</div>

     </div>

           
<?php } ?>
            