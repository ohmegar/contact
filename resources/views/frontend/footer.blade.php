<img class="position-absolute pointer-events-none" src="{{ asset('style-index/images/vector-2.png') }}" alt="vector-2"
style="y-index: -1;width: 10vw;bottom: 500;right: 0;">


<!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row border-top">
                  <div class="col-md-6">
                     <div class="row">
                        <div class="col-md-12 offset-md-1 padding_bottom1">
                           <h3>ข้อมูลการติดต่อ</h3>
                           <ul class="cont">
                              <li>กลุ่มงานเทคโนโลยีสารสนเทศ (ทส.) <br> กรมวิทยาศาสตร์บริการ (วศ.)</li>
                              <li><i class="fa fa-phone"></i> โทรศัพท์ 0-2201-7513</li>
                              {{-- <li><a href="https://lookerstudio.google.com/u/0/reporting/34beb533-005a-4190-bcc5-2da0fde3e3f6/page/6zXD" target="_new"><i class="fa fa-bar-chart"></i> สถิติการใช้งาน</a></li> --}}
                              <li><i class="fa fa-envelope" aria-hidden="true"></i> อีเมลติดต่อสอบถาม  helpdesk@dss.go.th</li>
                              <li><a href="{{ url('/login') }}"><i class="fa fa-user"></i> เข้าสู่ระบบ (สำหรับเจ้าหน้าที่ Admin เท่านั้น)  </a></li>
                           </ul>
                        </div>
                     </div>
                  </div>            
                  <div class="col-md-6">
                     <div class="row">
                        <div class="col-md-12 offset-md-1 padding_bottom1">
                           <h3>เกี่ยวกับเรา</h3>
                           <ul class="cont">
                              <li>กลุ่มเทคโนโลยีสารสนเทศ ได้จัดทำระบบนามสงเคราะห์ เพื่อใช้สำหรับให้บริการบุคลากร วศ.
                                 ได้ดำเนินการค้นหาข้อมูลเกี่ยวกับบุคลากรภายใน วศ. ได้อย่างสะดวก
                                 รวดเร็ว และมีประสิทธิภาพ เพื่อตอบโจทย์ยุคดิจิทัล <br>Version 2.0 (2023)</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>© DSS {{ date("Y") }} All Rights Reserved. </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->

      
      <!-- Javascript files-->
      {{-- <script src="{{ asset('style-index/js/popper.min.js') }}"></script> --}}
      <script src="{{ asset('style-index/js/bootstrap.bundle.min.js') }}"></script>

      <!-- sidebar -->
      <script src="{{ asset('style-index/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      {{-- <script src="{{ asset('style-index/js/custom.js') }}"></script> --}}
      {{-- <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script> --}}

      <!-- SweetAlert2 -->
      <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>


</html>