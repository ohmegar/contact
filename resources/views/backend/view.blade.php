@extends('layouts.adminlte')

@section('title')
    | View
@endsection

@section('content')

<div class="card card-danger">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-bullhorn"></i> ข้อมูล Short URL & QR code (เฉพาะตนเอง)</h3>
        <div class="card-tools">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
            data-target="#modal-add">
            <i class="fas fa-plus"></i> เพิ่มข้อมูล
        </button>
    </div>
    <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <div class="col-md-12">
            <form action="" id="search-form" name="search-form" method="GET">
            
                <div class="input-group">
                    <span class="input-group-text" style="background-image: linear-gradient(to right,#003300,#0f9b0f); color: #FFF">ค้นหาข้อมูลตาม ชื่อลิ้งก์ : </span>
                    <input type="text" name="l_name" id="l_name" class="form-control" autocomplete="off" placeholder="โปรดกรอก ชื่อลิงก์ (ถ้าหากทราบ)" >
                </div>


                        <br><center><span class="input-group-btn">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> ค้นหา</button>
                            <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> ล้างค่า</button>
                        </span> </center>   
                </form>
            </div>
        
            <div class="card mb-3">        
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped table-sm display" id="doc-tbview">
                        <thead>
                            <tr align="center" style="background-image: linear-gradient(to right, #ff9d00,#ff0000); color: #FFF">
                                <th style="width: 35%">ชื่อลิ้งก์</th>
                                <th style="width: 30%">ลิ้งก์แบบสั้น</th>
                                <th style="width: 10%">ใช้งาน (ครั้ง)</th>
                                <th style="width: 15%">วันที่สร้าง/ปรับปรุง</th>
                                <th style="width: 15%">สถานะ</th>
                                <th style="width: 10%">ลบ</th>  
                                <th style="width: 10%">แก้ไข</th>  
                                <th style="width: 10%">ดู</th>                                                                      
                            </tr>
                        </thead>
                        <tbody>
        
                        </tbody>
                    </table>
                </div>
            </div>    
</div>
    <!-- /.card-body -->
</div>
<!-- /.card -->


@endsection



@section('modal')
    @include('backend.modals.modal-add')
    @include('backend.modals.modal-view')
    @include('backend.modals.modal-edit')
    @include('backend.modals.modal-del')
@endsection

@section('scripts')
    <script src="{{ asset('js/backend-dss.js') }}"></script>
@endsection




