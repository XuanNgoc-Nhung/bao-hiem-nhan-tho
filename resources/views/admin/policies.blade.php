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
        <div class="table-responsive" style="max-height: 70vh;">
            <table class="table table-hover" id="policiesTable" style="min-width: 800px;">
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

<!-- Edit Policy Modal -->
<div class="modal fade" id="editPolicyModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-pencil-square me-2"></i>
                    Chỉnh sửa hợp đồng bảo hiểm
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editPolicyForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Mã hợp đồng <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="policy_code" id="edit_policy_code" required readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Loại bảo hiểm <span class="text-danger">*</span></label>
                            <select class="form-select" name="insurance_type" id="edit_insurance_type" required>
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
                            <select class="form-select" name="company_id" id="edit_company_id" required>
                                <option value="">Chọn công ty</option>
                                <option value="1">Bảo Việt Nhân Thọ</option>
                                <option value="2">Prudential Việt Nam</option>
                                <option value="3">Manulife Việt Nam</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Khách hàng <span class="text-danger">*</span></label>
                            <select class="form-select" name="customer_id" id="edit_customer_id" required>
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
                            <input type="number" class="form-control" name="premium_amount" id="edit_premium_amount" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Số tiền bảo hiểm <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="coverage_amount" id="edit_coverage_amount" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ngày hiệu lực <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="effective_date" id="edit_effective_date" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ngày hết hạn <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="expiry_date" id="edit_expiry_date" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Trạng thái <span class="text-danger">*</span></label>
                            <select class="form-select" name="status" id="edit_status" required>
                                <option value="">Chọn trạng thái</option>
                                <option value="active">Đang hiệu lực</option>
                                <option value="expired">Hết hạn</option>
                                <option value="pending">Chờ xác nhận</option>
                                <option value="cancelled">Đã hủy</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ngày tạo</label>
                            <input type="text" class="form-control" id="edit_created_at" readonly>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Ghi chú</label>
                        <textarea class="form-control" name="notes" id="edit_notes" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-2"></i>Cập nhật hợp đồng
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

    // Edit policy functionality
    const editButtons = document.querySelectorAll('.btn-outline-warning');
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const row = this.closest('tr');
            const policyData = extractPolicyDataFromRow(row);
            populateEditForm(policyData);
            const editModal = new bootstrap.Modal(document.getElementById('editPolicyModal'));
            editModal.show();
        });
    });

    // Function to extract policy data from table row
    function extractPolicyDataFromRow(row) {
        const cells = row.querySelectorAll('td');
        const policyCode = cells[0].querySelector('.badge').textContent.trim();
        const customerName = cells[1].querySelector('.fw-bold').textContent.trim();
        const insuranceType = cells[2].querySelector('.badge').textContent.trim();
        const company = cells[3].textContent.trim();
        const status = cells[4].querySelector('.badge').textContent.trim();
        const premiumAmount = cells[5].textContent.replace(/[^\d]/g, '');
        const effectiveDate = cells[6].textContent.trim();
        
        return {
            policy_code: policyCode,
            customer_name: customerName,
            insurance_type: insuranceType,
            company: company,
            status: status,
            premium_amount: premiumAmount,
            effective_date: effectiveDate
        };
    }

    // Function to populate edit form with policy data
    function populateEditForm(data) {
        document.getElementById('edit_policy_code').value = data.policy_code;
        
        // Map insurance type
        const insuranceTypeMap = {
            'Nhân thọ': 'life',
            'Sức khỏe': 'health',
            'Tài sản': 'property'
        };
        document.getElementById('edit_insurance_type').value = insuranceTypeMap[data.insurance_type] || '';
        
        // Map company
        const companyMap = {
            'Bảo Việt': '1',
            'Prudential': '2',
            'Manulife': '3'
        };
        document.getElementById('edit_company_id').value = companyMap[data.company] || '';
        
        // Map customer (simplified mapping)
        const customerMap = {
            'Nguyễn Văn An': '1',
            'Trần Thị Bình': '2',
            'Lê Văn Cường': '3'
        };
        document.getElementById('edit_customer_id').value = customerMap[data.customer_name] || '';
        
        // Map status
        const statusMap = {
            'Đang hiệu lực': 'active',
            'Hết hạn': 'expired',
            'Chờ xác nhận': 'pending',
            'Đã hủy': 'cancelled'
        };
        document.getElementById('edit_status').value = statusMap[data.status] || '';
        
        // Set premium amount
        document.getElementById('edit_premium_amount').value = data.premium_amount;
        
        // Set coverage amount (default to 10x premium for demo)
        document.getElementById('edit_coverage_amount').value = parseInt(data.premium_amount) * 10;
        
        // Set effective date (convert from DD/MM/YYYY to YYYY-MM-DD)
        if (data.effective_date) {
            const dateParts = data.effective_date.split('/');
            if (dateParts.length === 3) {
                const formattedDate = `${dateParts[2]}-${dateParts[1].padStart(2, '0')}-${dateParts[0].padStart(2, '0')}`;
                document.getElementById('edit_effective_date').value = formattedDate;
            }
        }
        
        // Set expiry date (1 year from effective date)
        if (data.effective_date) {
            const dateParts = data.effective_date.split('/');
            if (dateParts.length === 3) {
                const year = parseInt(dateParts[2]) + 1;
                const formattedExpiryDate = `${year}-${dateParts[1].padStart(2, '0')}-${dateParts[0].padStart(2, '0')}`;
                document.getElementById('edit_expiry_date').value = formattedExpiryDate;
            }
        }
        
        // Set created date (current date for demo)
        document.getElementById('edit_created_at').value = new Date().toLocaleDateString('vi-VN');
        
        // Set notes (empty for demo)
        document.getElementById('edit_notes').value = '';
    }

    // Edit form submission
    const editPolicyForm = document.getElementById('editPolicyForm');
    editPolicyForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(this);
        const policyData = Object.fromEntries(formData.entries());
        
        // Add your update logic here
        console.log('Updating policy:', policyData);
        
        // Show success message
        alert('Hợp đồng đã được cập nhật thành công!');
        
        // Close modal
        bootstrap.Modal.getInstance(document.getElementById('editPolicyModal')).hide();
        
        // Here you would typically update the table row with new data
        // For now, we'll just show a success message
    });
});
</script>
@endsection
