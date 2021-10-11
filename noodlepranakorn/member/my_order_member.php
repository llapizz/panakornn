<?php require_once('../connect.php'); ?>
<?php
session_start();
// print_r($_SESSION);
// echo $_SESSION['MM_Username'];
// echo "<hr>";

$query_pf ="SELECT * FROM user WHERE user_email";
$pf = mysqli_query($conn, $query_pf) or die ("Error in query: $query_pf " . mysqli_error());
$row_pf = mysqli_fetch_assoc($pf);
$totalRows_pf = mysqli_num_rows($pf);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include('h.php');?>
   
    <style type="text/css">
      @media print{
      #hp{
        display:none;
      }
    }
    </style>
  </head>
  <body>
     <?php include('navbar.php');?>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <?php
              $page = $_GET['page'];
              if($page=='mycart'){
                include('mycart.php');
              }else{
                include('detail_order_afer_cartdone_member.php');
              }
          ?>
        </div>
      </div>
    </div>
  </body>
</html>
<?php
mysqli_free_result($pf);
?>