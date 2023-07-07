<div class="modal fade" id="modal-indexviewall" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h4 class="modal-title"><i class="fa fa-search"></i> รายละเอียดข้อมูล Short Link URL / QR Code</h4>
        </div>
        <div class="modal-body">
          <form action="{{ route('dsscountview') }}" method="POST" enctype="multipart/form-data">

        @csrf
            <div class="row">
                <div class="col col-sm-10 col-md-12" style="margin-top: 0.5px">  
 
                  <div class="row">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      {{ Form::label('l_name_view','ชื่อลิงก์')}} <i style="color: red">*</i>
                      {{ Form::textarea('l_name_view', null, ['class' => 'form-control','id'=>'l_name_view', 'rows'=> 1,'disabled']) }}
                    </div>
                  </div>
            
                    
                  <div class="row">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      {{ Form::label('subject_view','เรื่อง')}} <i style="color: red">*</i>
                      {{ Form::textarea('subject_view', null, ['class' => 'form-control','id'=>'subject_view', 'rows'=> 4,'disabled']) }}
                    </div>
                  </div>
        
                    <iframe class="embed-responsive-item" src="" type="application/pdf" name="file_name" id="file_name" frameborder="0" width="100%" height="500px"></iframe>

                </div>
            </div>
        </div>

        {{ Form::textarea('l_id_view', null, ['class' => 'form-control','id'=>'l_id_view', 'rows'=> 1,'hidden']) }}

        <div class="modal-footer">
            <button type="submit" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
        </div>      
  </form>

    <!-- /.modal-content --> 
  </div>
  <!-- /.modal -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->