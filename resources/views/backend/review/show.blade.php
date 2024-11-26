@extends('backend.template.main')

@section('title', 'Review: ' . $review->transaction->code)

@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('panel.dashboard') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('panel.review.index') }}">Review</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $review->transaction->code }}</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Review: {{ $review->transaction->code }}</h1>
                <p class="mb-0">Penyewa: {{ $review->transaction->name }}</p>
            </div>
            <div>
                <a href="{{ route('panel.review.index') }}" class="btn btn-outline-gray-600 d-inline-flex align-items-center">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    {{-- table --}}
    <div class="table-responsive">
        <div class="card border-0 shadow mb-4">
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>Nama</th>
                        <td>: {{ $review->transaction->name }}</td>
                    </tr>

                    <tr>
                        <th>Mobil</th>
                        <td>: {{ $review->transaction->car->name }}</td>
                    </tr>

                    <tr>
                        <th>Penilaian</th>
                        <td>: {{ $review->rate}}</td>
                    </tr>

                    <tr>
                        <th>Komentar</th>
                        <td style="word-break: break-word; max-width: 100%; white-space: normal;">: {{ $review->comment }}</td>
                    </tr>

                    <tr>
                        <th>Tanggal Dibuat</th>
                        <td>: {{ date('Y-m-d H:i:s', strtotime($review->created_at)) }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
