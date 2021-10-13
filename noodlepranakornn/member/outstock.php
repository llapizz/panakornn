  <?php
    $qty = $row_prd['f_qty'];
    if($qty == 0){
        echo "<font color='red'>";
        echo "<button class='btn btn-danger btn-xs' >หมด!</button>";
        echo "</font>";
    }else{ ?>	
    <a href="index.php?f_id=<?php echo $row_prd['f_id'];?>&act=add" class="btn btn-danger btn-block n-radius"> <span class="glyphicon glyphicon-shopping-cart"></span> สั่งซื้อ</a>
<?php } ?>
          