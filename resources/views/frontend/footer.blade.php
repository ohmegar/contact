<!-- ================= DIGITAL PRE-FOOTER BANNER (กราฟิกดิจิทัลคั่นก่อน Footer) ================= -->
<style>
    .pre-footer-digital {
        width: 100vw;
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
        background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 50%, #a7f3d0 100%);
        padding: 55px 0;
        overflow: hidden;
        border-top: 1px solid rgba(16, 185, 129, 0.2);
    }

    /* ลวดลายเส้นวงจรดิจิทัลพื้นหลัง (SVG Pattern) */
    .pre-footer-circuit {
        position: absolute;
        inset: 0;
        opacity: 0.35;
        background-image: radial-gradient(#059669 1.2px, transparent 1.2px), radial-gradient(#047857 1.2px, #ecfdf5 1.2px);
        background-size: 32px 32px;
        background-position: 0 0, 16px 16px;
        pointer-events: none;
    }

    /* กราฟิกไอคอนดิจิทัลลอยตัว */
    .digital-promo-card {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 1);
        border-radius: 24px;
        padding: 32px 36px;
        box-shadow: 0 15px 35px rgba(6, 78, 59, 0.08);
        position: relative;
        z-index: 2;
    }

    .digital-svg-art {
        max-height: 150px;
        animation: floatDigitalArt 4.5s infinite ease-in-out;
        filter: drop-shadow(0 10px 15px rgba(5, 150, 105, 0.15));
    }

    @keyframes floatDigitalArt {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }

    /* ================= EMERALD GREEN FOOTER ================= */
    .dss-green-footer {
        width: 100vw;
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
        background: linear-gradient(160deg, #022c22 0%, #064e3b 65%, #04392c 100%);
        color: #e2e8f0;
        position: relative;
        overflow: hidden;
    }

    /* แสงออร่าเรืองแสงจางๆ ตรงมุม Footer */
    .footer-glow-spot {
        position: absolute;
        width: 350px;
        height: 350px;
        background: radial-gradient(circle, rgba(52, 211, 153, 0.14) 0%, transparent 70%);
        bottom: -100px;
        right: -50px;
        border-radius: 50%;
        pointer-events: none;
    }

    .footer-heading {
        color: #ffffff;
        font-weight: 700;
        font-size: 1.15rem;
        margin-bottom: 18px;
        padding-left: 12px;
        border-left: 4px solid #34d399;
    }

    .footer-link-list li {
        margin-bottom: 10px;
        font-size: 0.92rem;
        color: #cbd5e1;
    }

    .footer-link-list a {
        color: #6ee7b7;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .footer-link-list a:hover {
        color: #ffffff;
        padding-left: 4px;
    }

    .btn-admin-green {
        background: rgba(52, 211, 153, 0.12);
        border: 1px solid rgba(52, 211, 153, 0.45);
        color: #6ee7b7;
        transition: all 0.3s ease;
    }

    .btn-admin-green:hover {
        background: #10b981;
        border-color: #10b981;
        color: #022c22;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
    }

    .footer-bottom-bar {
        background: rgba(1, 22, 17, 0.55);
        border-top: 1px solid rgba(52, 211, 153, 0.15);
    }
</style>


<!-- ================= FOOTER โทนสีเขียว EMERALD ================= -->
<footer class="dss-green-footer pt-5">
    <div class="footer-glow-spot"></div>

    <div class="container pb-4 position-relative" style="z-index: 2;">
        <div class="row">

            <!-- คอลัมน์ที่ 1: ติดต่อ -->
            <div class="col-lg-5 col-md-6 mb-4">
                <h5 class="footer-heading">ติดต่อสอบถาม</h5>
                <p class="font-weight-bold text-white mb-2">กรมวิทยาศาสตร์บริการ (วศ.)</p>
                <ul class="list-unstyled footer-link-list">
                    <li><i class="fa fa-map-marker mr-2 text-success"></i> 75/7 ถนนพระรามที่ 6 แขวงทุ่งพญาไท เขตราชเทวี กรุงเทพฯ 10400</li>
                    <li><i class="fa fa-phone mr-2 text-success"></i> โทรศัพท์กลาง : 0 2201 7000</li>
                    <li><i class="fa fa-envelope mr-2 text-success"></i> อีเมล : pr@dss.go.th</li>
                    <li>
                        <a href="https://www.dss.go.th" target="_blank" rel="noopener noreferrer">
                            <i class="fa fa-globe mr-2"></i> เว็บไซต์กรมวิทยาศาสตร์บริการ (www.dss.go.th)
                        </a>
                    </li>
                </ul>
            </div>

            <!-- คอลัมน์ที่ 2: เกี่ยวกับเรา -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="footer-heading">เกี่ยวกับระบบ</h5>
                <p class="small text-light" style="line-height: 1.7; opacity: 0.85;">
                    วศ. ได้จัดทำระบบนามสงเคราะห์ เพื่อใช้สำหรับให้บริการบุคลากร วศ. ได้ดำเนินการค้นหาข้อมูลเกี่ยวกับบุคลากรภายใน วศ. ได้อย่างสะดวก รวดเร็ว และมีประสิทธิภาพ เพื่อตอบโจทย์ยุคดิจิทัล
                </p>
                <span class="badge px-3 py-1 rounded-pill" style="background: rgba(255,255,255,0.1); color: #a7f3d0;">
                    <i class="fa fa-code-fork mr-1"></i> Version 3.0 (2026)
                </span>
            </div>

            <!-- คอลัมน์ที่ 3: ผู้ดูแลระบบ -->
            <div class="col-lg-3 col-md-12 mb-4">
                <h5 class="footer-heading">สำหรับเจ้าหน้าที่</h5>
                <p class="small text-light mb-3" style="opacity: 0.85;">
                    เข้าสู่ระบบจัดการข้อมูลหลังบ้านและอัปเดตฐานข้อมูลนามสงเคราะห์
                </p>
                <a href="{{ url('/login') }}" class="btn btn-admin-green btn-sm rounded-pill px-4 py-2">
                    <i class="fa fa-lock mr-1"></i> Login for Admin
                </a>
            </div>

        </div>
    </div>

    <!-- แถบลิขสิทธิ์ด้านล่าง -->
    <div class="footer-bottom-bar py-3 position-relative" style="z-index: 2;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-left small text-white-50">
                    © {{ date("Y") }} กรมวิทยาศาสตร์บริการ (DSS) — All Rights Reserved.
                </div>
                <div class="col-md-6 text-center text-md-right small text-white-50 mt-2 mt-md-0">
                    {{-- พัฒนาโดย  วศ. --}}
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->

<!-- Javascript files (คงของเดิมไว้โดยไม่เรียกซ้ำกับ head) -->
<script src="{{ asset('style-index/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

</body>
</html>
