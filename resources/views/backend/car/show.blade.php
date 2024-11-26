@extends('backend.template.main')

@section('title', 'Car: ' . $car->name)

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
                <li class="breadcrumb-item"><a href="{{ route('panel.car.index') }}">Mobil</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $car->name }}</li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Mobil: {{ $car->name }}</h1>
                <p class="mb-0">Sewa: {{ $car->name }} Mobil PRC</p>
            </div>
            <div>
                <a href="{{ route('panel.car.index') }}" class="btn btn-outline-gray-600 d-inline-flex align-items-center">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    @session('success')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endsession

    {{-- table --}}
<div class="card border-0 shadow mb-4">
    <div class="card-body">
        <table class="table table-striped">
            <tr>
                <th>Nama</th>
                <td>: {{ $car->name }}</td>
            </tr>
            <tr>
                <th>Slug</th>
                <td>: {{ $car->slug }}</td>
            </tr>
            <tr>
                <th>Bangku</th>
                <td>: {{ $car->seat }} seats</td>
            </tr>
            <tr>
                <th>Bahan Bakar</th>
                <td>: {{ ucfirst($car->fuel) }}</td>
            </tr>
            <tr>
                <th>Transmisi</th>
                <td>: {{ ucfirst($car->transmisi) }}</td>
            </tr>
            <tr>
                <th>Tahun Kendaraan</th>
                <td>: {{ $car->year_of_car }}</td>
            </tr>
            <tr>
                <th>Harga Sewa Perhari</th>
                <td>: Rp. {{ number_format($car->price_day,0,',','.') }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>:
                    @if ($car->status == 'available')
                        <span class="badge bg-success">Tersedia</span>
                    @else
                        <span class="badge bg-danger">Tidak Bersedia</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Gambar</th>
                <td width="60%">
                    <img src="{{ asset('storage/'. $car->image) }}" class="img-fluid" width="20%" target="_blank">
                </td>
            </tr>
            <tr>
                <th>Tanggal Dibuat</th>
                <td>: {{ date('Y-m-d H:i:s', strtotime($car->created_at)) }}</td>
            </tr>
            <tr>
                <th>Tanggal Diubah</th>
                <td>: {{ date('Y-m-d H:i:s', strtotime($car->updated_at)) }}</td>
            </tr>
        </table>

        <div class="float-end mt-2">
            @if (auth()->user()->role === 'operator')
                <a href="{{ route('panel.car.edit', $car->uuid) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit</a>
            @endif
        </div>
    </div>
</div>

@endsection
