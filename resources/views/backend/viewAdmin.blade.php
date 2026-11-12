@extends('layouts.adminlte')

@section('title')
    | ข้อมูลทั้งหมด
@endsection

@section('content')
    <!-- Style ปรับแต่งหน้าจัดการข้อมูลบุคลากร ให้เข้าชุดกับธีมสีเขียว วศ. -->
    <style>
        /* การ์ดหลักครอบทั้งหน้า */
        .dss-admin-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(6, 78, 59, 0.08);
            overflow: hidden;
            background: #ffffff;
        }

        /* ส่วนหัวการ์ดสีเขียวทึบสีเดียว (ไม่ไล่สี) */
        .dss-admin-card-header {
            background-color: #064e3b !important;
            color: #ffffff !important;
            padding: 18px 24px;
            border-bottom: 3px solid #10b981;
        }

        .dss-admin-card-header .card-title {
            font-size: 1.15rem;
            font-weight: 600;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* กล่องฟอร์มค้นหาแบบ Modern Filter Box */
        .admin-search-box {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 20px 22px;
            margin-bottom: 24px;
        }

        .filter-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #064e3b;
            margin-bottom: 6px;
            display: block;
        }

        .admin-input-group .input-group-text {
            background-color: #059669;
            color: #ffffff;
            border: none;
            border-radius: 10px 0 0 10px !important;
            font-size: 0.85rem;
            font-weight: 500;
            padding: 0 14px;
        }

        .admin-input-group .form-control {
            border: 1.5px solid #cbd5e1;
            border-left: none;
            border-radius: 0 10px 10px 0 !important;
            height: 40px;
            font-size: 0.92rem;
            transition: all 0.2s ease;
        }

        .admin-input-group .form-control:focus {
            border-color: #059669;
            box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.12);
        }

        /* ปุ่มค้นหาและล้างค่า */
        .btn-admin-search {
            background-color: #059669;
            border-color: #059669;
            color: #ffffff;
            border-radius: 50px;
            padding: 8px 28px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(5, 150, 105, 0.25);
            transition: all 0.25s ease;
        }

        .btn-admin-search:hover {
            background-color: #064e3b;
            border-color: #064e3b;
            color: #ffffff;
            transform: translateY(-1px);
        }

        .btn-admin-reset {
            border-radius: 50px;
            padding: 8px 24px;
            font-weight: 600;
            transition: all 0.25s ease;
        }

        .btn-admin-reset:hover {
            transform: translateY(-1px);
        }

        /* ตารางข้อมูลบุคลากร */
        .admin-table-wrap {
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
            background: #ffffff;
        }

        #tbview_admin {
            border-collapse: separate;
            border-spacing: 0;
            width: 100% !important;
            margin-bottom: 0;
        }

        #tbview_admin thead th {
            background-color: #064e3b !important;
            color: #ffffff !important;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 14px 10px;
            border: none !important;
            vertical-align: middle;
            white-space: nowrap;
        }

        #tbview_admin tbody td {
            vertical-align: middle;
            padding: 11px 10px;
            border-color: #f1f5f9 !important;
            font-size: 0.88rem;
            color: #334155;
        }

        #tbview_admin tbody tr:hover {
            background-color: #f0fdf4 !important;
            transition: background-color 0.2s ease;
        }

        #tbview_admin tbody td img {
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
            object-fit: cover;
        }
    </style>

    <div class="card dss-admin-card">
        <!-- Card Header -->
        <div class="card-header dss-admin-card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">
                <span class="badge badge-light text-success p-2 rounded-circle">
                    <i class="fas fa-users-cog"></i>
                </span>
                <span>จัดการข้อมูลบุคลากรทั้งหมด</span>
            </h3>
            <div class="card-tools ml-auto">
                <span class="badge badge-pill px-3 py-1"
                    style="background: rgba(110, 231, 183, 0.18); color: #6ee7b7; border: 1px solid rgba(110, 231, 183, 0.35);">
                    <i class="fas fa-database mr-1"></i> DSS Back Office
                </span>
            </div>
        </div>
        <!-- /.card-header -->

        <div class="card-body p-3 p-md-4">

            <!-- ฟอร์มค้นหา (คง ID และ Name เดิมครบทั้ง 3 ช่อง) -->
            <div class="admin-search-box">
                <form action="" id="search-form" name="search-form" method="GET">
                    <div class="row">
                        <!-- ช่องที่ 1: ชื่อ-นามสกุล (ไทย) -->
                        <div class="col-lg-4 col-md-12 mb-3">
                            <label for="emp_name" class="filter-label">
                                <i class="fas fa-user text-success mr-1"></i> ค้นหา ชื่อ-นามสกุล (ไทย)
                            </label>
                            <div class="input-group admin-input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input type="text" name="emp_name" id="emp_name" class="form-control" autocomplete="off"
                                    placeholder="โปรดกรอกชื่อ หรือนามสกุล...">
                            </div>
                        </div>

                        <!-- ช่องที่ 2: Name-Surname (อังกฤษ) -->
                        <div class="col-lg-4 col-md-12 mb-3">
                            <label for="english_name" class="filter-label">
                                <i class="fas fa-globe text-success mr-1"></i> ค้นหา Name-Surname (อังกฤษ)
                            </label>
                            <div class="input-group admin-input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-font"></i></span>
                                </div>
                                <input type="text" name="english_name" id="english_name" class="form-control"
                                    autocomplete="off" placeholder="Enter English name...">
                            </div>
                        </div>

                        <!-- ช่องที่ 3: Emp. ID -->
                        <div class="col-lg-4 col-md-12 mb-3">
                            <label for="emp_id" class="filter-label">
                                <i class="fas fa-id-badge text-success mr-1"></i> ค้นหา Emp. ID (รหัสพนักงาน)
                            </label>
                            <div class="input-group admin-input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                </div>
                                <input type="text" name="emp_id" id="emp_id" class="form-control" autocomplete="off"
                                    placeholder="ระบุรหัสพนักงาน...">
                            </div>
                        </div>
                    </div>

                    <!-- ปุ่มกดค้นหา / ล้างค่า -->
                    <div class="text-center mt-1">
                        <button type="submit" class="btn btn-admin-search mr-2">
                            <i class="fas fa-search mr-1"></i> ค้นหาข้อมูล
                        </button>
                        <button type="reset" class="btn btn-outline-danger btn-admin-reset">
                            <i class="fas fa-times mr-1"></i> ล้างค่า
                        </button>
                    </div>
                </form>
            </div>

            <!-- ตารางแสดงข้อมูล (คงโครงสร้างคอลัมน์ 11 ช่อง และ ID tbview_admin เดิมทุกประการ) -->
            <div class="admin-table-wrap p-3 table-responsive">
                <table class="table table-hover display" id="tbview_admin">
                    <thead>
                        <tr align="center">
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
                        <!-- ข้อมูลเรนเดอร์โดย backend-dss.js -->
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection

{{-- @include('backend.modals.modal-edit') --}}

@section('scripts')
    <script src="{{ asset('js/backend-dss.js') }}"></script>

    <!-- สคริปต์ไฮไลต์แถวจัดกลุ่ม กอง/สำนัก (สีเขียวมิ้นต์) และ กลุ่มงาน (สีเหลืองนวล) -->
    <script>
        $(function() {
            function highlightAdminGroupRows() {
                var tbody = document.querySelector('#tbview_admin tbody');
                if (!tbody) return;

                var rows = tbody.querySelectorAll('tr');
                rows.forEach(function(tr) {
                    var cells = tr.querySelectorAll('td, th');
                    var isGroupRow = (cells.length === 1) ||
                        tr.className.indexOf('group') !== -1 ||
                        tr.className.indexOf('dtrg') !== -1;

                    if (isGroupRow && cells.length > 0) {
                        var cell = cells[0];
                        var html = cell.innerHTML;
                        var text = cell.textContent.trim();

                        if (!text || cell.classList.contains('dataTables_empty')) return;

                        // แถบหลัก: กอง/สำนัก -> สีเขียวมิ้นต์สว่าง
                        var isMainDivision = tr.classList.contains('dtrg-level-0') ||
                            html.indexOf('fa-map-marker') !== -1 ||
                            html.indexOf('<i') !== -1 ||
                            text.indexOf('ส่วนกลาง') !== -1;

                        if (isMainDivision) {
                            tr.style.setProperty('background', '#d1fae5', 'important');
                            cell.style.setProperty('background', '#d1fae5', 'important');
                            cell.style.setProperty('color', '#064e3b', 'important');
                            cell.style.setProperty('font-weight', '700', 'important');
                            cell.style.setProperty('font-size', '1rem', 'important');
                            cell.style.setProperty('padding', '11px 16px', 'important');
                            cell.style.setProperty('border-left', '6px solid #059669', 'important');
                            cell.style.setProperty('border-top', '1px solid #a7f3d0', 'important');
                            cell.style.setProperty('border-bottom', '1px solid #a7f3d0', 'important');

                            cell.querySelectorAll('*').forEach(function(el) {
                                el.style.setProperty('color', '#064e3b', 'important');
                            });
                        } else {
                            // แถบย่อย: กลุ่มงาน -> สีเหลืองนวล
                            tr.style.setProperty('background', '#fef9c3', 'important');
                            cell.style.setProperty('background', '#fef9c3', 'important');
                            cell.style.setProperty('color', '#854d0e', 'important');
                            cell.style.setProperty('font-weight', '700', 'important');
                            cell.style.setProperty('font-size', '0.94rem', 'important');
                            cell.style.setProperty('padding', '9px 24px', 'important');
                            cell.style.setProperty('border-left', '6px solid #eab308', 'important');
                            cell.style.setProperty('border-bottom', '1px solid #fef08a', 'important');

                            cell.querySelectorAll('*').forEach(function(el) {
                                el.style.setProperty('color', '#854d0e', 'important');
                            });
                        }
                    }
                });
            }

            highlightAdminGroupRows();
            $('#tbview_admin').on('draw.dt init.dt xhr.dt', function() {
                setTimeout(highlightAdminGroupRows, 50);
            });

            var targetTable = document.getElementById('tbview_admin');
            if (targetTable) {
                var observer = new MutationObserver(function() {
                    highlightAdminGroupRows();
                });
                observer.observe(targetTable, {
                    childList: true,
                    subtree: true
                });
            }
        });
    </script>
@endsection
