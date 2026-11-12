@extends('layouts.adminlte')

@section('title')
    | Home
@endsection

@section('content')
    <!-- Style ปรับแต่งหน้าหลักระบบหลังบ้าน ให้เข้าชุดกับธีมสีเขียว วศ. -->
    <style>
        /* กล่อง Hero ต้อนรับด้านบน */
        .backend-hero-card {
            background: linear-gradient(135deg, #022c22 0%, #064e3b 55%, #047857 100%);
            border-radius: 24px;
            padding: 42px 36px;
            color: #ffffff;
            position: relative;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(2, 44, 34, 0.18);
            border: 1px solid rgba(110, 231, 183, 0.2);
            margin-bottom: 28px;
        }

        #backendHeroCanvas {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .hero-content-layer {
            position: relative;
            z-index: 2;
        }

        .hero-pill-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(52, 211, 153, 0.16);
            border: 1px solid rgba(52, 211, 153, 0.35);
            color: #6ee7b7;
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 16px;
        }

        .hero-title-main {
            font-size: 2rem;
            font-weight: 700;
            line-height: 1.25;
            margin-bottom: 10px;
            letter-spacing: -0.3px;
        }

        .hero-subtitle-main {
            color: #a7f3d0;
            font-size: 1.02rem;
            font-weight: 400;
            margin-bottom: 0;
            max-width: 680px;
            line-height: 1.6;
        }

        /* กล่องกราฟิกไอคอนด้านขวาของ Hero */
        .hero-emblem-box {
            width: 120px;
            height: 120px;
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(167, 243, 208, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: auto;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        /* การ์ดเมนูลัด (Quick Access Cards) */
        .quick-action-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 26px 24px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.04);
            transition: all 0.28s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .quick-action-card:hover {
            transform: translateY(-5px);
            border-color: #6ee7b7;
            box-shadow: 0 15px 35px rgba(5, 150, 105, 0.14);
        }

        .quick-icon-circle {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.45rem;
            margin-bottom: 18px;
        }

        .icon-emerald {
            background-color: #d1fae5;
            color: #059669;
        }

        .icon-teal {
            background-color: #ccfbf1;
            color: #0d9488;
        }

        .icon-amber {
            background-color: #fef3c7;
            color: #d97706;
        }

        .quick-card-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: #064e3b;
            margin-bottom: 8px;
        }

        .quick-card-desc {
            font-size: 0.9rem;
            color: #64748b;
            line-height: 1.55;
            margin-bottom: 20px;
        }

        .btn-quick-go {
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 8px 20px;
            align-self: flex-start;
            transition: all 0.2s ease;
        }

        /* แถบคำแนะนำการใช้งานด้านล่าง */
        .info-guide-strip {
            background-color: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-left: 6px solid #059669;
            border-radius: 16px;
            padding: 18px 22px;
            color: #064e3b;
        }
    </style>

    <div class="container-fluid pb-4">

        <!-- 1. Hero Banner ต้อนรับเข้าสู่ระบบหลังบ้าน -->
        <div class="backend-hero-card">
            <canvas id="backendHeroCanvas"></canvas>

            <div class="row align-items-center hero-content-layer">
                <div class="col-lg-8">
                    <div class="hero-pill-badge">
                        <i class="fas fa-shield-alt"></i>
                        <span>DSS SMART DIRECTORY — BACK OFFICE</span>
                    </div>

                    <h1 class="hero-title-main">
                        ยินดีต้อนรับสู่ระบบจัดการข้อมูลนามสงเคราะห์
                    </h1>

                    <p class="hero-subtitle-main">
                        ศูนย์บริหารจัดการข้อมูลการติดต่อบุคลากร หมายเลขโทรศัพท์ภายใน สถานที่ปฏิบัติงาน
                        และข้อมูลสังกัดหน่วยงานของกรมวิทยาศาสตร์บริการ (วศ.)
                    </p>
                </div>

                <div class="col-lg-4 d-none d-lg-flex">
                    <div class="hero-emblem-box">
                        <svg width="64" height="64" viewBox="0 0 36 36" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="11" y="7" width="21" height="15" rx="3" fill="#d1fae5" stroke="#34d399"
                                stroke-width="2.2" />
                            <path d="M12.5 9.5L21.5 16L30.5 9.5" stroke="#059669" stroke-width="2.2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M8.5 8C6.8 8 5.5 9.3 5.5 11C5.5 21.5 14 30 24.5 30C26.2 30 27.5 28.7 27.5 27L25.2 22.2C24.7 21.2 23.5 20.8 22.5 21.2L19.8 22.3C16.3 20.4 14.1 18.2 12.2 14.7L13.3 12C13.7 11 13.3 9.8 12.3 9.3L8.5 8Z"
                                fill="#10b981" stroke="#022c22" stroke-width="1.6" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        {{-- <!-- 2. การ์ดเมนูลัดสำหรับเข้าใช้งานระบบ -->
        <div class="row">
            <!-- การ์ดที่ 1: จัดการข้อมูลส่วนตัว -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="quick-action-card">
                    <div>
                        <div class="quick-icon-circle icon-emerald">
                            <i class="fas fa-address-card"></i>
                        </div>
                        <h4 class="quick-card-title">จัดการข้อมูลส่วนตัว</h4>
                        <p class="quick-card-desc">
                            ตรวจสอบและปรับปรุงหมายเลขโทรศัพท์ภายใน เบอร์ Fax อีเมล สถานที่ปฏิบัติงาน และ LINE Token
                            ของท่านด้วยตนเอง
                        </p>
                    </div>
                    <a href="{{ url('/editinfo') }}" class="btn btn-success btn-quick-go"
                        style="background-color: #059669; border-color: #059669;">
                        <i class="fas fa-user-edit mr-1"></i> แก้ไขข้อมูลส่วนตัว
                    </a>
                </div>
            </div>

            <!-- การ์ดที่ 2: ข้อมูลบุคลากรทั้งหมด (สำหรับผู้ดูแลระบบ / เจ้าหน้าที่) -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="quick-action-card">
                    <div>
                        <div class="quick-icon-circle icon-teal">
                            <i class="fas fa-users-cog"></i>
                        </div>
                        <h4 class="quick-card-title">ข้อมูลบุคลากรทั้งหมด</h4>
                        <p class="quick-card-desc">
                            ค้นหา ตรวจสอบ และบริหารจัดการฐานข้อมูลรายชื่อบุคลากรทั้งหมดในสังกัดกรมวิทยาศาสตร์บริการ (วศ.)
                        </p>
                    </div>
                    <a href="{{ url('/admin') }}" class="btn btn-outline-success btn-quick-go">
                        <i class="fas fa-search mr-1"></i> ดูข้อมูลทั้งหมด
                    </a>
                </div>
            </div>

            <!-- การ์ดที่ 3: หน้าสมุดโทรศัพท์ออนไลน์ (Frontend) -->
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="quick-action-card">
                    <div>
                        <div class="quick-icon-circle icon-amber">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h4 class="quick-card-title">หน้าเว็บไซต์นามสงเคราะห์</h4>
                        <p class="quick-card-desc">
                            เปิดดูหน้าค้นหารายชื่อ เบอร์โทรศัพท์ภายใน โครงสร้างหน่วยงาน
                            และเบอร์ส่วนกลางสำหรับผู้ใช้งานทั่วไป
                        </p>
                    </div>
                    <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-dark btn-quick-go">
                        <i class="fas fa-external-link-alt mr-1"></i> เปิดหน้าเว็บไซต์หลัก
                    </a>
                </div>
            </div>
        </div> --}}

        <!-- 3. แถบแจ้งเตือนการอัปเดตรูปภาพโปรไฟล์ -->
        <div class="info-guide-strip d-flex align-items-center justify-content-between flex-wrap" style="gap: 12px;">
            <div class="d-flex align-items-center">
                <i class="fas fa-info-circle fa-lg text-success mr-3"></i>
                <div>
                    <strong class="d-block">คำแนะนำการอัปเดตรูปภาพโปรไฟล์และข้อมูลทะเบียนประวัติ</strong>
                    <span class="small text-muted">หากต้องการเปลี่ยนรูปภาพโปรไฟล์ สามารถอัปเดตได้ที่ระบบ <strong>e-Office
                            DSS</strong> หรือหากชื่อ-ตำแหน่งไม่ถูกต้อง กรุณาติดต่อ <strong>ศบค.สลก.</strong></span>
                </div>
            </div>
            <a href="https://e-office.dss.go.th/person/profile/profile" target="_blank" rel="noopener noreferrer"
                class="btn btn-sm btn-success rounded-pill px-3" style="background-color: #059669; border-color: #059669;">
                <i class="fas fa-external-link-alt mr-1"></i> ไปที่ e-Office DSS
            </a>
        </div>

    </div><!-- /.container-fluid -->
@endsection

@section('modal')
    {{-- @include('backend.modals.modal-view-consent') --}}
@endsection

@section('scripts')
    <!-- Particle Network Canvas Animation (เข้าชุดกับหน้า Banner หลัก) -->
    <script>
        (function() {
            var canvas = document.getElementById('backendHeroCanvas');
            if (!canvas) return;
            var ctx = canvas.getContext('2d');
            var particles = [];
            var particleCount = 32;

            function resizeCanvas() {
                canvas.width = canvas.offsetWidth;
                canvas.height = canvas.offsetHeight;
            }
            resizeCanvas();
            window.addEventListener('resize', resizeCanvas);

            for (var i = 0; i < particleCount; i++) {
                particles.push({
                    x: Math.random() * canvas.width,
                    y: Math.random() * canvas.height,
                    vx: (Math.random() - 0.5) * 0.45,
                    vy: (Math.random() - 0.5) * 0.45,
                    r: Math.random() * 2 + 1
                });
            }

            function drawParticles() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                for (var i = 0; i < particles.length; i++) {
                    var p = particles[i];
                    p.x += p.vx;
                    p.y += p.vy;

                    if (p.x < 0 || p.x > canvas.width) p.vx *= -1;
                    if (p.y < 0 || p.y > canvas.height) p.vy *= -1;

                    ctx.beginPath();
                    ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                    ctx.fillStyle = 'rgba(110, 231, 183, 0.35)';
                    ctx.fill();

                    for (var j = i + 1; j < particles.length; j++) {
                        var p2 = particles[j];
                        var dx = p.x - p2.x;
                        var dy = p.y - p2.y;
                        var dist = Math.sqrt(dx * dx + dy * dy);
                        if (dist < 110) {
                            ctx.beginPath();
                            ctx.moveTo(p.x, p.y);
                            ctx.lineTo(p2.x, p2.y);
                            ctx.strokeStyle = 'rgba(110, 231, 183, ' + (0.14 * (1 - dist / 110)) + ')';
                            ctx.lineWidth = 0.8;
                            ctx.stroke();
                        }
                    }
                }
                requestAnimationFrame(drawParticles);
            }
            drawParticles();
        })();
    </script>
@endsection
