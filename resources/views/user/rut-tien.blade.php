@extends('user.template.app')
@section('content')
<div _ngcontent-c3="" class="main portal-home">
    <app-sidebar-mobile _ngcontent-c3="" _nghost-c5="" style="display: none;">
        <ul _ngcontent-c5="" class="menu-left close">
            <li _ngcontent-c5=""><button _ngcontent-c5="" class="icon-btn"><img _ngcontent-c5="" alt="image"
                        src="./assets/images/btn_menu.svg"></button></li>
        </ul>
    </app-sidebar-mobile>
    <app-siderbar _ngcontent-c3="" class="bhxh-sidebar sidebar-fixed" _nghost-c6="" style="top: 120px; height: 802px;">
    </app-siderbar>
    <div _ngcontent-c3="" class="portal-content">
        
        <div _ngcontent-c3="" id="content">
            <div _ngcontent-c3="" class="row">
                <div _ngcontent-c3="" class="col-md-12">
                    <div _ngcontent-c3="" class="card">
                        <div _ngcontent-c3="" class="card-body">

                            <form action="{{ route('rut-tien') }}" method="POST" id="rutTienForm">
                                @csrf
                                
                                <div class="row">
                                    <!-- Hàng 1: Ngân hàng và Số tài khoản -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">
                                                <i class="material-icons">account_balance</i>
                                                Ngân hàng
                                            </label>
                                            <input type="text" 
                                                   class="form-control bank-info-disabled" 
                                                   value="{{ $user->ngan_hang ?? 'Chưa cập nhật' }}" 
                                                   disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">
                                                <i class="material-icons">credit_card</i>
                                                Số tài khoản
                                            </label>
                                            <input type="text" 
                                                   class="form-control bank-info-disabled" 
                                                   value="{{ $user->so_tai_khoan ?? 'Chưa cập nhật' }}" 
                                                   disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Hàng 2: Chủ tài khoản và Số tiền rút -->
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">
                                                <i class="material-icons">person</i>
                                                Chủ tài khoản
                                            </label>
                                            <input type="text" 
                                                   class="form-control bank-info-disabled" 
                                                   value="{{ $user->chu_tai_khoan ?? 'Chưa cập nhật' }}" 
                                                   disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="so_tien" class="form-label">
                                                <i class="material-icons">attach_money</i>
                                                Số tiền rút (VNĐ) <span class="text-danger">*</span>
                                            </label>
                                            <input type="number" 
                                                   class="form-control @error('so_tien') is-invalid @enderror" 
                                                   id="so_tien" 
                                                   name="so_tien" 
                                                   value="{{ old('so_tien') }}"
                                                   placeholder="Nhập số tiền muốn rút"
                                                   min="10000"
                                                   max="100000000"
                                                   step="1000"
                                                   required>
                                            @error('so_tien')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small class="form-text text-muted">
                                                Số tiền tối thiểu: 10,000 VNĐ - Tối đa: 100,000,000 VNĐ
                                            </small>
                                        </div>
                                    </div>
                                </div>

                                @if(!$user->ngan_hang || !$user->so_tai_khoan || !$user->chu_tai_khoan)
                                    <div class="alert alert-warning">
                                        <i class="material-icons">warning</i>
                                        <strong>Lưu ý:</strong> Thông tin ngân hàng chưa đầy đủ. Vui lòng cập nhật thông tin trong 
                                        <a href="{{ route('profile') }}" class="alert-link">trang cá nhân</a> trước khi rút tiền.
                                    </div>
                                @endif

                                <div class="alert alert-info">
                                    <i class="material-icons">info</i>
                                    <strong>Lưu ý:</strong>
                                    <ul class="mb-0 mt-2">
                                        <li>Thời gian xử lý: 1-3 ngày làm việc</li>
                                        <li>Phí giao dịch: 0 VNĐ</li>
                                        <li>Vui lòng kiểm tra kỹ thông tin trước khi xác nhận</li>
                                        <li>Liên hệ hotline: 1900-xxxx nếu cần hỗ trợ</li>
                                    </ul>
                                </div>

                                <div class="form-group text-center">
                                    <button type="button" class="btn btn-secondary me-2" onclick="resetForm()">
                                        <i class="material-icons">refresh</i>
                                        Làm mới
                                    </button>
                                    <button type="submit" class="btn btn-primary" id="submitBtn">
                                        <i class="material-icons">send</i>
                                        Xác nhận rút tiền
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    border-radius: 10px;
}

.card-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-radius: 10px 10px 0 0 !important;
    padding: 20px;
}

.card-title {
    margin: 0;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
}

.form-label {
    font-weight: 600;
    color: #333;
    display: flex;
    align-items: center;
    gap: 5px;
}

.form-control {
    border-radius: 8px;
    border: 2px solid #e9ecef;
    padding: 12px 15px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

.btn {
    border-radius: 8px;
    padding: 12px 30px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
}

.btn-secondary {
    background: #6c757d;
    border: none;
}

.btn-secondary:hover {
    background: #5a6268;
    transform: translateY(-2px);
}

.alert {
    border-radius: 8px;
    border: none;
    display: flex;
    align-items: flex-start;
    gap: 10px;
}

.info-item {
    text-align: center;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
    margin-bottom: 10px;
}

.info-item label {
    display: block;
    font-weight: 600;
    color: #666;
    margin-bottom: 5px;
}

.info-item .amount {
    font-size: 1.2em;
    font-weight: bold;
    color: #28a745;
}

.info-item .count {
    font-size: 1.1em;
    font-weight: bold;
    color: #007bff;
}

.info-item .limit {
    font-size: 1.1em;
    font-weight: bold;
    color: #6f42c1;
}

.table th {
    background: #f8f9fa;
    font-weight: 600;
    border: none;
}

.badge {
    padding: 8px 12px;
    border-radius: 20px;
    font-weight: 500;
}

.breadcrumb {
    background: none;
    padding: 0;
    margin-bottom: 20px;
}

.breadcrumb-item a {
    color: #667eea;
    text-decoration: none;
}

.breadcrumb-item.active {
    color: #6c757d;
}

/* CSS cho thông tin ngân hàng disabled */
.bank-info-disabled {
    background-color: #f8f9fa !important;
    border: 2px solid #e9ecef !important;
    color: #495057 !important;
    cursor: not-allowed !important;
    opacity: 0.8;
    font-weight: 500;
}

.bank-info-disabled:focus {
    border-color: #e9ecef !important;
    box-shadow: none !important;
}

.bank-info-disabled::placeholder {
    color: #6c757d !important;
    font-style: italic;
}

/* Style cho label của thông tin ngân hàng */
.form-group:has(.bank-info-disabled) .form-label {
    color: #6c757d;
    font-weight: 600;
}

.form-group:has(.bank-info-disabled) .form-label .material-icons {
    font-size: 18px;
    vertical-align: middle;
    margin-right: 6px;
}

/* Alert warning cho thông tin ngân hàng */
.alert-warning {
    border-radius: 8px;
    border: none;
    background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
    color: #856404;
    border-left: 4px solid #ffc107;
}

.alert-warning .material-icons {
    color: #f39c12;
}

@media (max-width: 768px) {
    .card-header {
        padding: 15px;
    }
    
    .btn {
        width: 100%;
        margin-bottom: 10px;
    }
    
    .info-item {
        margin-bottom: 15px;
    }
    
    .bank-info-disabled {
        font-size: 14px;
    }
}
</style>

<script>
function resetForm() {
    document.getElementById('rutTienForm').reset();
}

document.getElementById('rutTienForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const soTien = document.getElementById('so_tien').value;
    
    // Validation phía client
    if (!soTien) {
        toastr.error('Vui lòng nhập số tiền rút');
        return;
    }
    
    if (parseInt(soTien) < 10000) {
        toastr.error('Số tiền rút tối thiểu là 10,000 VNĐ');
        return;
    }
    
    if (parseInt(soTien) > 100000000) {
        toastr.error('Số tiền rút tối đa là 100,000,000 VNĐ');
        return;
    }
    
    const submitBtn = document.getElementById('submitBtn');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="material-icons">hourglass_empty</i> Đang xử lý...';
    submitBtn.disabled = true;
    
    // Lấy form data
    const formData = new FormData(this);
    
    // Gửi AJAX request
    fetch('{{ route("rut-tien") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            toastr.success(data.message);
            // Reset form sau khi thành công
            document.getElementById('rutTienForm').reset();
        } else {
            toastr.error(data.message);
            // Hiển thị lỗi validation nếu có
            if (data.errors) {
                Object.keys(data.errors).forEach(field => {
                    const errorMessages = data.errors[field];
                    errorMessages.forEach(message => {
                        toastr.error(message);
                    });
                });
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
        toastr.error('Có lỗi xảy ra khi xử lý yêu cầu. Vui lòng thử lại.');
    })
    .finally(() => {
        // Khôi phục button
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    });
});

// Format số tiền khi nhập
document.getElementById('so_tien').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value) {
        e.target.value = parseInt(value);
    }
});
</script>
@endsection
