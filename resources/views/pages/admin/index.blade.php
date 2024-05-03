@extends('layouts.parent')

@section('title', 'Dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Hello {{ Auth::user()->name }}</h5>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>
    </div>

    </div>
@endsection