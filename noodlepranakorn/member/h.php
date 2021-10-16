
<?php
session_start();
  include("../connect.php");

    $user_email = $_SESSION['user_email'];
    $type_id_user = $_SESSION['type_id_user'];
    if($type_id_user!='3'){
      header("Location: ../logout.php");
    }
    $sql = "SELECT * FROM user WHERE user_email='$user_email'";
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
    $row = mysqli_fetch_array($result);
    extract($row);
    $user_name = $row['user_name'];
  
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ร้านก๋วยเตี๋ยวเรือใหญ่พระนคร</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="../css/style.css">
<link rel="shortcut icon" href="../images/logo1.png">

<!-- Google font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Charm&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
<!-- Google font -->
<style>
  .f{
    font-family: 'Charm', cursive;
  }
  body{
    font-family: 'Itim', cursive;
  }
</style>

<!-- Font Awesome -->
<link rel="stylesheet" href="../fontawesome/css/all.css">
<!-- Font Awesome -->

<!-- likeboxFacebook -->
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v11.0" nonce="npFah1YV"></script>
<!-- likeboxFacebook -->

<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
$('#example3').DataTable( {
"aaSorting" :[[0,'desc']],
//"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
});
} );
</script>