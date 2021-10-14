  <?php
    $qty = $row_prd['f_qty'];
    if($qty == 0){ ?>
      <a href="" class="btn btn-danger btn n-radius"> <span class="glyphicon glyphicon-shopping-cart"></span> หมด</a>
    <?php }else{ ?>	
    <a href="index.php?f_id=<?php echo $row_prd['f_id'];?>&act=add" class="btn btn-danger btn n-radius"> <span class="glyphicon glyphicon-shopping-cart"></span> สั่งซื้อ</a>
<?php } ?>
          