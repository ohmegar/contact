<div class="modal fade" id="modal-logout" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h4 class="modal-title"><i class="fas fa-power-off"></i> ข้อความแจ้งเตือน</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{ route('keycloak.logout') }}" method="get" enctype="multipart/form-data">
        @csrf

            <div class="card-body">

              <div class="row">
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <center><h3>ต้องการออกจากระบบนี้ ใช่หรือไม่ ?</h3></center>
                </div>
              </div>
        
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> ไม่ใช่</button>
                <button type="submit" id="checkStatus" class="btn btn-success"><i class="fas fa-check"></i> ใช่</button>
                
          </form>

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