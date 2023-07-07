@extends('layouts.adminlte')
{{ header("Content-type: image/png"); }}

@section('title')
    | View
@endsection

@section('content')

<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-bullhorn"></i> ข้อมูล Short URL & QR code</h3>
        <div class="card-tools">
    </div>
    <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @foreach ($datas as $data)
        
        <div class="row">
            <div class="col col-sm-12 col-md-12">  

                <div class="row">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    {{ Form::label('l_name_view','ชื่อลิ้งก์')}} 

                    {{-- <input type="text" class="form-control" name="l_name_view" id="l_name_view" disabled value="{{$data->l_name}}" /> --}}
                    {{ Form::textarea('l_name_view', $data->l_name, ['class' => 'form-control','id'=>'l_name_view', 'rows'=> 2, 'disabled']) }}
                    </div>
                </div>
            
                {{-- <div class="row">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    {{ Form::label('l_url_view','ลิ้งก์ (แบบเต็ม)')}} 
                    {{ Form::textarea('l_url_view', $data->l_url, ['class' => 'form-control','id'=>'l_url_view', 'rows'=> 2,'disabled']) }}
                    </div>
                </div> --}}
        
                <div class="row">
                    <div class="form-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
                        {{ Form::label('l_url_short_view','ลิ้งก์สั้น')}} 
                        {{ Form::text('l_url_short_view', $data->l_url_short, ['class' => 'form-control','id'=>'l_url_short_view', 'rows'=> 1,'']) }}
                    </div>

                    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        {{ Form::label('l_url_short_view_copy','คัดลอกลิ้งก์สั้น เพื่อนำไปเผยแพร่')}}
                        {{ Form::textarea('l_url_short_view_copy', $data->l_url_short, ['class' => 'form-control','id'=>'l_url_short_view_copy', 'rows'=> 1,'hidden']) }}
                        <button type="button" class="btn btn-success btn-block" id="l_url_short_view_copy" data-clipboard-target="#l_url_short_view" >คัดลอกลิ้งก์สั้น </button>    
                    </div>
                </div>
                

                <div class="row">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <center>    

                        {{-- ถ้าจะเป็น png ต้องเรียกใช้ img เท่านั้น --}}
                        <img src="data:image/png;base64,{{ base64_encode(QrCode::size(400)->format('png')->margin(1)->errorCorrection('M')->merge(public_path('images/logo-qr.png'),0.3, true)->generate($data->l_url_short) ) }}">
                        
                        {{-- สร้างและบันทึกลงserver เพื่อดาวน์โหลดไปใช้งานต่อได้ และทำการปิดการมองเห็นไว้ --}}
                        {{-- <input type="hidden" src="data:image/png;base64,{{ base64_encode(QrCode::size(400)->format('png')->margin(1)->errorCorrection('M')->merge(public_path('images/logo-qr.png'),0.3, true)->generate($data->l_url_short, public_path('storage/qr/'.$data->l_code.'.png')) ) }}" > --}}

                        {{-- แสดงบนหน้าจอได้เลย ไม่ต้องการบันทึกภาพไปใช้ต่อ --}}
                        {{-- {!! QrCode::merge(public_path('logo.png'), 1, true)
                        ->size(350)
                        ->errorCorrection('H')
                        ->generate($data->l_url_short)
                        !!} --}}

                        <br><br>
                
                        <button type="button" class="btn btn-success"><i class="fas fa-download"></i> 
                        <a href="{{ asset('storage/qr/'."$data->l_code".'.png') }}" download> <span style="color: rgb(255, 255, 255)"> ดาวน์โหลด </span></a>
                        </button>

                    </center>
                    </div>
                </div>


                
            </div>
        </div>

        @endforeach
    </div>
    <!-- /.card-body -->

    <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-lg" onclick="history.back()"><i class="fas fa-backward"></i> ย้อนกลับ</button>
    </div>

</div>
<!-- /.card -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.11/clipboard.js"></script>
<script>
        var clipboard = new ClipboardJS('.btn');
</script>


@section('modal')
    @include('backend.modals.modal-copyLink')
@endsection


@section('scripts')
    <script src="{{ asset('js/backend-dss.js') }}"></script>
@endsection


@endsection



