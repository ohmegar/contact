<!-- Style สำหรับการ์ดภาพคมชัด และ Dashboard สถิติเต็มจอ 100vw -->
<style>
    /* ================= 1. CARDS 01, 02, 03 ================= */
    .dss-portal-card {
        background: #ffffff;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(11, 60, 93, 0.08);
        border: 1px solid rgba(226, 232, 240, 0.9);
        transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none !important;
        display: flex;
        flex-direction: column;
        height: 80%;
        position: relative;
    }

    .dss-portal-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(4, 120, 87, 0.16);
        border-color: #34d399;
    }

    /* กล่องรูปภาพจริงด้านบน */
    .card-thumb-wrap {
        position: relative;
        height: 190px;
        overflow: hidden;
        background-color: #e2e8f0;
    }

    .card-thumb-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .dss-portal-card:hover .card-thumb-wrap img {
        transform: scale(1.09);
    }

    /* เลเยอร์ไล่เฉดขาวกลืนลงมาทับรูป */
    .card-thumb-wrap::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 75%;
        background: linear-gradient(to top, #ffffff 15%, rgba(255, 255, 255, 0.7) 50%, rgba(255, 255, 255, 0) 100%);
        pointer-events: none;
    }

    .card-body-content {
        padding: 0 24px 26px 24px;
        position: relative;
        z-index: 2;
        flex-grow: 1;
    }

    /* แถบตัวเลข 01, 02 + Badge ไอคอนลอยตัว */
    .card-meta-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: -30px;
        margin-bottom: 12px;
    }

    .card-number {
        font-size: 2.35rem;
        font-weight: 800;
        color: #cbd5e1;
        line-height: 1;
        letter-spacing: -1px;
        text-shadow: 0 2px 10px rgba(255, 255, 255, 0.9);
    }

    .card-icon-badge {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 10px 22px rgba(15, 23, 42, 0.14);
        font-size: 1.3rem;
        border: 1px solid rgba(255, 255, 255, 1);
        transition: transform 0.3s ease;
    }

    .dss-portal-card:hover .card-icon-badge {
        transform: scale(1.1) rotate(4deg);
    }

    .badge-blue {
        color: #0284c7;
    }

    .badge-emerald {
        color: #059669;
    }

    .badge-purple {
        color: #7c3aed;
    }

    .card-main-title {
        color: #0b3c5d;
        font-weight: 700;
        font-size: 1.25rem;
        margin-bottom: 6px;
    }

    .card-sub-desc {
        color: #64748b;
        font-size: 0.88rem;
        line-height: 1.55;
        margin-bottom: 0;
    }

    /* กล่องแจ้งแก้ไขข้อมูล */
    .edit-callout-box {
        background: linear-gradient(90deg, #fff5f5 0%, #ffffff 100%);
        border-radius: 20px;
        border-left: 6px solid #ef4444;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.04);
        padding: 22px 28px;
    }

    /* ================= 2. FULL-WIDTH STATS DASHBOARD (100vw) ================= */
    .stat-fullwidth-wrapper {
        width: 100%;
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
        overflow: hidden;
        background: linear-gradient(145deg, #041d1a 0%, #06312a 50%, #09263a 100%);
        padding: 65px 0;
        border-top: 1px solid rgba(52, 211, 153, 0.25);
        border-bottom: 1px solid rgba(52, 211, 153, 0.25);
        box-shadow: inset 0 0 50px rgba(0, 0, 0, 0.35);
    }

    /* ตารางเส้นตารางดิจิทัล */
    .stat-fullwidth-wrapper::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(52, 211, 153, 0.06) 1px, transparent 1px),
            linear-gradient(90deg, rgba(52, 211, 153, 0.06) 1px, transparent 1px);
        background-size: 36px 36px;
        pointer-events: none;
    }

    .glass-stat-card {
        background: rgba(255, 255, 255, 0.06);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 22px;
        padding: 24px;
        color: #ffffff;
        height: 100%;
        transition: all 0.3s ease;
    }

    .glass-stat-card:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(110, 231, 183, 0.45);
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
    }

    .glass-stat-hero {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.25) 0%, rgba(6, 78, 59, 0.5) 100%);
        border: 1px solid rgba(52, 211, 153, 0.45);
    }

    .stat-neon-icon {
        width: 52px;
        height: 52px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.15);
    }

    .neon-emerald {
        color: #6ee7b7;
        box-shadow: 0 0 18px rgba(52, 211, 153, 0.35);
    }

    .neon-cyan {
        color: #67e8f9;
        box-shadow: 0 0 18px rgba(34, 211, 238, 0.35);
    }

    .neon-amber {
        color: #fcd34d;
        box-shadow: 0 0 18px rgba(251, 191, 36, 0.3);
    }

    .neon-teal {
        color: #5eead4;
        box-shadow: 0 0 18px rgba(45, 212, 191, 0.3);
    }

    .neon-indigo {
        color: #a5b4fc;
        box-shadow: 0 0 18px rgba(129, 140, 248, 0.3);
    }

    .digital-number {
        font-size: 2.5rem;
        font-weight: 800;
        letter-spacing: -0.5px;
        line-height: 1.1;
        background: linear-gradient(to right, #ffffff, #d1fae5);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .digital-progress {
        height: 6px;
        background: rgba(255, 255, 255, 0.12);
        border-radius: 10px;
        overflow: hidden;
        margin-top: 15px;
    }

    .digital-progress-bar {
        height: 100%;
        border-radius: 10px;
        transition: width 1.2s ease-out;
    }

    .live-pulse-dot {
        display: inline-block;
        width: 9px;
        height: 9px;
        background-color: #34d399;
        border-radius: 50%;
        margin-right: 6px;
        box-shadow: 0 0 8px #34d399;
        animation: pulseGlow 1.8s infinite;
    }

    @keyframes pulseGlow {
        0% {
            transform: scale(0.95);
            box-shadow: 0 0 0 0 rgba(52, 211, 153, 0.7);
        }

        70% {
            transform: scale(1.1);
            box-shadow: 0 0 0 8px rgba(52, 211, 153, 0);
        }

        100% {
            transform: scale(0.95);
            box-shadow: 0 0 0 0 rgba(52, 211, 153, 0);
        }
    }


    /* ================= SECTION: แผนผังโครงสร้างองค์กรแบบโต้ตอบ (DSS ORG CHART) ================= */
    .org-chart-section {
        background: linear-gradient(180deg, #f8fafc 0%, #f0fdf4 100%);
        padding: 60px 0 70px 0;
        border-top: 1px solid #e2e8f0;
        position: relative;
    }

    /* กล่องรากฐานด้านบนสุด (กรมวิทยาศาสตร์บริการ) */
    .org-root-node {
        background-color: #064e3b;
        color: #ffffff;
        border-radius: 20px;
        padding: 22px 34px;
        display: inline-flex;
        flex-direction: column;
        align-items: center;
        box-shadow: 0 12px 30px rgba(6, 78, 59, 0.22);
        border: 2px solid #10b981;
        position: relative;
        z-index: 2;
    }

    /* เส้นเชื่อมแผนผังแนวตั้งจากกล่องหลัก */
    .org-trunk-line {
        width: 3px;
        height: 32px;
        background-color: #10b981;
        margin: 0 auto;
    }

    .org-horizontal-bar {
        height: 3px;
        background-color: #10b981;
        width: 82%;
        margin: 0 auto 24px auto;
        border-radius: 3px;
        position: relative;
    }

    /* การ์ดระดับ Division (กอง/สำนัก) */
    .division-tree-card {
        background: #ffffff;
        border-radius: 18px;
        border: 1px solid #d1fae5;
        border-top: 5px solid #059669;
        box-shadow: 0 8px 22px rgba(6, 78, 59, 0.06);
        transition: all 0.25s ease;
        overflow: hidden;
        height: 100%;
    }

    .division-tree-card:hover {
        box-shadow: 0 14px 30px rgba(5, 150, 105, 0.14);
        border-color: #6ee7b7;
    }

    .division-header-btn {
        padding: 18px 20px;
        cursor: pointer;
        user-select: none;
        background-color: #ffffff;
        transition: background-color 0.2s ease;
        position: relative;
    }

    .division-header-btn:hover {
        background-color: #f0fdf4;
    }

    .division-title-text {
        font-size: 1.05rem;
        font-weight: 700;
        color: #064e3b;
        line-height: 1.35;
        margin-bottom: 3px;
    }

    .division-eng-text {
        font-size: 0.82rem;
        font-weight: 500;
        color: #64748b;
        line-height: 1.3;
        margin-bottom: 10px;
    }

    /* ป้ายนับจำนวนรวม */
    .total-count-pill {
        background-color: #064e3b;
        color: #ffffff;
        font-size: 0.82rem;
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 50px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    /* สีแยกตามประเภทสถานะ (emp_type_name) */
    .status-pill-base {
        font-size: 0.76rem;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 50px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .status-civil {
        background-color: #d1fae5;
        color: #065f46;
        border: 1px solid #6ee7b7;
    }

    .status-gov-emp {
        background-color: #dbeafe;
        color: #1e40af;
        border: 1px solid #93c5fd;
    }

    .status-perm-emp {
        background-color: #fef3c7;
        color: #92400e;
        border: 1px solid #fcd34d;
    }

    .status-ministry {
        background-color: #f3e8ff;
        color: #6b21a8;
        border: 1px solid #d8b4fe;
    }

    .status-other {
        background-color: #f1f5f9;
        color: #334155;
        border: 1px solid #cbd5e1;
    }

    /* ไอคอนลูกศรหมุนเมื่อกางออก */
    .toggle-chevron {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #ecfdf5;
        color: #059669;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease, background-color 0.2s ease;
        flex-shrink: 0;
    }

    .division-tree-card.is-open .toggle-chevron {
        transform: rotate(180deg);
        background-color: #059669;
        color: #ffffff;
    }

    /* กล่องรายการ Sub-Division ด้านใน */
    .subdivision-list-wrap {
        display: none;
        background-color: #f8fafc;
        border-top: 1px dashed #cbd5e1;
        padding: 14px 18px 18px 24px;
        position: relative;
    }

    .subdivision-item {
        position: relative;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-left: 4px solid #10b981;
        border-radius: 12px;
        padding: 12px 14px;
        margin-bottom: 10px;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .subdivision-item:last-child {
        margin-bottom: 0;
    }

    .subdivision-item:hover {
        background-color: #ecfdf5;
        border-color: #6ee7b7;
        transform: translateX(4px);
    }

    .subdivision-name {
        font-size: 0.92rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 2px;
    }

    .subdivision-eng {
        font-size: 0.78rem;
        color: #64748b;
        margin-bottom: 6px;
    }

    .sub-count-tag {
        background-color: #064e3b;
        color: #ffffff;
        font-weight: 600;
        font-size: 0.78rem;
        padding: 2px 10px;
        border-radius: 50px;
    }

    /* บังคับขนาด Modal ให้กว้างเต็มตา */
    @media (min-width: 992px) {
        .modal-dialog-wide {
            max-width: 1140px !important;
            width: 95% !important;
        }
    }

    /* การ์ดรายชื่อคนใน Modal */
    .member-modal-card {
        background: #ffffff;
        border-radius: 14px;
        padding: 16px;
        border: 1px solid #e2e8f0;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.03);
        transition: transform 0.2s ease, border-color 0.2s ease;
    }

    .member-modal-card:hover {
        border-color: #6ee7b7;
        transform: translateY(-2px);
    }

    .member-avatar-img {
        width: 68px;
        height: 68px;
        object-fit: cover;
        border-radius: 14px;
        border: 2px solid #d1fae5;
        flex-shrink: 0;
        background-color: #f1f5f9;
    }


    /* ================= SECTION: รายชื่อติดต่อคนโปรด (MY FAVORITE CONTACTS) ================= */
    .fav-section-wrap {
        background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
        padding: 15px 0 40px 0;
        /* ลดตัวเลขแรกจาก 50px เหลือ 15px */
        margin-top: -20px;
        /* ดึงขึ้นไปชิดส่วนการ์ดด้านบนมากขึ้น (ปรับเลขได้ตามความชอบ) */
        border-bottom: 1px solid #e2e8f0;
    }

    .fav-header-badge {
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        color: #92400e;
        border: 1px solid #fcd34d;
        font-weight: 600;
        padding: 5px 14px;
        border-radius: 50px;
        font-size: 0.82rem;
    }

    .fav-contact-card {
        background: linear-gradient(145deg, #ffffff 0%, #f0fdf4 65%, #dcfce7 100%);
        border-radius: 22px;
        border: 1px solid #a7f3d0;
        box-shadow: 0 10px 25px rgba(6, 78, 59, 0.08);
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        position: relative;
        height: 100%;
        width: 100%;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .fav-contact-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 36px rgba(5, 150, 105, 0.18);
        border-color: #34d399;
    }

    .fav-card-top-banner {
        background: linear-gradient(135deg, #022c22 0%, #064e3b 55%, #059669 100%);
        height: 54px;
        width: 100%;
        position: relative;
        flex-shrink: 0;
    }

    .fav-card-top-banner::after {
        content: '';
        position: absolute;
        top: -20px;
        right: -20px;
        width: 90px;
        height: 90px;
        border-radius: 50%;
        background: rgba(110, 231, 183, 0.15);
        pointer-events: none;
    }

    .btn-remove-fav {
        position: absolute;
        top: 12px;
        right: 12px;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, 0.25);
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(6px);
        color: #facc15;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
        z-index: 3;
    }

    .btn-remove-fav:hover {
        background: #ef4444;
        border-color: #ef4444;
        color: #ffffff;
        transform: scale(1.12);
    }

    .fav-card-inner {
        padding: 0 20px 20px 20px;
        margin-top: -32px;
        position: relative;
        z-index: 2;
        display: flex;
        flex-direction: column;
        flex: 1 1 auto;
        min-width: 0;
    }

    .fav-avatar-wrap {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        margin-bottom: 12px;
    }

    .fav-avatar {
        width: 68px;
        height: 68px;
        border-radius: 18px;
        object-fit: cover;
        border: 3px solid #ffffff;
        box-shadow: 0 6px 16px rgba(6, 78, 59, 0.2);
        background-color: #ffffff;
        flex-shrink: 0;
    }

    .fav-div-tag {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(4px);
        color: #064e3b;
        border: 1px solid #a7f3d0;
        font-size: 0.75rem;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 50px;
        max-width: calc(100% - 78px);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
    }

    /* ชื่อภาษาไทย */
    .fav-name-th {
        font-size: 1.08rem;
        font-weight: 700;
        color: #064e3b;
        line-height: 1.3;
        margin-bottom: 2px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* ชื่อภาษาอังกฤษ */
    .fav-name-en {
        font-size: 0.96rem;
        font-weight: 700;
        color: #047857;
        line-height: 1.3;
        margin-bottom: 6px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .fav-position-text {
        font-size: 0.85rem;
        color: #475569;
        font-weight: 500;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-bottom: 14px;
    }

    .fav-contact-footer {
        margin-top: auto;
        background: rgba(255, 255, 255, 0.78);
        border: 1px solid rgba(167, 243, 208, 0.7);
        border-radius: 14px;
        padding: 12px 14px;
    }

    .fav-phone-pill {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: linear-gradient(135deg, #059669 0%, #10b981 100%);
        color: #ffffff;
        font-weight: 700;
        font-size: 0.92rem;
        padding: 7px 14px;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.28);
        margin-bottom: 8px;
        width: 100%;
    }

    .fav-phone-pill span {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .fav-phone-pill:hover {
        background: linear-gradient(135deg, #064e3b 0%, #047857 100%);
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(6, 78, 59, 0.35);
    }

    .fav-meta-line {
        font-size: 0.8rem;
        color: #475569;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        display: block;
    }
</style>


<div class="container py-2">

    <!-- ================= หมวดการค้นหาข้อมูล (01, 02, 03 ภาพจริงคุณภาพสูง) ================= -->
    <div class="row mb-0">

        <!-- การ์ด 01: ค้นหาตามชื่อ-นามสกุล (ภาพบุคลากร/แท็บเล็ตเช็กโปรไฟล์) -->
        <div class="col-md-4 col-sm-12 mb-4">
            <a href="{{ url('/sn') }}" class="dss-portal-card">
                <div class="card-thumb-wrap">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=700&q=80"
                        alt="ค้นหาตามชื่อ-นามสกุล">
                </div>
                <div class="card-body-content">
                    <div class="card-meta-header">
                        <span class="card-number">01</span>
                        <div class="card-icon-badge badge-blue">
                            <i class="fa fa-id-card-o"></i>
                        </div>
                    </div>
                    <h3 class="card-main-title">ตามชื่อ-นามสกุล</h3>
                    <p class="card-sub-desc">ค้นหาข้อมูลเบอร์โต๊ะทำงาน สังกัดสำนัก/กอง และอีเมลบุคลากร วศ.</p>
                </div>
            </a>
        </div>

        <!-- การ์ด 02: ค้นหาตามเบอร์โทรศัพท์ (ภาพโทรศัพท์และโต๊ะทำงานสำนักงาน) -->
        <div class="col-md-4 col-sm-12 mb-4">
            <a href="{{ url('/st') }}" class="dss-portal-card">
                <div class="card-thumb-wrap">
                    <img src="https://images.unsplash.com/photo-1596524430615-b46475ddff6e?auto=format&fit=crop&w=700&q=80"
                        alt="ค้นหาตามเบอร์โทร">
                </div>
                <div class="card-body-content">
                    <div class="card-meta-header">
                        <span class="card-number">02</span>
                        <div class="card-icon-badge badge-emerald">
                            <i class="fa fa-phone"></i>
                        </div>
                    </div>
                    <h3 class="card-main-title">ตามเบอร์โทรศัพท์</h3>
                    <p class="card-sub-desc">ค้นหาข้อมูลผู้รับสายและเจ้าหน้าที่ด้วยเบอร์ต่อภายใน หรือเบอร์โทรตรง</p>
                </div>
            </a>
        </div>

        <!-- การ์ด 03: ค้นหาตามโครงสร้างองค์กร (ภาพทีมงานวางแผนผังโครงสร้าง) -->
        <div class="col-md-4 col-sm-12 mb-4">
            <a href="{{ url('/so') }}" class="dss-portal-card">
                <div class="card-thumb-wrap">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=700&q=80"
                        alt="ค้นหาตามโครงสร้าง">
                </div>
                <div class="card-body-content">
                    <div class="card-meta-header">
                        <span class="card-number">03</span>
                        <div class="card-icon-badge badge-purple">
                            <i class="fa fa-sitemap"></i>
                        </div>
                    </div>
                    <h3 class="card-main-title">ตามโครงสร้างองค์กร</h3>
                    <p class="card-sub-desc">ค้นหารายชื่อเจ้าหน้าที่จำแนกตามโครงสร้างกอง กลุ่มงาน และฝ่ายสังกัด</p>
                </div>
            </a>
        </div>

    </div>

    {{-- <!-- แถบแจ้งเตือนแก้ไขข้อมูลส่วนตัว -->
    <div class="edit-callout-box d-flex flex-column flex-md-row justify-content-between align-items-center mb-2">
        <div class="mb-3 mb-md-0 text-center text-md-left">
            <h5 class="font-weight-bold text-danger mb-1">
                <i class="fa fa-pencil-square-o mr-1"></i> ต้องการปรับปรุงหรือแก้ไขข้อมูลส่วนตัว?
            </h5>
            <p class="text-muted small mb-0">ท่านสามารถแก้ไขเบอร์โทรศัพท์ อีเมล
                และสถานที่ปฏิบัติงานให้เป็นปัจจุบันได้ด้วยตนเอง
            </p>
        </div>
        <a href="{{ url('/announcement') }}" class="btn btn-danger rounded-pill px-4 py-2 font-weight-bold shadow-sm">
            แก้ไขข้อมูลส่วนตัว <i class="fa fa-chevron-right ml-1"></i>
        </a>
    </div> --}}

</div>


<section class="fav-section-wrap" id="favoriteContactsSection" style="display: none;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap mb-4" style="gap: 10px;">
            <div>
                <span class="fav-header-badge d-inline-block mb-1">
                    <i class="fa fa-star text-warning mr-1"></i> QUICK CONTACTS
                </span>
                <h3 class="font-weight-bold mb-0" style="color: #064e3b;">
                    รายชื่อติดต่อคนโปรดของฉัน <span class="badge badge-warning text-dark rounded-pill ml-1"
                        id="favCountBadge">0</span>
                </h3>
            </div>
            <button type="button" class="btn btn-sm btn-outline-danger rounded-pill px-3" id="btnClearAllFavs">
                <i class="fa fa-trash-o mr-1"></i> ล้างคนโปรดทั้งหมด
            </button>
        </div>

        <div class="row" id="favoriteCardsContainer">
            <!-- การ์ดรายชื่อคนโปรดจะถูกแสดงผลที่นี่อัตโนมัติ -->
        </div>
    </div>
</section>



<!-- ================= ส่วนสถิติข้อมูลบุคลากรแบบ FULL-WIDTH เต็มจอ 100vw ================= -->
<div class="stat-fullwidth-wrapper mb-0">
    <div class="container position-relative" style="z-index: 2;">

        <!-- หัวข้อ Dashboard สถิติ -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-5">
            <div class="mb-3 mb-md-0 text-center text-md-left">
                <span class="badge badge-pill px-3 py-1 mb-2"
                    style="background: rgba(52, 211, 153, 0.15); color: #6ee7b7; border: 1px solid rgba(52, 211, 153, 0.3);">
                    <span class="live-pulse-dot"></span> DSS PERSONNEL ANALYTICS DASHBOARD
                </span>
                <h2 class="font-weight-bold text-white mb-1">สถิติข้อมูลจำนวนบุคลากร วศ.</h2>
                <p class="text-white-50 mb-0">ข้อมูลกำลังพลจำแนกตามสถานะการปฏิบัติงาน เชื่อมต่อระบบ Back Office
                    อัตโนมัติ</p>
            </div>

            <!-- กล่องแสดงวันเวลาดิจิทัล -->
            <div class="px-4 py-2 rounded-pill text-white-50 small shadow-sm text-center"
                style="background: rgba(0, 0, 0, 0.35); border: 1px solid rgba(255, 255, 255, 0.12);">
                <div id="clockbox"></div>
            </div>
        </div>

        <!-- แถวที่ 1: ภาพรวมบุคลากรทั้งหมด และ ข้าราชการ -->
        <div class="row mb-4">
            <div class="col-lg-6 mb-3 mb-lg-0">
                <div class="glass-stat-card glass-stat-hero">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="text-uppercase small font-weight-bold mb-1"
                                style="color: #6ee7b7; letter-spacing: 0.5px;">
                                รวมบุคลากร วศ. ทั้งหมด
                            </div>
                            <div class="d-flex align-items-baseline">
                                <span class="digital-number stat-counter" data-target="{{ $pall }}">0</span>
                                <span class="ml-2 text-white-50">คน</span>
                            </div>
                        </div>
                        <div class="stat-neon-icon neon-emerald">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                    <div class="digital-progress">
                        <div class="digital-progress-bar"
                            style="width: 100%; background: linear-gradient(90deg, #10b981, #6ee7b7);"></div>
                    </div>
                    <div class="d-flex justify-content-between text-white-50 small mt-2">
                        <span>ฐานข้อมูลกำลังพลรวม</span>
                        <span class="text-white font-weight-bold">100%</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                @php $pct1 = $pall > 0 ? round(($p1 / $pall) * 100, 1) : 0; @endphp
                <div class="glass-stat-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="text-uppercase small font-weight-bold mb-1"
                                style="color: #67e8f9; letter-spacing: 0.5px;">
                                ข้าราชการ
                            </div>
                            <div class="d-flex align-items-baseline">
                                <span class="digital-number stat-counter" data-target="{{ $p1 }}">0</span>
                                <span class="ml-2 text-white-50">คน</span>
                            </div>
                        </div>
                        <div class="stat-neon-icon neon-cyan">
                            <i class="fa fa-id-badge"></i>
                        </div>
                    </div>
                    <div class="digital-progress">
                        <div class="digital-progress-bar"
                            style="width: {{ $pct1 }}%; background: linear-gradient(90deg, #0284c7, #67e8f9);">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between text-white-50 small mt-2">
                        <span>สัดส่วนต่อบุคลากรทั้งหมด</span>
                        <span class="text-info font-weight-bold">{{ $pct1 }}%</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- แถวที่ 2: ลูกจ้างประจำ, พนักงานราชการ, จ้างเหมาบริการ -->
        <div class="row">
            <div class="col-md-4 mb-3 mb-md-0">
                @php $pct2 = $pall > 0 ? round(($p2 / $pall) * 100, 1) : 0; @endphp
                <div class="glass-stat-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="small font-weight-bold mb-1" style="color: #fcd34d;">ลูกจ้างประจำ</div>
                            <div class="d-flex align-items-baseline">
                                <span class="digital-number stat-counter" style="font-size: 2rem;"
                                    data-target="{{ $p2 }}">0</span>
                                <span class="ml-2 text-white-50 small">คน</span>
                            </div>
                        </div>
                        <div class="stat-neon-icon neon-amber">
                            <i class="fa fa-user-circle"></i>
                        </div>
                    </div>
                    <div class="digital-progress">
                        <div class="digital-progress-bar"
                            style="width: {{ $pct2 }}%; background: linear-gradient(90deg, #d97706, #fcd34d);">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between text-white-50 small mt-2">
                        <span>สัดส่วน</span>
                        <span class="text-warning font-weight-bold">{{ $pct2 }}%</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3 mb-md-0">
                @php $pct4 = $pall > 0 ? round(($p4 / $pall) * 100, 1) : 0; @endphp
                <div class="glass-stat-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="small font-weight-bold mb-1" style="color: #5eead4;">พนักงานราชการ</div>
                            <div class="d-flex align-items-baseline">
                                <span class="digital-number stat-counter" style="font-size: 2rem;"
                                    data-target="{{ $p4 }}">0</span>
                                <span class="ml-2 text-white-50 small">คน</span>
                            </div>
                        </div>
                        <div class="stat-neon-icon neon-teal">
                            <i class="fa fa-check-square-o"></i>
                        </div>
                    </div>
                    <div class="digital-progress">
                        <div class="digital-progress-bar"
                            style="width: {{ $pct4 }}%; background: linear-gradient(90deg, #0d9488, #5eead4);">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between text-white-50 small mt-2">
                        <span>สัดส่วน</span>
                        <span class="font-weight-bold" style="color: #5eead4;">{{ $pct4 }}%</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                @php $pct3 = $pall > 0 ? round(($p3 / $pall) * 100, 1) : 0; @endphp
                <div class="glass-stat-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="small font-weight-bold mb-1" style="color: #a5b4fc;">จ้างเหมาบริการ</div>
                            <div class="d-flex align-items-baseline">
                                <span class="digital-number stat-counter" style="font-size: 2rem;"
                                    data-target="{{ $p3 }}">0</span>
                                <span class="ml-2 text-white-50 small">คน</span>
                            </div>
                        </div>
                        <div class="stat-neon-icon neon-indigo">
                            <i class="fa fa-briefcase"></i>
                        </div>
                    </div>
                    <div class="digital-progress">
                        <div class="digital-progress-bar"
                            style="width: {{ $pct3 }}%; background: linear-gradient(90deg, #4f46e5, #a5b4fc);">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between text-white-50 small mt-2">
                        <span>สัดส่วน</span>
                        <span class="font-weight-bold" style="color: #a5b4fc;">{{ $pct3 }}%</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



{{--  ================= SECTION: แผนผังโครงสร้างองค์กรแบบโต้ตอบ (DSS ORG CHART) ================= --}}
<section class="org-chart-section" id="orgStructureSection">
    <div class="container">

        <!-- หัวข้อ Section -->
        <div class="text-center mb-4">
            <span class="badge badge-pill px-3 py-1 mb-2"
                style="background-color: #d1fae5; color: #064e3b; font-weight: 600;">
                <i class="fa fa-sitemap mr-1"></i> ORGANIZATION STRUCTURE
            </span>
            <h2 class="font-weight-bold" style="color: #064e3b;">แผนผังโครงสร้างและจำนวนบุคลากร</h2>
            <p class="text-muted small mb-0">คลิกที่ชื่อหน่วยงาน (กอง/สำนัก) เพื่อดูกลุ่มงานย่อย
                และคลิกที่กลุ่มงานเพื่อดูรายชื่อบุคลากร (ไม่รวมจ้างเหมา)</p>
        </div>

        <!-- กล่อง Root ด้านบนสุด + สรุปยอดรวมทั้งกรม -->
        <div class="text-center">
            <div class="org-root-node">
                <div class="d-flex align-items-center mb-1">
                    <h4 class="font-weight-bold mb-0 text-white">กรมวิทยาศาสตร์บริการ (วศ.)</h4>
                </div>
                <div class="small mb-2" style="color: #a7f3d0;">Department of Science Service (DSS)</div>
                <div id="orgGlobalSummary" class="d-flex flex-wrap justify-content-center align-items-center"
                    style="gap: 8px;">
                    <span class="badge badge-light text-dark px-3 py-1 rounded-pill">
                        <i class="fa fa-spinner fa-spin mr-1"></i> กำลังประมวลผลโครงสร้าง...
                    </span>
                </div>
            </div>
            <div class="org-trunk-line"></div>
            <div class="org-horizontal-bar d-none d-md-block"></div>
        </div>

        <!-- แถบเครื่องมือค้นหาหน่วยงาน + ปุ่มขยาย/ยุบทั้งหมด + ปุ่มรีเฟรช Cache -->
        <div class="row justify-content-between align-items-center mb-4">
            <div class="col-md-5 mb-2 mb-md-0">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white border-right-0"
                            style="border-radius: 50px 0 0 50px; border-color: #cbd5e1;">
                            <i class="fa fa-search text-success"></i>
                        </span>
                    </div>
                    <input type="text" id="orgTreeFilterInput" class="form-control border-left-0"
                        style="border-radius: 0 50px 50px 0; border-color: #cbd5e1;"
                        placeholder="ค้นหาชื่อหน่วยงาน ตัวย่อ หรือชื่อภาษาอังกฤษ...">
                </div>
            </div>
            <div class="col-md-7 text-md-right text-center">
                <span id="cacheStatusText" class="text-muted small mr-2 d-none d-lg-inline"></span>
                <button type="button" class="btn btn-sm btn-outline-success rounded-pill px-3 mr-1"
                    id="btnExpandAllOrg">
                    <i class="fa fa-plus-square-o mr-1"></i> ขยายทั้งหมด
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3 mr-1"
                    id="btnCollapseAllOrg">
                    <i class="fa fa-minus-square-o mr-1"></i> ยุบทั้งหมด
                </button>
                <button type="button" class="btn btn-sm btn-light border rounded-pill px-3" id="btnForceRefreshOrg"
                    title="อัปเดตข้อมูลล่าสุดจากเซิร์ฟเวอร์ทันที">
                    <i class="fa fa-refresh text-success"></i>
                </button>
            </div>
        </div>

        <!-- พื้นที่แสดงการ์ดแผนผัง Division -> Sub-Division -->
        <div class="row" id="orgTreeContainer">
            <div class="col-12 text-center py-5 text-muted">
                <i class="fa fa-circle-o-notch fa-spin fa-2x text-success mb-2"></i>
                <p>กำลังโหลดข้อมูลโครงสร้างจากระบบ...</p>
            </div>
        </div>

    </div>
</section>

<!-- Modal แสดงรายชื่อบุคลากรเมื่อคลิกที่ Sub-division -->
<div class="modal fade" id="subDivisionPeopleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-wide modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content border-0" style="border-radius: 20px; overflow: hidden;">
            <div class="modal-header text-white" style="background-color: #064e3b;">
                <div>
                    <span class="badge badge-warning text-dark mb-1" id="modalDivTitle">กอง/สำนัก</span>
                    <h5 class="modal-title font-weight-bold mb-0" id="modalSubDivTitle">ชื่อกลุ่มงาน</h5>
                    <div class="small mt-1" style="color: #a7f3d0;" id="modalSubDivEngTitle"></div>
                </div>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-3 p-md-4 bg-light" id="modalPeopleListBody">
                <!-- รายชื่อบุคลากรจะถูกเติมที่นี่ -->
            </div>
            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-secondary rounded-pill px-4"
                    data-dismiss="modal">ปิดหน้าต่าง</button>
            </div>
        </div>
    </div>
</div>


<!-- ส่วนภาพดิจิทัลคั่นก่อนเข้าสู่ Footer -->
<section class="pre-footer-digital">
    <div class="pre-footer-circuit"></div>
    <div class="container position-relative" style="z-index: 2;">
        <div class="digital-promo-card">
            <div class="row align-items-center">

                <!-- ข้อความเชิญชวนใช้งานดิจิทัล -->
                <div class="col-lg-8 text-center text-lg-left mb-3 mb-lg-0">
                    <span class="badge badge-success px-3 py-1 rounded-pill mb-2" style="background-color: #059669;">
                        <i class="fa fa-qrcode mr-1"></i> DSS SMART DIRECTORY
                    </span>
                    <h4 class="font-weight-bold mb-2" style="color: #064e3b;">
                        เชื่อมต่อทุกการติดต่อภายใน วศ. ในรูปแบบดิจิทัล
                    </h4>
                    <p class="text-muted mb-0" style="font-size: 0.95rem;">
                        เข้าถึงข้อมูลบุคลากรได้ทุกที่ทุกเวลาผ่านสมาร์ตโฟนและคอมพิวเตอร์
                    </p>
                </div>

                <!-- รูปกราฟิก Vector ดิจิทัล (QR Code & Digital Network) -->
                <div class="col-lg-4 text-center">
                    <svg class="digital-svg-art" viewBox="0 0 220 140" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <!-- วงแหวนดิจิทัลด้านหลัง -->
                        <circle cx="110" cy="70" r="56" stroke="#34d399" stroke-width="2"
                            stroke-dasharray="6 6" />
                        <circle cx="110" cy="70" r="44" fill="#d1fae5" fill-opacity="0.6" />

                        <!-- กรอบการ์ด QR Code ดิจิทัล -->
                        <rect x="78" y="28" width="64" height="84" rx="12" fill="#ffffff"
                            stroke="#059669" stroke-width="3" />
                        <!-- สัญลักษณ์ QR Code -->
                        <rect x="92" y="42" width="14" height="14" rx="3" stroke="#047857"
                            stroke-width="2.5" />
                        <rect x="114" y="42" width="14" height="14" rx="3" stroke="#047857"
                            stroke-width="2.5" />
                        <rect x="92" y="64" width="14" height="14" rx="3" stroke="#047857"
                            stroke-width="2.5" />
                        <rect x="114" y="64" width="6" height="6" fill="#10b981" />
                        <rect x="122" y="72" width="6" height="6" fill="#047857" />
                        <!-- แถบข้อมูลด้านล่างการ์ด -->
                        <rect x="92" y="88" width="36" height="5" rx="2.5" fill="#34d399" />
                        <rect x="98" y="97" width="24" height="4" rx="2" fill="#a7f3d0" />

                        <!-- จุด Node เชื่อมโยงซ้าย-ขวา -->
                        <circle cx="42" cy="50" r="12" fill="#ffffff" stroke="#10b981"
                            stroke-width="2.5" />
                        <path d="M54 50H78" stroke="#10b981" stroke-width="2" stroke-dasharray="4 3" />
                        <circle cx="42" cy="50" r="4" fill="#059669" />

                        <circle cx="178" cy="90" r="12" fill="#ffffff" stroke="#10b981"
                            stroke-width="2.5" />
                        <path d="M142 90H166" stroke="#10b981" stroke-width="2" stroke-dasharray="4 3" />
                        <circle cx="178" cy="90" r="4" fill="#059669" />
                    </svg>
                </div>

            </div>
        </div>
    </div>
</section>



<!-- JavaScript นาฬิกา Real-time + ตัวเลขนับขึ้นแบบแอนิเมชัน -->
<script type="text/javascript">
    var tday = ["อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์"];
    var tmonth = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน",
        "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
    ];

    function GetClock() {
        var d = new Date();
        var nday = d.getDay();
        var nmonth = d.getMonth();
        var ndate = d.getDate();
        var nyear = d.getFullYear() + 543;
        var nhour = d.getHours();
        var nmin = d.getMinutes();
        var nsec = d.getSeconds();

        if (nmin <= 9) nmin = "0" + nmin;
        if (nsec <= 9) nsec = "0" + nsec;

        var clockElem = document.getElementById('clockbox');
        if (clockElem) {
            clockElem.innerHTML = "<i class='fa fa-clock-o mr-1 text-success'></i> ข้อมูล ณ วัน" + tday[nday] + "ที่ " +
                ndate + " " + tmonth[nmonth] + " " + nyear + " • " + nhour + ":" + nmin + ":" + nsec + " น.";
        }
        setTimeout(GetClock, 1000);
    }

    function animateCounters() {
        var counters = document.querySelectorAll('.stat-counter');
        counters.forEach(function(counter) {
            var target = +counter.getAttribute('data-target');
            var duration = 1200;
            var stepTime = 20;
            var totalSteps = duration / stepTime;
            var increment = target / totalSteps;
            var current = 0;

            var timer = setInterval(function() {
                current += increment;
                if (current >= target) {
                    counter.innerText = target.toLocaleString();
                    clearInterval(timer);
                } else {
                    counter.innerText = Math.floor(current).toLocaleString();
                }
            }, stepTime);
        });
    }

    if (document.readyState === 'complete') {
        GetClock();
        animateCounters();
    } else {
        window.addEventListener('load', function() {
            GetClock();
            animateCounters();
        });
    }
</script>


<!-- Script ดึง API /contact/data-sn/ และสร้างแผนผังโครงสร้างองค์กร -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var empApiUrl = "{{ url('/data-sn') }}";
        var orgApiUrl = "{{ url('/api/organizationNowAll') }}";

        // ตั้งค่า Cache 24 ชั่วโมง (1 วัน)
        var CACHE_KEY = "dss_org_chart_cache_v1";
        var CACHE_TTL_MS = 24 * 60 * 60 * 1000; // 86,400,000 มิลลิวินาที = 1 วัน

        var orgGroupedData = {};
        var orgLookupMap = {}; // เก็บ Map สำหรับค้นหาข้อมูลองค์กรจาก org_name

        // ฟังก์ชันกำหนดสีป้ายตามสถานะบุคลากร
        function getStatusBadgeClass(typeName) {
            var t = (typeName || '').trim();
            if (t.indexOf('ข้าราชการ') !== -1) return 'status-civil';
            if (t.indexOf('พนักงานราชการ') !== -1) return 'status-gov-emp';
            if (t.indexOf('ลูกจ้างประจำ') !== -1) return 'status-perm-emp';
            if (t.indexOf('พนักงานกระทรวง') !== -1 || t.indexOf('พกส') !== -1) return 'status-ministry';
            return 'status-other';
        }

        // ฟังก์ชันแปลงค่า image จาก API ให้ชี้ไปที่ http://hr-expertise.dss.local/storage/images/profile/
        function resolveEmployeeImage(rawImg) {
            var defaultImg = "{{ asset('style-index/images/nophoto.png') }}";
            var profileBaseUrl = "http://hr-expertise.dss.local/storage/images/profile/";
            if (!rawImg) return defaultImg;

            var val = String(rawImg).trim();
            if (val === '' || val === 'null' || val === 'nophoto.png') return defaultImg;

            if (val.indexOf('<img') !== -1) {
                var match = val.match(/src=["']([^"']+)["']/i);
                if (match && match[1]) {
                    var extracted = match[1];
                    if (extracted.indexOf('http://') === 0 || extracted.indexOf('https://') === 0)
                        return extracted;
                    return profileBaseUrl + extracted.split('/').pop();
                }
                return defaultImg;
            }

            if (val.indexOf('http://') === 0 || val.indexOf('https://') === 0) return val;
            return profileBaseUrl + val.split('/').pop();
        }

        // ฟังก์ชันจัดรูปแบบชื่อองค์กร: org_name (org_abbr) และ org_name_eng (org_abbr_eng)
        function formatOrgDisplay(rawName) {
            var cleanName = (rawName || '').trim();
            var info = orgLookupMap[cleanName];

            if (!info) {
                return {
                    thFull: cleanName,
                    engFull: '',
                    searchKeywords: cleanName.toLowerCase()
                };
            }

            // ภาษาไทย: org_name (org_abbr)
            var thText = info.org_name || cleanName;
            if (info.org_abbr && info.org_abbr.trim() !== '') {
                thText += ' (' + info.org_abbr.trim() + ')';
            }

            // ภาษาอังกฤษ: org_name_eng (org_abbr_eng)
            var engText = '';
            if (info.org_name_eng && info.org_name_eng.trim() !== '') {
                engText = info.org_name_eng.trim();
                if (info.org_abbr_eng && info.org_abbr_eng.trim() !== '') {
                    engText += ' (' + info.org_abbr_eng.trim() + ')';
                }
            }

            return {
                thFull: thText,
                engFull: engText,
                searchKeywords: (thText + ' ' + engText).toLowerCase()
            };
        }

        // ฟังก์ชันหลักสำหรับโหลดข้อมูล (ตรวจ Cache 1 วันก่อน ถ้าหมดอายุค่อยเรียก API)
        function loadOrgChartData(forceRefresh) {
            if (!forceRefresh) {
                try {
                    var cachedRaw = localStorage.getItem(CACHE_KEY);
                    if (cachedRaw) {
                        var cachedObj = JSON.parse(cachedRaw);
                        var now = Date.now();
                        if (cachedObj && cachedObj.timestamp && (now - cachedObj.timestamp < CACHE_TTL_MS)) {
                            // ใช้ข้อมูลจาก Cache ทันที (ไม่ต้องรอโหลด API)
                            updateCacheStatusLabel(cachedObj.timestamp);
                            processRawDatasets(cachedObj.employees, cachedObj.organizations);
                            return;
                        }
                    }
                } catch (e) {
                    console.warn('Cache read error:', e);
                }
            }

            // แสดงสถานะกำลังโหลดจาก API
            document.getElementById('orgTreeContainer').innerHTML =
                '<div class="col-12 text-center py-5 text-muted">' +
                '<i class="fa fa-circle-o-notch fa-spin fa-2x text-success mb-2"></i>' +
                '<p>กำลังดึงข้อมูลโครงสร้างล่าสุดจากระบบ...</p>' +
                '</div>';

            // เรียก API ทั้ง 2 เส้นพร้อมกันด้วย Promise.all
            Promise.all([
                    fetch(empApiUrl + "?length=-1&start=0").then(function(r) {
                        return r.json();
                    }),
                    fetch(orgApiUrl).then(function(r) {
                        return r.json();
                    })
                ])
                .then(function(results) {
                    var empRes = results[0];
                    var orgRes = results[1];

                    var empList = Array.isArray(empRes) ? empRes : (empRes.data || []);
                    var orgList = Array.isArray(orgRes) ? orgRes : (orgRes.data || []);

                    // บันทึกลง localStorage เก็บไว้ 1 วัน
                    var nowTs = Date.now();
                    try {
                        localStorage.setItem(CACHE_KEY, JSON.stringify({
                            timestamp: nowTs,
                            employees: empList,
                            organizations: orgList
                        }));
                    } catch (e) {
                        console.warn('LocalStorage quota exceeded:', e);
                    }

                    updateCacheStatusLabel(nowTs);
                    processRawDatasets(empList, orgList);
                })
                .catch(function(err) {
                    console.error('Error loading API:', err);
                    document.getElementById('orgTreeContainer').innerHTML =
                        '<div class="col-12 text-center text-danger py-4">ไม่สามารถโหลดข้อมูลโครงสร้างองค์กรได้ในขณะนี้</div>';
                });
        }

        function updateCacheStatusLabel(timestamp) {
            var el = document.getElementById('cacheStatusText');
            if (!el) return;
            var d = new Date(timestamp);
            var timeStr = d.toLocaleTimeString('th-TH', {
                hour: '2-digit',
                minute: '2-digit'
            });
            el.innerHTML = '<i class="fa fa-clock-o text-success"></i> อัปเดตเมื่อ ' + timeStr + ' น.';
        }

        // ประมวลผลข้อมูล Organization Map + ข้อมูลบุคลากร
        function processRawDatasets(rawEmployees, rawOrganizations) {
            // 1. สร้าง Map ตารางองค์กร (Key = org_name)
            orgLookupMap = {};
            rawOrganizations.forEach(function(org) {
                if (org && org.org_name) {
                    var key = org.org_name.trim();
                    // เก็บรายการที่ active_flag == "1" เป็นหลัก
                    if (!orgLookupMap[key] || String(org.active_flag) === '1') {
                        orgLookupMap[key] = org;
                    }
                }
            });

            // 2. กรองบุคลากร: ตัดสถานะ "จ้างเหมา" ออกทั้งหมด
            var validEmployees = rawEmployees.filter(function(emp) {
                var empType = (emp.emp_type_name || '').trim();
                return empType !== '' && empType.indexOf('จ้างเหมา') === -1;
            });

            buildOrgTreeData(validEmployees);
            renderOrgChart();
        }

        // จัดกลุ่มข้อมูล: Division -> Sub-Division และนับแยกตาม emp_type_name
        function buildOrgTreeData(employees) {
            var globalTypeCounts = {};
            orgGroupedData = {};

            employees.forEach(function(emp) {
                var divName = (emp.division || 'ไม่ระบุหน่วยงาน').trim();
                var subName = (emp.sub_division && emp.sub_division.trim() !== '') ? emp.sub_division
                    .trim() : 'ส่วนกลาง';
                var empType = (emp.emp_type_name || 'ไม่ระบุสถานะ').trim();

                globalTypeCounts[empType] = (globalTypeCounts[empType] || 0) + 1;

                if (!orgGroupedData[divName]) {
                    orgGroupedData[divName] = {
                        rawName: divName,
                        display: formatOrgDisplay(divName),
                        total: 0,
                        typeCounts: {},
                        subDivisions: {}
                    };
                }
                orgGroupedData[divName].total++;
                orgGroupedData[divName].typeCounts[empType] = (orgGroupedData[divName].typeCounts[
                    empType] || 0) + 1;

                if (!orgGroupedData[divName].subDivisions[subName]) {
                    orgGroupedData[divName].subDivisions[subName] = {
                        rawName: subName,
                        display: formatOrgDisplay(subName),
                        total: 0,
                        typeCounts: {},
                        members: []
                    };
                }
                orgGroupedData[divName].subDivisions[subName].total++;
                orgGroupedData[divName].subDivisions[subName].typeCounts[empType] =
                    (orgGroupedData[divName].subDivisions[subName].typeCounts[empType] || 0) + 1;
                orgGroupedData[divName].subDivisions[subName].members.push(emp);
            });

            // แสดงผลสรุปยอดรวมทั้งกรมด้านบนสุด
            var summaryHtml =
                '<span class="badge badge-warning text-dark px-3 py-1 rounded-pill font-weight-bold">' +
                '<i class="fa fa-users mr-1"></i> รวมทั้งหมด ' + employees.length.toLocaleString() +
                ' คน</span>';

            Object.keys(globalTypeCounts).forEach(function(type) {
                var pillClass = getStatusBadgeClass(type);
                summaryHtml += '<span class="status-pill-base ' + pillClass + '">' +
                    type + ' : <strong>' + globalTypeCounts[type].toLocaleString() + '</strong></span>';
            });
            document.getElementById('orgGlobalSummary').innerHTML = summaryHtml;
        }

        // วาดการ์ด Division และ Sub-Division ลงบนหน้าจอ
        function renderOrgChart() {
            var container = document.getElementById('orgTreeContainer');
            var divKeys = Object.keys(orgGroupedData);

            if (divKeys.length === 0) {
                container.innerHTML =
                    '<div class="col-12 text-center text-muted py-4">ไม่พบข้อมูลบุคลากร</div>';
                return;
            }

            var html = '';
            divKeys.forEach(function(divKey, idx) {
                var divObj = orgGroupedData[divKey];
                var subKeys = Object.keys(divObj.subDivisions);
                var combinedSearchKeywords = divObj.display.searchKeywords;

                var divTypeBadges = '';
                Object.keys(divObj.typeCounts).forEach(function(t) {
                    var pillClass = getStatusBadgeClass(t);
                    divTypeBadges += '<span class="status-pill-base ' + pillClass + '">' + t +
                        ' ' + divObj.typeCounts[t] + '</span>';
                });

                var subHtml = '';
                subKeys.forEach(function(subKey) {
                    var subObj = divObj.subDivisions[subKey];
                    combinedSearchKeywords += ' ' + subObj.display.searchKeywords;

                    var subTypeMini = '';
                    Object.keys(subObj.typeCounts).forEach(function(st) {
                        var pillClass = getStatusBadgeClass(st);
                        subTypeMini += '<span class="status-pill-base ' + pillClass +
                            '" style="font-size: 0.72rem; padding: 2px 8px;">' + st +
                            ' ' + subObj.typeCounts[st] + '</span>';
                    });

                    var subEngHtml = subObj.display.engFull ?
                        '<div class="subdivision-eng">' + escapeHtml(subObj.display.engFull) +
                        '</div>' :
                        '';

                    subHtml +=
                        '<div class="subdivision-item" data-div="' + escapeHtml(divKey) +
                        '" data-sub="' + escapeHtml(subKey) + '">' +
                        '<div class="d-flex justify-content-between align-items-start">' +
                        '<div>' +
                        '<div class="subdivision-name"><i class="fa fa-folder-open-o text-success mr-1"></i> ' +
                        escapeHtml(subObj.display.thFull) + '</div>' +
                        subEngHtml +
                        '</div>' +
                        '<span class="sub-count-tag ml-2 text-nowrap">' + subObj.total +
                        ' คน</span>' +
                        '</div>' +
                        '<div class="d-flex flex-wrap mt-1" style="gap: 5px;">' + subTypeMini +
                        '</div>' +
                        '</div>';
                });

                var divEngHtml = divObj.display.engFull ?
                    '<div class="division-eng-text">' + escapeHtml(divObj.display.engFull) + '</div>' :
                    '<div class="mb-2"></div>';

                html +=
                    '<div class="col-lg-6 mb-4 org-node-col" data-search="' + escapeHtml(
                        combinedSearchKeywords) + '">' +
                    '<div class="division-tree-card" id="divCard_' + idx + '">' +
                    '<div class="division-header-btn d-flex justify-content-between align-items-start" onclick="toggleOrgDivision(' +
                    idx + ')">' +
                    '<div class="pr-2">' +
                    '<div class="division-title-text">' +
                    '<i class="fa fa-building text-success mr-1"></i> ' + escapeHtml(divObj.display
                        .thFull) +
                    '</div>' +
                    divEngHtml +
                    '<div class="d-flex flex-wrap align-items-center" style="gap: 6px;">' +
                    '<span class="total-count-pill"><i class="fa fa-users"></i> ' + divObj.total +
                    ' คน</span>' +
                    '<span class="badge badge-light border text-muted rounded-pill">' + subKeys.length +
                    ' กลุ่มงาน</span>' +
                    divTypeBadges +
                    '</div>' +
                    '</div>' +
                    '<div class="toggle-chevron mt-1"><i class="fa fa-chevron-down"></i></div>' +
                    '</div>' +
                    '<div class="subdivision-list-wrap" id="subList_' + idx + '">' +
                    subHtml +
                    '</div>' +
                    '</div>' +
                    '</div>';
            });

            container.innerHTML = html;

            // ผูก Event คลิกที่ Sub-division เพื่อเปิดดูรายชื่อคนในกลุ่ม
            container.querySelectorAll('.subdivision-item').forEach(function(item) {
                item.addEventListener('click', function(e) {
                    e.stopPropagation();
                    var divName = this.getAttribute('data-div');
                    var subName = this.getAttribute('data-sub');
                    openSubDivisionModal(divName, subName);
                });
            });
        }

        // ฟังก์ชันเปิด/ปิดรายการ Sub-division
        window.toggleOrgDivision = function(idx) {
            var card = document.getElementById('divCard_' + idx);
            var subList = document.getElementById('subList_' + idx);
            if (!card || !subList) return;

            if (card.classList.contains('is-open')) {
                card.classList.remove('is-open');
                $(subList).slideUp(220);
            } else {
                card.classList.add('is-open');
                $(subList).slideDown(220);
            }
        };

        // ปุ่มขยายทั้งหมด / ยุบทั้งหมด / รีเฟรช Cache
        document.getElementById('btnExpandAllOrg').addEventListener('click', function() {
            document.querySelectorAll('.division-tree-card').forEach(function(card) {
                card.classList.add('is-open');
            });
            $('.subdivision-list-wrap').slideDown(220);
        });

        document.getElementById('btnCollapseAllOrg').addEventListener('click', function() {
            document.querySelectorAll('.division-tree-card').forEach(function(card) {
                card.classList.remove('is-open');
            });
            $('.subdivision-list-wrap').slideUp(220);
        });

        document.getElementById('btnForceRefreshOrg').addEventListener('click', function() {
            localStorage.removeItem(CACHE_KEY);
            loadOrgChartData(true);
        });

        // ช่องค้นหากรองชื่อกอง/สำนัก ตัวย่อ หรือชื่อภาษาอังกฤษ
        document.getElementById('orgTreeFilterInput').addEventListener('keyup', function() {
            var kw = this.value.toLowerCase().trim();
            document.querySelectorAll('.org-node-col').forEach(function(col) {
                var text = col.getAttribute('data-search') || '';
                if (text.indexOf(kw) !== -1) {
                    col.style.display = '';
                    if (kw.length > 0) {
                        var card = col.querySelector('.division-tree-card');
                        var sub = col.querySelector('.subdivision-list-wrap');
                        if (card && sub) {
                            card.classList.add('is-open');
                            sub.style.display = 'block';
                        }
                    }
                } else {
                    col.style.display = 'none';
                }
            });
        });

        // เปิด Modal แสดงรายชื่อบุคลากรใน Sub-division ที่คลิก
        function openSubDivisionModal(divName, subName) {
            var divObj = orgGroupedData[divName];
            var subObj = divObj && divObj.subDivisions[subName];
            if (!subObj) return;

            document.getElementById('modalDivTitle').textContent = divObj.display.thFull;
            document.getElementById('modalSubDivTitle').textContent = subObj.display.thFull + ' (' + subObj
                .total + ' คน)';
            document.getElementById('modalSubDivEngTitle').textContent = subObj.display.engFull || '';

            var defaultImg = "{{ asset('style-index/images/nophoto.png') }}";

            var listHtml = '<div class="row">';
            subObj.members.forEach(function(m) {
                var fullName = ((m.pfix_name || '') + (m.emp_name || '')).trim();
                var imgSrc = resolveEmployeeImage(m.image);
                var phone = (m.dss_phone && m.dss_phone.trim() !== '') ? m.dss_phone.trim() : '-';
                var email = (m.dss_mail && m.dss_mail.trim() !== '') ? m.dss_mail.trim() : '-';
                var location = (m.dss_location && m.dss_location.trim() !== '') ? m.dss_location
                    .trim() : '-';
                var statusClass = getStatusBadgeClass(m.emp_type_name);

                var emailHtml = (email !== '-') ?
                    '<a href="mailto:' + escapeHtml(email) +
                    '" class="text-primary text-decoration-none">' + escapeHtml(email) + '</a>' :
                    '<span class="text-muted">-</span>';

                listHtml +=
                    '<div class="col-md-6 mb-3">' +
                    '<div class="member-modal-card d-flex align-items-start h-100">' +
                    '<img src="' + imgSrc + '" onerror="this.onerror=null;this.src=\'' + defaultImg +
                    '\';" class="member-avatar-img mr-3" alt="' + escapeHtml(fullName) + '">' +
                    '<div class="flex-grow-1 overflow-hidden">' +
                    '<div class="font-weight-bold text-dark text-truncate" style="font-size: 1rem;">' +
                    escapeHtml(fullName) + '</div>' +
                    '<div class="small text-muted text-truncate mb-1">' + escapeHtml(m.position_view ||
                        '-') + '</div>' +
                    '<div class="mb-2">' +
                    '<span class="status-pill-base ' + statusClass +
                    '" style="font-size: 0.74rem; padding: 2px 10px;">' + escapeHtml(m.emp_type_name ||
                        '') + '</span>' +
                    '</div>' +
                    '<div class="small text-dark mb-1 text-truncate">' +
                    '<i class="fa fa-phone text-success mr-1" style="width: 14px;"></i> <strong>' +
                    escapeHtml(phone) + '</strong>' +
                    '</div>' +
                    '<div class="small mb-1 text-truncate">' +
                    '<i class="fa fa-envelope text-info mr-1" style="width: 14px;"></i> ' + emailHtml +
                    '</div>' +
                    '<div class="small text-muted text-truncate">' +
                    '<i class="fa fa-map-marker text-danger mr-1" style="width: 14px;"></i> ' +
                    escapeHtml(location) +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
            });
            listHtml += '</div>';

            document.getElementById('modalPeopleListBody').innerHTML = listHtml;
            $('#subDivisionPeopleModal').modal('show');
        }

        function escapeHtml(str) {
            return String(str || '')
                .replace(/&/g, '&')
                .replace(/</g, '<')
                .replace(/>/g, '>')
                .replace(/"/g, '"');
        }

        // เริ่มต้นทำงานทันที
        loadOrgChartData(false);
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var FAV_STORAGE_KEY = 'dss_favorite_contacts_v1';
        var defaultImg = "{{ asset('style-index/images/nophoto.png') }}";

        function getFavorites() {
            try {
                return JSON.parse(localStorage.getItem(FAV_STORAGE_KEY)) || [];
            } catch (e) {
                return [];
            }
        }

        function saveFavorites(list) {
            try {
                localStorage.setItem(FAV_STORAGE_KEY, JSON.stringify(list));
            } catch (e) {}
        }

        function escapeHtml(str) {
            return String(str || '')
                .replace(/&/g, '&')
                .replace(/</g, '<')
                .replace(/>/g, '>')
                .replace(/"/g, '"');
        }

        // แยกชื่อภาษาไทย และภาษาอังกฤษ พร้อมตัด Emp. ID หรือข้อมูลส่วนเกินออกทั้งหมด
        function parseCleanNames(item) {
            var clean = function(s) {
                return String(s || '')
                    .replace(/Emp\.?\s*ID\s*:?\s*[A-Za-z0-9_-]+/gi, '')
                    .replace(/\s+/g, ' ')
                    .trim();
            };

            var th = clean(item.name);
            var en = clean(item.engName);

            // กรณีข้อมูลเก่าใน localStorage เก็บชื่อไทย+อังกฤษติดกันใน field เดียว (เช่น "นางสาวภัทรวรินทร์ กล่อมจิตต์ MissPatravarint Klomjit")
            if (!en && th) {
                var engMatch = th.match(/((?:Mr\.?|Mrs\.?|Miss|Ms\.?|Dr\.?)\s*[A-Za-z][A-Za-z\s.-]*)$/i);
                if (engMatch) {
                    en = engMatch[1].trim();
                    th = th.substring(0, engMatch.index).trim();
                }
            }

            return {
                th: th,
                en: en
            };
        }

        window.removeFavoriteContact = function(key) {
            var list = getFavorites().filter(function(item) {
                return item.key !== key;
            });
            saveFavorites(list);
            renderFavoriteSection();
        };

        window.copyFavPhone = function(phoneText, el) {
            if (!phoneText || phoneText === '-') return;
            if (navigator.clipboard) {
                navigator.clipboard.writeText(phoneText);
            }
            var oldHtml = el.innerHTML;
            el.innerHTML = '<i class="fa fa-check"></i> <span>คัดลอกเบอร์แล้ว!</span>';
            el.style.background = 'linear-gradient(135deg, #022c22 0%, #064e3b 100%)';
            setTimeout(function() {
                el.innerHTML = oldHtml;
                el.style.background = '';
            }, 1400);
        };

        function renderFavoriteSection() {
            var section = document.getElementById('favoriteContactsSection');
            var container = document.getElementById('favoriteCardsContainer');
            var countBadge = document.getElementById('favCountBadge');
            if (!section || !container) return;

            var list = getFavorites();
            if (list.length === 0) {
                section.style.display = 'none';
                return;
            }

            section.style.display = 'block';
            if (countBadge) countBadge.textContent = list.length;

            var html = '';
            list.forEach(function(item) {
                var names = parseCleanNames(item);
                var imgSrc = item.image || defaultImg;
                var phone = (item.phone || '-').trim();
                var email = (item.email || '-').trim();
                var location = (item.location || '-').trim();
                var division = (item.division || '').trim();
                var position = (item.position || '-').trim();

                var divBadgeHtml = division ?
                    '<span class="fav-div-tag" title="' + escapeHtml(division) +
                    '"><i class="fa fa-building-o text-success mr-1"></i>' + escapeHtml(division) +
                    '</span>' :
                    '';

                var engNameHtml = names.en ?
                    '<div class="fav-name-en" title="' + escapeHtml(names.en) + '">' + escapeHtml(names
                        .en) + '</div>' :
                    '';

                var emailHtml = (email !== '-') ?
                    '<div class="fav-meta-line mb-1" title="' + escapeHtml(email) +
                    '"><i class="fa fa-envelope text-success mr-1"></i><a href="mailto:' + escapeHtml(
                        email) + '" class="text-dark">' + escapeHtml(email) + '</a></div>' :
                    '';

                html +=
                    '<div class="col-lg-4 col-md-6 mb-4">' +
                    '<div class="fav-contact-card">' +
                    '<div class="fav-card-top-banner"></div>' +
                    '<button type="button" class="btn-remove-fav" onclick="removeFavoriteContact(\'' +
                    escapeHtml(item.key) + '\')" title="นำออกจากคนโปรด">' +
                    '<i class="fa fa-star"></i>' +
                    '</button>' +
                    '<div class="fav-card-inner">' +
                    '<div class="fav-avatar-wrap">' +
                    '<img src="' + escapeHtml(imgSrc) + '" onerror="this.onerror=null;this.src=\'' +
                    defaultImg + '\';" class="fav-avatar" alt="' + escapeHtml(names.th) + '">' +
                    divBadgeHtml +
                    '</div>' +
                    '<div class="fav-name-th" title="' + escapeHtml(names.th) + '">' + escapeHtml(names
                        .th) + '</div>' +
                    engNameHtml +
                    '<div class="fav-position-text" title="' + escapeHtml(position) + '">' + escapeHtml(
                        position) + '</div>' +
                    '<div class="fav-contact-footer">' +
                    '<div class="fav-phone-pill" onclick="copyFavPhone(\'' + escapeHtml(phone) +
                    '\', this)" title="คลิกเพื่อคัดลอกเบอร์โทร">' +
                    '<i class="fa fa-phone flex-shrink-0"></i> <span>' + escapeHtml(phone) + '</span>' +
                    '</div>' +
                    emailHtml +
                    '<div class="fav-meta-line" title="' + escapeHtml(location) +
                    '"><i class="fa fa-map-marker text-danger mr-1"></i> ' + escapeHtml(location) +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
            });

            container.innerHTML = html;
        }

        var clearBtn = document.getElementById('btnClearAllFavs');
        if (clearBtn) {
            clearBtn.addEventListener('click', function() {
                if (confirm('ต้องการล้างรายชื่อติดต่อคนโปรดทั้งหมดใช่หรือไม่?')) {
                    saveFavorites([]);
                    renderFavoriteSection();
                }
            });
        }

        window.addEventListener('storage', function(e) {
            if (e.key === FAV_STORAGE_KEY) {
                renderFavoriteSection();
            }
        });

        renderFavoriteSection();
    });
</script>
