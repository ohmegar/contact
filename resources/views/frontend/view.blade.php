@section('title')
   | รายละเอียด
@endsection

@include('frontend.head')
@include('frontend.topuser')

<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="titlepage"><br><br>
               <h1>ข้อมูล Short Link URL / QR Code</h1>
         </div>
      </div>
   </div>


      <div class="card card-dark">

         <div class="card-body">

            @foreach ($datas as $data)
            
            <div class="row">
               <div class="col col-sm-12 col-md-12">  

                     <div class="row">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        {{ Form::label('l_name_view','ชื่อลิ้งก์')}} 
                        {{ Form::textarea('l_name_view', $data->l_name, ['class' => 'form-control','id'=>'l_name_view', 'rows'=> 2, 'disabled']) }}
                        </div>
                     </div>
               
                     <div class="row">
                        <div class="form-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
                           {{ Form::label('l_url_short_view','ลิ้งก์สั้น')}} 
                           {{ Form::text('l_url_short_view', $data->l_url_short, ['class' => 'form-control','id'=>'l_url_short_view', 'rows'=> 1,'']) }}
                        </div>

                        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3">
                           {{ Form::label('l_url_short_view_copy','คัดลอกลิ้งก์สั้น เพื่อนำไปเผยแพร่')}}
                           {{ Form::textarea('l_url_short_view_copy', $data->l_url_short, ['class' => 'form-control','id'=>'l_url_short_view_copy', 'rows'=> 1,'hidden']) }}
                           <button type="button" class="btn btn-success btn-block" id="l_url_short_view_copy" data-clipboard-target="#l_url_short_view" >คัดลอกลิ้งก์สั้น </button>    
                        </div>
                     </div>
                     

                     <div class="row">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <center>    

                              <img src="data:image/png;base64,{{ base64_encode(QrCode::size(400)->format('png')->margin(1)->errorCorrection('M')->merge(public_path('images/logo-qr.png'),0.3, true)->generate($data->l_url_short) ) }}">
                              
                              <br><br>
                     
                              <button type="button" class="btn btn-success"><i class="fa fa-download"></i> 
                              <a href="{{ asset('storage/qr/'."$data->l_code".'.png') }}" download> <span style="color: rgb(255, 255, 255)"> ดาวน์โหลด </span></a>
                              </button>

                           </center>
                           </div>
                     </div>


                     
                  </div>
               </div>

               @endforeach
         </div>
         <!-- /.card-body -->

         <div class="modal-footer">
               <button type="button" class="btn btn-danger btn-lg" onclick="history.back()"><i class="fa fa-backward"></i> ย้อนกลับ</button>
         </div>

   </div>
   <!-- /.card -->

</div>


</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.11/clipboard.js"></script>
<script>
      var clipboard = new ClipboardJS('.btn');
</script>


@include('backend.modals.modal-copyLink')


<script src="{{ asset('js/backend-dss.js') }}"></script>



@include('frontend.footer')