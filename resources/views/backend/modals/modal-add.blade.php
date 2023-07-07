<div class="modal fade" id="modal-add" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title"><i class="fas fa-save"></i> บันทึกข้อมูล Short URL & QR code</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


<div class="modal-body">
    <div class="card-tools" style="text-align: right">
      <i style="color: red">*</i> ต้องกรอกข้อมูล
    </div>
  <!-- /.card-header -->
  <form action="{{ route('save') }}" method="POST" enctype="multipart/form-data">
  {{-- {{ Form::open(['action' => 'App\Http\Controllers\DssController@save', 'method' => 'POST', 'class' => 'was-validate','enctype'=>'multipart/form-data']) }} --}}
  @csrf

  <div class="card-body">

        
      <div class="row">
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
          {{ Form::label('l_name','ชื่อลิงก์')}} <i style="color: red">*</i>
          {{ Form::textarea('l_name', null, ['class' => 'form-control','id'=>'l_name', 'rows'=> 2,'required', 'placeholder'=>'เช่น ระบบรายงานผลการดำเนินการรายไตรมาส']) }}
        </div>
      </div>

        
      <div class="row">
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
          {{ Form::label('l_url','ลิ้งก์ (แบบเต็ม)')}} <i style="color: red">*</i>
          {{ Form::textarea('l_url', null, ['class' => 'form-control','id'=>'l_url', 'rows'=> 2,'required', 'placeholder'=>'เช่น https://www.dss.go.th/index.php/markproduct']) }}
        </div>
      </div> 



  </div>
  <!-- /.card-body -->
  <div class="modal-footer">
      <div class="col" style="text-align: center">
        <button type="submit" id="btn_submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> บันทึกข้อมูล</button>
      </div>
  </div>
  {{-- {!! Form::close() !!} --}}
</form>
<!-- /.card-footer -->
</div>
<!-- /.card -->



</div>
<!-- /.modal -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->