@extends('layouts.adminlte')
{{ header("Content-type: image/png"); }}

@section('title')
    | info user
@endsection

@section('content')

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa fa-address-card"></i> ข้อมูลส่วนตัว</h3>
        <div class="card-tools">
    </div>
    <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    
    <div class="card-body">
        <form action="{{ route('editinfo') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        @foreach ($datas as $data)
        
        <div class="row">
            <div class="col col-sm-12 col-md-12">  

                <div class="row">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <center>
                            @if ($data->image != null)
                                <img src="http://hr-expertise.dss.local/storage/images/profile/{{$data->image}}" class="img-dss">                                            
                            @else
                                <img src="../../style-index/images/nophoto.png" class="img-dss">
                            @endif
                        </center>
                    </div>
                </div>

                <div class="callout callout-warning info-box bg-dark">
                    <dl>
                        <div class="lable">
                            <h6>
                                <dt>
                                    <h5>ส่วนที่ 1 บค.สล. (เป็นผู้รับผิดชอบข้อมูล)</h5>ท่านไม่สามารถแก้ไขได้ด้วยตนเอง โปรดติดต่อผู้รับผิดชอบข้อมูล
                                </dt>
                            </h6>
                        </div>
                    </dl>
                </div>

                <div class="row">
                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        {{ Form::label('emp_id','Emp. ID')}} 
                        <input type="text" class="form-control" name="emp_id" id="emp_id" disabled value="{{$data->emp_id}}" /> 
                    </div>

                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        {{ Form::label('pfix_name','คำนำหน้า : (ภาษาไทย)')}} 
                        <input type="text" class="form-control" name="pfix_name" id="pfix_name" disabled value="{{$data->pfix_name}}" /> 
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {{ Form::label('emp_name','ชื่อ-นามสกุล : (ภาษาไทย)')}} 
                        <input type="text" class="form-control" name="emp_name" id="emp_name" disabled value="{{$data->emp_name}}" /> 
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        {{ Form::label('pfix_name','คำนำหน้า : (ภาษาอังกฤษ)')}} 
                        <input type="text" class="form-control" name="pfix_name_e" id="pfix_name_e" disabled value="{{$data->pfix_name_e}}" /> 
                    </div>

                    <div class="form-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
                        {{ Form::label('english_name','ชื่อ-นามสกุล : (ภาษาอังกฤษ)')}} 
                        <input type="text" class="form-control" name="english_name" id="english_name" disabled value="{{$data->english_name}}" /> 
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {{ Form::label('position_view','ตำแหน่ง : ')}} 
                        <input type="text" class="form-control" name="position_view" id="position_view" disabled value="{{$data->position_view}}" /> 
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {{ Form::label('emp_type_name','สถานะ : ')}} 
                        <input type="text" class="form-control" name="emp_type_name" id="emp_type_name" disabled value="{{$data->emp_type_name}}" /> 
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {{ Form::label('division','กอง/สำนัก : ')}} 
                        <input type="text" class="form-control" name="division" id="division" disabled value="{{$data->division}}" /> 
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {{ Form::label('sub_division','กลุ่ม : ')}} 
                        <input type="text" class="form-control" name="sub_division" id="sub_division" disabled value="{{$data->sub_division}}" /> 
                    </div>
                </div>

                <hr>

                <div class="callout callout-success info-box bg-dark">
                    <dl>
                        <div class="lable">
                            <h6>
                                <dt>
                                    <h5>ส่วนที่ 2</h5>ท่านสามารถแก้ไขได้ด้วยตนเอง
                                </dt>
                            </h6>
                        </div>
                    </dl>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {{ Form::label('dss_phone','เบอร์โทร : (ตัวอย่าง 0 2201 1234, 1235)')}} 
                        <input type="text" class="form-control" name="dss_phone" id="dss_phone" placeholder="ตัวอย่าง 0 2201 1234" value="{{$data->dss_phone}}" /> 
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {{ Form::label('dss_fax','Fax. : (ตัวอย่าง 0 2201 1234)')}} 
                        <input type="text" class="form-control" name="dss_fax" id="dss_fax" placeholder="ตัวอย่าง 0 2201 1234" value="{{$data->dss_fax}}" /> 
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {{ Form::label('dss_mail','อีเมลกรม : (ตัวอย่าง abc@dss.go.th)')}} 
                        <input type="email" class="form-control" name="dss_mail" id="dss_mail" placeholder="ตัวอย่าง abc@dss.go.th" value="{{$data->dss_mail}}" /> 
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {{ Form::label('image','อัพเดตรูปภาพประจำตัว :')}} <br>
                        <input type="file" class="form-control" name="image" id="image" accept="image/png, image/gif, image/jpeg, image/jpg" />
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ Form::label('dss_location','สถานที่ปฏิบัติงานใน วศ.  : (ตัวอย่าง ห้อง ชั้น อาคาร)')}} 
                        {{-- {{ Form::textarea('dss_location', null, ['class' => 'form-control','id'=>'dss_location', 'rows'=> 1,'hidden']) }} --}}
                        <input type="text" class="form-control" name="dss_location" id="dss_location"  placeholder="ตัวอย่าง ห้อง ชั้น อาคาร" value="{{$data->dss_location}}" /> 
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ Form::label('line_token','LINE Token  : (เพื่อใช้ในระบบงาน วศ.)')}} 
                        <input type="text" class="form-control" name="line_token" id="line_token"  placeholder="กรุณานำ Line Token มากรอก (ถ้าหากมี)" value="{{$data->line_token}}" /> 
                    </div>
                </div>


                <input type="text" class="form-control" name="emp_id" id="emp_id" hidden value="{{$data->emp_id}}" /> 
                <input type="text" class="form-control" name="oldImage" id="oldImage" hidden value="{{$data->image}}" /> 
            
            </div>
        </div>

        @endforeach
    </div>
    <!-- /.card-body -->
    
    <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-lg" onclick="window.location.href='{{ url('/backend')}}'"><i class="fas fa-home"></i> กลับหน้าหลัก</button>
        <button type="submit" class="btn btn-success btn-lg"><i class="fas fa-save"></i> ยืนยันการแก้ไข</button>
    </div>
</form>

</div>
<!-- /.card -->



{{-- @section('modal')
    @include('backend.modals.modal-copyLink')
@endsection --}}


@section('scripts')
    <script src="{{ asset('js/backend-dss.js') }}"></script>
@endsection


@endsection



