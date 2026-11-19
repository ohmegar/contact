@section('title')
    | ค้นหาตามชื่อ
@endsection

@include('frontend.head')

@include('frontend.topuser')

<!-- Style ปรับแต่งหน้าค้นหาตามชื่อ-นามสกุล -->
<style>
    /* แถบหัวข้อด้านบน: สีเขียวทึบสีเดียว (ไม่ไล่สี) */
    .sn-page-header {
        background-color: #064e3b;
        padding: 40px 0 65px 0;
        color: #ffffff;
        position: relative;
        overflow: hidden;
        margin-bottom: -40px;
    }

    .sn-page-header::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: radial-gradient(rgba(110, 231, 183, 0.15) 1px, transparent 1px);
        background-size: 24px 24px;
        pointer-events: none;
    }

    /* กล่องฟอร์มค้นหาแบบ Floating Card */
    .search-glass-card {
        background: #ffffff;
        border-radius: 20px;
        padding: 24px 28px;
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

    /* กล่องตาราง DataTables */
    .table-modern-card {
        background: #ffffff;
        border-radius: 22px;
        border: 1px solid #f1f5f9;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }

    #tbview_sn {
        border-collapse: separate;
        border-spacing: 0;
        width: 100% !important;
    }

    /* หัวตารางทั้งหมด: สีเดียวเสมอกันทุกช่อง */
    #tbview_sn thead th {
        background-color: #064e3b !important;
        color: #ffffff !important;
        font-weight: 600;
        font-size: 0.94rem;
        padding: 15px 10px;
        border: none !important;
        vertical-align: middle;
        white-space: nowrap;
    }

    #tbview_sn tbody td {
        vertical-align: middle;
        padding: 12px 10px;
        border-color: #f1f5f9 !important;
        font-size: 0.92rem;
        color: #334155;
    }

    #tbview_sn tbody tr:hover {
        background-color: #f0fdf4 !important;
        transition: background-color 0.2s ease;
    }

    /* ตกแต่งรูปโปรไฟล์ในตาราง */
    #tbview_sn tbody td img {
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        object-fit: cover;
    }


    /*  Style ปุ่มดาวบันทึกคนโปรด */
    .btn-fav-star {
        background: transparent;
        border: none;
        padding: 2px 6px;
        cursor: pointer;
        font-size: 1.25rem;
        line-height: 1;
        transition: transform 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
        vertical-align: middle;
        outline: none !important;
    }

    .btn-fav-star:hover {
        transform: scale(1.25);
    }

    .btn-fav-star .fa-star-o {
        color: #94a3b8;
    }

    .btn-fav-star:hover .fa-star-o {
        color: #f59e0b;
    }

    .btn-fav-star .fa-star {
        color: #f59e0b;
        filter: drop-shadow(0 2px 4px rgba(245, 158, 11, 0.35));
    }
</style>

<!-- ส่วนหัวหน้าค้นหา -->
<div class="sn-page-header">
    <div class="container position-relative" style="z-index: 2;">
        <div class="row align-items-center">
            <div class="col-md-8 text-center text-md-left">
                <span class="badge badge-pill px-3 py-1 mb-2"
                    style="background: rgba(52, 211, 153, 0.18); color: #6ee7b7; border: 1px solid rgba(52, 211, 153, 0.3);">
                    <i class="fa fa-search mr-1"></i> DSS DIRECTORY SEARCH
                </span>
                <h2 class="font-weight-bold text-white mb-1">ค้นหาตามชื่อ-นามสกุล</h2>
                <p class="text-white-50 mb-0 small">พิมพ์ชื่อ หรือนามสกุลบุคลากร ระบบจะแสดงข้อมูลติดต่อ สังกัด
                    และสถานที่ปฏิบัติงานทันที</p>
            </div>
            <div class="col-md-4 text-center text-md-right d-none d-md-block">
                <i class="fa fa-address-book-o" style="font-size: 4.5rem; color: rgba(255, 255, 255, 0.12);"></i>
            </div>
        </div>
    </div>
</div>

<div class="container pb-5">

    <!-- กล่องกรอกคำค้นหา (คง ID และ Name เดิมทั้งหมด) -->
    <div class="row justify-content-center mb-4">
        <div class="col-12">
            <div class="search-glass-card">
                <form action="" id="search-form" name="search-form" method="GET">
                    <label for="emp_name" class="font-weight-bold text-dark mb-2 small">
                        <i class="fa fa-user-circle text-success mr-1"></i> ระบุคำค้นหาบุคลากร
                    </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text search-prepend-modern">
                                <i class="fa fa-search mr-2"></i> ค้นหาตามชื่อ-นามสกุล
                            </span>
                        </div>
                        <input type="text" name="emp_name" id="emp_name" class="form-control search-input-modern"
                            autocomplete="off" placeholder="โปรดกรอก ชื่อ-นามสกุล ที่ต้องการค้นหา...">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ตารางแสดงผลลัพธ์ (คงโครงสร้างคอลัมน์ 11 ช่อง และ ID tbview_sn เดิมทุกประการ) -->
    <div class="card table-modern-card mb-4">
        <div class="card-body p-3 p-md-4 table-responsive">
            <table class="table table-hover display" id="tbview_sn">
                <thead>
                    <tr align="center">
                        <th>กอง/สำนัก</th>
                        <th>กลุ่ม</th>
                        <th style="width: 5%">#</th>
                        <th style="width: 20%">ชื่อ-นามสกุล</th>
                        <th style="width: 15%">ภาพ</th>
                        <th style="width: 12%">ตำแหน่ง</th>
                        <th style="width: 10%">สถานะ</th>
                        <th style="width: 15%">Tel .</th>
                        <th style="width: 5%">Fax</th>
                        <th style="width: 8%">e-mail</th>
                        <th style="width: 15%">สถานที่ทำงาน</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- ข้อมูลจะถูกโหลดและเรนเดอร์โดย frontend.js อัตโนมัติ -->
                </tbody>
            </table>
        </div>
    </div>

</div>
<script src="{{ asset('style-index/js/frontend.js') }}"></script>
<script>
    $(function() {
        $('#emp_name').on('keyup', function() {
            $('#search-form').submit();
        });

        function highlightGroupRows() {
            var tbody = document.querySelector('#tbview_sn tbody');
            if (!tbody) return;

            var rows = tbody.querySelectorAll('tr');
            rows.forEach(function(tr) {
                // ดึงเซลล์ทั้งหมดในแถวนั้น (ทั้ง td และ th)
                var cells = tr.querySelectorAll('td, th');

                // แถวจัดกลุ่มปกติจะมีแค่ 1 เซลล์ (colspan) หรือมีคลาสเกี่ยวกับ group
                var isGroupRow = (cells.length === 1) ||
                    tr.className.indexOf('group') !== -1 ||
                    tr.className.indexOf('dtrg') !== -1;

                if (isGroupRow && cells.length > 0) {
                    var cell = cells[0];
                    var html = cell.innerHTML;
                    var text = cell.textContent.trim();

                    // ข้ามแถวว่างหรือแถวแจ้งเตือน "ไม่พบข้อมูล"
                    if (!text || cell.classList.contains('dataTables_empty')) return;

                    // แถบหลัก: กอง/สำนัก (มีไอคอนหมุด หรือคำว่า ส่วนกลาง / กอง / สำนัก / ศูนย์ / สถาบัน)
                    var isMainDivision = tr.classList.contains('dtrg-level-0') ||
                        html.indexOf('fa-map-marker') !== -1 ||
                        html.indexOf('<i') !== -1 ||
                        text.indexOf('ส่วนกลาง') !== -1;

                    if (isMainDivision) {
                        // ล้างภาพพื้นหลังเดิมก่อนใส่สีเขียวมิ้นต์
                        tr.style.setProperty('background', '#d1fae5', 'important');
                        cell.style.setProperty('background', '#d1fae5', 'important');
                        cell.style.setProperty('color', '#064e3b', 'important');
                        cell.style.setProperty('font-weight', '700', 'important');
                        cell.style.setProperty('font-size', '1.05rem', 'important');
                        cell.style.setProperty('padding', '12px 18px', 'important');
                        cell.style.setProperty('border-left', '6px solid #059669', 'important');
                        cell.style.setProperty('border-top', '1px solid #a7f3d0', 'important');
                        cell.style.setProperty('border-bottom', '1px solid #a7f3d0', 'important');

                        cell.querySelectorAll('*').forEach(function(el) {
                            el.style.setProperty('color', '#064e3b', 'important');
                        });
                    } else {
                        // แถบย่อย: กลุ่มงาน (เช่น กลุ่มพัฒนาระบบบริหาร) -> สีเหลืองนวล
                        tr.style.setProperty('background', '#fef9c3', 'important');
                        cell.style.setProperty('background', '#fef9c3', 'important');
                        cell.style.setProperty('color', '#854d0e', 'important');
                        cell.style.setProperty('font-weight', '700', 'important');
                        cell.style.setProperty('font-size', '0.96rem', 'important');
                        cell.style.setProperty('padding', '10px 26px', 'important');
                        cell.style.setProperty('border-left', '6px solid #eab308', 'important');
                        cell.style.setProperty('border-bottom', '1px solid #fef08a', 'important');

                        cell.querySelectorAll('*').forEach(function(el) {
                            el.style.setProperty('color', '#854d0e', 'important');
                        });
                    }
                }
            });
        }

        // สั่งทำงานทั้งตอนโหลดเสร็จ, ทุกครั้งที่ DataTables วาดใหม่, และจับความเปลี่ยนแปลง DOM
        highlightGroupRows();
        $('#tbview_sn').on('draw.dt init.dt xhr.dt', function() {
            setTimeout(highlightGroupRows, 50);
        });

        var targetTable = document.getElementById('tbview_sn');
        if (targetTable) {
            var observer = new MutationObserver(function() {
                highlightGroupRows();
            });
            observer.observe(targetTable, {
                childList: true,
                subtree: true
            });
        }
    });
</script>

<script>
    (function() {
        // *** เปลี่ยน ID ตารางให้ตรงกับแต่ละหน้า: '#tbview_sn' | '#tbview_so' | '#tbview_st' ***
        var TARGET_TABLE_SELECTOR = '#tbview_sn';
        var FAV_STORAGE_KEY = 'dss_favorite_contacts_v1';

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
            } catch (e) {
                console.warn('Cannot save favorites to localStorage', e);
            }
        }

        // ดึงข้อมูลบุคลากรจากแถว <tr> เพื่อบันทึกลงคนโปรด (เอาเฉพาะชื่อไทย และชื่ออังกฤษ)
        function extractRowContactData(tr) {
            var tds = tr.querySelectorAll('td');
            if (tds.length < 7) return null;

            var nameCell = tds[0];
            var cloneName = nameCell.cloneNode(true);
            var starBtn = cloneName.querySelector('.btn-fav-star');
            if (starBtn) starBtn.remove();

            // ล้างคำว่า Emp. ID ออกก่อนแยกบรรทัด
            var cleanText = cloneName.innerText.replace(/Emp\.?\s*ID\s*:?\s*[A-Za-z0-9_-]+/gi, '');
            var rawLines = cleanText.split('\n').map(function(s) {
                return s.trim();
            }).filter(Boolean);

            var thaiName = rawLines[0] || '';
            var engName = rawLines[1] || '';
            if (!thaiName) return null;

            var contactKey = 'name_' + thaiName;

            // ดึงรูปภาพ
            var imgEl = tds[1] ? tds[1].querySelector('img') : null;
            var imgSrc = imgEl ? imgEl.getAttribute('src') : "{{ asset('style-index/images/nophoto.png') }}";

            // ดึงตำแหน่ง, เบอร์โทร, อีเมล, สถานที่ทำงาน
            var position = tds[2] ? tds[2].innerText.trim().replace(/\s+/g, ' ') : '-';
            var phone = tds[4] ? tds[4].innerText.trim().replace(/\s+/g, ' ') : '-';
            var email = tds[6] ? tds[6].innerText.trim().replace(/\s+/g, ' ') : '-';
            var location = tds[7] ? tds[7].innerText.trim().replace(/\s+/g, ' ') : '-';

            // หาชื่อ กอง/สำนัก จากแถวจัดกลุ่มด้านบน (ข้ามหัวข้อย่อย "ส่วนกลางของสังกัด")
            var division = '';
            var prev = tr.previousElementSibling;
            while (prev) {
                var prevCells = prev.querySelectorAll('td, th');
                if (prevCells.length === 1) {
                    var txt = prevCells[0].innerText.trim();
                    // ข้ามแถวกลุ่มย่อยอย่าง "ส่วนกลางของสังกัด" หรือแถวที่มีคำว่า "กลุ่ม..."
                    if (txt !== '' && txt.indexOf('ส่วนกลางของสังกัด') === -1 && prev.className.indexOf('group') !==
                        -1) {
                        // ถ้าเป็นแถวระดับกอง/สำนัก (มักเป็น level 0 หรือมีไอคอนอาคาร/หมุดหลัก)
                        if (prev.classList.contains('dtrg-level-0') || prevCells[0].innerHTML.indexOf(
                            'fa-building') !== -1 || prevCells[0].innerHTML.indexOf('fa-map-marker') !== -1) {
                            division = txt.replace(/\(\s*\d+\s*คน\s*\)/g, '').trim();
                            break;
                        }
                        // เก็บค่าสำรองไว้กรณีตารางไม่ได้แยก class dtrg-level-0
                        if (!division && txt.indexOf('กลุ่ม') !== 0 && txt.indexOf('ฝ่าย') !== 0) {
                            division = txt.replace(/\(\s*\d+\s*คน\s*\)/g, '').trim();
                        }
                    }
                }
                prev = prev.previousElementSibling;
            }

            return {
                key: contactKey,
                name: thaiName,
                engName: engName,
                image: imgSrc,
                position: position,
                phone: phone,
                email: email,
                location: location,
                division: division,
                savedAt: Date.now()
            };
        }

        // ฉีดปุ่มดาวเข้าไปในทุกแถวข้อมูลของตาราง
        function injectFavoriteStars() {
            var tbody = document.querySelector(TARGET_TABLE_SELECTOR + ' tbody');
            if (!tbody) return;

            var favList = getFavorites();
            var favKeys = favList.map(function(item) {
                return item.key;
            });

            var rows = tbody.querySelectorAll('tr');
            rows.forEach(function(tr) {
                var tds = tr.querySelectorAll('td');
                // ข้ามแถวจัดกลุ่ม (colspan) หรือแถวว่าง
                if (tds.length < 7) return;

                var nameCell = tds[0];
                if (nameCell.querySelector('.btn-fav-star')) return; // มีปุ่มดาวแล้วข้ามไป

                var contactData = extractRowContactData(tr);
                if (!contactData) return;

                var isFav = favKeys.indexOf(contactData.key) !== -1;

                var btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'btn-fav-star mr-1';
                btn.title = isFav ? 'นำออกจากคนโปรด' : 'บันทึกเป็นคนโปรด';
                btn.innerHTML = isFav ? '<i class="fa fa-star"></i>' : '<i class="fa fa-star-o"></i>';

                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    var currentList = getFavorites();
                    var idx = currentList.findIndex(function(x) {
                        return x.key === contactData.key;
                    });

                    if (idx !== -1) {
                        // ลบออกจากคนโปรด
                        currentList.splice(idx, 1);
                        btn.innerHTML = '<i class="fa fa-star-o"></i>';
                        btn.title = 'บันทึกเป็นคนโปรด';
                    } else {
                        // เพิ่มเข้าคนโปรด (อัปเดตข้อมูลล่าสุดจากแถว)
                        var freshData = extractRowContactData(tr) || contactData;
                        currentList.unshift(freshData);
                        btn.innerHTML = '<i class="fa fa-star"></i>';
                        btn.title = 'นำออกจากคนโปรด';
                    }
                    saveFavorites(currentList);
                });

                // แทรกปุ่มดาวไว้หน้าสุดของช่องชื่อ-นามสกุล
                nameCell.insertBefore(btn, nameCell.firstChild);
            });
        }

        // เฝ้าดูการเปลี่ยนแปลงของตารางแบบ Real-time
        $(function() {
            injectFavoriteStars();
            $(TARGET_TABLE_SELECTOR).on('draw.dt init.dt xhr.dt', function() {
                setTimeout(injectFavoriteStars, 60);
            });

            var tableEl = document.querySelector(TARGET_TABLE_SELECTOR);
            if (tableEl) {
                var observer = new MutationObserver(function() {
                    injectFavoriteStars();
                });
                observer.observe(tableEl, {
                    childList: true,
                    subtree: true
                });
            }
        });
    })();
</script>

@include('frontend.footer')
