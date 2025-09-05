@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="page-header">
    <h1 class="page-title">Dashboard</h1>
    <p class="page-subtitle">Tổng quan hệ thống quản lý bảo hiểm nhân thọ</p>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stats-number">{{ $totalUsers ?? 1250 }}</div>
                    <div class="stats-label">Tổng người dùng</div>
                </div>
                <div class="stats-icon">
                    <i class="bi bi-people"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #28a745, #20c997);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stats-number">{{ $totalCompanies ?? 45 }}</div>
                    <div class="stats-label">Công ty bảo hiểm</div>
                </div>
                <div class="stats-icon">
                    <i class="bi bi-building"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #ffc107, #fd7e14);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stats-number">{{ $totalPolicies ?? 2890 }}</div>
                    <div class="stats-label">Hợp đồng bảo hiểm</div>
                </div>
                <div class="stats-icon">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="stats-card" style="background: linear-gradient(135deg, #dc3545, #e83e8c);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="stats-number">{{ $totalRevenue ?? '2.5B' }}</div>
                    <div class="stats-label">Doanh thu (VNĐ)</div>
                </div>
                <div class="stats-icon">
                    <i class="bi bi-currency-dollar"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="row mb-4">
    <div class="col-xl-8 mb-3">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="bi bi-graph-up me-2"></i>
                    Thống kê hợp đồng theo tháng
                </h5>
            </div>
            <div class="card-body">
                <canvas id="policyChart" height="200"></canvas>
            </div>
        </div>
    </div>

    <div class="col-xl-4 mb-3">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="bi bi-pie-chart me-2"></i>
                    Phân bố loại bảo hiểm
                </h5>
            </div>
            <div class="card-body">
                <canvas id="insuranceTypeChart" height="200"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activities & Quick Actions -->
<div class="row">
    <div class="col-xl-8 mb-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="bi bi-activity me-2"></i>
                    Hoạt động gần đây
                </h5>
                {{-- <a href="#" class="btn btn-sm btn-outline-primary">Xem tất cả</a> --}}
            </div>
            <div class="card-body p-0">
                <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-hover table-striped table-bordered table-sm mb-0">
                        <thead class="table-light sticky-top" style="z-index: 10;">
                            <tr>
                                <th style="width: 8%;">STT</th>
                                <th style="width: 20%;">Người dùng</th>
                                <th style="width: 40%;">Hoạt động</th>
                                <th style="width: 20%;">Thời gian</th>
                                <th style="width: 12%;">Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($lichSu)
                            @foreach($lichSu as $ls)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $ls->nguoi_dung }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="fw-bold">{{ $ls->hanh_dong }}</div>
                                            <small class="text-muted">{{ $ls->chi_tiet }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $ls->thoi_gian }}</td>
                                <td><span class="badge bg-success">Hoàn thành</span></td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="text-center">Không có dữ liệu</td>
                            </tr>
                            @endif



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 mb-3">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="bi bi-lightning me-2"></i>
                    Thao tác nhanh
                </h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="#" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>
                        Thêm người dùng mới
                    </a>
                    <a href="#" class="btn btn-outline-primary">
                        <i class="bi bi-building me-2"></i>
                        Quản lý công ty
                    </a>
                    <a href="#" class="btn btn-outline-success">
                        <i class="bi bi-file-earmark-text me-2"></i>
                        Tạo hợp đồng
                    </a>
                    <a href="#" class="btn btn-outline-info">
                        <i class="bi bi-graph-up me-2"></i>
                        Xem báo cáo
                    </a>
                    <a href="#" class="btn btn-outline-warning">
                        <i class="bi bi-gear me-2"></i>
                        Cài đặt hệ thống
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- System Status -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="bi bi-server me-2"></i>
                    Trạng thái hệ thống
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-success rounded-circle p-2 me-3">
                                <i class="bi bi-check-circle text-white"></i>
                            </div>
                            <div>
                                <div class="fw-bold">Database</div>
                                <small class="text-success">Hoạt động bình thường</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-success rounded-circle p-2 me-3">
                                <i class="bi bi-check-circle text-white"></i>
                            </div>
                            <div>
                                <div class="fw-bold">Email Service</div>
                                <small class="text-success">Hoạt động bình thường</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning rounded-circle p-2 me-3">
                                <i class="bi bi-exclamation-triangle text-white"></i>
                            </div>
                            <div>
                                <div class="fw-bold">Backup System</div>
                                <small class="text-warning">Cần kiểm tra</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="bg-success rounded-circle p-2 me-3">
                                <i class="bi bi-check-circle text-white"></i>
                            </div>
                            <div>
                                <div class="fw-bold">Security</div>
                                <small class="text-success">Bảo mật tốt</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Policy Chart
        const policyCtx = document.getElementById('policyChart').getContext('2d');
        new Chart(policyCtx, {
            type: 'line',
            data: {
                labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'],
                datasets: [{
                    label: 'Hợp đồng mới',
                    data: [65, 59, 80, 81, 56, 55, 40, 45, 60, 70, 85, 90],
                    borderColor: '#007bff',
                    backgroundColor: 'rgba(0, 123, 255, 0.1)',
                    tension: 0.4,
                    fill: true
                }, {
                    label: 'Hợp đồng gia hạn',
                    data: [28, 48, 40, 19, 86, 27, 90, 35, 45, 55, 65, 75],
                    borderColor: '#28a745',
                    backgroundColor: 'rgba(40, 167, 69, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Insurance Type Chart
        const typeCtx = document.getElementById('insuranceTypeChart').getContext('2d');
        new Chart(typeCtx, {
            type: 'doughnut',
            data: {
                labels: ['Nhân thọ', 'Sức khỏe', 'Tài sản', 'Xe cộ', 'Du lịch'],
                datasets: [{
                    data: [5, 25, 15, 10, 5],
                    backgroundColor: [
                        '#007bff',
                        '#28a745',
                        '#ffc107',
                        '#dc3545',
                        '#6c757d'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true
                        }
                    }
                }
            }
        });
    });

</script>
@endsection
