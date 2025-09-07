@extends('admin.layouts.app')

@section('title', 'Quản lý hợp đồng')
@section('page-title', 'Quản lý hợp đồng')

@section('content')
<div class="page-header">
    <h1 class="page-title">Quản lý hợp đồng bảo hiểm</h1>
    <p class="page-subtitle">Quản lý tất cả hợp đồng bảo hiểm trong hệ thống</p>
</div>

<!-- Search and Filter Form -->
<div class="card mb-4">
    <div class="card-header bg-light">
        <h6 class="card-title mb-0">
            <i class="bi bi-funnel me-2"></i>
            Bộ lọc và tìm kiếm
        </h6>
    </div>
    <div class="card-body">
        <form id="filterForm" class="needs-validation" novalidate>
            <div class="row g-3">
                <!-- Tìm kiếm từ khóa -->
                <div class="col-md-6">
                    <label for="searchInput" class="form-label">Tìm kiếm</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" class="form-control" id="searchInput" name="search" 
                        value="{{ $search }}"
                               placeholder="Tìm theo tên, mã hợp đồng, CCCD...">
                    </div>
                </div>

                <!-- Lọc theo công ty -->
                <div class="col-md-4">
                    <label for="companyFilter" class="form-label">Công ty</label>
                    <select class="form-select" id="companyFilter" name="company" value="{{ $company }}">
                        <option value="">Tất cả công ty</option>
                        @foreach ($congTy as $ct)
                            <option value="{{ $ct->id }}" {{ $company == $ct->id ? 'selected' : '' }}>{{ $ct->ten }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Nút thao tác -->
                <div class="col-md-2">
                    <label class="form-label">&nbsp;</label>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search me-1"></i>Tìm
                        </button>
                    </div>
                </div>
            </div>
        </form>
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
        <div class="table-responsive" style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
            <table class="table table-hover table-striped table-bordered table-sm" id="hopDongTable" style="min-width: 800px;">
                <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th style="min-width: 150px;">Mã hợp đồng</th>
                        <th>Khách hàng</th>
                        <th>Công ty</th>
                        <th>Hợp đồng</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($hopDong) > 0)
                    @foreach ($hopDong as $hd)
                     <tr>
                        <td class="text-center">
                            <span class="fw-bold">{{ ($hopDong->currentPage() - 1) * $hopDong->perPage() + $loop->iteration }}</span>
                        </td>
                        <td>
                            <span class="badge bg-primary fs-6">{{ $hd->ma_hop_dong }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-start">
                                <div class="user-avatar" style="width: 100px; height: 100px; font-size: 0.8rem;">
                                   <img style="width: 80px; height: 100px" src="{{ $hd->anh_mat_truoc }}" alt="Ảnh chân dung" class="">      
                                </div>
                                <div class="customer-info flex-grow-1">
                                    <div class="fw-bold text-dark mb-1">{{ $hd->ho_ten }}</div>
                                    <div class="customer-details">
                                        <div class="row g-1">
                                            @if($hd->cccd)
                                            <div class="col-12">
                                                <small class="text-muted d-flex align-items-center">
                                                    <i class="bi bi-card-text me-1"></i>
                                                    CCCD: {{ $hd->cccd }}
                                                </small>
                                            </div>
                                            @endif
                                            @if($hd->ngay_sinh)
                                            <div class="col-12">
                                                <small class="text-muted d-flex align-items-center">
                                                    <i class="bi bi-calendar3 me-1"></i>
                                                    Sinh: {{ $hd->ngay_sinh }}
                                                </small>
                                            </div>
                                            @endif
                                            @if($hd->so_dien_thoai)
                                            <div class="col-12">
                                                <small class="text-muted d-flex align-items-center">
                                                    <i class="bi bi-telephone me-1"></i>
                                                    {{ $hd->so_dien_thoai }}
                                                </small>
                                            </div>
                                            @endif
                                            @if($hd->gioi_tinh)
                                            <div class="col-12">
                                                <small class="text-muted d-flex align-items-center">
                                                    <i class="bi bi-person me-1"></i>
                                                    {{ $hd->gioi_tinh }}
                                                </small>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                @if($hd->congTy && $hd->congTy->logo)
                                    <img src="{{ $hd->congTy->logo }}" alt="Logo {{ $hd->congTy->ten }}" 
                                         class="company-logo me-2">
                                @else
                                    <div class="me-2 bg-info text-white rounded-circle d-flex align-items-center justify-content-center" 
                                         style="width: 24px; height: 24px; font-size: 0.7rem;">
                                        <i class="bi bi-building"></i>
                                    </div>
                                @endif
                                <div class="company-info">
                                    <div class="company-name">{{ $hd->congTy ? $hd->congTy->ten : 'N/A' }}</div>
                                    @if($hd->congTy && $hd->congTy->dia_chi)
                                        <div class="company-address">{{ Str::limit($hd->congTy->dia_chi, 30) }}</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="contract-info">
                                <div class="contract-details">
                                    <div class="row g-1">
                                        @if($hd->so_tien_mua)
                                        <div class="col-12">
                                            <small class="text-dark d-flex align-items-center">
                                                <i class="bi bi-cash-stack me-1"></i>
                                                <span class="fw-bold text-success">{{ number_format($hd->so_tien_mua, 0, ',', '.') }} VNĐ</span>
                                            </small>
                                        </div>
                                        @endif
                                        @if($hd->so_tien_dong_hang_nam)
                                        <div class="col-12">
                                            <small class="text-dark d-flex align-items-center">
                                                <i class="bi bi-currency-dollar me-1"></i>
                                                Phí hàng năm: {{ number_format($hd->so_tien_dong_hang_nam, 0, ',', '.') }} VNĐ
                                            </small>
                                        </div>
                                        @endif
                                       
                                        @if($hd->thoi_gian_mua)
                                        <div class="col-12">
                                            <small class="text-dark d-flex align-items-center">
                                                <i class="bi bi-clock me-1"></i>
                                                Thời hạn: {{ $hd->thoi_gian_mua }}
                                            </small>
                                        </div>
                                        @endif
                                        @if($hd->ngay_cap_hop_dong)
                                        <div class="col-12">
                                            <small class="text-dark d-flex align-items-center">
                                                <i class="bi bi-calendar-event me-1"></i>
                                                Hiệu lực: {{ \Carbon\Carbon::parse($hd->ngay_cap_hop_dong)->format('d/m/Y') }}
                                            </small>
                                        </div>
                                        @endif
                                        @if($hd->ngay_dao_han)
                                        <div class="col-12">
                                            <small class="text-dark d-flex align-items-center">
                                                <i class="bi bi-calendar-check me-1"></i>
                                                Đáo hạn: {{ \Carbon\Carbon::parse($hd->ngay_dao_han)->format('d/m/Y') }}
                                            </small>
                                        </div>
                                        @endif
                                        @if($hd->chu_ky_dong_phi)
                                        <div class="col-12">
                                            <small class="text-dark d-flex align-items-center">
                                                <i class="bi bi-arrow-repeat me-1"></i>
                                                Chu kỳ: {{ $hd->chu_ky_dong_phi }}
                                            </small>
                                        </div>
                                        @endif
                                        @if($hd->phuong_thuc_thanh_toan)
                                        <div class="col-12">
                                            <small class="text-dark d-flex align-items-center">
                                                <i class="bi bi-credit-card me-1"></i>
                                                TT: {{ $hd->phuong_thuc_thanh_toan }}
                                            </small>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-outline-primary" title="Xem chi tiết" onclick="viewContractDetail({{ $hd}})">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <button class="btn btn-outline-danger" title="Xóa" onclick="deleteContract({{ $hd->id }}, '{{ $hd->ma_hop_dong }}')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="text-center py-4">
                            <div class="text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                Không có dữ liệu hợp đồng
                            </div>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
            {!! $hopDong->links(app()->getLocale() == 'vi' ? 'pagination::bootstrap-5' : 'pagination::bootstrap-4') !!}
        </div>
    </div>
</div>

<!-- Contract Detail Modal -->
<div class="modal fade" id="contractDetailModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title">
                    <i class="bi bi-file-earmark-text me-2"></i>
                    <span class="d-none d-sm-inline">Chi tiết hợp đồng bảo hiểm</span>
                    <span class="d-inline d-sm-none">Hợp đồng</span>
                </h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <div id="contractDetailContent" class="p-2 p-md-4" style="max-height: calc(100vh - 120px); overflow-y: auto;">
                    <!-- Nội dung chi tiết sẽ được load bằng JavaScript -->
                    <div class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Đang tải...</span>
                        </div>
                        <p class="mt-2 text-muted">Đang tải thông tin hợp đồng...</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light d-flex justify-content-end">
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-2"></i>Đóng
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteContractModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    Xác nhận xóa hợp đồng
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <i class="bi bi-trash fs-1 text-danger"></i>
                </div>
                <p class="text-center mb-3">
                    Bạn có chắc chắn muốn xóa hợp đồng <strong id="deleteContractCode"></strong>?
                </p>
                <div class="alert alert-warning">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <strong>Cảnh báo:</strong> Hành động này không thể hoàn tác. Tất cả dữ liệu liên quan đến hợp đồng sẽ bị xóa vĩnh viễn.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-2"></i>Hủy
                </button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                    <i class="bi bi-trash me-2"></i>Xóa hợp đồng
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Contract Detail Content Template (Hidden) -->
<div id="contractDetailTemplate" style="display: none;">
    <!-- Header thông tin hợp đồng -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white py-3">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h5 class="card-title mb-1">
                                <i class="bi bi-file-earmark-text me-2"></i>
                                Thông tin hợp đồng bảo hiểm
                            </h5>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <span class="badge bg-success" id="contractStatus">
                                Đang hiệu lực
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body py-3">
                    <div class="row g-3">
                        <div class="col-lg-3 col-md-6">
                            <div class="text-center p-2 bg-light rounded">
                                <small class="text-muted d-block">Mã hợp đồng</small>
                                <strong class="text-primary" id="contractCode">HD000001</strong>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="text-center p-2 bg-light rounded">
                                <small class="text-muted d-block">Công ty</small>
                                <strong class="text-info" id="contractCompany">Bảo Việt</strong>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="text-center p-2 bg-light rounded">
                                <small class="text-muted d-block">Loại hợp đồng</small>
                                <strong class="text-secondary" id="contractType">Bảo hiểm nhân thọ</strong>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="text-center p-2 bg-light rounded">
                                <small class="text-muted d-block">Ngày cấp</small>
                                <strong class="text-success" id="contractDate">15/01/2024</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- VĂN BẢN HÀNH CHÍNH - THÔNG TIN HỢP ĐỒNG BẢO HIỂM -->
    <div class="mb-4">
        <!-- BÊN BÁN - CÔNG TY BẢO HIỂM -->
        <div class="card border border-dark mb-4">
            <div class="card-header bg-dark text-white py-3">
                <h5 class="card-title mb-0 text-center fw-bold">
                    <i class="bi bi-building me-2"></i>BÊN BÁN - CÔNG TY BẢO HIỂM NHÂN THỌ
                </h5>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    <!-- Logo và tên công ty -->
                    <div class="col-md-3 text-center mb-3">
                        <div class="border border-2 border-dark p-3 d-inline-block" style="min-height: 120px; min-width: 120px; display: flex; align-items: center; justify-content: center;">
                            <img src="/images/logo-baoviet.png" alt="Logo công ty" 
                                 class="img-fluid" style="max-height: 80px; width: auto;"
                                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div class="d-none text-center flex-column align-items-center justify-content-center" style="min-height: 80px;">
                                <i class="bi bi-building fs-1 text-dark mb-2"></i>
                                <p class="mb-0 fw-bold small">LOGO CÔNG TY</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Thông tin công ty -->
                    <div class="col-md-9">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-normal text-dark">TÊN CÔNG TY:</label>
                                    <input type="text" class="form-control" id="contractCompany" value="Bảo Việt Nhân Thọ" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-normal text-dark">Mã số thuế:</label>
                                    <input type="text" class="form-control" id="contractTaxCode" value="0123456789" disabled>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-normal text-dark">ĐỊA CHỈ TRỤ SỞ CHÍNH:</label>
                                    <input type="text" class="form-control" id="contractAddress" value="123 Đường ABC, Phường 1, Quận 1, TP.Hồ Chí Minh" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-normal text-dark">SỐ ĐIỆN THOẠI:</label>
                                    <input type="text" class="form-control" id="contractPhone" value="1900 1234" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-normal text-dark">WEBSITE:</label>
                                    <input type="text" class="form-control" id="contractWebsite" value="www.baoviet.com.vn" disabled>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-normal text-dark">EMAIL:</label>
                                    <input type="text" class="form-control" id="contractEmail" value="support@baoviet.com.vn" disabled>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- BÊN MUA - THÔNG TIN NGƯỜI MUA VÀ NGƯỜI THỪA HƯỞNG -->
        <div class="row">
            <!-- NGƯỜI MUA BẢO HIỂM -->
            <div class="col-12 mb-4">
                <div class="card border border-dark">
                    <div class="card-header bg-dark text-white py-3">
                        <h5 class="card-title mb-0 text-center fw-bold">
                            <i class="bi bi-person-circle me-2"></i>BÊN MUA - NGƯỜI MUA BẢO HIỂM
                        </h5>
                        <p class="mb-0 text-center small">THÔNG TIN CÁ NHÂN NGƯỜI MUA</p>
                    </div>
                    <div class="card-body p-4">
                        <!-- Thông tin cơ bản -->
                        <div class="row mb-4">
                            <div class="col-12 col-md-3 col-lg-2 text-center mb-3 mb-md-0">
                                <div class="border border-2 border-dark p-2 mx-auto" style="height: 240px; min-width: 100px; max-width: 150px; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
                                    <img src="" alt="Ảnh chân dung" id="buyerPortrait"
                                         class="img-fluid" style="max-height: 200px; width: auto; border-radius: 4px;"
                                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="d-none text-center flex-column align-items-center justify-content-center" style="height: 200px;">
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
                                            <label class="form-label fw-normal text-dark">HỌ VÀ TÊN:</label>
                                            <input type="text" class="form-control text-uppercase" id="buyerName" disabled>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <label class="form-label fw-normal text-dark">GIỚI TÍNH:</label>
                                            <input type="text" class="form-control" id="buyerGender" disabled>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <label class="form-label fw-normal text-dark">NGÀY SINH:</label>
                                            <input type="text" class="form-control" id="buyerBirthday" disabled>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label fw-normal text-dark">SỐ CCCD/CMND:</label>
                                            <input type="text" class="form-control" id="buyerIdCard" disabled>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label fw-normal text-dark">SỐ ĐIỆN THOẠI:</label>
                                            <input type="text" class="form-control" id="buyerPhone" disabled>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-normal text-dark">ĐỊA CHỈ THƯỜNG TRÚ:</label>
                                            <input type="text" class="form-control" id="buyerAddress" disabled>
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
                                            <label class="form-label fw-normal text-dark">TÊN NGÂN HÀNG:</label>
                                            <input type="text" class="form-control" id="buyerBank" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-normal text-dark">SỐ TÀI KHOẢN:</label>
                                            <input type="text" class="form-control text-primary" id="buyerAccount" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-normal text-dark">CHỦ TÀI KHOẢN:</label>
                                            <input type="text" class="form-control text-uppercase" id="buyerAccountHolder" disabled>
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
                                            <div class="border border-2 border-dark p-2 mx-auto" style="min-height: 180px; min-width: 120px; max-width: 200px; display: flex; align-items: center; justify-content: center;">
                                                <img src="" alt="CCCD mặt trước" id="buyerIdCardFront"
                                                     class="img-fluid" style="max-height: 150px; width: auto;"
                                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                <div class="d-none text-center flex-column align-items-center justify-content-center" style="min-height: 150px;">
                                                    <i class="bi bi-card-image fs-1 text-dark mb-2"></i>
                                                    <p class="mb-0 small fw-bold">MẶT TRƯỚC</p>
                                                </div>
                                            </div>
                                            <p class="small mt-2 mb-0 fw-bold">MẶT TRƯỚC</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="text-center">
                                            <div class="border border-2 border-dark p-2 mx-auto" style="min-height: 180px; min-width: 120px; max-width: 200px; display: flex; align-items: center; justify-content: center;">
                                                <img src="" alt="CCCD mặt sau" id="buyerIdCardBack"
                                                     class="img-fluid" style="max-height: 150px; width: auto;"
                                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                <div class="d-none text-center flex-column align-items-center justify-content-center" style="min-height: 150px;">
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
            
            <!-- NGƯỜI THỪA HƯỞNG -->
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
                                <div class="border border-2 border-dark p-2 mx-auto" style="height: 240px; min-width: 100px; max-width: 150px; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
                                    <img src="" alt="Ảnh chân dung người thừa hưởng" id="beneficiaryPortrait"
                                         class="img-fluid" style="max-height: 200px; width: auto; border-radius: 4px;"
                                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="d-none text-center flex-column align-items-center justify-content-center" style="height: 200px;">
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
                                            <label class="form-label fw-normal text-dark">HỌ VÀ TÊN:</label>
                                            <input type="text" class="form-control text-uppercase" id="beneficiaryName" disabled>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <label class="form-label fw-normal text-dark">MỐI QUAN HỆ:</label>
                                            <input type="text" class="form-control" id="beneficiaryRelation" disabled>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <label class="form-label fw-normal text-dark">GIỚI TÍNH:</label>
                                            <input type="text" class="form-control" id="beneficiaryGender" disabled>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <label class="form-label fw-normal text-dark">NGÀY SINH:</label>
                                            <input type="text" class="form-control" id="beneficiaryBirthday" disabled>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <label class="form-label fw-normal text-dark">SỐ CCCD/CMND:</label>
                                            <input type="text" class="form-control" id="beneficiaryIdCard" disabled>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-label fw-normal text-dark">SỐ ĐIỆN THOẠI:</label>
                                            <input type="text" class="form-control" id="beneficiaryPhone" disabled>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-normal text-dark">ĐỊA CHỈ THƯỜNG TRÚ:</label>
                                            <input type="text" class="form-control" id="beneficiaryAddress" disabled>
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
                                            <label class="form-label fw-normal text-dark">TÊN NGÂN HÀNG:</label>
                                            <input type="text" class="form-control" id="beneficiaryBank" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-normal text-dark">SỐ TÀI KHOẢN:</label>
                                            <input type="text" class="form-control text-primary" id="beneficiaryAccount" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label fw-normal text-dark">CHỦ TÀI KHOẢN:</label>
                                            <input type="text" class="form-control text-uppercase" id="beneficiaryAccountHolder" disabled>
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
                                            <div class="border border-2 border-dark p-2 mx-auto" style="min-height: 180px; min-width: 120px; max-width: 200px; display: flex; align-items: center; justify-content: center;">
                                                <img src="" alt="CCCD mặt trước người thừa hưởng" id="beneficiaryIdCardFront"
                                                     class="img-fluid" style="max-height: 150px; width: auto;"
                                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                <div class="d-none text-center flex-column align-items-center justify-content-center" style="min-height: 150px;">
                                                    <i class="bi bi-card-image fs-1 text-dark mb-2"></i>
                                                    <p class="mb-0 small fw-bold">MẶT TRƯỚC</p>
                                                </div>
                                            </div>
                                            <p class="small mt-2 mb-0 fw-bold">MẶT TRƯỚC</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="text-center">
                                            <div class="border border-2 border-dark p-2 mx-auto" style="min-height: 180px; min-width: 120px; max-width: 200px; display: flex; align-items: center; justify-content: center;">
                                                <img src="" alt="CCCD mặt sau người thừa hưởng" id="beneficiaryIdCardBack"
                                                     class="img-fluid" style="max-height: 150px; width: auto;"
                                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                <div class="d-none text-center flex-column align-items-center justify-content-center" style="min-height: 150px;">
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
        </div>
    </div>
                
    <!-- THÔNG TIN TÀI CHÍNH VÀ THỜI GIAN HỢP ĐỒNG -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border border-dark">
                <div class="card-header bg-dark text-white py-3">
                    <h5 class="card-title mb-0 text-center fw-bold">
                        <i class="bi bi-cash-stack me-2"></i>THÔNG TIN TÀI CHÍNH VÀ THỜI GIAN HỢP ĐỒNG
                    </h5>
                    <p class="mb-0 text-center small">CHI PHÍ, SỐ TIỀN VÀ THỜI HẠN HỢP ĐỒNG</p>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4">
                        <!-- Thông tin tài chính -->
                        <div class="col-lg-6">
                            <h6 class="fw-bold text-dark mb-3">THÔNG TIN TÀI CHÍNH:</h6>
                            <form>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label fw-normal text-dark">SỐ TIỀN BẢO HIỂM:</label>
                                        <input type="text" class="form-control text-success" id="insuranceAmount" disabled>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-normal text-dark">PHÍ BẢO HIỂM HÀNG NĂM:</label>
                                        <input type="text" class="form-control text-primary" id="annualPremium" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-normal text-dark">THỜI GIAN ĐÓNG PHÍ:</label>
                                        <input type="text" class="form-control" id="paymentPeriod" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-normal text-dark">PHƯƠNG THỨC THANH TOÁN:</label>
                                        <input type="text" class="form-control" value="Chuyển khoản ngân hàng" disabled>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Thông tin thời gian -->
                        <div class="col-lg-6">
                            <h6 class="fw-bold text-dark mb-3">THÔNG TIN THỜI GIAN:</h6>
                            <form>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label fw-normal text-dark">NGÀY CẤP HỢP ĐỒNG:</label>
                                        <input type="text" class="form-control" id="contractStartDate" disabled>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-normal text-dark">NGÀY ĐÁO HẠN:</label>
                                        <input type="text" class="form-control" id="contractEndDate" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-normal text-dark">THỜI HẠN HỢP ĐỒNG:</label>
                                        <input type="text" class="form-control" id="contractDuration" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-normal text-dark">TRẠNG THÁI HỢP ĐỒNG:</label>
                                        <input type="text" class="form-control" id="contractStatusText" disabled>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- GHI CHÚ VÀ ĐIỀU KHOẢN BỔ SUNG -->
    <div class="row">
        <div class="col-12">
            <div class="card border border-dark">
                <div class="card-header bg-dark text-white py-3">
                    <h5 class="card-title mb-0 text-center fw-bold">
                        <i class="bi bi-chat-text me-2"></i>GHI CHÚ VÀ ĐIỀU KHOẢN BỔ SUNG
                    </h5>
                    <p class="mb-0 text-center small">THÔNG TIN BỔ SUNG VỀ HỢP ĐỒNG BẢO HIỂM</p>
                </div>
                <div class="card-body p-4">
                    <div class="mb-4">
                        <h6 class="fw-bold text-dark mb-3">GHI CHÚ HỢP ĐỒNG:</h6>
                        <form>
                            <div class="row g-3">
                                <div class="col-12">
                                    <textarea class="form-control" rows="3" id="contractNotes" disabled></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="mb-4">
                        <h6 class="fw-bold text-dark mb-3">ĐIỀU KHOẢN QUAN TRỌNG:</h6>
                        <form>
                            <div class="row g-3">
                                <div class="col-12">
                                    <textarea class="form-control" rows="4" disabled>• Hợp đồng có hiệu lực từ ngày ký và thanh toán phí bảo hiểm đầu tiên
• Người mua bảo hiểm có trách nhiệm đóng phí đúng hạn theo quy định
• Người thừa hưởng sẽ nhận quyền lợi bảo hiểm khi có sự kiện bảo hiểm xảy ra
• Mọi thay đổi thông tin phải được thông báo bằng văn bản cho công ty bảo hiểm</textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-normal text-dark">NGÀY LẬP HỢP ĐỒNG:</label>
                                <input type="text" class="form-control" value="${new Date().toLocaleDateString('vi-VN')}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-normal text-dark">NƠI LẬP HỢP ĐỒNG:</label>
                                <input type="text" class="form-control" value="TP. Hồ Chí Minh, Việt Nam" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
// Hàm xem chi tiết hợp đồng
async function viewContractDetail(data) {
    console.log('viewContractDetail');
    console.log(data);
    
    // Hiển thị modal
    const modal = new bootstrap.Modal(document.getElementById('contractDetailModal'));
    
    // Load dữ liệu hợp đồng
    await loadContractDetail(data);

    modal.show();
}

// Hàm load chi tiết hợp đồng
async function loadContractDetail(data) {
    // Giả lập dữ liệu hợp đồng đầy đủ (trong thực tế sẽ gọi API)
    const contractData = JSON.parse(JSON.stringify(data));
    
    // Copy template và hiển thị
    const template = document.getElementById('contractDetailTemplate');
    const content = template.cloneNode(true);
    content.style.display = 'block';
    content.id = 'contractDetailContentClone';
    
    // Cập nhật dữ liệu
    updateContractData(content, contractData);
    
    // Thay thế nội dung modal
    const modalContent = document.getElementById('contractDetailContent');
    modalContent.innerHTML = '';
    modalContent.appendChild(content);
}

// Hàm cập nhật dữ liệu hợp đồng
function updateContractData(element, data) {
    // Cập nhật thông tin cơ bản
    element.querySelector('#contractCode').textContent = data.ma_hop_dong;
    element.querySelector('#contractCompany').textContent = data.cong_ty ? data.cong_ty.ten : 'N/A';
    element.querySelector('#contractDate').textContent = new Date(data.ngay_cap_hop_dong).toLocaleDateString('vi-VN');
    
    // Cập nhật trạng thái
    const statusBadge = element.querySelector('#contractStatus');
    const statusText = element.querySelector('#contractStatusText');
    if (data.trang_thai == 1) {
        statusBadge.className = 'badge bg-success';
        statusBadge.textContent = 'Đang hiệu lực';
        statusText.value = 'ĐANG HIỆU LỰC';
        statusText.className = 'form-control text-success';
    } else {
        statusBadge.className = 'badge bg-danger';
        statusBadge.textContent = 'Hết hạn';
        statusText.value = 'HẾT HẠN';
        statusText.className = 'form-control text-danger';
    }
    // Cập nhật thông tin công ty
    if (data.cong_ty) {
        element.querySelector('#contractCompany').value = data.cong_ty.ten || 'N/A';
        element.querySelector('#contractTaxCode').value = data.cong_ty.ma_so_thue || 'N/A';
        element.querySelector('#contractAddress').value = data.cong_ty.dia_chi || 'N/A';
        element.querySelector('#contractPhone').value = data.cong_ty.so_dien_thoai || 'N/A';
        element.querySelector('#contractWebsite').value = data.cong_ty.website || 'N/A';
        element.querySelector('#contractEmail').value = data.cong_ty.email || 'N/A';
        
        // Cập nhật logo công ty
        const logoImg = element.querySelector('img[alt="Logo công ty"]');
        if (data.cong_ty.logo) {
            logoImg.src = data.cong_ty.logo;
            logoImg.style.display = 'block';
            logoImg.nextElementSibling.style.display = 'none';
        } else {
            logoImg.style.display = 'none';
            logoImg.nextElementSibling.style.display = 'flex';
        }
    } else {
        element.querySelector('#contractCompany').value = 'N/A';
        element.querySelector('#contractTaxCode').value = 'N/A';
        element.querySelector('#contractAddress').value = 'N/A';
        element.querySelector('#contractPhone').value = 'N/A';
        element.querySelector('#contractWebsite').value = 'N/A';
        element.querySelector('#contractEmail').value = 'N/A';
    }
    // Cập nhật thông tin người mua
    element.querySelector('#buyerName').value = data.ho_ten;
    element.querySelector('#buyerGender').value = data.gioi_tinh;
    element.querySelector('#buyerBirthday').value = data.ngay_sinh;
    element.querySelector('#buyerIdCard').value = data.cccd;
    element.querySelector('#buyerPhone').value = data.so_dien_thoai;
    element.querySelector('#buyerAddress').value = data.dia_chi;
    element.querySelector('#buyerBank').value = data.ngan_hang;
    element.querySelector('#buyerAccount').value = data.so_tai_khoan;
    element.querySelector('#buyerAccountHolder').value = data.chu_tai_khoan;
    element.querySelector('#buyerPortrait').src = data.anh_chan_dung;
    element.querySelector('#buyerIdCardFront').src = data.anh_mat_truoc;
    element.querySelector('#buyerIdCardBack').src = data.anh_mat_sau;
    element.querySelector('#buyerIdCardFront').style.display = 'block';
    element.querySelector('#buyerIdCardBack').style.display = 'block';
    element.querySelector('#buyerPortrait').style.display = 'block';
    // Cập nhật thông tin người thừa hưởng
    element.querySelector('#beneficiaryName').value = data.th_ho_ten;
    element.querySelector('#beneficiaryRelation').value = data.th_moi_quan_he;
    element.querySelector('#beneficiaryGender').value = data.th_gioi_tinh;
    element.querySelector('#beneficiaryBirthday').value = data.th_ngay_sinh;
    element.querySelector('#beneficiaryIdCard').value = data.th_cccd;
    element.querySelector('#beneficiaryPhone').value = data.th_so_dien_thoai;
    element.querySelector('#beneficiaryAddress').value = data.th_dia_chi;
    element.querySelector('#beneficiaryBank').value = data.th_ngan_hang;
    element.querySelector('#beneficiaryAccount').value = data.th_so_tai_khoan;
    element.querySelector('#beneficiaryAccountHolder').value = data.th_chu_tai_khoan;
    element.querySelector('#beneficiaryPortrait').src = data.th_anh_chan_dung;
    element.querySelector('#beneficiaryIdCardFront').src = data.th_anh_mat_truoc;
    element.querySelector('#beneficiaryIdCardBack').src = data.th_anh_mat_sau;
    element.querySelector('#beneficiaryIdCardFront').style.display = 'block';
    element.querySelector('#beneficiaryIdCardBack').style.display = 'block';
    element.querySelector('#beneficiaryPortrait').style.display = 'block';
    
    // Cập nhật thông tin tài chính
    element.querySelector('#insuranceAmount').value = new Intl.NumberFormat('vi-VN').format(data.so_tien_mua) + ' VNĐ';
    element.querySelector('#annualPremium').value = new Intl.NumberFormat('vi-VN').format(data.so_tien_dong_hang_nam) + ' VNĐ';
    element.querySelector('#paymentPeriod').value = data.thoi_gian_mua + ' THÁNG';
    element.querySelector('#contractStartDate').value = new Date(data.ngay_cap_hop_dong).toLocaleDateString('vi-VN');
    element.querySelector('#contractEndDate').value = new Date(data.ngay_dao_han).toLocaleDateString('vi-VN');
    element.querySelector('#contractDuration').value = data.thoi_gian_mua + ' THÁNG';
    element.querySelector('#contractNotes').value = data.ghi_chu;
}

// Hàm in hợp đồng
function printContract() {
    window.print();
}

// Hàm xuất PDF hợp đồng
function exportContract() {
    // Tạo nội dung PDF (có thể sử dụng thư viện như jsPDF)
    alert('Tính năng xuất PDF sẽ được phát triển trong phiên bản tiếp theo!');
}

// Hàm áp dụng bộ lọc đơn giản
function applyFilters() {
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    const companyValue = document.getElementById('companyFilter').value.toLowerCase();
    
    const table = document.getElementById('hopDongTable');
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    
    for (let i = 0; i < rows.length; i++) {
        const row = rows[i];
        let showRow = true;
        
        // Lọc theo từ khóa tìm kiếm
        if (searchTerm.trim() !== '') {
            const rowText = row.textContent.toLowerCase();
            if (!rowText.includes(searchTerm)) {
                showRow = false;
            }
        }
        
        // Lọc theo công ty
        if (companyValue !== '') {
            const companyCell = row.cells[3]; // Cột công ty
            if (!companyCell.textContent.toLowerCase().includes(companyValue)) {
                showRow = false;
            }
        }
        
        // Hiển thị/ẩn row
        row.style.display = showRow ? '' : 'none';
    }
    
    // Cập nhật số lượng kết quả
    updateResultCount();
}

// Hàm reset form
function resetFilter() {
    document.getElementById('filterForm').reset();
    applyFilters();
}


// Hàm cập nhật số lượng kết quả
function updateResultCount() {
    const table = document.getElementById('hopDongTable');
    const visibleRows = Array.from(table.getElementsByTagName('tbody')[0].getElementsByTagName('tr'))
        .filter(row => row.style.display !== 'none').length;
    
    // Tìm hoặc tạo element hiển thị số lượng kết quả
    let resultCountElement = document.getElementById('resultCount');
    if (!resultCountElement) {
        resultCountElement = document.createElement('div');
        resultCountElement.id = 'resultCount';
        resultCountElement.className = 'text-muted small mt-2';
        document.querySelector('.card-body').appendChild(resultCountElement);
    }
    
    resultCountElement.textContent = `Hiển thị ${visibleRows} kết quả`;
}

// Hàm xóa hợp đồng
function deleteContract(contractId, contractCode) {
    // Hiển thị mã hợp đồng trong modal
    document.getElementById('deleteContractCode').textContent = contractCode;
    
    // Lưu ID hợp đồng để sử dụng khi xác nhận
    document.getElementById('confirmDeleteBtn').setAttribute('data-contract-id', contractId);
    
    // Hiển thị modal xác nhận
    const modal = new bootstrap.Modal(document.getElementById('deleteContractModal'));
    modal.show();
}

// Xử lý xác nhận xóa - sử dụng event delegation
document.addEventListener('click', function(e) {
    if (e.target && e.target.id === 'confirmDeleteBtn') {
        const contractId = e.target.getAttribute('data-contract-id');
        
        if (!contractId) {
            showToast('Lỗi: Không tìm thấy ID hợp đồng', 'error');
            return;
        }
        
        // Hiển thị loading
        e.target.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Đang xóa...';
        e.target.disabled = true;
        
        // Gửi request xóa bằng axios
        axios.delete(`/admin/hop-dong/${contractId}`)
        .then(response => {
            if (response.data.success) {
                showToast('Xóa hợp đồng thành công!', 'success');
                
                // Đóng modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('deleteContractModal'));
                modal.hide();
                
                // Reload trang hoặc xóa row khỏi bảng
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                showToast(response.data.message || 'Có lỗi xảy ra khi xóa hợp đồng', 'error');
                resetDeleteButton();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            if (error.response && error.response.data && error.response.data.message) {
                showToast(error.response.data.message, 'error');
            } else {
                showToast('Có lỗi xảy ra khi xóa hợp đồng', 'error');
            }
            resetDeleteButton();
        });
    }
});

// Reset nút xóa về trạng thái ban đầu
function resetDeleteButton() {
    const btn = document.getElementById('confirmDeleteBtn');
    btn.innerHTML = '<i class="bi bi-trash me-2"></i>Xóa hợp đồng';
    btn.disabled = false;
}

// Hàm hiển thị toast notification
function showToast(message, type = 'info') {
    // Tạo toast element
    const toast = document.createElement('div');
    toast.className = `toast align-items-center text-white bg-${type === 'success' ? 'success' : type === 'error' ? 'danger' : 'info'} border-0`;
    toast.setAttribute('role', 'alert');
    toast.setAttribute('aria-live', 'assertive');
    toast.setAttribute('aria-atomic', 'true');
    
    toast.innerHTML = `
        <div class="d-flex">
            <div class="toast-body">
                <i class="bi bi-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-triangle' : 'info-circle'} me-2"></i>
                ${message}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    `;
    
    // Thêm vào container toast
    let toastContainer = document.getElementById('toastContainer');
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.id = 'toastContainer';
        toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
        toastContainer.style.zIndex = '9999';
        document.body.appendChild(toastContainer);
    }
    
    toastContainer.appendChild(toast);
    
    // Hiển thị toast
    const bsToast = new bootstrap.Toast(toast);
    bsToast.show();
    
    // Tự động xóa toast sau khi ẩn
    toast.addEventListener('hidden.bs.toast', function() {
        toast.remove();
    });
}
</script>

<style>
/* Customer info styles */
.customer-info {
    min-width: 200px;
}

.customer-details {
    margin-top: 2px;
}

.customer-details .row {
    margin: 0;
}

.customer-details .col-12 {
    padding: 0;
    margin-bottom: 1px;
}

.customer-details small {
    font-size: 0.75rem;
    line-height: 1.3;
    color: #000000 !important;
}

.customer-details i {
    width: 12px;
    font-size: 0.7rem;
}

/* User avatar image styles */
.user-avatar {
    margin-right: 15px;
}

.user-avatar img {
    border: 2px solid #dee2e6;
    border-radius: 8px;
    object-fit: cover;
    object-position: center;
}

/* Contract info styles */
.contract-info {
    min-width: 180px;
}

.contract-details {
    margin-top: 2px;
}

.contract-details .row {
    margin: 0;
}

.contract-details .col-12 {
    padding: 0;
    margin-bottom: 2px;
}

.contract-details small {
    font-size: 0.75rem;
    line-height: 1.3;
    color: #000000 !important;
}

.contract-details i {
    width: 12px;
    font-size: 0.7rem;
}

.contract-details .badge {
    font-size: 0.7rem;
    padding: 0.25em 0.5em;
}

/* Company info styles */
.company-logo {
    width: 100px;
    height: 60px;
    object-fit: contain;
    border-radius: 4px;
    border: 1px solid #dee2e6;
}

.company-info {
    min-width: 150px;
}

.company-name {
    font-weight: 600;
    color: #495057;
    line-height: 1.2;
}

.company-address {
    font-size: 0.75rem;
    color: #6c757d;
    line-height: 1.2;
    margin-top: 2px;
}

/* Responsive table styles */
@media (max-width: 768px) {
    .table-responsive {
        border: none;
        box-shadow: none;
    }
    
    #hopDongTable {
        font-size: 0.875rem;
    }
    
    #hopDongTable th,
    #hopDongTable td {
        padding: 0.5rem 0.25rem;
        white-space: nowrap;
    }
    
    /* Sticky first column on mobile */
    #hopDongTable th:first-child,
    #hopDongTable td:first-child {
        position: sticky;
        left: 0;
        background-color: #f8f9fa;
        z-index: 10;
        border-right: 2px solid #dee2e6;
    }
    
    /* Action buttons responsive */
    .btn-group-sm .btn {
        padding: 0.25rem 0.4rem;
        font-size: 0.75rem;
    }
    
    /* User avatar smaller on mobile */
    .user-avatar {
        width: 100px !important;
        height: 100px !important;
        font-size: 0.7rem !important;
        margin-right: 10px !important;
    }
    
    .user-avatar img {
        width: 60px !important;
        height: 80px !important;
        border: 1px solid #dee2e6;
        border-radius: 6px;
    }
    
    /* Badge responsive */
    .badge {
        font-size: 0.7rem;
        padding: 0.35em 0.5em;
    }
    
    /* Customer info responsive */
    .customer-info {
        min-width: 150px;
    }
    
    .customer-details small {
        font-size: 0.7rem;
        color: #000000 !important;
    }
    
    .customer-details i {
        width: 10px;
        font-size: 0.65rem;
    }
    
    /* Contract info responsive */
    .contract-info {
        min-width: 140px;
    }
    
    .contract-details small {
        font-size: 0.7rem;
        color: #000000 !important;
    }
    
    .contract-details i {
        width: 10px;
        font-size: 0.65rem;
    }
    
    .contract-details .badge {
        font-size: 0.65rem;
        padding: 0.2em 0.4em;
    }
    
    /* Company info responsive */
    .company-info {
        min-width: 120px;
    }
    
    .company-name {
        font-size: 0.8rem;
    }
    
    .company-address {
        font-size: 0.7rem;
    }
    
    .company-logo {
        width: 32px;
        height: 32px;
    }
}

@media (max-width: 576px) {
    #hopDongTable {
        font-size: 0.8rem;
        min-width: 700px;
    }
    
    #hopDongTable th,
    #hopDongTable td {
        padding: 0.4rem 0.2rem;
    }
    
    /* Customer info very small screens */
    .customer-info {
        min-width: 120px;
    }
    
    .customer-details small {
        font-size: 0.65rem;
        color: #000000 !important;
    }
    
    .customer-details i {
        width: 8px;
        font-size: 0.6rem;
    }
    
    /* Contract info very small screens */
    .contract-info {
        min-width: 120px;
    }
    
    .contract-details small {
        font-size: 0.65rem;
        color: #000000 !important;
    }
    
    .contract-details i {
        width: 8px;
        font-size: 0.6rem;
    }
    
    .contract-details .badge {
        font-size: 0.6rem;
        padding: 0.15em 0.3em;
    }
    
    .user-avatar {
        margin-right: 8px !important;
    }
    
    .user-avatar img {
        width: 50px !important;
        height: 70px !important;
        border: 1px solid #dee2e6;
        border-radius: 4px;
    }
    
    /* Hide less important columns on very small screens */
    #hopDongTable th:nth-child(4),
    #hopDongTable td:nth-child(4) {
        display: none;
    }
}

/* Scroll indicator */
.table-responsive::after {
    content: "← Kéo để xem thêm →";
    position: absolute;
    bottom: 10px;
    right: 10px;
    background: rgba(0,0,0,0.7);
    color: white;
    padding: 5px 10px;
    border-radius: 15px;
    font-size: 0.75rem;
    opacity: 0;
    transition: opacity 0.3s;
    pointer-events: none;
}

@media (max-width: 768px) {
    .table-responsive::after {
        opacity: 1;
    }
}

/* Smooth scrolling */
.table-responsive {
    scroll-behavior: smooth;
}

/* Custom scrollbar */
.table-responsive::-webkit-scrollbar {
    height: 8px;
}

.table-responsive::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

.table-responsive::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
}

.table-responsive::-webkit-scrollbar-thumb:hover {
    background: #555;
}

/* Modal Image Styles - Responsive và vừa khung */
#contractDetailModal .img-fluid {
    max-width: 100%;
    height: auto;
    object-fit: contain;
    object-position: center;
    border-radius: 4px;
}

/* Logo công ty */
#contractDetailModal img[alt="Logo công ty"] {
    max-height: 80px;
    width: auto;
    max-width: 100%;
}

/* Ảnh chân dung người mua và người thừa hưởng */
#contractDetailModal img[alt="Ảnh chân dung"],
#contractDetailModal img[alt="Ảnh chân dung người thừa hưởng"] {
    max-height: 200px;
    width: auto;
    max-width: 100%;
    border-radius: 4px;
}

/* Ảnh CCCD mặt trước và mặt sau */
#contractDetailModal img[alt="CCCD mặt trước"],
#contractDetailModal img[alt="CCCD mặt sau"],
#contractDetailModal img[alt="CCCD mặt trước người thừa hưởng"],
#contractDetailModal img[alt="CCCD mặt sau người thừa hưởng"] {
    max-height: 150px;
    width: auto;
    max-width: 100%;
}

/* Container cho hình ảnh - đảm bảo hình ảnh vừa khung */
#contractDetailModal .border.border-2.border-dark {
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f9fa;
}

/* Fallback khi không có hình ảnh */
#contractDetailModal .d-none {
    color: #ffffff;
}

/* Responsive cho mobile */
@media (max-width: 768px) {
    /* Logo công ty mobile */
    #contractDetailModal img[alt="Logo công ty"] {
        max-height: 60px;
    }
    
    /* Ảnh chân dung mobile */
    #contractDetailModal img[alt="Ảnh chân dung"],
    #contractDetailModal img[alt="Ảnh chân dung người thừa hưởng"] {
        max-height: 150px;
    }
    
    /* Ảnh CCCD mobile */
    #contractDetailModal img[alt="CCCD mặt trước"],
    #contractDetailModal img[alt="CCCD mặt sau"],
    #contractDetailModal img[alt="CCCD mặt trước người thừa hưởng"],
    #contractDetailModal img[alt="CCCD mặt sau người thừa hưởng"] {
        max-height: 120px;
    }
    
    /* Container mobile */
    #contractDetailModal .border.border-2.border-dark {
        min-height: 120px;
        min-width: 80px;
    }
}

@media (max-width: 576px) {
    /* Logo công ty mobile nhỏ */
    #contractDetailModal img[alt="Logo công ty"] {
        max-height: 50px;
    }
    
    /* Ảnh chân dung mobile nhỏ */
    #contractDetailModal img[alt="Ảnh chân dung"],
    #contractDetailModal img[alt="Ảnh chân dung người thừa hưởng"] {
        max-height: 120px;
    }
    
    /* Ảnh CCCD mobile nhỏ */
    #contractDetailModal img[alt="CCCD mặt trước"],
    #contractDetailModal img[alt="CCCD mặt sau"],
    #contractDetailModal img[alt="CCCD mặt trước người thừa hưởng"],
    #contractDetailModal img[alt="CCCD mặt sau người thừa hưởng"] {
        max-height: 100px;
    }
    
    /* Container mobile nhỏ */
    #contractDetailModal .border.border-2.border-dark {
        min-height: 100px;
        min-width: 70px;
    }
}

/* Đảm bảo hình ảnh không bị méo */
#contractDetailModal img {
    image-rendering: -webkit-optimize-contrast;
    image-rendering: crisp-edges;
    image-rendering: optimize-contrast;
}

/* Hover effect cho hình ảnh */
#contractDetailModal img:hover {
    transform: scale(1.02);
    transition: transform 0.2s ease-in-out;
    cursor: pointer;
}

/* Loading state cho hình ảnh */
#contractDetailModal img[src=""] {
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
}

#contractDetailModal img:not([src=""]) {
    opacity: 1;
    transition: opacity 0.3s ease-in-out;
}
</style>


