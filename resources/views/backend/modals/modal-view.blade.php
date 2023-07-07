<div class="modal fade" id="modal-view" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title"><i class="fas fa-search"></i> รายละเอียดของลิ้งก์</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        @csrf
            <div class="row">
                <div class="col col-sm-12 col-md-12">  

                  <div class="row">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">

                      {{-- <iframe src ="../v/{{ $id }}" width="100%" height="600px" frameBorder="0"></iframe> --}}

                    </div>
                  </div>
            
                </div>
            </div>
        </div>
            {{-- <input type="hidden" name="c_id" id="c_id" value=""> --}}
            {{-- <input type="text" name="status" id="status" value=""> --}}


        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> ปิด</button>
            

        {{-- {!! Form::close() !!} --}}
      {{-- </form> --}}
    </div>
    <!-- /.modal-content --> 
  </div>
  <!-- /.modal -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->