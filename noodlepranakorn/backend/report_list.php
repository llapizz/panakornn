<?php
        include('connections.php');
        function DateThai2($ytd)
		{
			$strYear = date("Y", strtotime($ytd)) + 543;
			$strYear2 = $strYear - 00;
			$strMonth = date("n", strtotime($ytd));
			$strDay = date("j", strtotime($ytd));
			$strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
			$strMonthThai = $strMonthCut[$strMonth];
			return "$strDay $strMonthThai $strYear2";
			//return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
		}	
    ?>
<?php

$query = "SELECT SUM(total) AS total, DATE_FORMAT(datesave, '%d-%M-%Y') AS o_date 
FROM order_detail
GROUP BY DATE_FORMAT(datesave, '%Y-%m-%d')
ORDER BY DATE_FORMAT(datesave, '%Y-%m-%d') DESC
";
$result = mysqli_query($con, $query);
$resultchart = mysqli_query($con, $query);

$query2 = "SELECT SUM(total) AS total, DATE_FORMAT(datesave, '%d-%M-%Y') AS o_date 
FROM order_detail
GROUP BY DATE_FORMAT(datesave, '%Y-%m-%d')
ORDER BY DATE_FORMAT(datesave, '%Y-%m-%d') DESC
";
$result2 = mysqli_query($con, $query2);
$resultchart = mysqli_query($con, $query2);

$query3 = "SELECT SUM(total) AS total, DATE_FORMAT(datesave, '%M-%Y') AS o_date 
FROM order_detail
GROUP BY DATE_FORMAT(datesave, '%Y-%m')
ORDER BY DATE_FORMAT(datesave, '%Y-%m') DESC
";
$result3 = mysqli_query($con, $query3);
$resultchart = mysqli_query($con, $query3);

$query4 = "SELECT SUM(total) AS total, DATE_FORMAT(datesave, '%M-%Y') AS o_date 
FROM order_detail
GROUP BY DATE_FORMAT(datesave, '%Y-%m')
ORDER BY DATE_FORMAT(datesave, '%Y-%m') DESC
";
$result4 = mysqli_query($con, $query4);
$resultchart = mysqli_query($con, $query3);

$query5 = "SELECT SUM(total) AS total, DATE_FORMAT(datesave, '%Y') AS d_date 
FROM order_detail
GROUP BY DATE_FORMAT(datesave, '%Y')
ORDER BY DATE_FORMAT(datesave, '%Y') DESC
";
$result5 = mysqli_query($con, $query5);
$resultchart = mysqli_query($con, $query5);
// echo $query5;
// exit();
$query6 = "SELECT SUM(total) AS total, DATE_FORMAT(datesave, '%Y') AS o_date 
FROM order_detail
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

    <style>
        @media print{
		#hid{
		   display: none; /* ซ่อน  */
		}
	}
    </style>
    

<div class="container">
	<div class="row">
		<div class="col-md-12" >
		<a id="hid" href="report.php" class="btn btn-outline-primary n-radius">ย้อนกลับ</a>
			<a id="hid" href="index.php?p=daily" class="btn btn-info n-radius">รายวัน</a> 
			<a id="hid" href="index.php?p=monthy" class="btn btn-success n-radius">รายเดือน</a> 
			<a id="hid" href="index.php?p=yearly" class="btn btn-danger n-radius">รายปี</a> 
		</div>
	</div>
</div>
<form action="" method="get" class="form-horizental">
        
        <div class="form-group col-sm-12" >
            <div id="hid" class="col-sm-2 control-label">
                เลือกวันที่เริ่มต้น
            </div>
            <div class="col-sm-3">
                <input id="hid" type="date" name="date_start" required class="form-control">
            </div>
            <div id="hid" class="col-sm-2 control-label">
                เลือกวันที่สิ้นสุด
            </div>
            <div class="col-sm-3">
                <input id="hid" type="date" name="date_end" required class="form-control">
            </div><br>
            <div class="col-sm-1">
                <button id="hid" type="submit" name="p" value="day" class="btn btn-primary n-radius">ค้นหา</button>
            </div>
        </div>
</form>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            $query = "
            SELECT total, SUM(total) AS totol, DATE_FORMAT(datesave, '%d-%M-%Y') AS datesave
            FROM order_detail
            GROUP BY DATE_FORMAT(datesave, '%d%')
            ORDER BY DATE_FORMAT(datesave, '%Y-%m-%d') 
            ";
            $result = mysqli_query($con, $query);
            $resultchart = mysqli_query($con, $query);
            //for chart
            $datesave = array();
            $totol = array();
            while($rs = mysqli_fetch_array($resultchart)){
            $datesave[] = "\"".DateThai2($rs['datesave'])."\"";
            $totol[] = "\"".$rs['totol']."\"";
            }
            $datesave = implode(",", $datesave);
            $totol = implode(",", $totol);
            
            ?>
            <h3 align="center">รายงานการบริการแยกรายวัน</h3>
            
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
            <button id="hid" class="btn btn-warning" onclick="window.print()" type="hidden"><i class="fas fa-print"></i> พิมพ์</button>
            <hr>
            
            <p align="center" id="hid">
                
                
                <canvas id="myChart" width="800px" height="300px"></canvas>
                <script>
                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                labels: [<?php echo $datesave;?>
                
                ],
                datasets: [{
                label: 'รายงานรายได้ แยกตามวัน (บาท)',
                data: [<?php echo $totol;?>
                ],
                backgroundColor: [
                'rgb(133, 203, 204)',
                'rgb(168, 222, 224)',
                'rgb(249, 226, 174)',
                'rgb(251, 199, 141)',
                'rgb(167, 214, 118)',
                'rgb(151, 219, 174)',
                'rgb(133, 203, 204)',
                'rgb(168, 222, 224)',
                'rgb(249, 226, 174)',
                'rgb(251, 199, 141)',
                'rgb(167, 214, 118)',
                'rgb(151, 219, 174)'
                ]
                }]
                },
                options: {
                scales: {
                yAxes: [{
                ticks: {
                beginAtZero:true
                }
                }]
                }
                }
                });
                </script>
            </p>
            <div class="col-sm-12">
                <h3></h3>
                <table  class="table table-striped" border="1" cellpadding="0"  cellspacing="0" align="center">
                    <thead>
                        <tr class="table-primary">
                            <th width="20%">วัน/เดือน/ปี</th>
                            
                            <th width="10%"><center>รายได้(บาท)</center></th>
                        </tr>
                    </thead>
                    
                    
                    <?php 
            
            
		   $sql = "
           SELECT total, SUM(total) AS totol, DATE_FORMAT(datesave, '%d-%M-%Y') AS datesave
           FROM order_detail
           GROUP BY DATE_FORMAT(datesave, '%d%')
           ORDER BY DATE_FORMAT(datesave, '%Y-%m-%d') DESC
           
            ";
            $result2 = mysqli_query($con, $sql);
					while($row2 = mysqli_fetch_array($result2)) { 
                        
					
					?>
                    <tr>
                        <td><?php echo DateThai2($row2['datesave']);?></td>
                        
                        <td align="right"><?php echo $row2['totol'];?></td>
                        
                        
                    </tr>
                    <?php
                        @$amount_total += $row2['totol'];
                    }
                    ?>
                    <tr class="table-danger">
                         
                        <td align="center"><b>รวม</b></td>
                        <td align="right"><b>
                        <?php echo number_format($amount_total,2);?> บาท</b></td></td>
                    </tr>
                </table>
            </div>
            <?php mysqli_close($con);?>
        </div>
    </div>
</div>





