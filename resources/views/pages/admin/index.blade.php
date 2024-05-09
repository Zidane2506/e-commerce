@extends('layouts.parent')

@section('title', 'Dashboard')
@section('content')
    <div class="section dashboard">
        <div class="card info-card customers-card">
            <div class="card-body">
                <h5 class="card-title">Dashboard <span>| {{ auth()->user()->name }}</span></h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ auth()->user()->name }}</h6>
                        <span class="text-danger small pt-1 fw-bold">{{ auth()->user()->email }}</span>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="section dashboard">
        <div class="row">
            <div class="col-md-4">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Category</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $category }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Product</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-box"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $product }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">User</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-person"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $user }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Email</td>
                        <td>Name</td>
                        <td>Role</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $row->email }}
                            </td>
                            <td>
                                {{ $row->name }}
                            </td>
                            <td>
                                {{ $row->role }}
                            </td>
                            <td>
                                {{-- <form action="#" method="post"></form> --}}
                                    <button class="btn btn-warning">
                                        <i class="bi bi-pencil">Change Password</i>
                                    </button>
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
    </div>
@endsection
