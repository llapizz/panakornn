
<?php
session_start();
  include("../connect.php");

    $user_email = $_SESSION['user_email'];
    $type_id_user = $_SESSION['type_id_user'];
    if($type_id_user!='2'){
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