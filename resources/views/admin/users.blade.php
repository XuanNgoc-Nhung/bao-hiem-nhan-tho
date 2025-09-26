@extends('admin.layouts.app')

@section('title', 'Quản lý người dùng')
@section('page-title', 'Quản lý người dùng')

@section('content')
<div class="page-header">
    <h1 class="page-title">Quản lý người dùng</h1>
    <p class="page-subtitle">Quản lý thông tin người dùng trong hệ thống</p>
</div>

<!-- Search and Filter -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Tìm kiếm người dùng..." id="searchInput">
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <select class="form-select" id="statusFilter">
                    <option value="">Tất cả trạng thái</option>
                    <option value="active">Hoạt động</option>
                    <option value="inactive">Không hoạt động</option>
                    <option value="pending">Chờ xác nhận</option>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <select class="form-select" id="roleFilter">
                    <option value="">Tất cả vai trò</option>
                    <option value="admin">Admin</option>
                    <option value="user">Người dùng</option>
                    <option value="agent">Đại lý</option>
                </select>
            </div>
            <div class="col-md-2 mb-3">
                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    <i class="bi bi-plus-circle me-2"></i>Thêm mới
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Users Table -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">
            <i class="bi bi-people me-2"></i>
            Danh sách người dùng
        </h5>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary btn-sm" id="exportBtn">
                <i class="bi bi-download me-2"></i>Xuất Excel
            </button>
            <button class="btn btn-outline-secondary btn-sm" id="printBtn">
                <i class="bi bi-printer me-2"></i>In
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive" style="max-height: 70vh;">
            <table class="table table-hover" id="usersTable" style="min-width: 800px;">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" class="form-check-input" id="selectAll">
                        </th>
                        <th>Thông tin</th>
                        <th>Email</th>
                        <th>Vai trò</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="checkbox" class="form-check-input user-checkbox" value="1">
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="user-avatar me-3" style="width: 40px; height: 40px; font-size: 0.9rem;">
                                    N
                                </div>
                                <div>
                                    <div class="fw-bold">Nguyễn Văn An</div>
                                    <small class="text-muted">+84 123 456 789</small>
                                </div>
                            </div>
                        </td>
                        <td>nguyenvanan@email.com</td>
                        <td>
                            <span class="badge bg-primary">Admin</span>
                        </td>
                        <td>
                            <span class="badge bg-success">Hoạt động</span>
                        </td>
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
                            <input type="checkbox" class="form-check-input user-checkbox" value="2">
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="user-avatar me-3" style="width: 40px; height: 40px; font-size: 0.9rem; background: linear-gradient(135deg, #28a745, #20c997);">
                                    T
                                </div>
                                <div>
                                    <div class="fw-bold">Trần Thị Bình</div>
                                    <small class="text-muted">+84 987 654 321</small>
                                </div>
                            </div>
                        </td>
                        <td>tranthibinh@email.com</td>
                        <td>
                            <span class="badge bg-info">Đại lý</span>
                        </td>
                        <td>
                            <span class="badge bg-success">Hoạt động</span>
                        </td>
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
                            <input type="checkbox" class="form-check-input user-checkbox" value="3">
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="user-avatar me-3" style="width: 40px; height: 40px; font-size: 0.9rem; background: linear-gradient(135deg, #ffc107, #fd7e14);">
                                    L
                                </div>
                                <div>
                                    <div class="fw-bold">Lê Văn Cường</div>
                                    <small class="text-muted">+84 555 123 456</small>
                                </div>
                            </div>
                        </td>
                        <td>levancuong@email.com</td>
                        <td>
                            <span class="badge bg-secondary">Người dùng</span>
                        </td>
                        <td>
                            <span class="badge bg-warning">Chờ xác nhận</span>
                        </td>
                        <td>25/01/2024</td>
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

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-person-plus me-2"></i>
                    Thêm người dùng mới
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addUserForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Họ và tên <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" name="phone" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Vai trò <span class="text-danger">*</span></label>
                            <select class="form-select" name="role" required>
                                <option value="">Chọn vai trò</option>
                                <option value="user">Người dùng</option>
                                <option value="agent">Đại lý</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Mật khẩu <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Xác nhận mật khẩu <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Địa chỉ</label>
                        <textarea class="form-control" name="address" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-2"></i>Thêm người dùng
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteUserModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    Xác nhận xóa
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa người dùng này? Hành động này không thể hoàn tác.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">
                    <i class="bi bi-trash me-2"></i>Xóa
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.getElementById('searchInput');
    const usersTable = document.getElementById('usersTable');
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const rows = usersTable.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });

    // Select all functionality
    const selectAll = document.getElementById('selectAll');
    const userCheckboxes = document.querySelectorAll('.user-checkbox');
    
    selectAll.addEventListener('change', function() {
        userCheckboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });

    // Filter functionality
    const statusFilter = document.getElementById('statusFilter');
    const roleFilter = document.getElementById('roleFilter');
    
    function applyFilters() {
        const statusValue = statusFilter.value;
        const roleValue = roleFilter.value;
        const rows = usersTable.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const status = row.querySelector('td:nth-child(5) .badge').textContent.toLowerCase();
            const role = row.querySelector('td:nth-child(4) .badge').textContent.toLowerCase();
            
            const statusMatch = !statusValue || status.includes(statusValue);
            const roleMatch = !roleValue || role.includes(roleValue);
            
            row.style.display = statusMatch && roleMatch ? '' : 'none';
        });
    }
    
    statusFilter.addEventListener('change', applyFilters);
    roleFilter.addEventListener('change', applyFilters);

    // Form submission
    const addUserForm = document.getElementById('addUserForm');
    addUserForm.addEventListener('submit', function(e) {
        e.preventDefault();
        // Add your form submission logic here
        alert('Người dùng đã được thêm thành công!');
        bootstrap.Modal.getInstance(document.getElementById('addUserModal')).hide();
        this.reset();
    });

    // Delete confirmation
    const deleteButtons = document.querySelectorAll('.btn-outline-danger');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteUserModal'));
            deleteModal.show();
        });
    });

    // Export functionality
    document.getElementById('exportBtn').addEventListener('click', function() {
        alert('Tính năng xuất Excel sẽ được thêm sau!');
    });

    // Print functionality
    document.getElementById('printBtn').addEventListener('click', function() {
        window.print();
    });
});
</script>
@endsection
