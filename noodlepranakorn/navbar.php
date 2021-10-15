<?php require_once('connect.php');

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
        <a class="nav-link text-warning" href="contact.php"><i class="fas fa-book"></i> เกี่ยวกับ</a>
        </font> 
      </li>
    </ul>
  </div>
  <form class="form-inline my-2 my-lg-2" name="qp" action="index.php" method="GET">
    <?php 
    if ($user_id!='') {
    ?>
    <a class="btn btn-danger" href="logout.php" role="button" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่ ?')">ออกจากระบบ</a>
    <?php }else{ ?>
    <a class="btn btn-info btn-lg  n-radius" href="form_login_m.php" role="button">เข้าสู่ระบบ <i class="fas fa-sign-in-alt"></i></a>
    &nbsp;
    <a class="btn btn-success btn-lg n-radius" href="index.php?act=add" role="button">สมัครสมาชิก <i class="fas fa-address-card"></i></a>
    <?php } ?>
  </form>
</nav>