<form name="register" action="bank_form_add_db.php" method="POST" class="form-horizontal">
  <div class="form-group">
    <div class="col-md-12" align="center">
      <strong> Add Bank </strong>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-md-4" align="right"> ธนาคาร </div>
    <div class="col-md-6" align="left">
      <input  name="b_name" type="text" required class="form-control" id="b_name" placeholder="ภาษาอังกฤษหรือไทย"  title="ภาษาอังกฤษหรือไทย"/>
    </div>
  </div>
  

  <div class="form-group">
    <div class="col-md-4" align="right"> ประเภท  </div>
    <div class="col-md-6" align="left">
      <input  name="b_type" type="text"  class="form-control" id="b_type" value="ออมทรัพย์">
    </div>
  </div>

    <div class="form-group">
    <div class="col-md-4" align="right"> เลขบัญชี </div>
    <div class="col-md-6" align="left">
      <input  name="b_number" type="number" required class="form-control" id="b_number" placeholder="ตัวเลขเท่านั้น" pattern="^[a-zA-Z0-9]+$"/>
    </div>
  </div>

    <div class="form-group">
    <div class="col-md-4" align="right"> ชื่อเจ้าของ บ/ช  </div>
    <div class="col-md-6" align="left">
      <input  name="b_owner" type="text" required class="form-control" id="b_owner" placeholder="ภาษาอังกฤษหรือภาษาไทย" />
    </div>
  </div>

    <div class="form-group">
    <div class="col-md-4" align="right"> สาขา  </div>
    <div class="col-md-6" align="left">
      <input  name="bn_name" type="text" required class="form-control" id="bn_name" placeholder="ภาษาอังกฤษหรือภาษาไทย" />
    </div>
  </div>

  <div class="form-group">
    <div class="col-md-4"> </div>
    <div class="col-sm-6">
      <button type="submit" class="btn btn-info btn-block n-radius" id="btn"><span class="glyphicon glyphicon-saved"></span> บันทึก  </button>
    </div>
    
  </div>
</form>