@extends('admin.layouts.app')

@section('title', 'Quản lý hợp đồng')
@section('page-title', 'Quản lý hợp đồng')

@section('content')
<div class="page-header">
    <h1 class="page-title">Quản lý hợp đồng bảo hiểm</h1>
    <p class="page-subtitle">Quản lý tất cả hợp đồng bảo hiểm trong hệ thống</p>
</div>

<!-- Stats Overview -->
<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="mb-0">{{ $totalPolicies ?? 2890 }}</h4>
                        <small>Tổng hợp đồng</small>
                    </div>
                    <div class="align-self-center">
                        <i class="bi bi-file-earmark-text fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="mb-0">{{ $activePolicies ?? 2450 }}</h4>
                        <small>Đang hiệu lực</small>
                    </div>
                    <div class="align-self-center">
                        <i class="bi bi-check-circle fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="mb-0">{{ $expiredPolicies ?? 320 }}</h4>
                        <small>Hết hạn</small>
                    </div>
                    <div class="align-self-center">
                        <i class="bi bi-exclamation-triangle fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="mb-0">{{ $totalRevenue ?? '2.5B' }}</h4>
                        <small>Doanh thu (VNĐ)</small>
                    </div>
                    <div class="align-self-center">
                        <i class="bi bi-currency-dollar fs-1"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Search and Filter -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Tìm kiếm..." id="searchInput">
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <select class="form-select" id="statusFilter">
                    <option value="">Tất cả trạng thái</option>
                    <option value="active">Đang hiệu lực</option>
                    <option value="expired">Hết hạn</option>
                    <option value="pending">Chờ xác nhận</option>
                    <option value="cancelled">Đã hủy</option>
                </select>
            </div>
            <div class="col-md-2 mb-3">
                <select class="form-select" id="typeFilter">
                    <option value="">Tất cả loại</option>
                    <option value="life">Nhân thọ</option>
                    <option value="health">Sức khỏe</option>
                    <option value="property">Tài sản</option>
                </select>
            </div>
            <div class="col-md-2 mb-3">
                <select class="form-select" id="companyFilter">
                    <option value="">Tất cả công ty</option>
                    <option value="baoviet">Bảo Việt</option>
                    <option value="prudential">Prudential</option>
                    <option value="manulife">Manulife</option>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <div class="d-flex gap-2">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPolicyModal">
                        <i class="bi bi-plus-circle me-2"></i>Thêm mới
                    </button>
                    <button class="btn btn-outline-secondary" id="exportBtn">
                        <i class="bi bi-download me-2"></i>Xuất
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Policies Table -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">
            <i class="bi bi-file-earmark-text me-2"></i>
            Danh sách hợp đồng bảo hiểm
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover" id="policiesTable">
                <thead>
                    <tr>
                        <th>Mã hợp đồng</th>
                        <th>Khách hàng</th>
                        <th>Loại bảo hiểm</th>
                        <th>Công ty</th>
                        <th>Trạng thái</th>
                        <th>Phí bảo hiểm</th>
                        <th>Ngày hiệu lực</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <span class="badge bg-primary">BH001</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="user-avatar me-2" style="width: 35px; height: 35px; font-size: 0.8rem;">
                                    N
                                </div>
                            <div>
                                <div class="fw-bold">Nguyễn Văn An</div>
                                <small class="text-muted">nguyenvanan@email.com</small>
                            </div>
                        </div>
                        </td>
                        <td>
                            <span class="badge bg-info">Nhân thọ</span>
                        </td>
                        <td>Bảo Việt</td>
                        <td>
                            <span class="badge bg-success">Đang hiệu lực</span>
                        </td>
                        <td>2,500,000 VNĐ</td>
                        <td>15/01/2024</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-outline-primary" title="Xem chi tiết">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-outline-warning" title="Chỉnh sửa">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-outline-danger" title="Xóa">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="badge bg-primary">BH002</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="user-avatar me-2" style="width: 35px; height: 35px; font-size: 0.8rem; background: linear-gradient(135deg, #28a745, #20c997);">
                                    T
                                </div>
                            <div>
                                <div class="fw-bold">Trần Thị Bình</div>
                                <small class="text-muted">tranthibinh@email.com</small>
                            </div>
                        </div>
                        </td>
                        <td>
                            <span class="badge bg-success">Sức khỏe</span>
                        </td>
                        <td>Prudential</td>
                        <td>
                            <span class="badge bg-success">Đang hiệu lực</span>
                        </td>
                        <td>1,800,000 VNĐ</td>
                        <td>20/01/2024</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-outline-primary" title="Xem chi tiết">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-outline-warning" title="Chỉnh sửa">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-outline-danger" title="Xóa">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="badge bg-primary">BH003</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="user-avatar me-2" style="width: 35px; height: 35px; font-size: 0.8rem; background: linear-gradient(135deg, #ffc107, #fd7e14);">
                                    L
                                </div>
                            <div>
                                <div class="fw-bold">Lê Văn Cường</div>
                                <small class="text-muted">levancuong@email.com</small>
                            </div>
                        </div>
                        </td>
                        <td>
                            <span class="badge bg-warning">Tài sản</span>
                        </td>
                        <td>Manulife</td>
                        <td>
                            <span class="badge bg-warning">Hết hạn</span>
                        </td>
                        <td>3,200,000 VNĐ</td>
                        <td>10/01/2024</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-outline-primary" title="Xem chi tiết">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-outline-warning" title="Chỉnh sửa">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-outline-danger" title="Xóa">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <nav aria-label="Page navigation" class="mt-4">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Trước</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Sau</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<!-- Add Policy Modal -->
<div class="modal fade" id="addPolicyModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-plus-circle me-2"></i>
                    Thêm hợp đồng bảo hiểm mới
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addPolicyForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Mã hợp đồng <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="policy_code" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Loại bảo hiểm <span class="text-danger">*</span></label>
                            <select class="form-select" name="insurance_type" required>
                                <option value="">Chọn loại bảo hiểm</option>
                                <option value="life">Bảo hiểm nhân thọ</option>
                                <option value="health">Bảo hiểm sức khỏe</option>
                                <option value="property">Bảo hiểm tài sản</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Công ty bảo hiểm <span class="text-danger">*</span></label>
                            <select class="form-select" name="company_id" required>
                                <option value="">Chọn công ty</option>
                                <option value="1">Bảo Việt Nhân Thọ</option>
                                <option value="2">Prudential Việt Nam</option>
                                <option value="3">Manulife Việt Nam</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Khách hàng <span class="text-danger">*</span></label>
                            <select class="form-select" name="customer_id" required>
                                <option value="">Chọn khách hàng</option>
                                <option value="1">Nguyễn Văn An</option>
                                <option value="2">Trần Thị Bình</option>
                                <option value="3">Lê Văn Cường</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phí bảo hiểm <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="premium_amount" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Số tiền bảo hiểm <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="coverage_amount" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ngày hiệu lực <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="effective_date" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ngày hết hạn <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="expiry_date" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Ghi chú</label>
                        <textarea class="form-control" name="notes" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-2"></i>Thêm hợp đồng
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.getElementById('searchInput');
    const policiesTable = document.getElementById('policiesTable');
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const rows = policiesTable.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });

    // Filter functionality
    const statusFilter = document.getElementById('statusFilter');
    const typeFilter = document.getElementById('typeFilter');
    const companyFilter = document.getElementById('companyFilter');
    
    function applyFilters() {
        const statusValue = statusFilter.value;
        const typeValue = typeFilter.value;
        const companyValue = companyFilter.value;
        const rows = policiesTable.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const status = row.querySelector('td:nth-child(5) .badge').textContent.toLowerCase();
            const type = row.querySelector('td:nth-child(3) .badge').textContent.toLowerCase();
            const company = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
            
            const statusMatch = !statusValue || status.includes(statusValue);
            const typeMatch = !typeValue || type.includes(typeValue);
            const companyMatch = !companyValue || company.includes(companyValue);
            
            row.style.display = statusMatch && typeMatch && companyMatch ? '' : 'none';
        });
    }
    
    statusFilter.addEventListener('change', applyFilters);
    typeFilter.addEventListener('change', applyFilters);
    companyFilter.addEventListener('change', applyFilters);

    // Form submission
    const addPolicyForm = document.getElementById('addPolicyForm');
    addPolicyForm.addEventListener('submit', function(e) {
        e.preventDefault();
        // Add your form submission logic here
        alert('Hợp đồng đã được thêm thành công!');
        bootstrap.Modal.getInstance(document.getElementById('addPolicyModal')).hide();
        this.reset();
    });

    // Export functionality
    document.getElementById('exportBtn').addEventListener('click', function() {
        alert('Tính năng xuất Excel sẽ được thêm sau!');
    });
});
</script>
@endsection
