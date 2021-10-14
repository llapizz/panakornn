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
    <style>
        @media print{
		#hid{
		   display: none; /* ซ่อน  */
		}
	}
    </style>
 
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php

            $date_start = $_GET['date_start']; 
            $date_end = $_GET['date_end']; 

            $query = "
            SELECT total, SUM(total) AS totol, DATE_FORMAT(datesave, '%d-%M-%Y') AS datesave
            FROM order_detail
            WHERE datesave BETWEEN '$date_start' AND '$date_end'
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
            
            
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
            <button id="hid" class="btn btn-warning btn-sm n-radius" onclick="window.print()" type="hidden"> พิมพ์</button>
            
            <p align="center" id="hid" style="background-color: white;width: 90%;">
                
                
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
                'rgb(223, 57, 57)',
                'rgb(231, 137, 25)',
                'rgb(255, 187, 0)',
                'rgb(79, 203, 24)',
                'rgb(167, 214, 118)',
                'rgb(151, 219, 174)',
                'rgb(133, 203, 204)',
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
            <div class="col-sm-11">
                <h3></h3>
                <table  class="table table-striped" border="1" cellpadding="0"  cellspacing="0" align="center">
                    <thead>
                        <tr class="table-primary">
                            <th width="10%"><center>วัน/เดือน/ปี</center></th>
                            
                            <th width="10%"><center>รายได้(บาท)</center></th>
                        </tr>
                    </thead>
                    
                    
                    <?php 

                    $date_start = $_GET['date_start']; 
                    $date_end = $_GET['date_end']; 
					
		   $sql = "
           SELECT total, SUM(total) AS totol, DATE_FORMAT(datesave, '%d-%M-%Y') AS datesave
            FROM order_detail
            WHERE datesave BETWEEN '$date_start' AND '$date_end'
            GROUP BY DATE_FORMAT(datesave, '%d%')
            ORDER BY DATE_FORMAT(datesave, '%Y-%m-%d') DESC
        
            ";
            
            $result2 = mysqli_query($con, $sql);
            $nums = mysqli_query($con,$sql);
                $num = 0;
                $s = mysqli_num_rows($nums);
                if($s == '0') {       
                    echo '<tr>' ;                                           
                    echo '<td colspan= "7" align="center">ไม่พบข้อมูลของวันนี้</td>';
                    echo '</tr>';                       
                }else {
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
                <?php } ?>
                </table>
            </div>
            <?php mysqli_close($con);?>
        </div>
    </div>
</div>