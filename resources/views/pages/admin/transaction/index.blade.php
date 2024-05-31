@extends('layouts.parent')

@section('title', 'myTransaction')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Transaction</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                    <li class="breadcrumb-item active">My Transaction</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card-title"><i class="bi bi-cart"></i> List Transaction</div>

            <table class="table table-striped table-hover table-bordered datatable">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Name Account</td>
                        <td>Receiver Name</td>
                        <td>Receiver Email</td>
                        <td>Receiver Phone</td>
                        <td>Status</td>
                        <td>Total Price</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($Transaction as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ auth()->user()->name }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>
                                @if ($row->status == 'EXPIRED')
                                    <span class="badge bg-danger">Expired</span>
                                @elseif ($row->status == 'PENDING')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif ($row->status == 'SETTLEMENT')
                                    <span class="badge bg-info">Settlement</span>
                                @else
                                    <span class="badge bg-success">Success</span>
                                @endif
                            </td>
                            <td>IDR. {{ number_format($row->total_price) }}</td>
                            <td>
                                {{-- <a href="{{ route('admin.transaction.showDataByIdAndSlug', [$row->slug, $row->id]) }}"
                                    class="btn btn-warning">
                                    Show</a> --}}

                                <a href="{{ route('admin.showTransactionUseAdminWithSlugAndId', [$row->id, $row->slug]) }}">test</a>

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#basicModal{{ $row->id }}">
                                    Edit
                                </button>
                                @include('pages.admin.transaction.modal')
                            </td>
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
