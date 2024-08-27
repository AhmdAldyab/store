<div class="modal" id="editorder{{$order->id}}">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit order</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <form action="{{route('orderCustomer.update')}}" method="POST">
            @csrf
            @method('patch')
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row mb-2">
                    <input type="hidden" name="id" value="{{$order->id}}">
                <input type="number" name="quantity" id="quantity" class="form-control"
                placeholder="Please enter the number of item" required>
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
