@extends('layouts.app')
@section('content')

    <div class="container">
        @include('layouts.flash')
        
        <div class="row g-5">
            <div class="col-6">
                <a href="/dashboard" class=" text-decoration-none">
                    <div class="card bg-secondary p-5">
                        <i class="bi bi-house-fill text-light text-center h1 fw-bold"></i>
                        <p class="text-light text-center h3 fw-bold">Dashboard</p>
                    </div>
                </a>
            </div>
            <div class="col-6">
                <a href="/banner" class=" text-decoration-none">
                    <div class="card bg-success p-5">
                        <i class="bi bi-card-image text-light text-center h1 fw-bold"></i>
                        <p class="text-light text-center h3 fw-bold">Dashboard Banner</p>
                    </div>
                </a>
            </div>
            <div class="col-6">
                <a href="/top-up" class=" text-decoration-none">
                    <div class="card bg-primary p-5">
                        <i class="bi bi-wallet2 text-light text-center h1 fw-bold"></i>
                        <p class="text-light text-center h3 fw-bold">Top-Up</p>
                    </div>
                </a>
            </div>
            <div class="col-6">
                <a href="/buy-account" class=" text-decoration-none">
                    <div class="card bg-warning p-5">
                        <i class="bi bi-currency-dollar text-light text-center h1 fw-bold"></i>
                        <p class="text-light text-center h3 fw-bold">Buy Account</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection
