@extends('user.template.app')

@section('content')
<div class="container-fluid py-4">

    <!-- Company Information Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-info text-white py-3">
                    <h5 class="card-title mb-0 text-center fw-bold">
                        <i class="bi bi-building me-2"></i>THÔNG TIN CÔNG TY BẢO HIỂM
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <!-- Logo và tên công ty -->
                        <div class="col-md-3 text-center mb-4">
                            <div class="border border-2 border-info p-3 d-inline-block" style="min-height: 200px; min-width: 200px; display: flex; align-items: center; justify-content: center;">
                                @if($user->congTy && $user->congTy->logo)
                                    <img src="{{ asset($user->congTy->logo) }}" alt="Logo công ty" 
                                         class="img-fluid" style="max-height: 160px; width: auto;"
                                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                @endif
                                <div class="d-none text-center flex-column align-items-center justify-content-center" style="min-height: 160px;">
                                    <i class="bi bi-building fs-1 text-info mb-2"></i>
                                    <p class="mb-0 fw-bold small">LOGO CÔNG TY</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Thông tin công ty -->
                        <div class="col-md-9">
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-dark">TÊN CÔNG TY:</label>
                                        <input type="text" class="form-control" value="{{ $user->congTy->ten ?? 'N/A' }}" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-dark">MÃ SỐ THUẾ:</label>
                                        <input type="text" class="form-control" value="{{ $user->congTy->ma_so_thue ?? 'N/A' }}" disabled>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-bold text-dark">ĐỊA CHỈ TRỤ SỞ CHÍNH:</label>
                                        <input type="text" class="form-control" value="{{ $user->congTy->dia_chi ?? 'N/A' }}" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold text-dark">SỐ ĐIỆN THOẠI:</label>
                                        <input type="text" class="form-control" value="{{ $user->congTy->so_dien_thoai ?? 'N/A' }}" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold text-dark">WEBSITE:</label>
                                        <input type="text" class="form-control" value="{{ $user->congTy->website ?? 'N/A' }}" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold text-dark">EMAIL:</label>
                                        <input type="text" class="form-control" value="{{ $user->congTy->email ?? 'N/A' }}" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-dark">NGƯỜI ĐẠI DIỆN:</label>
                                        <input type="text" class="form-control" value="{{ $user->congTy->nguoi_dai_dien ?? 'N/A' }}" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold text-dark">LOẠI HÌNH:</label>
                                        <input type="text" class="form-control" value="{{ $user->congTy->loai_hinh ?? 'N/A' }}" disabled>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Personal Information Section -->
            <div class="row">
                <!-- NGƯỜI MUA BẢO HIỂM -->
                <div class="col-12 mb-4">
                    <div class="card border border-dark">
                        <div class="card-header bg-dark text-white py-3">
                            <h5 class="card-title mb-0 text-center fw-bold">
                                <i class="bi bi-person-circle me-2"></i>NGƯỜI MUA BẢO HIỂM
                            </h5>
                            <p class="mb-0 text-center small">THÔNG TIN CÁ NHÂN NGƯỜI MUA</p>
                        </div>
                        <div class="card-body p-4">
                            <!-- Thông tin cơ bản -->
                            <div class="row mb-4">
                                <div class="col-12 col-md-3 col-lg-2 text-center mb-3 mb-md-0">
                                    <div class="border border-2 border-dark p-2 mx-auto" style="height: 300px; min-width: 150px; max-width: 200px; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
                                        @if($user->anh_chan_dung)
                                            <img src="{{ asset($user->anh_chan_dung) }}" alt="Ảnh chân dung" 
                                                 class="img-fluid" style="max-height: 260px; width: auto; border-radius: 4px;"
                                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        @endif
                                        <div class="d-none text-center flex-column align-items-center justify-content-center" style="height: 260px;">
                                            <i class="bi bi-person fs-1 text-dark mb-2"></i>
                                            <p class="mb-0 small fw-bold">ẢNH CHÂN DUNG</p>
                                        </div>
                                    </div>
                                    <p class="small mt-2 mb-0 fw-bold">ẢNH CHÂN DUNG</p>
                                </div>
                                <div class="col-12 col-md-9 col-lg-10">
                                    <form>
                                        <div class="row g-3">
                                            <div class="col-12 col-md-6">
                                                <label class="form-label fw-bold text-dark">HỌ VÀ TÊN:</label>
                                                <input type="text" class="form-control text-uppercase" value="{{ $user->ho_ten ?? 'N/A' }}" disabled>
                                            </div>
                                            <div class="col-6 col-md-3">
                                                <label class="form-label fw-bold text-dark">GIỚI TÍNH:</label>
                                                <input type="text" class="form-control" value="{{ $user->gioi_tinh ?? 'N/A' }}" disabled>
                                            </div>
                                            <div class="col-6 col-md-3">
                                                <label class="form-label fw-bold text-dark">NGÀY SINH:</label>
                                                <input type="text" class="form-control" value="{{ $user->ngay_sinh ?? 'N/A' }}" disabled>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label fw-bold text-dark">SỐ CCCD/CMND:</label>
                                                <input type="text" class="form-control" value="{{ $user->cccd ?? 'N/A' }}" disabled>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label fw-bold text-dark">SỐ ĐIỆN THOẠI:</label>
                                                <input type="text" class="form-control" value="{{ $user->so_dien_thoai ?? 'N/A' }}" disabled>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label fw-bold text-dark">ĐỊA CHỈ THƯỜNG TRÚ:</label>
                                                <input type="text" class="form-control" value="{{ $user->dia_chi ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            <!-- Thông tin ngân hàng người mua -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="fw-bold text-dark mb-3">THÔNG TIN NGÂN HÀNG:</h6>
                                    <form>
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold text-dark">TÊN NGÂN HÀNG:</label>
                                                <input type="text" class="form-control" value="{{ $user->ngan_hang ?? 'N/A' }}" disabled>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold text-dark">SỐ TÀI KHOẢN:</label>
                                                <input type="text" class="form-control text-primary" value="{{ $user->so_tai_khoan ?? 'N/A' }}" disabled>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold text-dark">CHỦ TÀI KHOẢN:</label>
                                                <input type="text" class="form-control text-uppercase" value="{{ $user->chu_tai_khoan ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            <!-- Hình ảnh CCCD -->
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="fw-bold text-dark border-bottom border-dark pb-1 mb-3">GIẤY TỜ TÙY THÂN (CCCD/CMND):</h6>
                                    <div class="row g-3">
                                        <div class="col-12 col-sm-6">
                                            <div class="text-center">
                                                <div class="border border-2 border-dark p-2 mx-auto" style="min-height: 220px; min-width: 150px; max-width: 300px; display: flex; align-items: center; justify-content: center;">
                                                    @if($user->anh_mat_truoc)
                                                        <img src="{{ asset($user->anh_mat_truoc) }}" alt="CCCD mặt trước" 
                                                             class="img-fluid" style="max-height: 190px; width: auto;"
                                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                    @endif
                                                    <div class="d-none text-center flex-column align-items-center justify-content-center" style="min-height: 190px;">
                                                        <i class="bi bi-card-image fs-1 text-dark mb-2"></i>
                                                        <p class="mb-0 small fw-bold">MẶT TRƯỚC</p>
                                                    </div>
                                                </div>
                                                <p class="small mt-2 mb-0 fw-bold">MẶT TRƯỚC</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="text-center">
                                                <div class="border border-2 border-dark p-2 mx-auto" style="min-height: 220px; min-width: 150px; max-width: 300px; display: flex; align-items: center; justify-content: center;">
                                                    @if($user->anh_mat_sau)
                                                        <img src="{{ asset($user->anh_mat_sau) }}" alt="CCCD mặt sau" 
                                                             class="img-fluid" style="max-height: 190px; width: auto;"
                                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                    @endif
                                                    <div class="d-none text-center flex-column align-items-center justify-content-center" style="min-height: 190px;">
                                                        <i class="bi bi-card-image fs-1 text-dark mb-2"></i>
                                                        <p class="mb-0 small fw-bold">MẶT SAU</p>
                                                    </div>
                                                </div>
                                                <p class="small mt-2 mb-0 fw-bold">MẶT SAU</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- NGƯỜI THỪA HƯỞNG (chỉ hiển thị nếu có) -->
                @if($user->loai_hop_dong === 'cho_nguoi_khac' && $user->th_ho_ten)
                <div class="col-12">
                    <div class="card border border-dark">
                        <div class="card-header bg-dark text-white py-3">
                            <h5 class="card-title mb-0 text-center fw-bold">
                                <i class="bi bi-people-circle me-2"></i>NGƯỜI THỪA HƯỞNG
                            </h5>
                            <p class="mb-0 text-center small">THÔNG TIN NGƯỜI HƯỞNG QUYỀN LỢI BẢO HIỂM</p>
                        </div>
                        <div class="card-body p-4">
                            <!-- Thông tin cơ bản -->
                            <div class="row mb-4">
                                <div class="col-12 col-md-3 col-lg-2 text-center mb-3 mb-md-0">
                                    <div class="border border-2 border-dark p-2 mx-auto" style="height: 300px; min-width: 150px; max-width: 200px; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
                                        @if($user->th_anh_chan_dung)
                                            <img src="{{ asset($user->th_anh_chan_dung) }}" alt="Ảnh chân dung người thừa hưởng" 
                                                 class="img-fluid" style="max-height: 260px; width: auto; border-radius: 4px;"
                                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        @endif
                                        <div class="d-none text-center flex-column align-items-center justify-content-center" style="height: 260px;">
                                            <i class="bi bi-person fs-1 text-dark mb-2"></i>
                                            <p class="mb-0 small fw-bold">ẢNH CHÂN DUNG</p>
                                        </div>
                                    </div>
                                    <p class="small mt-2 mb-0 fw-bold">ẢNH CHÂN DUNG</p>
                                </div>
                                <div class="col-12 col-md-9 col-lg-10">
                                    <form>
                                        <div class="row g-3">
                                            <div class="col-12 col-md-6">
                                                <label class="form-label fw-bold text-dark">HỌ VÀ TÊN:</label>
                                                <input type="text" class="form-control text-uppercase" value="{{ $user->th_ho_ten ?? 'N/A' }}" disabled>
                                            </div>
                                            <div class="col-6 col-md-3">
                                                <label class="form-label fw-bold text-dark">MỐI QUAN HỆ:</label>
                                                <input type="text" class="form-control" value="{{ $user->th_moi_quan_he ?? 'N/A' }}" disabled>
                                            </div>
                                            <div class="col-6 col-md-3">
                                                <label class="form-label fw-bold text-dark">GIỚI TÍNH:</label>
                                                <input type="text" class="form-control" value="{{ $user->th_gioi_tinh ?? 'N/A' }}" disabled>
                                            </div>
                                            <div class="col-6 col-md-3">
                                                <label class="form-label fw-bold text-dark">NGÀY SINH:</label>
                                                <input type="text" class="form-control" value="{{ $user->th_ngay_sinh ?? 'N/A' }}" disabled>
                                            </div>
                                            <div class="col-6 col-md-3">
                                                <label class="form-label fw-bold text-dark">SỐ CCCD/CMND:</label>
                                                <input type="text" class="form-control" value="{{ $user->th_cccd ?? 'N/A' }}" disabled>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="form-label fw-bold text-dark">SỐ ĐIỆN THOẠI:</label>
                                                <input type="text" class="form-control" value="{{ $user->th_so_dien_thoai ?? 'N/A' }}" disabled>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label fw-bold text-dark">ĐỊA CHỈ THƯỜNG TRÚ:</label>
                                                <input type="text" class="form-control" value="{{ $user->th_dia_chi ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            <!-- Thông tin ngân hàng người thừa hưởng -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="fw-bold text-dark mb-3">THÔNG TIN NGÂN HÀNG:</h6>
                                    <form>
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold text-dark">TÊN NGÂN HÀNG:</label>
                                                <input type="text" class="form-control" value="{{ $user->th_ngan_hang ?? 'N/A' }}" disabled>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold text-dark">SỐ TÀI KHOẢN:</label>
                                                <input type="text" class="form-control text-primary" value="{{ $user->th_so_tai_khoan ?? 'N/A' }}" disabled>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-bold text-dark">CHỦ TÀI KHOẢN:</label>
                                                <input type="text" class="form-control text-uppercase" value="{{ $user->th_chu_tai_khoan ?? 'N/A' }}" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            <!-- Hình ảnh CCCD -->
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="fw-bold text-dark border-bottom border-dark pb-1 mb-3">GIẤY TỜ TÙY THÂN (CCCD/CMND):</h6>
                                    <div class="row g-3">
                                        <div class="col-12 col-sm-6">
                                            <div class="text-center">
                                                <div class="border border-2 border-dark p-2 mx-auto" style="min-height: 220px; min-width: 150px; max-width: 300px; display: flex; align-items: center; justify-content: center;">
                                                    @if($user->th_anh_mat_truoc)
                                                        <img src="{{ asset($user->th_anh_mat_truoc) }}" alt="CCCD mặt trước người thừa hưởng" 
                                                             class="img-fluid" style="max-height: 190px; width: auto;"
                                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                    @endif
                                                    <div class="d-none text-center flex-column align-items-center justify-content-center" style="min-height: 190px;">
                                                        <i class="bi bi-card-image fs-1 text-dark mb-2"></i>
                                                        <p class="mb-0 small fw-bold">MẶT TRƯỚC</p>
                                                    </div>
                                                </div>
                                                <p class="small mt-2 mb-0 fw-bold">MẶT TRƯỚC</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="text-center">
                                                <div class="border border-2 border-dark p-2 mx-auto" style="min-height: 220px; min-width: 150px; max-width: 300px; display: flex; align-items: center; justify-content: center;">
                                                    @if($user->th_anh_mat_sau)
                                                        <img src="{{ asset($user->th_anh_mat_sau) }}" alt="CCCD mặt sau người thừa hưởng" 
                                                             class="img-fluid" style="max-height: 190px; width: auto;"
                                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                    @endif
                                                    <div class="d-none text-center flex-column align-items-center justify-content-center" style="min-height: 190px;">
                                                        <i class="bi bi-card-image fs-1 text-dark mb-2"></i>
                                                        <p class="mb-0 small fw-bold">MẶT SAU</p>
                                                    </div>
                                                </div>
                                                <p class="small mt-2 mb-0 fw-bold">MẶT SAU</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

<style>
/* Custom styling for profile page */

/* Card styling */
.card {
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    transition: box-shadow 0.3s ease;
}

.card:hover {
    box-shadow: 0 4px 20px rgba(0,0,0,0.12);
}

.card-header {
    border-radius: 12px 12px 0 0 !important;
    border-bottom: none;
}

/* Form styling */
.form-control:disabled {
    background-color: #f8f9fa;
    border-color: #e9ecef;
    color: #495057;
    font-weight: 500;
    font-size: 1.1rem;
    padding: 0.75rem 1rem;
}

.form-label {
    color: #495057;
    margin-bottom: 0.75rem;
    font-size: 1.1rem;
    font-weight: 600;
}

/* Increase spacing between form rows */
.row.g-3 {
    gap: 1.5rem 0;
}

.row.g-3 > * {
    margin-bottom: 1rem;
}

/* Image containers */
.border.border-2 {
    background-color: #f8f9fa;
    transition: all 0.3s ease;
}

.border.border-2:hover {
    background-color: #e9ecef;
    transform: translateY(-2px);
}

/* Image styling */
.img-fluid {
    border-radius: 8px;
    transition: transform 0.3s ease;
}

.img-fluid:hover {
    transform: scale(1.05);
    cursor: pointer;
}

/* Badge styling */
.badge {
    font-size: 0.95rem;
    padding: 0.6rem 1.2rem;
    border-radius: 20px;
}

/* Header and title styling */
.card-title {
    font-size: 1.4rem;
    font-weight: 700;
}

.card-header h4 {
    font-size: 1.7rem;
}

.card-header h5 {
    font-size: 1.5rem;
}

/* Section headers */
h6.fw-bold {
    font-size: 1.3rem;
    font-weight: 700;
}

/* Responsive design */
@media (max-width: 768px) {
    .container-fluid {
        padding-left: 15px;
        padding-right: 15px;
    }
    
    .card-body {
        padding: 1.5rem;
    }
    
    .nav-tabs .nav-link {
        font-size: 0.875rem;
        padding: 0.75rem 0.5rem;
    }
    
    .form-label {
        font-size: 1.05rem;
        margin-bottom: 0.6rem;
    }
    
    .form-control {
        font-size: 1.05rem;
        padding: 0.6rem 0.8rem;
    }
    
    /* Image containers mobile */
    .border.border-2 {
        min-height: 150px !important;
        min-width: 120px !important;
    }
    
    /* Portrait images mobile */
    .border.border-2[style*="height: 300px"] {
        height: 220px !important;
        min-width: 100px !important;
    }
    
    /* CCCD images mobile */
    .border.border-2[style*="min-height: 220px"] {
        min-height: 150px !important;
        min-width: 100px !important;
    }
    
    /* Logo company mobile */
    .border.border-2[style*="min-height: 200px"] {
        min-height: 150px !important;
        min-width: 150px !important;
    }
}

@media (max-width: 576px) {
    .card-body {
        padding: 1rem;
    }
    
    .nav-tabs .nav-link {
        font-size: 0.8rem;
        padding: 0.5rem 0.25rem;
    }
    
    .form-label {
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }
    
    .form-control {
        font-size: 1rem;
        padding: 0.5rem 0.7rem;
    }
    
    /* Reduce spacing on very small screens */
    .row.g-3 {
        gap: 1rem 0;
    }
    
    .row.g-3 > * {
        margin-bottom: 1rem;
    }
    
    /* Hide less important columns on very small screens */
    .col-md-3.col-lg-2 {
        display: none;
    }
    
    .col-12.col-md-9.col-lg-10 {
        flex: 0 0 100%;
        max-width: 100%;
    }
    
    /* Further reduce image sizes on very small screens */
    .border.border-2[style*="height: 300px"] {
        height: 180px !important;
        min-width: 80px !important;
    }
    
    .border.border-2[style*="min-height: 220px"] {
        min-height: 120px !important;
        min-width: 80px !important;
    }
    
    .border.border-2[style*="min-height: 200px"] {
        min-height: 120px !important;
        min-width: 120px !important;
    }
}

/* Animation for sections */
.card {
    animation: fadeIn 0.3s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Loading state for images */
.img-fluid[src=""] {
    opacity: 0;
}

.img-fluid:not([src=""]) {
    opacity: 1;
    transition: opacity 0.3s ease;
}

/* Custom scrollbar for long content - removed to show full content */


/* Print styles */
@media print {
    .card-header,
    .btn {
        display: none !important;
    }
    
    .card {
        border: 1px solid #000 !important;
        box-shadow: none !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // Add click to zoom functionality for images
    document.querySelectorAll('.img-fluid').forEach(function(img) {
        img.addEventListener('click', function() {
            if (this.src && this.src !== '') {
                // Create modal for image viewing
                var modal = document.createElement('div');
                modal.className = 'modal fade';
                modal.innerHTML = `
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Xem hình ảnh</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="${this.src}" class="img-fluid" alt="${this.alt}">
                            </div>
                        </div>
                    </div>
                `;
                
                document.body.appendChild(modal);
                var bsModal = new bootstrap.Modal(modal);
                bsModal.show();
                
                // Remove modal from DOM after hiding
                modal.addEventListener('hidden.bs.modal', function() {
                    document.body.removeChild(modal);
                });
            }
        });
    });
    
    // Add loading state for images
    document.querySelectorAll('.img-fluid').forEach(function(img) {
        img.addEventListener('load', function() {
            this.style.opacity = '1';
        });
        
        img.addEventListener('error', function() {
            this.style.display = 'none';
            if (this.nextElementSibling) {
                this.nextElementSibling.style.display = 'flex';
            }
        });
    });
});
</script>
