<div class="modal fade" id="modal-copyLink" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h4 class="modal-title"><i class="fa fa-bullhorn"></i> แจ้งเพื่อทราบ</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @csrf
    
            <div class="card-body">

              <div class="row">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <center><h4><u><i>คัดลอกลิ้งก์สั้นแล้ว</i></u> โดยท่านสามารถนำลิ้งก์สั้นนี้ไปเผยแพร่ โดยการวางข้อความด้านล่าง QR Code หรือวางบนพื้นที่ที่ต้องการประชาสัมพันธ์</h4>                 
                      <br>ตัวอย่างการนำ QR Code ไปใช้งาน<br>
                      <img src="{{ asset("images/example-qrcode.png") }}" alt="Example QR Code" width="50%">
                      <br>https://www.dss.go.th/a/qr/wreyi
                      <br>เอกสารประกอบการประชุม
                    </center>
                </div>
              </div>
        
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-check"></i> รับทราบ</button>
              </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</div>
</div>