@extends('layouts.parent')

@section('title', 'myTransaction')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Category</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Category</a></li>
                    <li class="breadcrumb-item active">Data Category</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-title"><i class="bi bi-cart"></i>  List Transaction</div>

            <table class="table table-striped table-hover table-bordered datatable">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Name Account</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>Total Price</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($myTransaction as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ auth()->user()->name }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>{{ $row->totalPrice }}</td>
                        <td></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">Data Is Empty</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
