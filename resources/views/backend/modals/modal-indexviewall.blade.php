<div class="modal fade" id="modal-indexviewall" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title"><i class="fa fa-search"></i> รายละเอียดการประกาศข้อมูลทั่วไป</h4>
          {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> --}}
        </div>
        <div class="modal-body">
          {{-- <form action="dssView" method="post"> --}}
          {{-- <form action="{{ route('dsscountview') }}" method="POST" enctype="multipart/form-data"> --}}

        @csrf
            <div class="row">
                <div class="col col-sm-10 col-md-12" style="margin-top: 0.5px">  
 
                  <div class="row">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      {{ Form::label('number_view','เลขที่หนังสือ/ประกาศ')}} <i style="color: red">*</i>
                      {{ Form::textarea('number_view', null, ['class' => 'form-control','id'=>'number_view', 'rows'=> 1,'disabled']) }}
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

        {{ Form::textarea('id_view', null, ['class' => 'form-control','id'=>'id_view', 'rows'=> 1,'hidden']) }}
        {{ Form::textarea('cat_view', null, ['class' => 'form-control','id'=>'cat_view', 'rows'=> 1,'hidden']) }}
        {{-- {{ Form::textarea('id_view', null, ['class' => 'form-control','id'=>'id_view', 'rows'=> 1]) }} --}}
        {{-- <input type="text" name="status" id="status" value=""> --}}


        <div class="modal-footer">
            <button type="submit" class="btn btn-danger"><i class="fa fa-times"></i> ปิด</button>
        </div>      
  {{-- </form> --}}

    <!-- /.modal-content --> 
  </div>
  <!-- /.modal -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->