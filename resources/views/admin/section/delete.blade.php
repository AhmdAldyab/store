<div class="modal" id="deleteSection{{$section->id}}">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete section</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <form action="{{route('section.destroy')}}" method="POST">
            @csrf
            @method('delete')
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="id" value="{{$section->id}}">
                <input type="text" name="name" id="name" class="form-control"
                value="Are you sure to delete" readonly>
                </div>
                <br>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="submit" value="submit" class="btn btn-success">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </form>

      </div>
    </div>
  </div>
