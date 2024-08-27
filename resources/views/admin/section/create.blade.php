<div class="modal" id="addSection">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add section</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <form action="{{route('section.store')}}" method="POST">
            @csrf
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                <input type="text" name="name" id="name" class="form-control"
                placeholder="please enter name of section" required>
                </div>
                <br>
                <div class="row">
                <textarea name="desc" id="desc"
                placeholder="Please enter description" cols="10" rows="3">
                </textarea>
                </div>
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
