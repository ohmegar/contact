<div class="modal fade" id="modal-edit" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h4 class="modal-title"><i class="fas fa-edit"></i> แก้ไขข้อมูล</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card-tools" style="text-align: right">
            <i style="color: red">*</i> ต้องกรอกข้อมูล
          </div>      
          <form action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card-body">

          <div class="row">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              {{ Form::label('l_name_update','ชื่อลิงก์')}} <i style="color: red">*</i>
              {{ Form::textarea('l_name_update', null, ['class' => 'form-control','id'=>'l_name_update', 'rows'=> 2,'required', 'placeholder'=>'เช่น ระบบรายงานผลการดำเนินการรายไตรมาส']) }}
            </div>
          </div>
    
            
          <div class="row">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              {{ Form::label('l_url_update','ลิ้งก์ (แบบเต็ม)')}} <i style="color: red">*</i>
              {{ Form::textarea('l_url_update', null, ['class' => 'form-control','id'=>'l_url_update', 'rows'=> 2,'required', 'placeholder'=>'เช่น https://www.dss.go.th/index.php/markproduct']) }}
            </div>
          </div> 
    
          <div class="row">
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                สถานะการใช้งาน<i style="color: red">*</i><br>       
                <input type="radio" name="l_status_update" id="l_status_update1" value="1"> เผยแพร่</input><br>
                <input type="radio" name="l_status_update" id="l_status_update2" value="2"> ไม่เผยแพร่</input><br>                   
            </div>
          </div>


          {{ Form::textarea('l_id_update', null, ['class' => 'form-control','id'=>'l_id_update', 'rows'=> 1,'hidden']) }}


        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> ปิด</button>
            <button type="submit" id="checkStatus" class="btn btn-success"><i class="fas fa-save"></i> ต้องการแก้ไข</button>
            
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