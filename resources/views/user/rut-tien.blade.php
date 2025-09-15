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
                                <input type="hidden" name="signature" id="signatureInput">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">
                                                <i class="material-icons">account_balance_wallet</i>
                                                Số dư hiện tại
                                            </label>
                                            <input type="text"
                                                   class="form-control bank-info-disabled"
                                                   value="{{ isset($soDuHienTai) ? number_format($soDuHienTai, 0, ',', '.') . ' VNĐ' : '0 VNĐ' }}"
                                                   disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">
                                                <i class="material-icons">trending_up</i>
                                                Tiền lãi
                                            </label>
                                            <input type="text"
                                                   class="form-control bank-info-disabled"
                                                   value="{{ isset($tienLai) ? number_format($tienLai, 0, ',', '.') . ' VNĐ' : '0 VNĐ' }}"
                                                   disabled>
                                        </div>
                                    </div>
                                </div>
                                
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

                    <!-- Modal Xem trước & Ký hợp đồng -->
                    <div id="previewModal" class="custom-modal" aria-hidden="true">
                        <div class="custom-modal-dialog">
                            <div class="custom-modal-header">
                                <h5 class="custom-modal-title">Xem trước yêu cầu rút tiền</h5>
                                <button type="button" class="custom-modal-close" id="modalCloseBtn">×</button>
                            </div>
                            <div class="custom-modal-body">
                                <div class="contract-preview">
                                    <div style="text-align:center; margin-bottom:12px;">
                                        <div style="font-weight:700; text-transform:uppercase;">Cộng hòa Xã hội Chủ nghĩa Việt Nam</div>
                                        <div style="font-weight:600;">Độc lập - Tự do - Hạnh phúc</div>
                                        <div style="height:1px; background:#333; width:220px; margin:6px auto 0;"></div>
                                    </div>

                                    <h6 style="text-align:center; font-weight:700; margin-bottom:12px;">PHIẾU XÁC NHẬN YÊU CẦU RÚT TIỀN</h6>
                                    <p style="text-align:center; color:#6c757d; margin-bottom:12px;">Ngày {{ now()->format('d/m/Y') }}</p>

                                    <div style="display:flex; gap:16px; align-items:flex-start; margin-bottom:12px;">
                                        @if(isset($congTy) && $congTy && $congTy->logo)
                                            <img src="{{ $congTy->logo }}" alt="Logo" style="width:56px; height:56px; object-fit:contain;">
                                        @endif
                                        <div>
                                            <p style="margin:0;"><strong>Đơn vị:</strong> {{ $congTy->ten ?? 'Công ty bảo hiểm' }}</p>
                                            <p style="margin:0;"><strong>Địa chỉ:</strong> {{ $congTy->dia_chi ?? '—' }}</p>
                                            <p style="margin:0;"><strong>Điện thoại:</strong> {{ $congTy->so_dien_thoai ?? '—' }} · <strong>Email:</strong> {{ $congTy->email ?? '—' }}</p>
                                            <p style="margin:0;"><strong>Website:</strong> {{ $congTy->website ?? '—' }} · <strong>MST:</strong> {{ $congTy->ma_so_thue ?? '—' }}</p>
                                            <p style="margin:0;"><strong>Người đại diện:</strong> {{ $congTy->nguoi_dai_dien ?? '—' }}</p>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row" style="margin-bottom:8px;">
                                        <div class="col-12 col-md-6">
                                            <p><strong>Họ tên:</strong> {{ $hopDong->ho_ten ?? ($user->ho_ten ?? $user->name ?? 'Người dùng') }}</p>
                                            <p><strong>CCCD:</strong> {{ $hopDong->cccd ?? ($user->cccd ?? '—') }}</p>
                                            <p><strong>Ngày sinh:</strong> {{ $hopDong->ngay_sinh ?? '—' }}</p>
                                            <p><strong>Số điện thoại:</strong> {{ $hopDong->so_dien_thoai ?? '—' }}</p>
                                            <p><strong>Địa chỉ:</strong> {{ $hopDong->dia_chi ?? '—' }}</p>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <p><strong>Mã hợp đồng:</strong> {{ $hopDong->ma_hop_dong ?? ($user->ma_hop_dong ?? '—') }}</p>
                                            <p><strong>Loại hợp đồng:</strong> {{ ($hopDong->loai_hop_dong ?? '') === 'cho_nguoi_khac' ? 'Cho người khác' : 'Cho bản thân' }}</p>
                                            <p><strong>Ngày cấp HĐ:</strong> {{ $hopDong->ngay_cap_hop_dong ?? '—' }}</p>
                                            <p><strong>Ngày đáo hạn:</strong> {{ $hopDong->ngay_dao_han ?? '—' }}</p>
                                            <p><strong>Tiền lãi tích lũy:</strong> {{ isset($tienLai) ? number_format($tienLai, 0, ',', '.') . ' VNĐ' : '0 VNĐ' }}</p>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-bottom:8px;">
                                        <div class="col-12 col-md-6">
                                            <p><strong>Ngân hàng:</strong> {{ $hopDong->ngan_hang ?? ($user->ngan_hang ?? '—') }}</p>
                                            <p><strong>Số tài khoản:</strong> {{ $hopDong->so_tai_khoan ?? ($user->so_tai_khoan ?? '—') }}</p>
                                            <p><strong>Chủ tài khoản:</strong> {{ $hopDong->chu_tai_khoan ?? ($user->chu_tai_khoan ?? '—') }}</p>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <p><strong>Số tiền rút yêu cầu:</strong> <span id="previewSoTien">0</span> VNĐ</p>
                                            <p><strong>Số tiền mua mỗi kỳ:</strong> {{ $hopDong->so_tien_mua ?? '—' }}</p>
                                            <p><strong>Kỳ đóng hằng năm:</strong> {{ $hopDong->so_tien_dong_hang_nam ?? '—' }}</p>
                                            <p><strong>Thời gian mua (năm):</strong> {{ $hopDong->thoi_gian_mua ?? '—' }}</p>
                                        </div>
                                    </div>

                                    <hr>
                                    <p style="margin-bottom:8px;">Tôi xác nhận các thông tin trên là đúng sự thật và đồng ý thực hiện yêu cầu rút tiền theo quy định của {{ $congTy->ten ?? 'công ty' }}. Tôi chịu trách nhiệm trước pháp luật về chữ ký điện tử dưới đây.</p>

                                    @if(isset($congTy) && $congTy && $congTy->con_dau)
                                        <div style="margin-top:8px;">
                                            <img src="{{ $congTy->con_dau }}" alt="Con dấu" style="width:96px; height:96px; object-fit:contain; opacity:0.9;">
                                        </div>
                                    @endif
                                </div>
                                <div class="signature-wrapper">
                                    <label class="form-label" style="margin-bottom:8px;">
                                        <i class="material-icons">edit</i>
                                        Ký xác nhận
                                    </label>
                                    <div class="signature-pad" id="signaturePadContainer">
                                        <canvas id="signatureCanvas"></canvas>
                                    </div>
                                    <div class="signature-actions">
                                        <button type="button" class="btn btn-secondary" id="clearSignatureBtn"><i class="material-icons">backspace</i> Xóa chữ ký</button>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-modal-footer">
                                <button type="button" class="btn btn-secondary" id="modalCancelBtn">Hủy</button>
                                <button type="button" class="btn btn-primary" id="confirmSignBtn"><i class="material-icons">check</i> Ký & Gửi</button>
                            </div>
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

/* Custom modal */
.custom-modal {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.4);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 1050;
    padding: 20px;
}
.custom-modal.show { display: flex; }
.custom-modal-dialog {
    background: #fff;
    border-radius: 10px;
    width: 100%;
    max-width: 720px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    max-height: 90vh;
}
.custom-modal-header, .custom-modal-footer {
    padding: 12px 16px;
    background: #f8f9fa;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex: 0 0 auto;
}
.custom-modal-title { margin: 0; font-weight: 600; }
.custom-modal-close { background: transparent; border: 0; font-size: 24px; line-height: 1; cursor: pointer; }
.custom-modal-body { padding: 16px; max-height: unset; overflow: auto; flex: 1 1 auto; }
.contract-preview p { margin-bottom: 6px; }

/* Signature pad */
.signature-pad { border: 2px dashed #e9ecef; border-radius: 8px; background: #fff; position: relative; }
.signature-pad:after { content: 'Ký vào khung này'; position: absolute; top: 8px; right: 12px; color: #6c757d; font-size: 12px; }
#signatureCanvas { width: 100%; height: 220px; display: block; touch-action: none; }
.signature-pad { touch-action: none; }
.signature-actions { margin-top: 8px; display: flex; gap: 8px; }

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

const modal = document.getElementById('previewModal');
const modalCloseBtn = document.getElementById('modalCloseBtn');
const modalCancelBtn = document.getElementById('modalCancelBtn');
const confirmSignBtn = document.getElementById('confirmSignBtn');
const previewSoTien = document.getElementById('previewSoTien');
const signatureCanvas = document.getElementById('signatureCanvas');
const signatureInput = document.getElementById('signatureInput');
const clearSignatureBtn = document.getElementById('clearSignatureBtn');

const formEl = document.getElementById('rutTienForm');
const submitBtn = document.getElementById('submitBtn');
let originalText = '';

(function initWithdrawModal(){
    if (!modal || !modalCloseBtn || !modalCancelBtn || !confirmSignBtn || !signatureCanvas || !signatureInput || !clearSignatureBtn || !formEl || !submitBtn) {
        return; // Missing elements; skip wiring events
    }

    let isDrawing = false;
    let lastX = 0;
    let lastY = 0;
    let hasSignature = false;

    function resizeCanvas() {
        const ratio = window.devicePixelRatio || 1;
        const rect = signatureCanvas.getBoundingClientRect();
        signatureCanvas.width = Math.max(1, rect.width * ratio);
        signatureCanvas.height = Math.max(1, rect.height * ratio);
        const ctx = signatureCanvas.getContext('2d');
        if (!ctx) return;
        ctx.scale(ratio, ratio);
        ctx.lineWidth = 2;
        ctx.lineJoin = 'round';
        ctx.lineCap = 'round';
        ctx.strokeStyle = '#111';
    }

    function draw(e) {
        if (!isDrawing) return;
        const ctx = signatureCanvas.getContext('2d');
        if (!ctx) return;
        const rect = signatureCanvas.getBoundingClientRect();
        const x = (e.touches ? e.touches[0].clientX : e.clientX) - rect.left;
        const y = (e.touches ? e.touches[0].clientY : e.clientY) - rect.top;
        if (e.touches) { e.preventDefault(); }
        ctx.beginPath();
        ctx.moveTo(lastX, lastY);
        ctx.lineTo(x, y);
        ctx.stroke();
        [lastX, lastY] = [x, y];
        hasSignature = true;
    }

    function startDrawing(e) {
        isDrawing = true;
        const rect = signatureCanvas.getBoundingClientRect();
        lastX = (e.touches ? e.touches[0].clientX : e.clientX) - rect.left;
        lastY = (e.touches ? e.touches[0].clientY : e.clientY) - rect.top;
        e.preventDefault();
    }

    function stopDrawing() { isDrawing = false; }

    function clearSignature() {
        const ctx = signatureCanvas.getContext('2d');
        if (!ctx) return;
        ctx.clearRect(0, 0, signatureCanvas.width, signatureCanvas.height);
        hasSignature = false;
    }

    window.addEventListener('resize', resizeCanvas);

    signatureCanvas.addEventListener('mousedown', startDrawing);
    signatureCanvas.addEventListener('mousemove', draw);
    window.addEventListener('mouseup', stopDrawing);

    signatureCanvas.addEventListener('touchstart', startDrawing, { passive: false });
    signatureCanvas.addEventListener('touchmove', draw, { passive: false });
    window.addEventListener('touchend', stopDrawing);

    clearSignatureBtn.addEventListener('click', clearSignature);

    function openModal() {
        // Hiển thị modal trước rồi mới đo và resize canvas (tránh width/height = 0)
        modal.classList.add('show');
        modal.setAttribute('aria-hidden', 'false');
        requestAnimationFrame(() => {
            resizeCanvas();
            clearSignature();
        });
    }
    function closeModal() {
        modal.classList.remove('show');
        modal.setAttribute('aria-hidden', 'true');
    }
    modalCloseBtn.addEventListener('click', closeModal);
    modalCancelBtn.addEventListener('click', closeModal);
    modal.addEventListener('click', function(e){ if(e.target === modal) closeModal(); });

    formEl.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const soTienEl = document.getElementById('so_tien');
        const soTien = soTienEl ? soTienEl.value : '';
        
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

        if (previewSoTien) {
            previewSoTien.textContent = Number(soTien).toLocaleString('vi-VN');
        }
        openModal();
    });

    confirmSignBtn.addEventListener('click', function(){
        if (!hasSignature) {
            toastr.error('Vui lòng ký xác nhận trước khi gửi.');
            return;
        }

        originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="material-icons">hourglass_empty</i> Đang xử lý...';
        submitBtn.disabled = true;

        try {
            const dataUrl = signatureCanvas.toDataURL('image/png');
            signatureInput.value = dataUrl;
        } catch (err) {
            toastr.error('Không thể lấy chữ ký. Vui lòng thử lại.');
            submitBtn.innerHTML = originalText || '<i class="material-icons">send</i> Xác nhận rút tiền';
            submitBtn.disabled = false;
            return;
        }

        const formData = new FormData(formEl);
        const tokenEl = document.querySelector('meta[name="csrf-token"]');
        const csrfToken = tokenEl ? tokenEl.getAttribute('content') : '';
        if (window.axios && csrfToken) {
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;
        }

        if (!window.axios) {
            toastr.error('Không tìm thấy axios. Vui lòng tải lại trang.');
            submitBtn.innerHTML = originalText || '<i class="material-icons">send</i> Xác nhận rút tiền';
            submitBtn.disabled = false;
            return;
        }

        window.axios.post('{{ route("ky-rut-tien") }}', formData, {
            headers: { 'Content-Type': 'multipart/form-data' }
        })
        .then(({ data }) => {
            if (data.success) {
                toastr.success(data.message);
                formEl.reset();
                closeModal();
            } else {
                toastr.error(data.message || 'Yêu cầu thất bại');
                if (data.errors) {
                    Object.keys(data.errors).forEach(field => {
                        const errorMessages = data.errors[field];
                        errorMessages.forEach(message => toastr.error(message));
                    });
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            toastr.error('Có lỗi xảy ra khi xử lý yêu cầu. Vui lòng thử lại.');
        })
        .finally(() => {
            submitBtn.innerHTML = originalText || '<i class="material-icons">send</i> Xác nhận rút tiền';
            submitBtn.disabled = false;
        });
    });
})();

// Format số tiền khi nhập
(function initFormat(){
    const soTienEl = document.getElementById('so_tien');
    if (!soTienEl) return;
    soTienEl.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value) {
            e.target.value = parseInt(value);
        }
    });
})();

// Safe refresh captcha binding using event delegation
(function initCaptchaRefresh(){
    document.addEventListener('click', function(e){
        const anchor = e.target && e.target.closest ? e.target.closest('.refresh a') : null;
        if (!anchor) return;
        e.preventDefault();
        if (typeof displayCaptcha === 'function') {
            displayCaptcha();
        } else {
            console.warn('displayCaptcha() không tồn tại.');
        }
    });
})();
</script>
@endsection
