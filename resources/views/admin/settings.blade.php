@extends('admin.layouts.app')

@section('title', 'Cài đặt hệ thống')
@section('page-title', 'Cài đặt hệ thống')

@section('content')
<div class="page-header">
    <h1 class="page-title">Cài đặt hệ thống</h1>
    <p class="page-subtitle">Quản lý cấu hình và thiết lập hệ thống</p>
</div>

<!-- Settings Navigation -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-fill" id="settingsTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab">
                            <i class="bi bi-gear me-2"></i>Cài đặt chung
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="email-tab" data-bs-toggle="tab" data-bs-target="#email" type="button" role="tab">
                            <i class="bi bi-envelope me-2"></i>Cài đặt email
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab">
                            <i class="bi bi-shield-lock me-2"></i>Bảo mật
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="backup-tab" data-bs-toggle="tab" data-bs-target="#backup" type="button" role="tab">
                            <i class="bi bi-cloud-arrow-up me-2"></i>Sao lưu & Khôi phục
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Settings Content -->
<div class="tab-content" id="settingsContent">
    <!-- General Settings -->
    <div class="tab-pane fade show active" id="general" role="tabpanel">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-gear me-2"></i>
                            Cài đặt chung
                        </h5>
                    </div>
                    <div class="card-body">
                        <form id="generalSettingsForm">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Tên hệ thống <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="system_name" value="Hệ thống Quản lý Bảo hiểm Nhân thọ" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phiên bản</label>
                                    <input type="text" class="form-control" name="version" value="1.0.0" readonly>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Ngôn ngữ mặc định</label>
                                    <select class="form-select" name="default_language">
                                        <option value="vi" selected>Tiếng Việt</option>
                                        <option value="en">English</option>
                                        <option value="zh">中文</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Múi giờ</label>
                                    <select class="form-select" name="timezone">
                                        <option value="Asia/Ho_Chi_Minh" selected>Asia/Ho_Chi_Minh (GMT+7)</option>
                                        <option value="UTC">UTC (GMT+0)</option>
                                        <option value="America/New_York">America/New_York (GMT-5)</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Định dạng ngày</label>
                                    <select class="form-select" name="date_format">
                                        <option value="d/m/Y" selected>dd/mm/yyyy</option>
                                        <option value="Y-m-d">yyyy-mm-dd</option>
                                        <option value="m/d/Y">mm/dd/yyyy</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Định dạng thời gian</label>
                                    <select class="form-select" name="time_format">
                                        <option value="H:i" selected>24 giờ</option>
                                        <option value="h:i A">12 giờ</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Mô tả hệ thống</label>
                                <textarea class="form-control" name="description" rows="3">Hệ thống quản lý bảo hiểm nhân thọ toàn diện</textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Logo hệ thống</label>
                                <input type="file" class="form-control" name="logo" accept="image/*">
                                <small class="text-muted">Định dạng: JPG, PNG, GIF. Kích thước tối đa: 2MB</small>
                            </div>
                            
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-2"></i>Lưu cài đặt
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-info-circle me-2"></i>
                            Thông tin hệ thống
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <small class="text-muted">Phiên bản PHP</small>
                            <div class="fw-bold">8.1.0</div>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted">Laravel Framework</small>
                            <div class="fw-bold">10.x</div>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted">Database</small>
                            <div class="fw-bold">SQLite 3.x</div>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted">Thời gian hoạt động</small>
                            <div class="fw-bold">15 ngày</div>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted">Bộ nhớ sử dụng</small>
                            <div class="fw-bold">128 MB</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Email Settings -->
    <div class="tab-pane fade" id="email" role="tabpanel">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-envelope me-2"></i>
                            Cài đặt email
                        </h5>
                    </div>
                    <div class="card-body">
                        <form id="emailSettingsForm">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">SMTP Host <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="smtp_host" value="smtp.gmail.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">SMTP Port <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="smtp_port" value="587" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Username <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="smtp_username" value="noreply@example.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="smtp_password" required>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Encryption</label>
                                    <select class="form-select" name="smtp_encryption">
                                        <option value="tls" selected>TLS</option>
                                        <option value="ssl">SSL</option>
                                        <option value="">None</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">From Address</label>
                                    <input type="email" class="form-control" name="from_address" value="noreply@example.com">
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">From Name</label>
                                <input type="text" class="form-control" name="from_name" value="Hệ thống Bảo hiểm">
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-outline-primary" id="testEmailBtn">
                                    <i class="bi bi-send me-2"></i>Gửi email test
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-2"></i>Lưu cài đặt
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-gear me-2"></i>
                            Tùy chọn email
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                            <label class="form-check-label" for="emailNotifications">
                                Bật thông báo email
                            </label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="emailReports" checked>
                            <label class="form-check-label" for="emailReports">
                                Gửi báo cáo định kỳ
                            </label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="emailAlerts">
                            <label class="form-check-label" for="emailAlerts">
                                Cảnh báo hệ thống
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Security Settings -->
    <div class="tab-pane fade" id="security" role="tabpanel">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-shield-lock me-2"></i>
                            Cài đặt bảo mật
                        </h5>
                    </div>
                    <div class="card-body">
                        <form id="securitySettingsForm">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Độ dài mật khẩu tối thiểu</label>
                                    <input type="number" class="form-control" name="min_password_length" value="8" min="6" max="20">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Thời gian hết hạn phiên (phút)</label>
                                    <input type="number" class="form-control" name="session_timeout" value="120" min="30" max="480">
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Số lần đăng nhập sai tối đa</label>
                                    <input type="number" class="form-control" name="max_login_attempts" value="5" min="3" max="10">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Thời gian khóa tài khoản (phút)</label>
                                    <input type="number" class="form-control" name="lockout_duration" value="30" min="15" max="120">
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Yêu cầu mật khẩu mạnh</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="require_uppercase" checked>
                                    <label class="form-check-label">Chứa chữ hoa</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="require_lowercase" checked>
                                    <label class="form-check-label">Chứa chữ thường</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="require_numbers" checked>
                                    <label class="form-check-label">Chứa số</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="require_symbols">
                                    <label class="form-check-label">Chứa ký tự đặc biệt</label>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-2"></i>Lưu cài đặt
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-shield-check me-2"></i>
                            Trạng thái bảo mật
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>Mật khẩu mạnh</span>
                                <span class="badge bg-success">Bật</span>
                            </div>
                            <div class="progress" style="height: 6px;">
                                <div class="progress-bar bg-success" style="width: 100%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>Xác thực 2 yếu tố</span>
                                <span class="badge bg-warning">Tùy chọn</span>
                            </div>
                            <div class="progress" style="height: 6px;">
                                <div class="progress-bar bg-warning" style="width: 60%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span>Mã hóa dữ liệu</span>
                                <span class="badge bg-success">Bật</span>
                            </div>
                            <div class="progress" style="height: 6px;">
                                <div class="progress-bar bg-success" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Backup Settings -->
    <div class="tab-pane fade" id="backup" role="tabpanel">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-cloud-arrow-up me-2"></i>
                            Sao lưu & Khôi phục
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <i class="bi bi-download fs-1 text-primary mb-3"></i>
                                        <h5>Sao lưu thủ công</h5>
                                        <p class="text-muted">Tạo bản sao lưu ngay lập tức</p>
                                        <button class="btn btn-primary" id="manualBackupBtn">
                                            <i class="bi bi-download me-2"></i>Tạo sao lưu
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <i class="bi bi-upload fs-1 text-success mb-3"></i>
                                        <h5>Khôi phục dữ liệu</h5>
                                        <p class="text-muted">Khôi phục từ bản sao lưu</p>
                                        <button class="btn btn-success" id="restoreBtn">
                                            <i class="bi bi-upload me-2"></i>Khôi phục
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <h6>Cài đặt sao lưu tự động</h6>
                        <form id="backupSettingsForm">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Tần suất sao lưu</label>
                                    <select class="form-select" name="backup_frequency">
                                        <option value="daily">Hàng ngày</option>
                                        <option value="weekly" selected>Hàng tuần</option>
                                        <option value="monthly">Hàng tháng</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Thời gian sao lưu</label>
                                    <input type="time" class="form-control" name="backup_time" value="02:00">
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Giữ lại bản sao lưu (ngày)</label>
                                    <input type="number" class="form-control" name="retention_days" value="30" min="7" max="365">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Nén dữ liệu</label>
                                    <select class="form-select" name="compression">
                                        <option value="gzip" selected>Gzip</option>
                                        <option value="zip">ZIP</option>
                                        <option value="none">Không nén</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-2"></i>Lưu cài đặt
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-clock-history me-2"></i>
                            Lịch sử sao lưu
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <small class="text-muted">Lần cuối</small>
                                <small class="text-muted">2 giờ trước</small>
                            </div>
                            <div class="fw-bold">Sao lưu tự động</div>
                            <small class="text-success">Thành công</small>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <small class="text-muted">Kích thước</small>
                                <small class="text-muted">45.2 MB</small>
                            </div>
                            <div class="fw-bold">backup_2024_01_25.zip</div>
                            <small class="text-muted">Gzip</small>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <small class="text-muted">Lần cuối</small>
                                <small class="text-muted">1 ngày trước</small>
                            </div>
                            <div class="fw-bold">Sao lưu thủ công</div>
                            <small class="text-success">Thành công</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form submissions
    const generalForm = document.getElementById('generalSettingsForm');
    const emailForm = document.getElementById('emailSettingsForm');
    const securityForm = document.getElementById('securitySettingsForm');
    const backupForm = document.getElementById('backupSettingsForm');
    
    generalForm.addEventListener('submit', function(e) {
        e.preventDefault();
        showAlert('Cài đặt chung đã được lưu thành công!', 'success');
    });
    
    emailForm.addEventListener('submit', function(e) {
        e.preventDefault();
        showAlert('Cài đặt email đã được lưu thành công!', 'success');
    });
    
    securityForm.addEventListener('submit', function(e) {
        e.preventDefault();
        showAlert('Cài đặt bảo mật đã được lưu thành công!', 'success');
    });
    
    backupForm.addEventListener('submit', function(e) {
        e.preventDefault();
        showAlert('Cài đặt sao lưu đã được lưu thành công!', 'success');
    });
    
    // Test email functionality
    document.getElementById('testEmailBtn').addEventListener('click', function() {
        this.disabled = true;
        this.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Đang gửi...';
        
        setTimeout(() => {
            this.disabled = false;
            this.innerHTML = '<i class="bi bi-send me-2"></i>Gửi email test';
            showAlert('Email test đã được gửi thành công!', 'success');
        }, 2000);
    });
    
    // Manual backup functionality
    document.getElementById('manualBackupBtn').addEventListener('click', function() {
        this.disabled = true;
        this.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Đang sao lưu...';
        
        setTimeout(() => {
            this.disabled = false;
            this.innerHTML = '<i class="bi bi-download me-2"></i>Tạo sao lưu';
            showAlert('Bản sao lưu đã được tạo thành công!', 'success');
        }, 3000);
    });
    
    // Restore functionality
    document.getElementById('restoreBtn').addEventListener('click', function() {
        if (confirm('Bạn có chắc chắn muốn khôi phục dữ liệu? Hành động này sẽ ghi đè dữ liệu hiện tại.')) {
            this.disabled = true;
            this.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Đang khôi phục...';
            
            setTimeout(() => {
                this.disabled = false;
                this.innerHTML = '<i class="bi bi-upload me-2"></i>Khôi phục';
                showAlert('Dữ liệu đã được khôi phục thành công!', 'success');
            }, 4000);
        }
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
@endsection
