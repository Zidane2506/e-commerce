<div class="modal fade" id="basicModal{{ $row->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $row->name }} - {{ $row->phone }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.transaction.update', $row->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label class="col-sm-2 col-form-label">Status</label>
                    <select class="form-select" aria-label="Default select example" name="status">
                        <option selected="">Choose Status</option>
                        <option value="PENDING">PENDING</option>
                        <option value="SETTLEMENT">SETTLEMENT</option>
                        <option value="EXPIRED">EXPIRED</option>
                        <option value="SUCCESS">SUCCESS</option>
                    </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
