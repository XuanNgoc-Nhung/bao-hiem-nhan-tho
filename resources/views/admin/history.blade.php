@extends('admin.layouts.app')
@section('title', 'Lịch sử hoạt động')
@section('page-title', 'Lịch sử hoạt động')

@section('content')
<div class="page-header">
    <h1 class="page-title">Lịch sử hoạt động</h1>
    <p class="page-subtitle">Quản lý thông tin các lịch sử hoạt động trong hệ thống</p>
</div>
<!-- Search and Filter -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row g-4">
            <form action="{{ route('admin.history') }}" class="input-group" method="get">
                <div class="col-12 col-md-4 pe-3">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" class="form-control" name="search" placeholder="Tìm kiếm công ty..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-12 col-md-3 px-3">
                    <select class="form-select" name="status" id="statusFilter">
                        <option {{ request('status') == '' ? 'selected' : '' }} value="">Tất cả trạng thái</option>
                        <option {{ request('status') == 1 ? 'selected' : '' }} value="1">Được phép đăng ký</option>
                        <option {{ request('status') == 2 ? 'selected' : '' }} value="2">Không được phép đăng ký</option>
                    </select>
                </div>
                <div class="col-12 col-md-2 ps-3">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-search me-2"></i>Tìm kiếm
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Companies Table -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">
            <i class="bi bi-building me-2"></i>
            Danh sách lịch sử hoạt động
        </h5>
        <div class="d-flex gap-2">
            {{-- <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addCccdModal">
                <i class="bi bi-plus-circle me-2"></i>Thêm mới
            </button> --}}
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered table-sm" id="companiesTable">
                <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th>Người dùng</th>
                        <th>Hoạt động</th>
                        <th>Chi tiết</th>
                        <th class="text-center">Thời gian</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($lichSu) > 0)
                    @foreach ($lichSu as $ls)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $ls->nguoi_dung }}</td>
                        <td>{{ $ls->hanh_dong }}</td>
                        <td>{{ $ls->chi_tiet }}</td>
                        <td class="text-center">{{ $ls->thoi_gian }}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="text-center">Không có dữ liệu</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            {{ $lichSu->links(app()->getLocale() == 'vi' ? 'pagination::bootstrap-5' : 'pagination::bootstrap-4') }}
        </div>

    </div>
</div>
@endsection
