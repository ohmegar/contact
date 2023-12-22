@extends('layouts.adminlte')

@section('title')
    | ข้อมูลทั้งหมด
@endsection

@section('content')

<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa fa-address-card"></i> ข้อมูลส่วนตัวทั้งหมด</h3>
        <div class="card-tools">
    </div>
    <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <div class="col-md-12">
            <form action="" id="search-form" name="search-form" method="GET">                        
                <div class="input-group">
                    <span class="input-group-text" style="background-image: linear-gradient(to right,#f83600,#fe8c00); color: #FFF">ค้นหา ชื่อ-นามสกุล </span>
                    <input type="text" name="emp_name" id="emp_name" class="form-control" autocomplete="off" placeholder="โปรดกรอกคำค้น..." >
                    <span class="input-group-text" style="background-image: linear-gradient(to right,#8E2DE2,#4A00E0); color: #FFF">ค้นหา Name-Surname</span>
                    <input type="text" name="english_name" id="english_name" class="form-control" autocomplete="off" placeholder="โปรดกรอกคำค้น..." >
                    <span class="input-group-text" style="background-image: linear-gradient(to right,#005C97,#363795); color: #FFF">ค้นหา Emp. ID </span>
                    <input type="text" name="emp_id" id="emp_id" class="form-control" autocomplete="off" placeholder="โปรดกรอกคำค้น..." >
                </div>
                    <br><center><span class="input-group-btn">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> ค้นหา</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> ล้างค่า</button>
                    </span> </center>   
            </form>
        </div>
    
        <div class="card mb-3">        
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped table-sm display" id="tbview_admin">
                    <thead>
                        <tr align="center" style="background-image: linear-gradient(to right, #000b56,#000b56); color: #FFF">
                            <th>กอง/สำนัก</th>
                            <th>กลุ่ม</th>
                            <th style="width: 20%">ชื่อ-นามสกุล</th>
                            <th style="width: 15%">ภาพ</th>
                            <th style="width: 12%">ตำแหน่ง</th>
                            <th style="width: 10%">สถานะ</th>
                            <th style="width: 15%">Tel .</th>
                            <th style="width: 5%">Fax</th>
                            <th style="width: 8%">e-mail</th>
                            <th style="width: 15%">สถานที่ทำงาน</th>
                            <th style="width: 5%">แก้ไข</th>
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


{{-- @include('backend.modals.modal-edit') --}}


@section('scripts')
    <script src="{{ asset('js/backend-dss.js') }}"></script>
@endsection




