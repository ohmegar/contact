<!-- Banner Section: Full-Width Emerald Green with Floating Contact Network Graphics -->
<style>
    /* ขยายความกว้างเต็มจอ 100vw */
    .dss-hero-wrapper {
        width: 100%;
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
        overflow: hidden;
    }

    .dss-hero-banner {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #022c22 0%, #064e3b 45%, #047857 85%, #059669 100%);
        color: #ffffff;
        min-height: 420px;
        display: flex;
        align-items: center;
        box-shadow: 0 10px 30px rgba(2, 44, 34, 0.3);
    }

    /* Canvas Particle Network */
    #heroParticleCanvas {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        pointer-events: none;
    }

    /* วงกลมแสงออร่าโทนเขียว */
    .hero-orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(70px);
        opacity: 0.5;
        pointer-events: none;
        animation: floatOrb 9s infinite alternate ease-in-out;
        z-index: 0;
    }
    .orb-1 {
        width: 380px;
        height: 380px;
        background: radial-gradient(circle, #34d399 0%, rgba(52, 211, 153, 0) 70%);
        top: -60px;
        right: 20%;
    }
    .orb-2 {
        width: 420px;
        height: 420px;
        background: radial-gradient(circle, #10b981 0%, rgba(16, 185, 129, 0) 70%);
        bottom: -80px;
        left: 10%;
        animation-duration: 12s;
        animation-delay: -3s;
    }

    @keyframes floatOrb {
        0% { transform: translateY(0px) scale(1); }
        50% { transform: translateY(-25px) scale(1.08); }
        100% { transform: translateY(15px) scale(0.95); }
    }

    /* Background Contact Icons Graphic Layer (กราฟิกการติดต่อลอยพื้นหลัง) */
    .contact-bg-graphics {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 1;
        overflow: hidden;
    }

    .contact-icon-item {
        position: absolute;
        color: rgba(255, 255, 255, 0.08); /* ความโปร่งแสงกลืนกับพื้นหลัง */
        transition: all 0.3s ease;
        animation: floatContact 8s infinite alternate ease-in-out;
    }

    /* ตำแหน่งและขนาดของไอคอนการติดต่อจุดต่างๆ */
    .c-icon-1 { top: 12%; left: 8%; font-size: 4rem; animation-delay: 0s; }
    .c-icon-2 { top: 60%; left: 18%; font-size: 3.5rem; animation-delay: -2s; }
    .c-icon-3 { top: 20%; right: 12%; font-size: 7rem; color: rgba(255, 255, 255, 0.07); animation-delay: -4s; }
    .c-icon-4 { bottom: 15%; right: 28%; font-size: 4.5rem; animation-delay: -1s; }
    .c-icon-5 { top: 40%; right: 5%; font-size: 3.8rem; animation-delay: -3s; }
    .c-icon-6 { bottom: 18%; left: 4%; font-size: 3rem; animation-delay: -5s; }

    @keyframes floatContact {
        0% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-18px) rotate(6deg); }
        100% { transform: translateY(12px) rotate(-6deg); }
    }

    /* ป้าย Badge หัวเรื่อง */
    .glass-badge {
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.25);
        border-radius: 50px;
        padding: 7px 20px;
        font-size: 0.9rem;
        display: inline-block;
        margin-bottom: 16px;
        letter-spacing: 0.5px;
    }

    /* เส้นคลื่นกราฟิกด้านล่าง */
    .banner-wave {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
        opacity: 0.22;
        z-index: 2;
        pointer-events: none;
    }
</style>

<div class="dss-hero-wrapper mb-5">
    <div class="dss-hero-banner py-5" id="heroBannerContainer">

        <!-- Glow Orbs แสงนวลเขียว -->
        <div class="hero-orb orb-1"></div>
        <div class="hero-orb orb-2"></div>

        <!-- Background Contact Graphics (ไอคอนโทรศัพท์, เครือข่าย, อีเมล, ตำแหน่ง ลอยข้างหลัง) -->
        <div class="contact-bg-graphics">
            <i class="fa fa-phone contact-icon-item c-icon-1"></i>
            <i class="fa fa-envelope contact-icon-item c-icon-2"></i>
            <i class="fa fa-address-book contact-icon-item c-icon-3"></i>
            <i class="fa fa-sitemap contact-icon-item c-icon-4"></i>
            <i class="fa fa-comments contact-icon-item c-icon-5"></i>
            <i class="fa fa-id-card contact-icon-item c-icon-6"></i>
        </div>

        <!-- HTML5 Canvas Particle Network -->
        <canvas id="heroParticleCanvas"></canvas>

        <div class="container position-relative text-center" style="z-index: 3;">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">

                    <span class="glass-badge">
                        <i class="fa fa-circle-nodes text-warning mr-1"></i> ระบบสารสนเทศนามสงเคราะห์ วศ.
                    </span>

                    <h1 class="display-4 font-weight-bold mb-3 text-white">
                        ศูนย์รวมข้อมูลการติดต่อ <br>
                        <span style="color: #6ee7b7; font-size: 2.5rem;">บุคลากรกรมวิทยาศาสตร์บริการ</span>
                    </h1>

                    <p class="text-white-50 mb-4 lead px-md-5" style="font-size: 1.15rem; font-weight: 300;">
                        เชื่อมต่อและค้นหาข้อมูลบุคลากร เบอร์โทรศัพท์ภายใน อีเมล ที่ตั้งกลุ่มงาน และผังโครงสร้างองค์กรได้อย่างสะดวกและมีประสิทธิภาพ
                    </p>

                    {{-- <div class="d-flex flex-wrap justify-content-center" style="gap: 15px;">
                        <a href="{{ url('/sn') }}" class="btn btn-light rounded-pill px-4 py-2 font-weight-bold shadow-sm" style="color: #064e3b; font-size: 1rem;">
                            <i class="fa fa-search mr-1"></i> เริ่มค้นหารายชื่อ
                        </a>
                        <a href="{{ url('/st') }}" class="btn btn-outline-light rounded-pill px-4 py-2 font-weight-bold" style="font-size: 1rem;">
                            <i class="fa fa-phone mr-1"></i> ค้นหาด้วยเบอร์โทร
                        </a>
                        <a href="{{ url('/so') }}" class="btn btn-outline-light rounded-pill px-4 py-2 font-weight-bold" style="font-size: 1rem;">
                            <i class="fa fa-sitemap mr-1"></i> ค้นหาตามโครงสร้าง
                        </a>
                    </div> --}}

                </div>
            </div>
        </div>

        <!-- Wave Line Decoration -->
        <div class="banner-wave">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none" style="width: 100%; height: 40px; fill: #ffffff;">
                <path d="M0,0 C150,90 350,-40 500,45 C650,130 900,10 1200,30 L1200,120 L0,120 Z"></path>
            </svg>
        </div>

    </div>
</div>

<!-- Particle Network Script -->
<script>
    (function () {
        const canvas = document.getElementById('heroParticleCanvas');
        if (!canvas) return;

        const ctx = canvas.getContext('2d');
        const container = document.getElementById('heroBannerContainer');

        let width, height;
        let particles = [];

        const particleCount = 55;
        const maxDistance = 125;
        const mouse = { x: null, y: null, radius: 150 };

        function resizeCanvas() {
            width = canvas.width = container.offsetWidth;
            height = canvas.height = container.offsetHeight;
        }

        container.addEventListener('mousemove', function (e) {
            const rect = container.getBoundingClientRect();
            mouse.x = e.clientX - rect.left;
            mouse.y = e.clientY - rect.top;
        });

        container.addEventListener('mouseleave', function () {
            mouse.x = null;
            mouse.y = null;
        });

        class Particle {
            constructor() {
                this.x = Math.random() * width;
                this.y = Math.random() * height;
                this.vx = (Math.random() - 0.5) * 0.8;
                this.vy = (Math.random() - 0.5) * 0.8;
                this.radius = Math.random() * 2 + 1.2;
            }

            update() {
                this.x += this.vx;
                this.y += this.vy;

                if (this.x < 0 || this.x > width) this.vx = -this.vx;
                if (this.y < 0 || this.y > height) this.vy = -this.vy;

                if (mouse.x !== null && mouse.y !== null) {
                    const dx = mouse.x - this.x;
                    const dy = mouse.y - this.y;
                    const dist = Math.sqrt(dx * dx + dy * dy);
                    if (dist < mouse.radius) {
                        const force = (mouse.radius - dist) / mouse.radius;
                        this.x -= (dx / dist) * force * 2.5;
                        this.y -= (dy / dist) * force * 2.5;
                    }
                }
            }

            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(110, 231, 183, 0.85)';
                ctx.fill();
            }
        }

        function init() {
            resizeCanvas();
            particles = [];
            for (let i = 0; i < particleCount; i++) {
                particles.push(new Particle());
            }
        }

        function animate() {
            ctx.clearRect(0, 0, width, height);

            for (let i = 0; i < particles.length; i++) {
                particles[i].update();
                particles[i].draw();

                for (let j = i + 1; j < particles.length; j++) {
                    const dx = particles[i].x - particles[j].x;
                    const dy = particles[i].y - particles[j].y;
                    const dist = Math.sqrt(dx * dx + dy * dy);

                    if (dist < maxDistance) {
                        const alpha = (1 - dist / maxDistance) * 0.38;
                        ctx.beginPath();
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(particles[j].x, particles[j].y);
                        ctx.strokeStyle = `rgba(52, 211, 153, ${alpha})`;
                        ctx.lineWidth = 1;
                        ctx.stroke();
                    }
                }

                if (mouse.x !== null && mouse.y !== null) {
                    const mdx = particles[i].x - mouse.x;
                    const mdy = particles[i].y - mouse.y;
                    const mdist = Math.sqrt(mdx * mdx + mdy * mdy);
                    if (mdist < mouse.radius) {
                        const mAlpha = (1 - mdist / mouse.radius) * 0.5;
                        ctx.beginPath();
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(mouse.x, mouse.y);
                        ctx.strokeStyle = `rgba(167, 243, 208, ${mAlpha})`;
                        ctx.lineWidth = 1.2;
                        ctx.stroke();
                    }
                }
            }

            requestAnimationFrame(animate);
        }

        window.addEventListener('resize', resizeCanvas);
        init();
        animate();
    })();
</script>
