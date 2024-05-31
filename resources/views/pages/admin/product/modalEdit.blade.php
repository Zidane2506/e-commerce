<div class="card-body">
    <div class="modal fade" id="editModalProduct{{ $row->id }}" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal Create</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.product.update', $row->id ) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-2 mt-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="name" id="productName">
                        </div>
                        <label class="mb-2 mt-3">Category</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="category_id">
                                <option selected="">==== Choose Category ====</option>
                                @foreach ($category as $row)
                                    <option value="{{ $row->id }}"> {{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="mt-3 mb-2">Product Description</label>
                        <textarea name="description" id="editors, {{ $row->id }}" cols="2">
                </textarea>
                        <div class="mt-3 mb-2">
                            <label for="productPrice" class="form-label">Product Price</label>
                            <input type="number" class="form-control" name="price" id="productPrice">
                        </div>
                </div>

                <div class="modal-footer mt-5">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div><!-- End Basic Modal-->
</div>
