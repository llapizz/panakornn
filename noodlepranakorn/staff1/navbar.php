<?php require_once('../connect.php');
$query_typeprd = "SELECT * FROM type ORDER BY type_id ASC";
$typeprd =mysqli_query($conn, $query_typeprd) or die ("Error in query: $query_typeprd " . mysqli_error());
// echo($query_typeprd);
// exit();
$row_typeprd = mysqli_fetch_assoc($typeprd);
$totalRows_typeprd = mysqli_num_rows($typeprd);
?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-: #29150c;">

  <a class="navbar-brand text-light" href="index.php"><font size="6px" class="f">ก๋วยเตี๋ยวเรือใหญ่พระนคร</font></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <font size="5px"> <i class="fas fa-utensils"></i> เมนูอาหาร</font> 
        </a>
        <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink" style="background-color: #29150c;">
          <?php do { ?>
            <font size="5px">
              <a href="index.php?act=showbytype&type_id=<?php echo $row_typeprd['type_id'];?>" class="dropdown-item n-link" style="background-color: #29150c;"><?php echo $row_typeprd['type_name']; ?></a>
            </font> 
            <?php } while ($row_typeprd = mysqli_fetch_assoc($typeprd)); ?>
        </div>
      </li>
      <li class="nav-item">
      <font size="5px">
        <a class="nav-link text-info" href="my_order.php?page=mycart"><i class="fas fa-history"></i> รายการออเดอร์</a>
        </font> 
      </li>
    </ul>
  </div>
  <form class="form-inline my-2 my-lg-2" name="qp" action="index.php" method="GET">
    <a class="navbar-brand text-light" href="index.php"><font size="5px">หน้าสำหรับพนักงาน</font></a>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php 
    if ($user_id!='') {
    ?>
    <big><font color="#66BB6A" size="5px">ยินดี<font color="#AED581">ต้อนรับ</font> </font><br><font color="#FFC107" size="4px">คุณ : </font><font color="#FFFFF" size="4px"><?php echo $row["user_name"]; ?></font></span></big>&nbsp;
     
    <a class="btn-lg btn-danger n-radius" href="../logout.php" role="button" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่ ?')">ออกจากระบบ</a>
    <?php }else{ ?>
    <a class="btn btn-warning n-link n-radius" href="form_login_m.php" role="button">เข้าสู่ระบบ</a>
    &nbsp;
    <a class="btn btn-danger n-link n-radius" href="index.php?act=add" role="button">สมัครสมาชิก</a>
    <?php } ?>
  </form>
</nav>