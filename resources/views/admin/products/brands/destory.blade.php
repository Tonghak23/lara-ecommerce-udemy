<form action="{{route('brand.destroy',$lists->id)}}"  enctype="multipart/form-data">
    <div class="modal fade" tabindex="-1" id="ModalDestroy{{$lists->id}}" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-danger">Delete Record?<i class="fa fa-trash ml-1 text-danger"></i></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btnclose">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are yor sure to delete this record??</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success btnclose" data-dismiss="modal">Close</button>
              <a href="{{route('brand.destroy',$lists->id)}}"><button type="submit" class="btn btn-danger">Delete</button></a>
            </div>
          </div>
        </div>
      </div>
</form>
