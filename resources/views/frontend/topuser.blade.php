   <!-- header -->
      <header>
        <!-- header inner -->
        <div class="header">
           <div class="container-fluid">
              <div class="row">
                 <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                       <div class="center-desk">
                          <div class="logo">
                             <a href="{{ url('/') }}"><img src="{{ asset('style-index/images/logo.png') }}" alt="#" /></a>
                          </div>
                       </div>
                    </div>
                 </div>

                 <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <div class="header_information">
                       <nav class="navigation navbar navbar-expand-md navbar-dark ">
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                          </button>
                          <div class="collapse navbar-collapse" id="navbarsExample04">
                             <ul class="navbar-nav mr-auto">
                                 <li class="nav-item">
                                    <a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}"><i class="fa fa-home"></i> หน้าหลัก  </a>
                                 </li> 
                                 <li class="nav-item">
                                    <a href="{{ url('/sn') }}" class="nav-link {{ Request::is('sn') ? 'active' : '' }}"><i class="fa fa-search"></i> ค้นหาตามชื่อ-นามสกุล</a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="{{ url('/st') }}" class="nav-link {{ Request::is('st') ? 'active' : '' }}"><i class="fa fa-search"></i> ค้นหาตามเบอร์โทร</a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="{{ url('/so') }}" class="nav-link {{ Request::is('so') ? 'active' : '' }}"><i class="fa fa-search"></i> ค้นหาตามโครงสร้าง</a>
                                 </li>
                                 <li class="nav-item">
                                    <a href="{{ url(asset('/manual/manualadmin.pdf')) }}" target="_NEW" class="nav-link"><i class="fa fa-book"></i> คู่มือการใช้งาน</a>
                                 </li>

                              </ul>
                             <!-- <div class="sign_btn"><a href="#">Get A Quote</a></div> -->
                          </div>
                       </nav>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </header>
     <!-- end header inner -->
     <!-- end header -->