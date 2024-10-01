@section('title')
    | แจ้งเพื่อโปรดทราบก่อน
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
                        1. ท่านสามารถแก้ไขข้อมูลส่วนตัวได้ด้วยตนเอง ดังนี้ <br>
                        &nbsp; &#8226; เบอร์โทรศัพท์ <br>
                        &nbsp; &#8226; เบอร์ Fax. <br>
                        &nbsp; &#8226; อีเมล <br>
                        &nbsp; &#8226; ภาพถ่าย <br>
                        &nbsp; &#8226; สถานที่ทำงานใน วศ. เท่านั้น <br>
                        2.<b style="color:#ff0000;">ข้าราชการ ลูกจ้างประจำ และพนักงานราชการ </b> หากพบข้อมูลที่ผิดพลาด เช่น ชื่อ-นามสกุล (ไทยและอังกฤษ) ตำแหน่ง หรือหน่วยงานที่สังกัด โปรดติดต่อ &#9742; <b style="color:#ff0000;">บค.สล. </b> เท่านั้น <br>
                        3.<b style="color:#002aff;">พนักงานกรมวิทยาศาสตร์บริการ </b> หากพบข้อมูลที่ผิดพลาด เช่น ลาออก/หมดสัญญาแล้ว โปรดติดต่อ &#9742; <b style="color:#002aff;">พด.สล. </b> เท่านั้น
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