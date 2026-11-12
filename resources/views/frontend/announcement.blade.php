@section('title')
    | แจ้งเพื่อโปรดทราบ
@endsection

@include('frontend.head')
@include('frontend.topuser')

<!-- Style ปรับแต่งหน้าแจ้งเพื่อโปรดทราบก่อน ให้เข้าชุดกับธีมสีเขียว วศ. -->
<style>
    /* แถบหัวข้อด้านบน: สีเขียวทึบสีเดียว (ไม่ไล่สี) */
    .announce-page-header {
        background-color: #064e3b;
        padding: 40px 0 65px 0;
        color: #ffffff;
        position: relative;
        overflow: hidden;
        margin-bottom: -40px;
    }

    .announce-page-header::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(110, 231, 183, 0.15) 1px, transparent 1px);
        background-size: 24px 24px;
        pointer-events: none;
    }

    /* กล่องการ์ดหลักแบบ Floating Card */
    .announce-main-card {
        background: #ffffff;
        border-radius: 24px;
        padding: 36px 32px;
        box-shadow: 0 15px 40px rgba(6, 78, 59, 0.1);
        border: 1px solid rgba(209, 250, 229, 0.9);
        position: relative;
        z-index: 3;
    }

    /* การ์ดย่อยแต่ละข้อ (1, 2, 3) */
    .rule-item-box {
        border-radius: 18px;
        padding: 22px 24px;
        margin-bottom: 20px;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .rule-item-box:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.04);
    }

    /* ข้อ 1: โทนเขียวมรกต (แก้ไขได้ด้วยตนเอง) */
    .rule-box-emerald {
        background-color: #f0fdf4;
        border: 1px solid #bbf7d0;
        border-left: 6px solid #059669;
    }

    /* ข้อ 2: โทนแดง/ส้มอ่อน (ข้าราชการ/ลูกจ้าง/พนักงานราชการ -> ศบค.สลก.) */
    .rule-box-red {
        background-color: #fef2f2;
        border: 1px solid #fecaca;
        border-left: 6px solid #dc2626;
    }

    /* ข้อ 3: โทนน้ำเงินอ่อน (จ้างเหมา -> ศบพ.สลก.) */
    .rule-box-blue {
        background-color: #eff6ff;
        border: 1px solid #bfdbfe;
        border-left: 6px solid #2563eb;
    }

    /* ป้ายรายการสิ่งที่แก้ไขได้เองในข้อ 1 */
    .editable-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background-color: #ffffff;
        color: #064e3b;
        border: 1px solid #a7f3d0;
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 0.92rem;
        font-weight: 600;
        box-shadow: 0 2px 6px rgba(5, 150, 105, 0.06);
    }

    /* ปุ่มเข้าสู่ระบบสไตล์โมเดิร์น */
    .btn-login-emerald {
        background-color: #059669;
        color: #ffffff !important;
        border: none;
        border-radius: 50px;
        padding: 14px 42px;
        font-size: 1.1rem;
        font-weight: 700;
        box-shadow: 0 10px 25px rgba(5, 150, 105, 0.35);
        transition: all 0.3s ease;
    }

    .btn-login-emerald:hover {
        background-color: #064e3b;
        transform: translateY(-3px);
        box-shadow: 0 14px 30px rgba(6, 78, 59, 0.45);
    }
</style>

<!-- ส่วนหัวหน้าแจ้งเพื่อโปรดทราบก่อน -->
<div class="announce-page-header">
    <div class="container position-relative" style="z-index: 2;">
        <div class="row align-items-center">
            <div class="col-md-8 text-center text-md-left">
                <span class="badge badge-pill px-3 py-1 mb-2"
                    style="background: rgba(52, 211, 153, 0.18); color: #6ee7b7; border: 1px solid rgba(52, 211, 153, 0.3);">
                    <i class="fa fa-info-circle mr-1"></i> DSS DATA UPDATE GUIDELINES
                </span>
                <h2 class="font-weight-bold text-white mb-1">แจ้งเพื่อโปรดทราบ</h2>
                <p class="text-white-50 mb-0 small">แนวทางและเงื่อนไขการปรับปรุงแก้ไขข้อมูลบุคลากรในระบบนามสงเคราะห์
                    กรมวิทยาศาสตร์บริการ</p>
            </div>
            <div class="col-md-4 text-center text-md-right d-none d-md-block">
                <i class="fa fa-bullhorn" style="font-size: 4.5rem; color: rgba(255, 255, 255, 0.12);"></i>
            </div>
        </div>
    </div>
</div>

<div class="container pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="announce-main-card">

                <!-- ข้อ 1: ข้อมูลที่แก้ไขได้ด้วยตนเอง -->
                <div class="rule-item-box rule-box-emerald">
                    <div class="d-flex align-items-start">
                        <div class="mr-3 mt-1">
                            <span
                                class="badge badge-success rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 32px; height: 32px; font-size: 1rem; background-color: #059669;">1</span>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="font-weight-bold mb-3" style="color: #064e3b;">
                                ท่านสามารถแก้ไขข้อมูลส่วนตัวได้ด้วยตนเอง ดังนี้
                            </h5>
                            <div class="d-flex flex-wrap" style="gap: 10px;">
                                <span class="editable-chip"><i class="fa fa-phone text-success"></i>
                                    เบอร์โทรศัพท์</span>
                                <span class="editable-chip"><i class="fa fa-fax text-success"></i> เบอร์ Fax.</span>
                                <span class="editable-chip"><i class="fa fa-envelope text-success"></i> อีเมล</span>
                                <span class="editable-chip"><i class="fa fa-building text-success"></i> สถานที่ทำงานใน
                                    วศ. เท่านั้น</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ข้อ 2: ข้าราชการ ลูกจ้างประจำ และพนักงานราชการ -->
                <div class="rule-item-box rule-box-red">
                    <div class="d-flex align-items-start">
                        <div class="mr-3 mt-1">
                            <span
                                class="badge badge-danger rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 32px; height: 32px; font-size: 1rem;">2</span>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="font-weight-bold mb-1" style="color: #067423;">
                                ข้าราชการ ลูกจ้างประจำ และพนักงานราชการ
                            </h5>
                            <p class="mb-0 text-dark" style="font-size: 1.02rem; line-height: 1.65;">
                                หากพบข้อมูลที่ผิดพลาด เช่น ชื่อ-นามสกุล (ไทยและอังกฤษ) ตำแหน่ง หรือหน่วยงานที่สังกัด
                                โปรดติดต่อ <span class="badge badge-danger px-2 py-1 ml-1"
                                    style="font-size: 0.95rem;"><i class="fa fa-phone mr-1"></i> ศบค.สลก.</span>
                                เท่านั้น
                            </p>
                        </div>
                    </div>
                </div>

                <!-- ข้อ 3: จ้างเหมา -->
                <div class="rule-item-box rule-box-blue">
                    <div class="d-flex align-items-start">
                        <div class="mr-3 mt-1">
                            <span
                                class="badge badge-primary rounded-circle d-flex align-items-center justify-content-center"
                                style="width: 32px; height: 32px; font-size: 1rem; background-color: #002aff;">3</span>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="font-weight-bold mb-1" style="color: #002aff;">
                                จ้างเหมา
                            </h5>
                            <p class="mb-0 text-dark" style="font-size: 1.02rem; line-height: 1.65;">
                                หากพบข้อมูลที่ผิดพลาด เช่น ลาออก/หมดสัญญาแล้ว
                                โปรดติดต่อ <span class="badge badge-primary px-2 py-1 ml-1"
                                    style="font-size: 0.95rem; background-color: #002aff;"><i
                                        class="fa fa-phone mr-1"></i> ศบพ.สลก.</span> เท่านั้น
                            </p>
                        </div>
                    </div>
                </div>

                <!-- ข้อความขอบคุณ + ปุ่มเข้าสู่ระบบ -->
                <div class="text-center pt-3 mt-2 border-top">
                    <p class="text-muted font-weight-bold mb-4" style="font-size: 1.05rem;">
                        <i class="fa fa-handshake-o text-success mr-1"></i> ขอขอบคุณในความร่วมมือเป็นอย่างดี
                    </p>
                    <button type="button" class="btn btn-login-emerald"
                        onclick="window.location.href='{{ url('/login') }}'">
                        <i class="fa fa-sign-in mr-2"></i> เข้าสู่ระบบ
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>

@include('frontend.footer')
