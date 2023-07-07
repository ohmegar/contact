<div class="modal fade" id="modal-viewall" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title"><i class="fas fa-search"></i> รายละเอียดการประกาศข้อมูลทั่วไป</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- <form action="updateConsent" method="post"> --}}
          {{-- <form action="{{ route('updateConsent') }}" method="POST" enctype="multipart/form-data"> --}}
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
            {{-- <input type="hidden" name="c_id" id="c_id" value=""> --}}
            {{-- <input type="text" name="status" id="status" value=""> --}}


        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> ปิด</button>
            {{-- <button id="btnPrint" type="button" class="btn btn-warning"><i class="fas fa-print"></i> พิมพ์</button>
            <button type="submit" id="checkStatus" class="btn btn-success"><i class="fas fa-check"></i> ดำเนินการแล้ว</button> --}}
            

        {{-- {!! Form::close() !!} --}}
      {{-- </form> --}}
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->