@extends('admin.layouts.app')

@section('title', 'Báo cáo & Thống kê')
@section('page-title', 'Báo cáo & Thống kê')

@section('content')
<div class="page-header">
    <h1 class="page-title">Báo cáo & Thống kê</h1>
    <p class="page-subtitle">Phân tích dữ liệu và tạo báo cáo hệ thống</p>
</div>

<!-- Date Range Filter -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-3">
                <label class="form-label">Khoảng thời gian</label>
                <select class="form-select" id="dateRange">
                    <option value="7">7 ngày qua</option>
                    <option value="30" selected>30 ngày qua</option>
                    <option value="90">3 tháng qua</option>
                    <option value="365">1 năm qua</option>
                    <option value="custom">Tùy chỉnh</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Từ ngày</label>
                <input type="date" class="form-control" id="startDate" value="{{ date('Y-m-d', strtotime('-30 days')) }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">Đến ngày</label>
                <input type="date" class="form-control" id="endDate" value="{{ date('Y-m-d') }}">
            </div>
            <div class="col-md-3">
                <label class="form-label">&nbsp;</label>
                <div class="d-grid">
                    <button class="btn btn-primary" id="generateReport">
                        <i class="bi bi-graph-up me-2"></i>Tạo báo cáo
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Key Metrics -->
<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card bg-gradient-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-0">{{ number_format($totalRevenue ?? 2500000000) }}</h3>
                        <small>Doanh thu (VNĐ)</small>
                    </div>
                    <div class="align-self-center">
                        <i class="bi bi-currency-dollar fs-1"></i>
                    </div>
                </div>
                <div class="mt-2">
                    <span class="badge bg-success">
                        <i class="bi bi-arrow-up me-1"></i>+15.2%
                    </span>
                    <small class="ms-2">So với tháng trước</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-gradient-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-0">{{ number_format($newPolicies ?? 156) }}</h3>
                        <small>Hợp đồng mới</small>
                    </div>
                    <div class="align-self-center">
                        <i class="bi bi-file-earmark-plus fs-1"></i>
                    </div>
                </div>
                <div class="mt-2">
                    <span class="badge bg-success">
                        <i class="bi bi-arrow-up me-1"></i>+8.7%
                    </span>
                    <small class="ms-2">So với tháng trước</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-gradient-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-0">{{ number_format($activeCustomers ?? 1245) }}</h3>
                        <small>Khách hàng hoạt động</small>
                    </div>
                    <div class="align-self-center">
                        <i class="bi bi-people fs-1"></i>
                    </div>
                </div>
                <div class="mt-2">
                    <span class="badge bg-success">
                        <i class="bi bi-arrow-up me-1"></i>+12.3%
                    </span>
                    <small class="ms-2">So với tháng trước</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-gradient-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="mb-0">{{ number_format($avgPremium ?? 2500000) }}</h3>
                        <small>Phí bảo hiểm TB (VNĐ)</small>
                    </div>
                    <div class="align-self-center">
                        <i class="bi bi-calculator fs-1"></i>
                    </div>
                </div>
                <div class="mt-2">
                    <span class="badge bg-success">
                        <i class="bi bi-arrow-up me-1"></i>+5.8%
                    </span>
                    <small class="ms-2">So với tháng trước</small>
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
                    Xu hướng doanh thu và hợp đồng
                </h5>
            </div>
            <div class="card-body">
                <canvas id="revenueChart" height="100"></canvas>
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

<!-- Performance Charts -->
<div class="row mb-4">
    <div class="col-xl-6 mb-3">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="bi bi-bar-chart me-2"></i>
                    Hiệu suất theo công ty
                </h5>
            </div>
            <div class="card-body">
                <canvas id="companyPerformanceChart" height="200"></canvas>
            </div>
        </div>
    </div>
    
    <div class="col-xl-6 mb-3">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="bi bi-calendar-event me-2"></i>
                    Hoạt động theo tháng
                </h5>
            </div>
            <div class="card-body">
                <canvas id="monthlyActivityChart" height="200"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Detailed Reports -->
<div class="row">
    <div class="col-xl-8 mb-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="bi bi-table me-2"></i>
                    Báo cáo chi tiết
                </h5>
                <div class="btn-group btn-group-sm">
                    <button class="btn btn-outline-primary" id="exportPDF">
                        <i class="bi bi-file-pdf me-2"></i>PDF
                    </button>
                    <button class="btn btn-outline-success" id="exportExcel">
                        <i class="bi bi-file-earmark-excel me-2"></i>Excel
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="max-height: 70vh;">
                    <table class="table table-hover" style="min-width: 800px;">
                        <thead>
                            <tr>
                                <th>Thời gian</th>
                                <th>Doanh thu</th>
                                <th>Hợp đồng mới</th>
                                <th>Khách hàng mới</th>
                                <th>Tỷ lệ tăng trưởng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tháng 1/2024</td>
                                <td>2,450,000,000 VNĐ</td>
                                <td>145</td>
                                <td>89</td>
                                <td><span class="badge bg-success">+18.5%</span></td>
                            </tr>
                            <tr>
                                <td>Tháng 12/2023</td>
                                <td>2,067,000,000 VNĐ</td>
                                <td>122</td>
                                <td>76</td>
                                <td><span class="badge bg-success">+12.3%</span></td>
                            </tr>
                            <tr>
                                <td>Tháng 11/2023</td>
                                <td>1,840,000,000 VNĐ</td>
                                <td>108</td>
                                <td>65</td>
                                <td><span class="badge bg-success">+8.7%</span></td>
                            </tr>
                            <tr>
                                <td>Tháng 10/2023</td>
                                <td>1,694,000,000 VNĐ</td>
                                <td>98</td>
                                <td>58</td>
                                <td><span class="badge bg-warning">+2.1%</span></td>
                            </tr>
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
                    Thông tin nhanh
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span>Mục tiêu doanh thu</span>
                        <span class="fw-bold">3,000,000,000 VNĐ</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-success" style="width: 83%"></div>
                    </div>
                    <small class="text-muted">83% hoàn thành</small>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span>Mục tiêu hợp đồng</span>
                        <span class="fw-bold">200</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-primary" style="width: 78%"></div>
                    </div>
                    <small class="text-muted">78% hoàn thành</small>
                </div>
                
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span>Mục tiêu khách hàng</span>
                        <span class="fw-bold">150</span>
                    </div>
                    <div class="progress" style="height: 8px;">
                        <div class="progress-bar bg-warning" style="width: 83%"></div>
                    </div>
                    <small class="text-muted">83% hoàn thành</small>
                </div>
                
                <hr>
                
                <div class="text-center">
                    <h6 class="text-muted">Dự báo tháng tới</h6>
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="fw-bold text-success">+12.5%</div>
                            <small>Doanh thu</small>
                        </div>
                        <div class="col-6">
                            <div class="fw-bold text-primary">+8.3%</div>
                            <small>Hợp đồng</small>
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
document.addEventListener('DOMContentLoaded', function() {
    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'line',
        data: {
            labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'],
            datasets: [{
                label: 'Doanh thu (tỷ VNĐ)',
                data: [1.8, 2.1, 2.3, 2.0, 2.4, 2.6, 2.8, 2.5, 2.7, 2.9, 3.1, 2.5],
                borderColor: '#007bff',
                backgroundColor: 'rgba(0, 123, 255, 0.1)',
                tension: 0.4,
                fill: true,
                yAxisID: 'y'
            }, {
                label: 'Số hợp đồng',
                data: [120, 135, 145, 130, 150, 165, 180, 160, 175, 190, 205, 156],
                borderColor: '#28a745',
                backgroundColor: 'rgba(40, 167, 69, 0.1)',
                tension: 0.4,
                fill: false,
                yAxisID: 'y1'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            plugins: {
                legend: {
                    position: 'top',
                }
            },
            scales: {
                y: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                    title: {
                        display: true,
                        text: 'Doanh thu (tỷ VNĐ)'
                    }
                },
                y1: {
                    type: 'linear',
                    display: true,
                    position: 'right',
                    title: {
                        display: true,
                        text: 'Số hợp đồng'
                    },
                    grid: {
                        drawOnChartArea: false,
                    },
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
                data: [45, 25, 15, 10, 5],
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

    // Company Performance Chart
    const companyCtx = document.getElementById('companyPerformanceChart').getContext('2d');
    new Chart(companyCtx, {
        type: 'bar',
        data: {
            labels: ['Bảo Việt', 'Prudential', 'Manulife', 'AIA', 'Generali'],
            datasets: [{
                label: 'Doanh thu (tỷ VNĐ)',
                data: [0.8, 0.6, 0.5, 0.4, 0.2],
                backgroundColor: [
                    'rgba(0, 123, 255, 0.8)',
                    'rgba(40, 167, 69, 0.8)',
                    'rgba(255, 193, 7, 0.8)',
                    'rgba(220, 53, 69, 0.8)',
                    'rgba(108, 117, 125, 0.8)'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Doanh thu (tỷ VNĐ)'
                    }
                }
            }
        }
    });

    // Monthly Activity Chart
    const monthlyCtx = document.getElementById('monthlyActivityChart').getContext('2d');
    new Chart(monthlyCtx, {
        type: 'radar',
        data: {
            labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'],
            datasets: [{
                label: 'Hoạt động',
                data: [65, 70, 75, 68, 80, 85, 90, 82, 88, 92, 95, 78],
                borderColor: '#17a2b8',
                backgroundColor: 'rgba(23, 162, 184, 0.2)',
                pointBackgroundColor: '#17a2b8',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: '#17a2b8'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                r: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });

    // Date range functionality
    const dateRange = document.getElementById('dateRange');
    const startDate = document.getElementById('startDate');
    const endDate = document.getElementById('endDate');
    
    dateRange.addEventListener('change', function() {
        const value = this.value;
        const today = new Date();
        
        if (value === 'custom') {
            startDate.disabled = false;
            endDate.disabled = false;
        } else {
            startDate.disabled = true;
            endDate.disabled = true;
            
            const days = parseInt(value);
            const start = new Date(today.getTime() - (days * 24 * 60 * 60 * 1000));
            
            startDate.value = start.toISOString().split('T')[0];
            endDate.value = today.toISOString().split('T')[0];
        }
    });

    // Generate report functionality
    document.getElementById('generateReport').addEventListener('click', function() {
        this.disabled = true;
        this.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Đang tạo...';
        
        setTimeout(() => {
            this.disabled = false;
            this.innerHTML = '<i class="bi bi-graph-up me-2"></i>Tạo báo cáo';
            showAlert('Báo cáo đã được tạo thành công!', 'success');
        }, 2000);
    });

    // Export functionality
    document.getElementById('exportPDF').addEventListener('click', function() {
        alert('Tính năng xuất PDF sẽ được thêm sau!');
    });

    document.getElementById('exportExcel').addEventListener('click', function() {
        alert('Tính năng xuất Excel sẽ được thêm sau!');
    });

    // Helper function to show alerts
    function showAlert(message, type) {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
        alertDiv.innerHTML = `
            <i class="bi bi-check-circle me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.querySelector('.content-wrapper').insertBefore(alertDiv, document.querySelector('.page-header'));
        
        // Auto-hide after 5 seconds
        setTimeout(() => {
            if (alertDiv.parentNode) {
                alertDiv.remove();
            }
        }, 5000);
    }
});
</script>

<style>
.bg-gradient-primary {
    background: linear-gradient(135deg, #007bff, #0056b3);
}

.bg-gradient-success {
    background: linear-gradient(135deg, #28a745, #1e7e34);
}

.bg-gradient-warning {
    background: linear-gradient(135deg, #ffc107, #e0a800);
}

.bg-gradient-info {
    background: linear-gradient(135deg, #17a2b8, #138496);
}
</style>
@endsection
