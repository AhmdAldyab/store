<div class="modal" id="addItem{{$item->id}}">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add item</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <form action="{{route('item.addItem')}}" method="POST">
            @csrf
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row mb-2">
                    <input type="hidden" name="id" value="{{$item->id}}">
                <input type="number" name="quantity" id="quantity" class="form-control"
                placeholder="Please enter the number of item" required>
                </div>
                <div class="row mb-2">
                    <div class="col-6">
                        <input type="text" name="supplier" id="supplier" class="form-control"
                        placeholder="Please enter supplier" required>
                    </div>
                    <div class="col-6">
                        <input type="date" name="date" id="date" class="form-control"
                        placeholder="Please enter the date of vaild" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="New" id="New">
                        <label class="form-check-label" for="New">
                          New order
                        </label>
                      </div>
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
