@extends('layouts.parent')

@section('title', 'Category')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Product</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Product</a></li>
                    <li class="breadcrumb-item active">Data Product
                    <li>
                </ol>
            </nav>
        </div>

        <div class="card-body">
            <!-- Basic Modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalCreate">
                <i class="bi bi-plus mr-3"></i>Add Product
            </button>

            @include('pages.admin.product.modalCreate')
            <!-- Table with stripped rows -->

            <div class="datatable-top">
                <div class="datatable-dropdown">
                    <label>
                        <select class="datatable-selector">
                            <option value="5">5</option>
                            <option value="10" selected="">10</option>
                            <option value="15">15</option>
                            <option value="-1">All</option>
                        </select> entries per page
                    </label>
                </div>
                <div class="datatable-search">
                    <input class="datatable-input" placeholder="Search..." type="search" title="Search within table">
                </div>
            </div>
            <div class="datatable-container">
                <table class="table datatable datatable-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>category</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($product as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->category->name }}</td>
                                <td>{!! $row->description !!}</td>
                                <td>Rp.{{ number_format($row->price) }}</td>
                                <td>
                                    <a href="{{ route('admin.product.gallery.index', $row->id) }}" class="btn btn-primary">
                                        <i class="bi bi-card-image"></i>
                                    </a>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editModalProduct{{ $row->id }}">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    @include('pages.admin.product.modalEdit')
                                    <form action="{{ route('admin.product.destroy', $row->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Data Is Empty</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="datatable-bottom">
                <div class="datatable-info">Showing 1 to 1 of 1 entries</div>
            </div>
            <!-- End Table with stripped rows -->

        </div>
    </div>
@endsection

@push('script')
    <script src="text/javascript">
        ;

        function($) {
            function readURL('input') {
                var $prev = $('previewLogo')

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $prev.attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                    $prev.attr('class', '');

                } else {
                    $prev.attr('class', 'visually-hidden')
                }
            }
        }
    </script>
@endpush
