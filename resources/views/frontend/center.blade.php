@section('title')
    | เบอร์ส่วนกลาง
@endsection

@include('frontend.head')
@include('frontend.topuser')

<!-- Style ปรับแต่งหน้าเบอร์ส่วนกลาง ให้เข้าชุดกับธีมสีเขียว วศ. -->
<style>
    /* แถบหัวข้อด้านบน: สีเขียวทึบสีเดียว (ไม่ไล่สี) */
    .center-page-header {
        background-color: #064e3b;
        padding: 40px 0 65px 0;
        color: #ffffff;
        position: relative;
        overflow: hidden;
        margin-bottom: -40px;
    }

    .center-page-header::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(110, 231, 183, 0.15) 1px, transparent 1px);
        background-size: 24px 24px;
        pointer-events: none;
    }

    /* กล่องค้นหาด่วนแบบ Floating Card */
    .search-glass-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 22px 28px;
        box-shadow: 0 12px 35px rgba(6, 78, 59, 0.12);
        border: 1px solid rgba(209, 250, 229, 0.8);
        position: relative;
        z-index: 3;
    }

    .search-input-modern {
        border: 2px solid #e2e8f0;
        border-left: none;
        border-radius: 0 14px 14px 0 !important;
        padding: 12px 18px;
        font-size: 1.05rem;
        height: auto;
        transition: all 0.25s ease;
    }

    .search-input-modern:focus {
        border-color: #059669;
        box-shadow: 0 0 0 4px rgba(5, 150, 105, 0.12);
    }

    .search-prepend-modern {
        background-color: #059669;
        color: #ffffff;
        border: none;
        border-radius: 14px 0 0 14px !important;
        padding: 0 20px;
        font-weight: 600;
    }

    /* กล่องตารางสไตล์โมเดิร์น */
    .table-modern-card {
        background: #ffffff;
        border-radius: 22px;
        border: 1px solid #f1f5f9;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    .center-table {
        margin-bottom: 0;
        width: 100%;
    }

    .center-table thead th {
        background-color: #064e3b !important;
        color: #ffffff !important;
        font-weight: 600;
        font-size: 0.98rem;
        padding: 16px 14px;
        border: none !important;
        vertical-align: middle;
    }

    .center-table tbody td {
        vertical-align: middle;
        padding: 15px 14px;
        border-bottom: 1px solid #f1f5f9;
        border-top: none;
        font-size: 1rem;
        color: #1e293b;
    }

    .center-table tbody tr:hover {
        background-color: #f0fdf4 !important;
        transition: background-color 0.2s ease;
    }

    /* ป้ายหมายเลขลำดับ */
    .seq-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        border-radius: 10px;
        background-color: #ecfdf5;
        color: #064e3b;
        font-weight: 700;
        font-size: 0.95rem;
        border: 1px solid #a7f3d0;
    }

    /* ป้ายเบอร์โทรศัพท์เด่นชัด + กดคัดลอกได้ */
    .ext-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background-color: #d1fae5;
        color: #064e3b;
        font-weight: 700;
        font-size: 1.08rem;
        padding: 7px 18px;
        border-radius: 50px;
        border: 1px solid #6ee7b7;
        cursor: pointer;
        transition: all 0.2s ease;
        user-select: all;
    }

    .ext-badge:hover {
        background-color: #059669;
        color: #ffffff;
        border-color: #059669;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(5, 150, 105, 0.25);
    }

    /* ป้ายหมวดหมู่ย่อยข้างชื่อสถานที่ */
    .cat-tag {
        font-size: 0.78rem;
        padding: 3px 10px;
        border-radius: 50px;
        font-weight: 600;
        margin-left: 8px;
        vertical-align: middle;
    }

    .tag-callcenter {
        background: #fef3c7;
        color: #92400e;
    }

    .tag-security {
        background: #fee2e2;
        color: #991b1b;
    }

    .tag-meeting {
        background: #e0f2fe;
        color: #075985;
    }

    .tag-welfare {
        background: #f3e8ff;
        color: #6b21a8;
    }
</style>

<!-- ส่วนหัวหน้าเบอร์ส่วนกลาง -->
<div class="center-page-header">
    <div class="container position-relative" style="z-index: 2;">
        <div class="row align-items-center">
            <div class="col-md-8 text-center text-md-left">
                <span class="badge badge-pill px-3 py-1 mb-2"
                    style="background: rgba(52, 211, 153, 0.18); color: #6ee7b7; border: 1px solid rgba(52, 211, 153, 0.3);">
                    <i class="fa fa-map-marker mr-1"></i> DSS CENTRAL DIRECTORY
                </span>
                <h2 class="font-weight-bold text-white mb-1">เบอร์โทรศัพท์ส่วนกลาง วศ.</h2>
                <p class="text-white-50 mb-0 small">รวมหมายเลขติดต่อ Call Center จุดรักษาความปลอดภัย ห้องประชุม
                    และหน่วยงานสวัสดิการ (โทรสายนอกกด 0 2201 ตามด้วยเลขภายใน)</p>
            </div>
            <div class="col-md-4 text-center text-md-right d-none d-md-block">
                <i class="fa fa-building" style="font-size: 4.5rem; color: rgba(255, 255, 255, 0.12);"></i>
            </div>
        </div>
    </div>
</div>

<div class="container pb-5">

    <!-- กล่องกรองค้นหาชื่อสถานที่ / เบอร์โทรแบบทันที -->
    <div class="row justify-content-center mb-4">
        <div class="col-12">
            <div class="search-glass-card">
                <label for="filterCenterInput" class="font-weight-bold text-dark mb-2 small">
                    <i class="fa fa-filter text-success mr-1"></i> ค้นหาด่วนในหน้านี้ (พิมพ์ชื่อห้องประชุม อาคาร
                    หรือเบอร์ภายใน)
                </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text search-prepend-modern">
                            <i class="fa fa-search mr-2"></i> กรองข้อมูลส่วนกลาง
                        </span>
                    </div>
                    <input type="text" id="filterCenterInput" class="form-control search-input-modern"
                        autocomplete="off" placeholder="เช่น Call Center, รปภ., ห้องประชุม, สหกรณ์ หรือเลข 7000...">
                </div>
            </div>
        </div>
    </div>

    <!-- ตารางแสดงเบอร์ส่วนกลางทั้ง 14 รายการ -->
    <div class="card table-modern-card mb-4">
        <div class="card-body p-0 table-responsive">
            <table class="table table-hover center-table" id="centerTable">
                <thead>
                    <tr>
                        <th style="width: 15%" class="text-center">ลำดับ</th>
                        <th style="width: 55%">ชื่อหน่วยงาน / สถานที่</th>
                        <th style="width: 30%" class="text-center">เบอร์โทรภายใน (คลิกเพื่อคัดลอก)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center"><span class="seq-badge">1</span></td>
                        <td class="font-weight-bold">
                            หมายเลข Call Center วศ.
                            <span class="cat-tag tag-callcenter">ประชาสัมพันธ์</span>
                        </td>
                        <td class="text-center">
                            <span class="ext-badge" onclick="copyExtNumber('7000', this)"
                                title="คลิกเพื่อคัดลอกเบอร์โทร">
                                <i class="fa fa-phone"></i> 7000-4
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><span class="seq-badge">2</span></td>
                        <td>
                            รปภ. อาคารตั้วฯ
                            <span class="cat-tag tag-security">รักษาความปลอดภัย</span>
                        </td>
                        <td class="text-center">
                            <span class="ext-badge" onclick="copyExtNumber('7099', this)"
                                title="คลิกเพื่อคัดลอกเบอร์โทร">
                                <i class="fa fa-phone"></i> 7099
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><span class="seq-badge">3</span></td>
                        <td>
                            รปภ. อาคารหอสมุดฯ
                            <span class="cat-tag tag-security">รักษาความปลอดภัย</span>
                        </td>
                        <td class="text-center">
                            <span class="ext-badge" onclick="copyExtNumber('7246', this)"
                                title="คลิกเพื่อคัดลอกเบอร์โทร">
                                <i class="fa fa-phone"></i> 7246
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><span class="seq-badge">4</span></td>
                        <td>
                            รปภ. อาคารสถานศึกษาเคมีปฏิบัติ
                            <span class="cat-tag tag-security">รักษาความปลอดภัย</span>
                        </td>
                        <td class="text-center">
                            <span class="ext-badge" onclick="copyExtNumber('7471', this)"
                                title="คลิกเพื่อคัดลอกเบอร์โทร">
                                <i class="fa fa-phone"></i> 7471
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><span class="seq-badge">5</span></td>
                        <td>
                            รปภ. ตึก SAL
                            <span class="cat-tag tag-security">รักษาความปลอดภัย</span>
                        </td>
                        <td class="text-center">
                            <span class="ext-badge" onclick="copyExtNumber('7546', this)"
                                title="คลิกเพื่อคัดลอกเบอร์โทร">
                                <i class="fa fa-phone"></i> 7546
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><span class="seq-badge">6</span></td>
                        <td>
                            ห้องประชุมอัครเมธี / ห้องประชุมนิธิปัญญา / ห้องประชุมวิทยวิถี
                            <span class="cat-tag tag-meeting">ห้องประชุม</span>
                        </td>
                        <td class="text-center">
                            <span class="ext-badge" onclick="copyExtNumber('7520', this)"
                                title="คลิกเพื่อคัดลอกเบอร์โทร">
                                <i class="fa fa-phone"></i> 7520
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><span class="seq-badge">7</span></td>
                        <td>
                            ห้องประชุมภูมิบดินทร์
                            <span class="cat-tag tag-meeting">ห้องประชุม</span>
                        </td>
                        <td class="text-center">
                            <span class="ext-badge" onclick="copyExtNumber('7463', this)"
                                title="คลิกเพื่อคัดลอกเบอร์โทร">
                                <i class="fa fa-phone"></i> 7463
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><span class="seq-badge">8</span></td>
                        <td>
                            ห้องประชุม สล.
                            <span class="cat-tag tag-meeting">ห้องประชุม</span>
                        </td>
                        <td class="text-center">
                            <span class="ext-badge" onclick="copyExtNumber('7389', this)"
                                title="คลิกเพื่อคัดลอกเบอร์โทร">
                                <i class="fa fa-phone"></i> 7389
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><span class="seq-badge">9</span></td>
                        <td>
                            ห้องประชุม คอ.
                            <span class="cat-tag tag-meeting">ห้องประชุม</span>
                        </td>
                        <td class="text-center">
                            <span class="ext-badge" onclick="copyExtNumber('7214', this)"
                                title="คลิกเพื่อคัดลอกเบอร์โทร">
                                <i class="fa fa-phone"></i> 7214
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><span class="seq-badge">10</span></td>
                        <td>
                            ห้องประชุม อว.
                            <span class="cat-tag tag-meeting">ห้องประชุม</span>
                        </td>
                        <td class="text-center">
                            <span class="ext-badge" onclick="copyExtNumber('7029', this)"
                                title="คลิกเพื่อคัดลอกเบอร์โทร">
                                <i class="fa fa-phone"></i> 7029
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><span class="seq-badge">11</span></td>
                        <td>
                            ห้องประชุม วว.
                            <span class="cat-tag tag-meeting">ห้องประชุม</span>
                        </td>
                        <td class="text-center">
                            <span class="ext-badge" onclick="copyExtNumber('7149', this)"
                                title="คลิกเพื่อคัดลอกเบอร์โทร">
                                <i class="fa fa-phone"></i> 7149
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><span class="seq-badge">12</span></td>
                        <td>
                            ห้องประชุม ทช.
                            <span class="cat-tag tag-meeting">ห้องประชุม</span>
                        </td>
                        <td class="text-center">
                            <span class="ext-badge" onclick="copyExtNumber('7016', this)"
                                title="คลิกเพื่อคัดลอกเบอร์โทร">
                                <i class="fa fa-phone"></i> 7016
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><span class="seq-badge">13</span></td>
                        <td>
                            สหกรณ์ออมทรัพย์ วศ.
                            <span class="cat-tag tag-welfare">สวัสดิการ</span>
                        </td>
                        <td class="text-center">
                            <span class="ext-badge" onclick="copyExtNumber('7350', this)"
                                title="คลิกเพื่อคัดลอกเบอร์โทร">
                                <i class="fa fa-phone"></i> 7350
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><span class="seq-badge">14</span></td>
                        <td>
                            สวัสดิการกรมวิทยาศาสตร์บริการ (สวศ.)
                            <span class="cat-tag tag-welfare">สวัสดิการ</span>
                        </td>
                        <td class="text-center">
                            <span class="ext-badge" onclick="copyExtNumber('7042', this)"
                                title="คลิกเพื่อคัดลอกเบอร์โทร">
                                <i class="fa fa-phone"></i> 7042
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Script กรองค้นหาในหน้า + คัดลอกเบอร์โทรเมื่อคลิก -->
<script>
    // 1. ค้นหากรองรายการในตารางทันทีขณะพิมพ์
    document.getElementById('filterCenterInput').addEventListener('keyup', function() {
        var keyword = this.value.toLowerCase().trim();
        var rows = document.querySelectorAll('#centerTable tbody tr');

        rows.forEach(function(row) {
            var text = row.textContent.toLowerCase();
            row.style.display = text.indexOf(keyword) !== -1 ? '' : 'none';
        });
    });

    // 2. คัดลอกเบอร์โทรเมื่อคลิกที่ป้ายตัวเลข
    function copyExtNumber(ext, element) {
        if (navigator.clipboard) {
            navigator.clipboard.writeText(ext);
        }
        var originalHtml = element.innerHTML;
        element.innerHTML = '<i class="fa fa-check"></i> คัดลอกแล้ว (' + ext + ')';
        element.style.backgroundColor = '#064e3b';
        element.style.color = '#ffffff';

        setTimeout(function() {
            element.innerHTML = originalHtml;
            element.style.backgroundColor = '';
            element.style.color = '';
        }, 1500);
    }
</script>

@include('frontend.footer')
