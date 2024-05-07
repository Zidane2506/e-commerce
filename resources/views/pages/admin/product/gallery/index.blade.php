@extends('layouts.parent')

@section('title', 'Category')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Product Gallery</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Product</a></li>
                    <li class="breadcrumb-item active">Data Product Gallery
                    <li>
                </ol>
            </nav>

            <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#basicModal">
                <i class="bi bi-plus mr-3"></i>Add Gallery
            </button>

            <div class="card-body">

                @include('pages.admin.product.gallery.modalCreate')

            </div>
            <table class="table">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Image</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($product->product_galleries as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{-- <img src="" alt="Ini gambar"> --}}
                            </td>
                            <td>
                                {{-- <form action="{{ route('admin.product.gallery.destroy') }}" method=""></form> --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Data not found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    @endsection
