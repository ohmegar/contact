@extends('layouts.adminlte')

@section('title', '| ข้อมูลส่วนตัว')

@section('content')

    <!-- Style ปรับแต่งหน้าจัดการข้อมูลส่วนตัว ให้เข้าชุดกับธีมสีเขียว วศ. -->
    <style>
        .profile-main-card {
            border: none;
            border-radius: 22px;
            box-shadow: 0 10px 30px rgba(6, 78, 59, 0.08);
            overflow: hidden;
            background: #ffffff;
        }

        .profile-card-header {
            background-color: #064e3b !important;
            color: #ffffff !important;
            padding: 18px 26px;
            border-bottom: 3px solid #10b981;
        }

        .profile-card-header .card-title {
            font-size: 1.15rem;
            font-weight: 600;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* ส่วนแสดงรูปโปรไฟล์ด้านบน */
        .profile-avatar-section {
            background: linear-gradient(180deg, #ecfdf5 0%, #ffffff 100%);
            border: 1px solid #d1fae5;
            border-radius: 18px;
            padding: 28px 20px;
            margin-bottom: 28px;
        }

        .profile-avatar-img {
            width: 145px;
            height: 145px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #ffffff;
            box-shadow: 0 8px 22px rgba(6, 78, 59, 0.18);
        }

        /* กล่องแบ่งส่วนที่ 1 และ ส่วนที่ 2 */
        .form-section-box {
            border-radius: 18px;
            padding: 24px;
            margin-bottom: 24px;
        }

        .section-readonly-box {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
        }

        .section-editable-box {
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
        }

        /* แถบหัวข้อของแต่ละส่วน */
        .section-banner-readonly {
            background-color: #334155;
            color: #ffffff;
            border-radius: 12px;
            padding: 14px 18px;
            margin-bottom: 20px;
            border-left: 5px solid #94a3b8;
        }

        .section-banner-editable {
            background-color: #064e3b;
            color: #ffffff;
            border-radius: 12px;
            padding: 14px 18px;
            margin-bottom: 20px;
            border-left: 5px solid #34d399;
        }

        /* ช่องกรอกข้อมูล */
        .profile-label {
            font-size: 0.88rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 6px;
        }

        .input-readonly-modern {
            background-color: #e2e8f0 !important;
            border: 1px solid #cbd5e1 !important;
            color: #475569 !important;
            font-weight: 500;
            border-radius: 10px !important;
            height: 42px;
            cursor: not-allowed;
        }

        .input-editable-modern {
            background-color: #ffffff !important;
            border: 1.5px solid #a7f3d0 !important;
            color: #0f172a !important;
            border-radius: 10px !important;
            height: 42px;
            transition: all 0.2s ease;
        }

        .input-editable-modern:focus {
            border-color: #059669 !important;
            box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.15) !important;
        }

        /* ปุ่มด้านล่าง */
        .profile-card-footer {
            background-color: #f8fafc;
            border-top: 1px solid #e2e8f0;
            padding: 18px 26px;
        }

        .btn-save-emerald {
            background-color: #059669;
            border-color: #059669;
            color: #ffffff;
            border-radius: 50px;
            padding: 10px 30px;
            font-weight: 600;
            box-shadow: 0 4px 14px rgba(5, 150, 105, 0.3);
            transition: all 0.25s ease;
        }

        .btn-save-emerald:hover {
            background-color: #064e3b;
            border-color: #064e3b;
            color: #ffffff;
            transform: translateY(-1px);
        }

        .btn-back-pill {
            border-radius: 50px;
            padding: 10px 24px;
            font-weight: 500;
        }
    </style>

    <div class="card profile-main-card">
        <div class="card-header profile-card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">
                <span class="badge badge-light text-success p-2 rounded-circle">
                    <i class="fas fa-address-card"></i>
                </span>
                <span>จัดการข้อมูลส่วนตัว</span>
            </h3>
            <div class="card-tools ml-auto">
                <span class="badge badge-pill px-3 py-1"
                    style="background: rgba(110, 231, 183, 0.18); color: #6ee7b7; border: 1px solid rgba(110, 231, 183, 0.35);">
                    <i class="fas fa-user-check mr-1"></i> DSS Profile
                </span>
            </div>
        </div>
        <!-- /.card-header -->

        {{-- คลุมฟอร์มให้ครอบคลุมทั้ง body และ footer --}}
        <form action="{{ route('editinfo') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body p-3 p-md-4">
                @foreach ($datas as $data)
                    <div class="row">
                        <div class="col-12">

                            {{-- ส่วนรูปโปรไฟล์ --}}
                            <div class="profile-avatar-section text-center">
                                @if (!empty($data->image))
                                    <img src="{{ asset('storage/images/profile/' . $data->image) }}"
                                        class="img-dss profile-avatar-img" alt="User Image">
                                @else
                                    <img src="{{ asset('style-index/images/nophoto.png') }}"
                                        class="img-dss profile-avatar-img" alt="No Photo">
                                @endif

                                <h5 class="font-weight-bold text-dark mt-3 mb-1">
                                    {{ $data->pfix_name }}{{ $data->emp_name }}
                                </h5>
                                <p class="text-muted small mb-3">
                                    {{ $data->position_view }} • {{ $data->division }}
                                </p>

                                {{-- ข้อความและปุ่มลิงก์ไป e-Office DSS --}}
                                <div class="d-inline-block bg-white px-4 py-2 rounded-pill border shadow-sm">
                                    <span class="text-muted small mr-2">
                                        <i class="fas fa-info-circle text-success mr-1"></i>
                                        สามารถแก้ไขรูปภาพโปรไฟล์ได้ที่ระบบ <strong>e-Office DSS</strong>
                                    </span>
                                    <a href="https://e-office.dss.go.th/person/profile/profile" target="_blank"
                                        rel="noopener noreferrer"
                                        class="btn btn-outline-success btn-xs rounded-pill px-3 py-1 font-weight-bold">
                                        <i class="fas fa-external-link-alt mr-1"></i> ไปที่ระบบ e-Office DSS
                                    </a>
                                </div>
                            </div>

                            {{-- ส่วนที่ 1: บค.สล. (ข้อมูลอ้างอิง แก้ไขไม่ได้) --}}
                            <div class="form-section-box section-readonly-box">
                                <div class="section-banner-readonly">
                                    <h6 class="font-weight-bold mb-1">
                                        <i class="fas fa-lock mr-1 text-warning"></i> ส่วนที่ 1 บค.สล.
                                        (เป็นผู้รับผิดชอบข้อมูล)
                                    </h6>
                                    <p class="small mb-0 text-white-50">ท่านไม่สามารถแก้ไขข้อมูลในส่วนนี้ได้ด้วยตนเอง
                                        โปรดติดต่อผู้รับผิดชอบข้อมูลหากพบข้อผิดพลาด</p>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-3 col-sm-6">
                                        <label class="profile-label" for="emp_id_view">Emp. ID</label>
                                        <input type="text" class="form-control input-readonly-modern" id="emp_id_view"
                                            value="{{ $data->emp_id }}" disabled>
                                    </div>

                                    <div class="form-group col-md-3 col-sm-6">
                                        <label class="profile-label" for="pfix_name">คำนำหน้า : (ภาษาไทย)</label>
                                        <input type="text" class="form-control input-readonly-modern" id="pfix_name"
                                            value="{{ $data->pfix_name }}" disabled>
                                    </div>

                                    <div class="form-group col-md-6 col-sm-12">
                                        <label class="profile-label" for="emp_name">ชื่อ-นามสกุล : (ภาษาไทย)</label>
                                        <input type="text" class="form-control input-readonly-modern" id="emp_name"
                                            value="{{ $data->emp_name }}" disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-3 col-sm-6">
                                        <label class="profile-label" for="pfix_name_e">คำนำหน้า : (ภาษาอังกฤษ)</label>
                                        <input type="text" class="form-control input-readonly-modern" id="pfix_name_e"
                                            value="{{ $data->pfix_name_e }}" disabled>
                                    </div>

                                    <div class="form-group col-md-9 col-sm-6">
                                        <label class="profile-label" for="english_name">ชื่อ-นามสกุล : (ภาษาอังกฤษ)</label>
                                        <input type="text" class="form-control input-readonly-modern" id="english_name"
                                            value="{{ $data->english_name }}" disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="profile-label" for="position_view">ตำแหน่ง :</label>
                                        <input type="text" class="form-control input-readonly-modern" id="position_view"
                                            value="{{ $data->position_view }}" disabled>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="profile-label" for="emp_type_name">สถานะ :</label>
                                        <input type="text" class="form-control input-readonly-modern" id="emp_type_name"
                                            value="{{ $data->emp_type_name }}" disabled>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="form-group col-md-6 mb-md-0">
                                        <label class="profile-label" for="division">กอง/สำนัก :</label>
                                        <input type="text" class="form-control input-readonly-modern" id="division"
                                            value="{{ $data->division }}" disabled>
                                    </div>

                                    <div class="form-group col-md-6 mb-0">
                                        <label class="profile-label" for="sub_division">กลุ่ม :</label>
                                        <input type="text" class="form-control input-readonly-modern"
                                            id="sub_division" value="{{ $data->sub_division }}" disabled>
                                    </div>
                                </div>
                            </div>

                            {{-- ส่วนที่ 2: แก้ไขได้เอง --}}
                            <div class="form-section-box section-editable-box mb-0">
                                <div class="section-banner-editable">
                                    <h6 class="font-weight-bold mb-1">
                                        <i class="fas fa-user-edit mr-1 text-warning"></i> ส่วนที่ 2 ข้อมูลติดต่อภายใน
                                    </h6>
                                    <p class="small mb-0" style="color: #a7f3d0;">
                                        ท่านสามารถปรับปรุงแก้ไขข้อมูลในส่วนนี้ได้ด้วยตนเอง</p>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label class="profile-label" for="dss_phone">
                                            <i class="fas fa-phone-alt text-success mr-1"></i> เบอร์โทร : <span
                                                class="text-muted font-weight-normal">(ตัวอย่าง 0 2201 1234, 1235)</span>
                                        </label>
                                        <input type="text" class="form-control input-editable-modern" name="dss_phone"
                                            id="dss_phone" placeholder="ตัวอย่าง 0 2201 1234"
                                            value="{{ old('dss_phone', $data->dss_phone) }}">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="profile-label" for="dss_fax">
                                            <i class="fas fa-fax text-success mr-1"></i> Fax. : <span
                                                class="text-muted font-weight-normal">(ตัวอย่าง 0 2201 1234)</span>
                                        </label>
                                        <input type="text" class="form-control input-editable-modern" name="dss_fax"
                                            id="dss_fax" placeholder="ตัวอย่าง 0 2201 1234"
                                            value="{{ old('dss_fax', $data->dss_fax) }}">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="profile-label" for="dss_mail">
                                            <i class="fas fa-envelope text-success mr-1"></i> อีเมลกรม : <span
                                                class="text-muted font-weight-normal">(ตัวอย่าง abc@dss.go.th)</span>
                                        </label>
                                        <input type="email" class="form-control input-editable-modern" name="dss_mail"
                                            id="dss_mail" placeholder="ตัวอย่าง abc@dss.go.th"
                                            value="{{ old('dss_mail', $data->dss_mail) }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-12">
                                        <label class="profile-label" for="dss_location">
                                            <i class="fas fa-building text-success mr-1"></i> สถานที่ปฏิบัติงานใน วศ. :
                                            <span class="text-muted font-weight-normal">(ตัวอย่าง ห้อง ชั้น อาคาร)</span>
                                        </label>
                                        <input type="text" class="form-control input-editable-modern"
                                            name="dss_location" id="dss_location" placeholder="ตัวอย่าง ห้อง ชั้น อาคาร"
                                            value="{{ old('dss_location', $data->dss_location) }}">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="form-group col-12 mb-0">
                                        <label class="profile-label" for="line_token">
                                            <i class="fab fa-line text-success mr-1"></i> LINE Token : <span
                                                class="text-muted font-weight-normal">(เพื่อใช้ในระบบงาน วศ.)</span>
                                        </label>
                                        <input type="text" class="form-control input-editable-modern"
                                            name="line_token" id="line_token"
                                            placeholder="กรุณานำ Line Token มากรอก (ถ้าหากมี)"
                                            value="{{ old('line_token', $data->line_token) }}">
                                    </div>
                                </div>
                            </div>

                            {{-- ข้อมูลซ่อนสำหรับส่ง Controller --}}
                            <input type="hidden" name="emp_id" value="{{ $data->emp_id }}">
                            <input type="hidden" name="oldImage" value="{{ $data->image }}">

                        </div>
                    </div>
                @endforeach
            </div>

            <!-- /.card-body -->
            <div class="card-footer profile-card-footer d-flex justify-content-center align-items-center flex-wrap"
                style="gap: 15px;">
                <a href="{{ url('/backend') }}" class="btn btn-outline-secondary btn-back-pill">
                    <i class="fas fa-home mr-1"></i> กลับหน้าหลัก
                </a>
                <button type="submit" class="btn btn-save-emerald">
                    <i class="fas fa-save mr-1"></i> ยืนยันการแก้ไข
                </button>
            </div>
        </form>
    </div>
    <!-- /.card -->

@endsection

@section('scripts')
    <script src="{{ asset('js/backend-dss.js') }}"></script>
@endsection
