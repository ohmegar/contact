<div class="home-search"> 
  <div class="section-topic">ค้นหาข้อมูล</div>

  <div class="row">

      <div class="col-md-4 col-lg-4"> 
        <a href="{{ url('/sn') }}">
          <figure class="snip1355">
            <img src="{{ asset('style-index/images/s1.jpg') }}">
            <figcaption>
              <h2>ตามชื่อ-นามสกุล</h2>
              <p></p>
            </figcaption>
          </figure>
        </a>
      </div>

      <div class="col-md-4 col-lg-4"> 
        <a href="{{ url('/st') }}">
          <figure class="snip1355">
            <img src="{{ asset('style-index/images/s2.jpg') }}">
            <figcaption>
              <h2>ตามเบอร์โทร</h2>
              <p></p>
            </figcaption>
          </figure>
        </a>
      </div>

      <div class="col-md-4 col-lg-4"> 
        <a href="{{ url('/so') }}">
          <figure class="snip1355">
            <img src="{{ asset('style-index/images/s3.jpg') }}">
            <figcaption>
              <h2>ตามโครงสร้าง</h2>
              <p></p>
            </figcaption>
          </figure>
        </a>
      </div>

    </div>
    <center><button type="button" class="btn btn-dark"><p style="font-size: 18px; color:rgb(255, 255, 255)"><i class="fa fa-address-card"></i>
        <a href="{{ url('/info-form') }}" style="color:#ffffff;">แบบฟอร์มออนไลน์ขอแก้ไขข้อมูล</p></a>
    </button></center> 

</div>  


<div class="home-stat">   
  <div class="section-topic">สถิติข้อมูลจำนวนบุคลากร วศ.</div>

      <div class="row">
        <div class="col-md-6 col-lg-6"> 
            <figure class="snip1219">
              <img src="{{ asset('style-index/images/stat.jpg') }}">
              <figcaption>
                <h1>รวมบุคลากร วศ.<br> {{ $pall }} คน</h1>
              </figcaption>
            </figure>
        </div>
        <div class="col-md-6 col-lg-6"> 
            <figure class="snip1219">
              <img src="{{ asset('style-index/images/stat.jpg') }}">
              <figcaption>
                <h1>ข้าราชการ <br> {{ $p1 }} คน</h1>
              </figcaption>
            </figure>
        </div>
      </div>
  
      <div class="row">
          <div class="col-md-4 col-lg-4"> 
              <figure class="snip1219">
                <img src="{{ asset('style-index/images/stat.jpg') }}">
                <figcaption>
                  <h1>ลูกจ้างประจำ <br> {{ $p2 }} คน</h1>
                </figcaption>
              </figure>
          </div>
          <div class="col-md-4 col-lg-4"> 
            <figure class="snip1219">
              <img src="{{ asset('style-index/images/stat.jpg') }}">
              <figcaption>
                <h1>พนักงานราชการ <br> {{ $p4 }} คน</h1>
              </figcaption>
            </figure>
          </div>
          <div class="col-md-4 col-lg-4"> 
            <figure class="snip1219">
              <img src="{{ asset('style-index/images/stat.jpg') }}">
              <figcaption>
                <h1>จ้างเหมาบริการ <br> {{ $p3 }} คน</h1>
              </figcaption>
            </figure>
          </div>
      </div> 






<div id="clockbox" align="center" style="font-size: 18px; color:rgb(255, 255, 255)"></div>

</div>



<script type="text/javascript">
    tday  =new Array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
    // tday  =new Array("อาทิตย์ สีแดง","จันทร์ สีเหลือง","อังคาร สีชมพู","พุธ สีเขียว","พฤหัสบดี สีส้ม","ศุกร์ สีฟ้า","เสาร์ สีม่วง");
    ttday =new Array("","","","","","","");
    tmonth=new Array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");

    function GetClock(){
        d = new Date();
        nday   = d.getDay();
        nmonth = d.getMonth();
        ndate  = d.getDate();
        nyeara = d.getYear()+543;
        nhour  = d.getHours();
        nmin   = d.getMinutes();
        nsec   = d.getSeconds();

        if(nyeara<1000){nyeara=(""+(nyeara+11900)).substring(1,5);}
        else{nyeara=(""+(nyeara+10543)).substring(1,5);}

        if(nmin <= 9) {nmin = "0" +nmin;}
        if(nsec <= 9) {nsec = "0" +nsec;}

        document.getElementById('clockbox').innerHTML="ข้อมูล ณ วัน"+tday[nday]+"ที่ "+ndate+" "+tmonth[nmonth]+" "+nyeara+"<br> เวลา "+nhour+":"+nmin+":"+nsec+" น.";

        setTimeout("GetClock()", 1000);
    }
    window.onload=function(){GetClock();}

</script>
