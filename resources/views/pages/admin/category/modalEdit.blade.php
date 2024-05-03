<div class="card-body">
    <div class="modal fade" id="editModalCategory{{ $row->id }}" tabindex="-1" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category {{ $row->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.category.update',$row->id ) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label for="categoryName" class="form-label">Category Name</label>
                            <input type="text" class="form-control" name="name" id="categoryName"
                            value="{{ $row->name }}">
                        </div>
                        <div class="col-12">
                            <label for="categoryImage" class="form-label">Category Image</label>
                            <input type="file" class="form-control" name="image" id="categoryImage">
                        </div>
                        <div class="col-12">
                            <img src="#" alt="Category-Image" id="previewLogo"
                                class="visually-hidden img-thumbnail">
                        </div>
                        <div class="modal-footer mt-5">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- End Basic Modal-->
</div>
