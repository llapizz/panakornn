
<?php
$query = "SELECT SUM(total) AS total, DATE_FORMAT(datesave, '%d-%M-%Y') AS o_date 
FROM tbl_order_detail
GROUP BY DATE_FORMAT(datesave, '%Y-%m-%d')
ORDER BY DATE_FORMAT(datesave, '%Y-%m-%d') DESC
";
$result = mysqli_query($con, $query);
$resultchart = mysqli_query($con, $query);

$query2 = "SELECT SUM(total) AS total, DATE_FORMAT(datesave, '%d-%M-%Y') AS o_date 
FROM tbl_order_detail
GROUP BY DATE_FORMAT(datesave, '%Y-%m-%d')
ORDER BY DATE_FORMAT(datesave, '%Y-%m-%d') DESC
";
$result2 = mysqli_query($con, $query2);
$resultchart = mysqli_query($con, $query2);

$query3 = "SELECT SUM(total) AS total, DATE_FORMAT(datesave, '%M-%Y') AS o_date 
FROM tbl_order_detail
GROUP BY DATE_FORMAT(datesave, '%Y-%m')
ORDER BY DATE_FORMAT(datesave, '%Y-%m') DESC
";
$result3 = mysqli_query($con, $query3);
$resultchart = mysqli_query($con, $query3);

$query4 = "SELECT SUM(total) AS total, DATE_FORMAT(datesave, '%M-%Y') AS o_date 
FROM tbl_order_detail
GROUP BY DATE_FORMAT(datesave, '%Y-%m')
ORDER BY DATE_FORMAT(datesave, '%Y-%m') DESC
";
$result4 = mysqli_query($con, $query4);
$resultchart = mysqli_query($con, $query3);

$query5 = "SELECT SUM(total) AS total, DATE_FORMAT(datesave, '%Y') AS d_date 
FROM tbl_order_detail
GROUP BY DATE_FORMAT(datesave, '%Y')
ORDER BY DATE_FORMAT(datesave, '%Y') DESC
";
$result5 = mysqli_query($con, $query5);
$resultchart = mysqli_query($con, $query5);
// echo $query5;
// exit();
$query6 = "SELECT SUM(total) AS total, DATE_FORMAT(datesave, '%Y') AS o_date 
FROM tbl_order_detail
GROUP BY DATE_FORMAT(datesave, '%Y')
ORDER BY DATE_FORMAT(datesave, '%Y') DESC
";
$result6 = mysqli_query($con, $query6);
$resultchart = mysqli_query($con, $query6);

// echo $query5;
// exit();

    $datax = array();
    foreach ($result as $k) {
      $datax[] = "['".$k['o_date']."'".", ".$k['total']."]";
    }

    //cut last commar
    $datax = implode(",", $datax);
    //echo $datax;

      $datax2 = array();
    foreach ($result4 as $k) {
      $datax2[] = "['".$k['o_date']."'".", ".$k['total']."]";
    }

    //cut last commar
    $datax2 = implode(",", $datax2);


      $datax3 = array();
    foreach ($result6 as $k) {
      $datax3[] = "['".$k['o_date']."'".", ".$k['total']."]";
    }

    //cut last commar
    $datax3 = implode(",", $datax3);

?>
<div class="container">
<div class="row">
<div class="col-md-6">
    <div id="piechart" style="width: 100%; height: 300px;"></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Summary per product_type'],
          <?php echo $datax;?>
        ]);

        var options = {
          title: 'รายงานยอดขายแยกตามวัน'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }   
    </script>

</div>
<div class="col-md-6">
    <div id="piechart2" style="width: 80%; height: 300px;"></div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Summary per product_type'],
          <?php echo $datax2;?>
        ]);

        var options = {
          title: 'รายงานยอดขายแยกเดือน'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }

      </script>
</div>
</div>	

<div class="row">
	<div class="col-sm-10">
<h3 align="center" style="color:white;">รายงานแยกตามวัน</h3>
<table width="100%" class="table table-striped" cellpadding="0"  cellspacing="0" align="center">
    <thead>
        <tr>
            <td width="40%" align="center">วันที่</td>
            <td width="60%" align="center">ยอดขาย</td>
        </tr>
    </thead>
    
    <?php while($row = mysqli_fetch_array($result2)) { ?>
    <tr>
        <td align="center">
            <?php echo date('d M Y',strtotime($row['o_date']));?>
            
        </td>
        <td align="right"><?php echo number_format($row['total'],2);?></td>
    </tr>
    
    <?php
    $at += $row['total'];
    }
    //echo $at;
    ?>
    <tr>
        <td align="center">รวม</td>
        <td align="right"><?php echo number_format($at,2);?></td>
    </tr>
</table>

<h3 align="center" style="color:white;">รายงานแยกตามเดือน</h3>
<table width="100%" class="table table-striped" cellpadding="0"  cellspacing="0" align="center">
    <thead>
        <tr align="center">
            <td width="40%">เดือน</td>
            <td width="60%">ยอดขาย</td>
        </tr>
    </thead>
    
    <?php while($row = mysqli_fetch_array($result3)) { ?>
    <tr>
        <td align="center">
            <?php echo date('M Y',strtotime($row['o_date']));?>
            
        </td>
        <td align="right"><?php echo number_format($row['total'],2);?></td>
    </tr>
    
    <?php
    $as += $row['total'];
    }
    //echo $at;
    ?>
    <tr>
        <td align="center">รวม</td>
        <td align="right"><?php echo number_format($as,2);?></td>
    </tr>
</table>

<h3 align="center" style="color:white;">รายงานแยกตามปี</h3>
<table width="100%" class="table table-striped" cellpadding="0"  cellspacing="0" align="center">
    <thead>
        <tr align="center">
            <th width="40%">ปี</th>
            <th width="60%">ยอดขาย</th>
        </tr>
    </thead>
    
    <?php while($row3 = mysqli_fetch_array($result5)) { ?>
      

        <td align="center">
            <?php echo date('Y',strtotime($row3['d_date']));?>
            
        </td>
        <td align="right"><?php echo number_format($row3['total'],2);?></td>
    </tr>

   <?php
    $ab += $row3['total'];
    }
    //echo $at;
    ?>
    <tr>
        <td align="center">รวม</td>
        <td align="right"><?php echo number_format($ab,2);?></td>
    </tr>
</table>




	 </div>
</div>






