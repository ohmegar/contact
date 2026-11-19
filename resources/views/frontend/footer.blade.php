<!-- ================= DIGITAL PRE-FOOTER BANNER (กราฟิกดิจิทัลคั่นก่อน Footer) ================= -->
<style>
    .pre-footer-digital {
        width: 100%;
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

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-8px);
        }
    }

    /* ================= EMERALD GREEN FOOTER ================= */
    .dss-green-footer {
        width: 100%;
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


    /* <!-- ================= INTERACTIVE ONBOARDING TOUR (DSS SMART DIRECTORY) ================= --> */
    /* พื้นหลังมืดแบบ Spotlight เจาะช่องสว่างรอบ Element เป้าหมาย */
    .dss-tour-spotlight {
        position: fixed;
        z-index: 9998;
        border-radius: 16px;
        box-shadow: 0 0 0 9999px rgba(2, 44, 34, 0.72), 0 0 0 4px #34d399;
        transition: all 0.35s cubic-bezier(0.25, 0.8, 0.25, 1);
        pointer-events: none;
        display: none;
    }

    /* กล่องข้อความคำแนะนำ (Popover Card) */
    .dss-tour-popover {
        position: fixed;
        z-index: 9999;
        width: 340px;
        max-width: calc(100vw - 32px);
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 20px 50px rgba(2, 44, 34, 0.35);
        border: 1px solid #a7f3d0;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        display: none;
        font-family: 'Kanit', sans-serif;
    }

    .dss-tour-header {
        background: linear-gradient(135deg, #064e3b 0%, #059669 100%);
        color: #ffffff;
        padding: 14px 18px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .dss-tour-step-badge {
        background: rgba(255, 255, 255, 0.2);
        color: #ecfdf5;
        font-size: 0.75rem;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 50px;
    }

    .dss-tour-close-btn {
        background: transparent;
        border: none;
        color: #a7f3d0;
        font-size: 1.1rem;
        cursor: pointer;
        padding: 0 4px;
        line-height: 1;
        transition: color 0.2s;
    }

    .dss-tour-close-btn:hover {
        color: #ffffff;
    }

    .dss-tour-body {
        padding: 18px 20px;
    }

    .dss-tour-title {
        font-size: 1.08rem;
        font-weight: 700;
        color: #064e3b;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .dss-tour-desc {
        font-size: 0.9rem;
        color: #475569;
        line-height: 1.55;
        margin-bottom: 0;
    }

    .dss-tour-footer {
        background-color: #f8fafc;
        border-top: 1px solid #e2e8f0;
        padding: 12px 18px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .dss-tour-dots {
        display: flex;
        gap: 5px;
    }

    .dss-tour-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background-color: #cbd5e1;
        transition: all 0.2s ease;
    }

    .dss-tour-dot.active {
        width: 18px;
        border-radius: 10px;
        background-color: #059669;
    }

    .btn-tour-next {
        background: linear-gradient(135deg, #059669 0%, #10b981 100%);
        color: #ffffff;
        border: none;
        border-radius: 50px;
        padding: 6px 18px;
        font-size: 0.85rem;
        font-weight: 600;
        cursor: pointer;
        box-shadow: 0 4px 12px rgba(5, 150, 105, 0.3);
        transition: all 0.2s ease;
    }

    .btn-tour-next:hover {
        background: #064e3b;
        transform: translateY(-1px);
    }

    .btn-tour-prev {
        background: #e2e8f0;
        color: #334155;
        border: none;
        border-radius: 50px;
        padding: 6px 14px;
        font-size: 0.85rem;
        font-weight: 500;
        cursor: pointer;
        margin-right: 6px;
        transition: background 0.2s ease;
    }

    .btn-tour-prev:hover {
        background: #cbd5e1;
    }

    /* ปุ่มลอยมุมขวาล่างสำหรับกดเปิดดู Tour ซ้ำได้ตลอดเวลา */
    .dss-tour-reopen-btn {
        position: fixed;
        bottom: 82px;
        /* อยู่เหนือปุ่มเลื่อนขึ้นบนสุด (Back to top) */
        right: 22px;
        z-index: 990;
        background: linear-gradient(135deg, #064e3b 0%, #059669 100%);
        color: #ffffff !important;
        border: 2px solid #a7f3d0;
        border-radius: 50px;
        padding: 8px 16px;
        font-size: 0.85rem;
        font-weight: 600;
        box-shadow: 0 8px 20px rgba(6, 78, 59, 0.28);
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        transition: all 0.25s ease;
    }

    .dss-tour-reopen-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 26px rgba(5, 150, 105, 0.4);
        background: #022c22;
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
                    <li><i class="fa fa-map-marker mr-2 text-success"></i> 75/7 ถนนพระรามที่ 6 แขวงทุ่งพญาไท เขตราชเทวี
                        กรุงเทพฯ 10400</li>
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
                    วศ. ได้จัดทำระบบนามสงเคราะห์ เพื่อใช้สำหรับให้บริการบุคลากร วศ.
                    ได้ดำเนินการค้นหาข้อมูลเกี่ยวกับบุคลากรภายใน วศ. ได้อย่างสะดวก รวดเร็ว และมีประสิทธิภาพ
                    เพื่อตอบโจทย์ยุคดิจิทัล
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
                    © {{ date('Y') }} กรมวิทยาศาสตร์บริการ (DSS) — All Rights Reserved.
                </div>
                <div class="col-md-6 text-center text-md-right small text-white-50 mt-2 mt-md-0">
                    {{-- พัฒนาโดย  วศ. --}}
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->


<!-- องค์ประกอบ UI ของ Tour -->
<div class="dss-tour-spotlight" id="dssTourSpotlight"></div>

<div class="dss-tour-popover" id="dssTourPopover">
    <div class="dss-tour-header">
        <span class="dss-tour-step-badge" id="dssTourStepLabel">ขั้นตอน 1 / 5</span>
        <button type="button" class="dss-tour-close-btn" id="dssTourCloseBtn" title="ปิดคำแนะนำ">×</button>
    </div>
    <div class="dss-tour-body">
        <div class="dss-tour-title" id="dssTourTitle">ยินดีต้อนรับสู่ระบบนามสงเคราะห์ วศ.</div>
        <p class="dss-tour-desc" id="dssTourDesc">คำอธิบายการใช้งาน...</p>
    </div>
    <div class="dss-tour-footer">
        <div class="dss-tour-dots" id="dssTourDots"></div>
        <div>
            <button type="button" class="btn-tour-prev" id="dssTourPrevBtn">ย้อนกลับ</button>
            <button type="button" class="btn-tour-next" id="dssTourNextBtn">ถัดไป <i
                    class="fa fa-arrow-right ml-1"></i></button>
        </div>
    </div>
</div>


<!-- ปุ่มกดเรียกดูคู่มือแนะนำการใช้งานซ้ำ -->
<button type="button" class="dss-tour-reopen-btn" id="btnStartDssTour" title="แนะนำการใช้งานระบบ">
    <i class="fa fa-question-circle fa-lg text-warning"></i>
    <span class="d-none d-sm-inline">แนะนำการใช้งาน</span>
</button>


<!-- Javascript files (คงของเดิมไว้โดยไม่เรียกซ้ำกับ head) -->
<script src="{{ asset('style-index/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var TOUR_STORAGE_KEY = 'dss_user_tour_completed_v1';

        // รายการขั้นตอนการแนะนำการใช้งาน (ปรับแต่งข้อความหรือ Selector ได้ตามต้องการ)
        var rawSteps = [{
                selector: null, // null = แสดงตรงกลางหน้าจอต้อนรับ
                icon: 'fa-hand-peace-o text-success',
                title: 'ยินดีต้อนรับสู่นามสงเคราะห์ วศ.',
                desc: 'ระบบสมุดโทรศัพท์และทำเนียบบุคลากรออนไลน์ กรมวิทยาศาสตร์บริการ รูปแบบใหม่ ค้นหาเบอร์ภายในและติดต่อเจ้าหน้าที่ได้รวดเร็วในไม่กี่วินาที'
            },
            {
                selector: '.navbar-nav',
                icon: 'fa-compass text-success',
                title: 'เมนูค้นหาด่วนด้านบน',
                desc: 'เลือกค้นหาข้อมูลบุคลากรได้ 3 รูปแบบ คือ ค้นหาตามชื่อ-นามสกุล, ค้นหาตามเบอร์โทรศัพท์, ค้นหาตามโครงสร้างองค์กร รวมถึงรวมเบอร์ส่วนกลาง'
            },
            {
                selector: '#orgStructureSection',
                icon: 'fa-sitemap text-success',
                title: 'แผนผังโครงสร้างและอัตรากำลัง',
                desc: 'คลิกที่ชื่อกอง/สำนัก เพื่อดูกลุ่มงานย่อย พร้อมสรุปจำนวนบุคลากรแยกตามประเภท และคลิกที่ชื่อกลุ่มงานเพื่อเปิดดูรายชื่อและรูปโปรไฟล์ได้ทันที'
            },
            {
                selector: '#favoriteContactsSection',
                icon: 'fa-star text-warning',
                title: 'รายชื่อติดต่อคนโปรดของฉัน',
                desc: 'เมื่อกดปุ่มรูปดาว (⭐) หน้าชื่อบุคลากรในหน้าค้นหา รายชื่อจะถูกบันทึกไว้ในเครื่องของท่านและแสดงที่นี่เพื่อกดคัดลอกเบอร์โทรได้ทันที'
            },
            {
                selector: '#btnStartDssTour',
                icon: 'fa-check-circle text-success',
                title: 'พร้อมใช้งานแล้ว!',
                desc: 'หากต้องการดูคำแนะนำการใช้งานนี้อีกครั้ง สามารถกดที่ปุ่ม "แนะนำการใช้งาน" มุมขวาล่างได้ทุกเมื่อครับ'
            }
        ];

        var activeSteps = [];
        var currentStepIndex = 0;

        var spotlight = document.getElementById('dssTourSpotlight');
        var popover = document.getElementById('dssTourPopover');
        var stepLabel = document.getElementById('dssTourStepLabel');
        var titleEl = document.getElementById('dssTourTitle');
        var descEl = document.getElementById('dssTourDesc');
        var dotsEl = document.getElementById('dssTourDots');
        var prevBtn = document.getElementById('dssTourPrevBtn');
        var nextBtn = document.getElementById('dssTourNextBtn');
        var closeBtn = document.getElementById('dssTourCloseBtn');

        // กรองเฉพาะขั้นตอนที่มี Element แสดงอยู่จริงบนหน้าจอปัจจุบัน
        function buildAvailableSteps() {
            activeSteps = rawSteps.filter(function(step) {
                if (!step.selector) return true;
                var el = document.querySelector(step.selector);
                if (!el) return false;
                var style = window.getComputedStyle(el);
                return style.display !== 'none' && style.visibility !== 'hidden' && el.offsetHeight > 0;
            });
        }

        function startTour() {
            buildAvailableSteps();
            if (activeSteps.length === 0) return;
            currentStepIndex = 0;
            spotlight.style.display = 'block';
            popover.style.display = 'block';
            renderStep(currentStepIndex);
        }

        function finishTour() {
            spotlight.style.display = 'none';
            popover.style.display = 'none';
            try {
                localStorage.setItem(TOUR_STORAGE_KEY, '1');
            } catch (e) {}
        }

        function positionElements(targetEl) {
            var vw = window.innerWidth;
            var vh = window.innerHeight;
            var popW = popover.offsetWidth || 340;
            var popH = popover.offsetHeight || 200;

            if (!targetEl) {
                // ขั้นตอนที่ไม่มีเป้าหมายเฉพาะ -> วาง Popover กลางหน้าจอ
                spotlight.style.top = (vh / 2) + 'px';
                spotlight.style.left = (vw / 2) + 'px';
                spotlight.style.width = '0px';
                spotlight.style.height = '0px';

                popover.style.top = Math.max(20, (vh - popH) / 2) + 'px';
                popover.style.left = Math.max(16, (vw - popW) / 2) + 'px';
                return;
            }

            var rect = targetEl.getBoundingClientRect();
            var pad = 8;

            // จำกัดความสูงของ Spotlight ไม่ให้เกินความสูงหน้าจอ
            var spotTop = Math.max(8, rect.top - pad);
            var spotLeft = Math.max(8, rect.left - pad);
            var spotWidth = Math.min(vw - 16, rect.width + pad * 2);
            var spotHeight = Math.min(vh - 16, rect.height + pad * 2);

            spotlight.style.top = spotTop + 'px';
            spotlight.style.left = spotLeft + 'px';
            spotlight.style.width = spotWidth + 'px';
            spotlight.style.height = spotHeight + 'px';

            // คำนวณตำแหน่ง Popover (วางด้านล่างเป้าหมาย ถ้าไม่พอให้วางด้านบน หรือกลางจอ)
            var popTop = spotTop + spotHeight + 14;
            if (popTop + popH > vh - 16) {
                popTop = spotTop - popH - 14;
            }
            if (popTop < 16 || popTop + popH > vh - 16) {
                popTop = Math.max(16, (vh - popH) / 2);
            }

            var popLeft = spotLeft + (spotWidth / 2) - (popW / 2);
            popLeft = Math.max(16, Math.min(vw - popW - 16, popLeft));

            popover.style.top = popTop + 'px';
            popover.style.left = popLeft + 'px';
        }

        function renderStep(index) {
            var step = activeSteps[index];
            if (!step) return;

            stepLabel.textContent = 'ขั้นตอน ' + (index + 1) + ' / ' + activeSteps.length;
            titleEl.innerHTML = '<i class="fa ' + step.icon + '"></i> <span>' + step.title + '</span>';
            descEl.textContent = step.desc;

            // สร้างจุดบอกสถานะ (Dots)
            var dotsHtml = '';
            for (var i = 0; i < activeSteps.length; i++) {
                dotsHtml += '<span class="dss-tour-dot ' + (i === index ? 'active' : '') + '"></span>';
            }
            dotsEl.innerHTML = dotsHtml;

            // ปุ่มย้อนกลับ / ถัดไป
            prevBtn.style.display = (index === 0) ? 'none' : 'inline-block';
            if (index === activeSteps.length - 1) {
                nextBtn.innerHTML = '<i class="fa fa-check mr-1"></i> เริ่มใช้งาน';
            } else {
                nextBtn.innerHTML = 'ถัดไป <i class="fa fa-arrow-right ml-1"></i>';
            }

            var targetEl = step.selector ? document.querySelector(step.selector) : null;
            if (targetEl) {
                targetEl.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
                setTimeout(function() {
                    positionElements(targetEl);
                }, 350);
            } else {
                positionElements(null);
            }
        }

        nextBtn.addEventListener('click', function() {
            if (currentStepIndex < activeSteps.length - 1) {
                currentStepIndex++;
                renderStep(currentStepIndex);
            } else {
                finishTour();
            }
        });

        prevBtn.addEventListener('click', function() {
            if (currentStepIndex > 0) {
                currentStepIndex--;
                renderStep(currentStepIndex);
            }
        });

        closeBtn.addEventListener('click', finishTour);

        document.getElementById('btnStartDssTour').addEventListener('click', function() {
            startTour();
        });

        window.addEventListener('resize', function() {
            if (popover.style.display === 'block') {
                var step = activeSteps[currentStepIndex];
                var targetEl = (step && step.selector) ? document.querySelector(step.selector) : null;
                positionElements(targetEl);
            }
        });

        // ตรวจสอบว่าเข้าใช้งานครั้งแรกหรือไม่ (ยังไม่เคยมี key ใน localStorage)
        var hasSeenTour = false;
        try {
            hasSeenTour = (localStorage.getItem(TOUR_STORAGE_KEY) === '1');
        } catch (e) {}

        if (!hasSeenTour) {
            // หน่วงเวลา 0.8 วินาทีให้หน้าเว็บและแผนผังโหลดเสร็จก่อนเริ่ม Tour
            setTimeout(startTour, 800);
        }
    });
</script>


</body>

</html>
