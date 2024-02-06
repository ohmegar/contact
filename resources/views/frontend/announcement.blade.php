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
                        2.ข้าราชการ ลูกจ้างประจำ และพนักงานราชการ หากพบข้อมูลที่ผิดพลาด เช่น ชื่อ-นามสกุล (ไทยและอังกฤษ) หน่วยงานที่สังกัด และตำแหน่ง โปรดติดต่อ &#9742; บค.สล. เท่านั้น <br>
                        3.จ้างเหมาบริการ หากพบข้อมูลที่ผิดพลาด เช่น ลาออกแล้ว โปรดติดต่อ &#9742; พด.สล. เท่านั้น
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