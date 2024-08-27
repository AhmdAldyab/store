<div class="modal" id="addprice{{$item->id}}">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add price</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <form action="{{route('item.add')}}" method="POST">
            @csrf
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="id" value="{{$item->id}}">
                <input type="number" name="priceSell" id="priceSell" class="form-control"
                placeholder="Please enter the price of item" required>
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
