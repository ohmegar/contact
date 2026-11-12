<!-- Custom Nav Link & Modern Brand Logo CSS -->
<style>
    /* สไตล์โลโก้แบรนด์แบบใหม่ (ไม่มีกรอบ) */
    .dss-brand-wrap {
        display: flex;
        align-items: center;
        text-decoration: none !important;
        gap: 10px;
        transition: transform 0.25s ease;
    }

    .dss-brand-wrap:hover {
        transform: scale(1.02);
    }

    .dss-logo-svg {
        flex-shrink: 0;
        filter: drop-shadow(0 3px 6px rgba(5, 150, 105, 0.22));
    }

    .dss-brand-title {
        font-size: 1.45rem;
        font-weight: 700;
        color: #064e3b;
        line-height: 1;
        letter-spacing: -0.3px;
        margin: 0;
    }

    .dss-brand-subtitle {
        font-size: 0.76rem;
        font-weight: 500;
        color: #64748b;
        line-height: 1;
        margin: -1px 0 0 0;
        /* ขยับให้ชิดติดด้านบนมากขึ้น */
        display: block;
    }

    /* เมนู Navbar และเส้นขีดล่างเคลื่อนไหว */
    .header-nav .nav-link {
        position: relative;
        color: #475569;
        font-weight: 500;
        font-size: 0.95rem;
        transition: color 0.25s ease-in-out;
        padding-bottom: 6px;
    }

    .header-nav .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2.5px;
        background-color: #059669;
        transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1), left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 2px;
    }

    .header-nav .nav-link:hover {
        color: #059669 !important;
    }

    .header-nav .nav-link:hover::after {
        width: 80%;
        left: 10%;
    }

    .header-nav .nav-link.active-page {
        color: #064e3b !important;
        font-weight: 600;
    }

    .header-nav .nav-link.active-page::after {
        width: 80%;
        left: 10%;
        background-color: #059669;
    }

    .btn-edit-info {
        transition: all 0.25s ease;
    }

    .btn-edit-info:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(220, 53, 69, 0.25);
    }
</style>

<!-- header -->
<header class="sticky-top bg-white border-bottom shadow-sm">
    <div class="container-fluid px-lg-4 py-2">
        <nav class="navbar navbar-expand-lg navbar-light p-0">

            <!-- โลโก้ใหม่: ขยายไอคอนใหญ่ขึ้น (48x48) + ข้อความชิดติดกัน -->
            <a class="navbar-brand dss-brand-wrap py-1" href="{{ url('/') }}">
                <svg class="dss-logo-svg" width="54" height="54" viewBox="0 0 36 36" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="emeraldGrad" x1="4" y1="6" x2="32" y2="30"
                            gradientUnits="userSpaceOnUse">
                            <stop offset="0%" stop-color="#047857" />
                            <stop offset="100%" stop-color="#10b981" />
                        </linearGradient>
                    </defs>
                    <!-- ซองจดหมาย (ด้านหลังขวา) -->
                    <rect x="11" y="7" width="21" height="15" rx="3" fill="#d1fae5" stroke="#059669"
                        stroke-width="2.2" />
                    <path d="M12.5 9.5L21.5 16L30.5 9.5" stroke="#059669" stroke-width="2.2" stroke-linecap="round"
                        stroke-linejoin="round" />

                    <!-- หูโทรศัพท์ (ด้านหน้าซ้าย ผสานกับซองจดหมาย) -->
                    <path
                        d="M8.5 8C6.8 8 5.5 9.3 5.5 11C5.5 21.5 14 30 24.5 30C26.2 30 27.5 28.7 27.5 27L25.2 22.2C24.7 21.2 23.5 20.8 22.5 21.2L19.8 22.3C16.3 20.4 14.1 18.2 12.2 14.7L13.3 12C13.7 11 13.3 9.8 12.3 9.3L8.5 8Z"
                        fill="url(#emeraldGrad)" stroke="#ffffff" stroke-width="1.8" stroke-linejoin="round" />
                </svg>

                <div class="d-flex flex-column justify-content-center">
                    <h1 class="dss-brand-title">นามสงเคราะห์</h1>
                    <span class="dss-brand-subtitle">กรมวิทยาศาสตร์บริการ (วศ.)</span>
                </div>
            </a>

            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav header-nav ml-auto align-items-lg-center">
                    <li class="nav-item">
                        <a href="{{ url('/') }}"
                            class="nav-link px-2 px-xl-3 {{ Request::is('/') ? 'active-page' : '' }}">
                            <i class="fa fa-home mr-1"></i> หน้าหลัก
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/sn') }}"
                            class="nav-link px-2 px-xl-3 {{ Request::is('sn') ? 'active-page' : '' }}">
                            <i class="fa fa-user mr-1"></i> ดูชื่อ-นามสกุล
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/st') }}"
                            class="nav-link px-2 px-xl-3 {{ Request::is('st') ? 'active-page' : '' }}">
                            <i class="fa fa-phone mr-1"></i> ดูเบอร์โทร
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/so') }}"
                            class="nav-link px-2 px-xl-3 {{ Request::is('so') ? 'active-page' : '' }}">
                            <i class="fa fa-sitemap mr-1"></i> ดูโครงสร้าง
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/center') }}"
                            class="nav-link px-2 px-xl-3 {{ Request::is('center') ? 'active-page' : '' }}">
                            <i class="fa fa-map-marker mr-1"></i> ส่วนกลาง
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url(asset('/manual/manualadmin.pdf')) }}" target="_blank"
                            class="nav-link px-2 px-xl-3">
                            <i class="fa fa-book mr-1"></i> คู่มือการใช้งาน
                        </a>
                    </li>
                    <li class="nav-item ml-lg-2">
                        <a href="{{ url('/announcement') }}"
                            class="btn btn-outline-danger btn-sm rounded-pill px-3 py-1 btn-edit-info">
                            <i class="fa fa-pencil mr-1"></i> แจ้งแก้ไขข้อมูล
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
