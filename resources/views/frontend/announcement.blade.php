@section('title')
    | แนวทางการใช้งาน
@endsection

@include('frontend.head')
@include('frontend.topuser')

<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="section-topic">แจ้งเพื่อโปรดทราบก่อน</div>
        </div>
    </div>


            
                <div class="col-md-12">
                    <h3 style="text-align: justify">
                        1. ท่านสามารถแก้ไขข้อมูลส่วนตัวได้ด้วยตนเอง คือ ข้อมูลเบอร์โทรศัพท์ Fax. อีเมล ภาพถ่าย และสถานที่ทำงานใน วศ. <br>
                        2.ข้าราชการ ลูกจ้างประจำ และพนักงานราชการ หากพบข้อมูลที่ผิดพลาด คือ ชื่อ-นามสกุล (ไทยและอังกฤษ) หน่วยงานที่สังกัด และตำแหน่ง โปรดติดต่อ บค.สล. คุณณัฐธนันฯ โทร 7075 เท่านั้น <br>
                        3.จ้างเหมาบริการ หากพบข้อมูลที่ผิดพลาด คือ ชื่อ-นามสกุล (ไทยและอังกฤษ) หน่วยงานที่สังกัด และตำแหน่ง โปรดติดต่อ บค.สล. คุณสร้อยสุดาฯ โทร 7077 เท่านั้น<br>
                        4.หากจ้างเหมาบริการลาออกแล้ว ยังปรากฏข้อมูลในระบบ โปรดแจ้งกลุ่มพัสดุ เพื่อดำเนินการแก้ไขต่อไป
                    </h3>
                    ขอขอบคุณในความร่วมมือเป็นอย่างดี
                    <br><br>
                        <center>
                        <button type="button" class="btn btn-success btn-lg" onclick="window.location.href='{{ url('/login') }}'"><i class="fa fa-sign-in"></i> เข้าสู่ระบบ</button>
                        </center>
                        <br><br><br>
                </div>
                
</div>



</body>

@include('frontend.footer')