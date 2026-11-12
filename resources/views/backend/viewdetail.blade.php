@extends('layouts.adminlte')

@section('title', '| แก้ไขข้อมูลส่วนตัว (Admin)')

@section('content')

    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-address-card mr-1"></i> จัดการข้อมูลบุคคลากร วศ.</h3>
            <div class="card-tools"></div>
        </div>
        <!-- /.card-header -->

        <form action="{{ route('editAdmin') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                @foreach ($datas as $data)
                    <div class="row">
                        <div class="col-12">


                            {{-- ส่วนที่ 1: บค.สล. --}}
                            <div class="callout callout-danger bg-dark mb-4">
                                <h5><i class="fas fa-lock mr-1"></i> ส่วนที่ 1 บค.สล. (เป็นผู้รับผิดชอบข้อมูล)</h5>
                                <p class="mb-0">ท่านไม่สามารถแก้ไขได้ด้วยตนเอง โปรดติดต่อผู้รับผิดชอบข้อมูล</p>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-3 col-sm-6">
                                    <label for="emp_id_view">Emp. ID</label>
                                    <input type="text" class="form-control" id="emp_id_view" value="{{ $data->emp_id }}"
                                        disabled>
                                </div>

                                <div class="form-group col-md-3 col-sm-6">
                                    <label for="pfix_name">คำนำหน้า : (ภาษาไทย)</label>
                                    <input type="text" class="form-control" id="pfix_name" value="{{ $data->pfix_name }}"
                                        disabled>
                                </div>

                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="emp_name">ชื่อ-นามสกุล : (ภาษาไทย)</label>
                                    <input type="text" class="form-control" id="emp_name" value="{{ $data->emp_name }}"
                                        disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-3 col-sm-6">
                                    <label for="pfix_name_e">คำนำหน้า : (ภาษาอังกฤษ)</label>
                                    <input type="text" class="form-control" id="pfix_name_e"
                                        value="{{ $data->pfix_name_e }}" disabled>
                                </div>

                                <div class="form-group col-md-9 col-sm-6">
                                    <label for="english_name">ชื่อ-นามสกุล : (ภาษาอังกฤษ)</label>
                                    <input type="text" class="form-control" id="english_name"
                                        value="{{ $data->english_name }}" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="position_view">ตำแหน่ง :</label>
                                    <input type="text" class="form-control" id="position_view"
                                        value="{{ $data->position_view }}" disabled>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="emp_type_name">สถานะ :</label>
                                    <input type="text" class="form-control" id="emp_type_name"
                                        value="{{ $data->emp_type_name }}" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="division">กอง/สำนัก :</label>
                                    <input type="text" class="form-control" id="division" value="{{ $data->division }}"
                                        disabled>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="sub_division">กลุ่ม :</label>
                                    <input type="text" class="form-control" id="sub_division"
                                        value="{{ $data->sub_division }}" disabled>
                                </div>
                            </div>

                            <hr>

                            {{-- ส่วนที่ 2: จัดการข้อมูล --}}
                            <div class="callout callout-success bg-dark mb-4">
                                <h5><i class="fas fa-user-edit mr-1"></i> ส่วนที่ 2</h5>
                                <p class="mb-0">ท่านสามารถแก้ไขได้ด้วยตนเอง</p>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="dss_phone">เบอร์โทร : (ตัวอย่าง 0 2201 1234, 1235)</label>
                                    <input type="text" class="form-control" name="dss_phone" id="dss_phone"
                                        placeholder="ตัวอย่าง 0 2201 1234"
                                        value="{{ old('dss_phone', $data->dss_phone) }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="dss_fax">Fax. : (ตัวอย่าง 0 2201 1234)</label>
                                    <input type="text" class="form-control" name="dss_fax" id="dss_fax"
                                        placeholder="ตัวอย่าง 0 2201 1234" value="{{ old('dss_fax', $data->dss_fax) }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="dss_mail">อีเมลกรม : (ตัวอย่าง abc@dss.go.th)</label>
                                    <input type="email" class="form-control" name="dss_mail" id="dss_mail"
                                        placeholder="ตัวอย่าง abc@dss.go.th"
                                        value="{{ old('dss_mail', $data->dss_mail) }}">
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="dss_location">สถานที่ปฏิบัติงานใน วศ. : (ตัวอย่าง ห้อง ชั้น อาคาร)</label>
                                    <input type="text" class="form-control" name="dss_location" id="dss_location"
                                        placeholder="ตัวอย่าง ห้อง ชั้น อาคาร"
                                        value="{{ old('dss_location', $data->dss_location) }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="show_order">ลำดับที่ต้องการแสดงข้อมูล :</label>
                                    <span class="badge badge-danger ml-1">ส่วนนี้เฉพาะ IT เท่านั้นที่เห็น</span>
                                    <input type="number" class="form-control mt-1" name="show_order" id="show_order"
                                        placeholder="ลำดับที่ต้องการแสดงข้อมูล"
                                        value="{{ old('show_order', $data->show_order) }}" min="0">
                                </div>
                            </div>

                            {{-- Hidden inputs สำหรับส่งค่า Controller --}}
                            <input type="hidden" name="emp_id" value="{{ $data->emp_id }}">
                            <input type="hidden" name="oldImage" value="{{ $data->image }}">

                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /.card-body -->

            <div class="card-footer text-right">
                <a href="{{ url('/backend/viewAdmin') }}" class="btn btn-danger btn-lg mr-2">
                    <i class="fas fa-home"></i> กลับหน้าหลัก
                </a>
                <button type="submit" class="btn btn-success btn-lg">
                    <i class="fas fa-save"></i> ยืนยันการแก้ไข
                </button>
            </div>
        </form>
    </div>
    <!-- /.card -->

@endsection

@section('scripts')
    <script src="{{ asset('js/backend-dss.js') }}"></script>
@endsection
