@extends('backend.template.main')

@section('title', 'Operators')

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
            <li class="breadcrumb-item active" aria-current="page">Operators</li>
        </ol>
    </nav>

    <div style="margin-bottom: 20px">
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Operators</h1>
                <p class="mb-0">Daftar Operator PRC</p>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-hover table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center border-0 rounded-start">No</th>
                            <th class="text-center border-1">Nama</th>
                            <th class="text-center border-1">Email</th>
                            <th class="text-center border-1">Status</th>
                            <th class="text-center border-0">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($operators as $operator)
                        <tr>
                            <td>{{ ($operators->currentPage() - 1) * $operators->perPage() + $loop->iteration }}</td>
                            <td class="fw-bold text-dark">
                                {{ $operator->name }}
                            </td>
                            <td class="fw-bold text-dark">
                                {{ $operator->email }}
                            </td>
                            <td class="text-center fw-bold text-dark">
                                @if ($operator->is_active)
                                <span class="badge bg-success">Aktif</span>
                                @else
                                <span class="badge bg-danger">Tidak Aktif</span>
                                @endif
                            </td>
                            <td class="text-center fw-bold text-dark">
                                <a href="{{ route('backend.operators.show', $operator->id) }}"
                                    class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <a href="{{ route('backend.operators.edit', $operator->id) }}"
                                    class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <button class="btn btn-sm btn-danger" onclick="deleteOperator(this)"
                                    data-uuid="{{ $operator->uuid }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
