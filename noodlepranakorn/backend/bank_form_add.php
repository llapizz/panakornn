<form name="register" action="bank_form_add_db.php" method="POST" class="form-horizontal">
  <div class="form-group">
    <div class="col-md-12" align="center">
      <strong> เพิ่มบัญชีธนาคาร </strong>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-md-4" align="right"> ธนาคาร </div>
    <div class="col-md-6" align="left">
      <input  name="b_name" type="text" required class="form-control" id="b_name" placeholder="กรุณากรอก ชื่อธนาคาร"  title="กรุณากรอกชื่อ ธนาคาร"/>
    </div>
  </div>
  

  <div class="form-group">
    <div class="col-md-4" align="right"> ประเภท  </div>
    <div class="col-md-6" align="left">
      <input  name="b_type" type="text"  class="form-control" id="b_type" value="ออมทรัพย์">
    </div>
  </div>

    <div class="form-group">
    <div class="col-md-4" align="right"> เลขที่บัญชี </div>
    <div class="col-md-6" align="left">
      <input  name="b_number" type="number" required class="form-control" id="b_number" placeholder="กรุณากรอก เลขที่บัญชี ตัวเลขเท่านั้น" pattern="^[a-zA-Z0-9]+$"/>
    </div>
  </div>

    <div class="form-group">
    <div class="col-md-4" align="right"> ชื่อเจ้าของ บัญชี  </div>
    <div class="col-md-6" align="left">
      <input  name="b_owner" type="text" required class="form-control" id="b_owner" placeholder="กรุณากรอก ชื่อเจ้าของบัญชี ภาษาไทย" />
    </div>
  </div>

    <div class="form-group">
    <div class="col-md-4" align="right"> สาขา  </div>
    <div class="col-md-6" align="left">
      <input  name="bn_name" type="text" required class="form-control" id="bn_name" placeholder="กรุณากรอก สาขาบัญชี" />
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-4"> </div>
    <div class="col-sm-6">
      <button type="submit" class="btn btn-info btn n-radius" id="btn"><span class="glyphicon glyphicon-saved"></span> บันทึก  </button>
    </div>
    
  </div>
</form>