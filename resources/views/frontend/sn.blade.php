@section('title')
    | ค้นหาตามชื่อ
@endsection

@include('frontend.head')

@include('frontend.topuser') 

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="section-topic">ค้นหาตามชื่อ-นามสกุล</div>
        </div>
    </div>

            <img class="position-absolute pointer-events-none" src="{{ asset('style-index/images/vector-1.png') }}" alt="vector-2"
            style="z-index: -1;width: 30vw;top: 130;left: 0;">
                

                    <div class="col-md-12">
                        <form action="" id="search-form" name="search-form" method="GET">                        
                            <div class="input-group">
                                <span class="input-group-text" style="background-image: linear-gradient(to right,#000000,#7c7c7c); color: #FFF">ค้นหาข้อมูลตามชื่อ-นามสกุล : </span>
                                <input type="text" name="emp_name" id="emp_name" class="form-control" autocomplete="off" placeholder="โปรดกรอก ชื่อ-นามสกุล ถ้าหากทราบ" >
                            </div>
                                <br><center><span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> ค้นหา</button>
                                    <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> ล้างค่า</button>
                                </span> </center>   
                        </form>
                    </div>
                
                    <div class="card mb-3">        
                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-striped table-sm display" id="tbview_sn">
                                <thead>
                                    <tr align="center" style="background-image: linear-gradient(to right, #0b3e02,#0b3e02); color: #FFF">
                                        <th>กอง/สำนัก</th>
                                        <th>กลุ่ม</th>
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
                
                                </tbody>
                            </table>
                        </div>
                    </div>    
</div>


</body>


@include('backend.modals.modal-indexviewall')


<script src="{{ asset('style-index/js/frontend.js') }}"></script>


@include('frontend.footer')


