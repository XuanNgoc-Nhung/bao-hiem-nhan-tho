@extends('admin.layouts.app')

@section('title', 'Quản lý hợp đồng')
@section('page-title', 'Quản lý hợp đồng')

@section('content')
<div class="page-header">
    <h1 class="page-title">Quản lý hợp đồng bảo hiểm</h1>
    <p class="page-subtitle">Quản lý tất cả hợp đồng bảo hiểm trong hệ thống</p>
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
                <select class="form-select" id="companyFilter">
                    <option value="">Tất cả công ty</option>
                    <option value="baoviet">Bảo Việt</option>
                    <option value="prudential">Prudential</option>
                    <option value="manulife">Manulife</option>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <div class="d-flex gap-2">
                    <button class="btn btn-primary">
                        Tìm kiếm
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
            <table class="table table-hover table-striped table-bordered table-sm table-responsive" id="hopDongTable">
                <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th>Mã hợp đồng</th>
                        <th>Khách hàng</th>
                        <th>Công ty</th>
                        <th>Loại hợp đồng</th>
                        <th>Trạng thái</th>
                        <th>Phí bảo hiểm</th>
                        <th>Ngày hiệu lực</th>
                        <th>Thao tác</th>
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
                            <div class="d-flex align-items-center">
                                <div class="user-avatar me-2 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; font-size: 0.8rem;">
                                    {{ substr($hd->ho_ten, 0, 1) }}
                                </div>
                            <div>
                                    <div class="fw-bold text-dark">{{ $hd->ho_ten }}</div>
                                <small class="text-muted">{{ $hd->email }}</small>
                            </div>
                        </div>
                        </td>
                        <td>
                            <span class="badge bg-info fs-6">{{ $hd->cong_ty_id }}</span>
                        </td>
                        <td>
                            <span class="badge bg-secondary fs-6">{{ $hd->loai_hop_dong }}</span>
                        </td>
                        <td>
                            <span class="badge {{ $hd->trang_thai == 1 ? 'bg-success' : 'bg-danger' }} fs-6">
                                {{ $hd->trang_thai == 1 ? 'Đang hiệu lực' : 'Hết hạn' }}
                            </span>
                        </td>
                        <td>
                            <span class="fw-bold text-success">{{ number_format($hd->so_tien_mua, 0, ',', '.') }} VNĐ</span>
                        </td>
                        <td>
                            <span class="text-muted">{{ $hd->ngay_cap_hop_dong }}</span>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-outline-primary" title="Xem chi tiết" onclick="viewContractDetail({{ $hd->id }})">
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
                    @endforeach
                    @else
                    <tr>
                        <td colspan="9" class="text-center py-4">
                            <div class="text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                Không có dữ liệu hợp đồng
                            </div>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
            {{ $hopDong->links(app()->getLocale() == 'vi' ? 'pagination::bootstrap-5' : 'pagination::bootstrap-4') }}
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

<!-- Contract Detail Modal -->
<div class="modal fade" id="contractDetailModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title">
                    <i class="bi bi-file-earmark-text me-2"></i>
                    Chi tiết hợp đồng bảo hiểm
                </h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <div id="contractDetailContent" class="p-4" style="max-height: calc(100vh - 120px); overflow-y: auto;">
                    <!-- Nội dung chi tiết sẽ được load bằng JavaScript -->
                    <div class="text-center py-5">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Đang tải...</span>
                        </div>
                        <p class="mt-2 text-muted">Đang tải thông tin hợp đồng...</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-2"></i>Đóng
                </button>
                <button type="button" class="btn btn-success" onclick="printContract()">
                    <i class="bi bi-printer me-2"></i>In hợp đồng
                </button>
                <button type="button" class="btn btn-primary" onclick="exportContract()">
                    <i class="bi bi-download me-2"></i>Xuất PDF
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
// Hàm xem chi tiết hợp đồng
function viewContractDetail(contractId) {
    // Hiển thị modal
    const modal = new bootstrap.Modal(document.getElementById('contractDetailModal'));
    modal.show();
    
    // Load dữ liệu hợp đồng (giả lập dữ liệu)
    loadContractDetail(contractId);
}

// Hàm load chi tiết hợp đồng
function loadContractDetail(contractId) {
    // Giả lập dữ liệu hợp đồng đầy đủ (trong thực tế sẽ gọi API)
    const contractData = {
        id: contractId,
        ma_hop_dong: 'HD' + contractId.toString().padStart(6, '0'),
        cccd: '123456789012',
        ho_ten: 'Nguyễn Văn An',
        gioi_tinh: 'Nam',
        ngay_sinh: '1990-05-15',
        dia_chi: '123 Đường ABC, Phường 1, Quận 1, TP.HCM',
        so_dien_thoai: '0123456789',
        so_tien_mua: 50000000,
        so_tien_dong_hang_nam: 50000000,
        thoi_gian_mua: 12,
        ngay_cap_hop_dong: '2024-01-15',
        ngay_dao_han: '2024-12-31',
        ngan_hang: 'Vietcombank',
        so_tai_khoan: '1234567890',
        chu_tai_khoan: 'Nguyễn Văn An',
        anh_mat_truoc: '/images/cccd_mat_truoc.jpg',
        anh_mat_sau: '/images/cccd_mat_sau.jpg',
        anh_chan_dung: '/images/chan_dung.jpg',
        // Thông tin người hưởng
        th_cccd: '987654321098',
        th_moi_quan_he: 'Vợ/Chồng',
        th_ho_ten: 'Trần Thị Bình',
        th_gioi_tinh: 'Nữ',
        th_ngay_sinh: '1992-08-20',
        th_dia_chi: '456 Đường XYZ, Phường 2, Quận 3, TP.HCM',
        th_so_dien_thoai: '0987654321',
        th_ngan_hang: 'Techcombank',
        th_so_tai_khoan: '0987654321',
        th_chu_tai_khoan: 'Trần Thị Bình',
        th_anh_mat_truoc: '/images/th_cccd_mat_truoc.jpg',
        th_anh_mat_sau: '/images/th_cccd_mat_sau.jpg',
        th_anh_chan_dung: '/images/th_chan_dung.jpg',
        cong_ty: 'Bảo Việt Nhân Thọ',
        loai_hop_dong: 'Bảo hiểm nhân thọ',
        trang_thai: 1,
        ghi_chu: 'Hợp đồng bảo hiểm nhân thọ với mức phí hàng năm 50 triệu VNĐ'
    };
    
    // Tạo HTML cho chi tiết hợp đồng đơn giản
    const contractDetailHTML = `
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
                                <span class="badge ${contractData.trang_thai == 1 ? 'bg-success' : 'bg-danger'}">
                                    ${contractData.trang_thai == 1 ? 'Đang hiệu lực' : 'Hết hạn'}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-3">
                        <div class="row g-3">
                            <div class="col-lg-3 col-md-6">
                                <div class="text-center p-2 bg-light rounded">
                                    <small class="text-muted d-block">Mã hợp đồng</small>
                                    <strong class="text-primary">${contractData.ma_hop_dong}</strong>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="text-center p-2 bg-light rounded">
                                    <small class="text-muted d-block">Công ty</small>
                                    <strong class="text-info">${contractData.cong_ty}</strong>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="text-center p-2 bg-light rounded">
                                    <small class="text-muted d-block">Loại hợp đồng</small>
                                    <strong class="text-secondary">${contractData.loai_hop_dong}</strong>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="text-center p-2 bg-light rounded">
                                    <small class="text-muted d-block">Ngày cấp</small>
                                    <strong class="text-success">${new Date(contractData.ngay_cap_hop_dong).toLocaleDateString('vi-VN')}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Thông tin người mua và người hưởng -->
        <div class="row mb-3">
            <!-- Thông tin người mua bảo hiểm -->
            <div class="col-lg-6 mb-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-success text-white py-2">
                        <h6 class="card-title mb-0">
                            <i class="bi bi-person-circle me-2"></i>Người mua bảo hiểm
                        </h6>
                    </div>
                    <div class="card-body p-3">
                        <!-- Ảnh chân dung và thông tin cơ bản -->
                        <div class="row mb-3">
                            <div class="col-3 text-center">
                                <div class="position-relative">
                                    <img src="${contractData.anh_chan_dung}" alt="Ảnh chân dung" 
                                         class="img-fluid rounded-circle border border-2 border-success" 
                                         style="width: 60px; height: 60px; object-fit: cover;"
                                         onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                                    <div class="rounded-circle border border-2 border-success d-flex align-items-center justify-content-center bg-light" 
                                         style="width: 60px; height: 60px; display: none;">
                                        <i class="bi bi-person text-muted fs-4"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-9">
                                <h6 class="text-success mb-1">${contractData.ho_ten}</h6>
                                <div class="row g-1">
                                    <div class="col-6">
                                        <small class="text-muted">Giới tính:</small>
                                        <span class="fw-bold">${contractData.gioi_tinh}</span>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">Ngày sinh:</small>
                                        <span class="fw-bold">${new Date(contractData.ngay_sinh).toLocaleDateString('vi-VN')}</span>
                                    </div>
                                    <div class="col-12">
                                        <small class="text-muted">CCCD:</small>
                                        <span class="fw-bold text-primary">${contractData.cccd}</span>
                                    </div>
                                </div>
                        </div>
                    </div>
                    
                        <!-- Thông tin liên hệ -->
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="d-flex align-items-center p-2 bg-light rounded mb-2">
                                    <i class="bi bi-phone text-success me-2"></i>
                                    <div>
                                        <small class="text-muted">SĐT:</small>
                                        <span class="fw-bold">${contractData.so_dien_thoai}</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start p-2 bg-light rounded">
                                    <i class="bi bi-geo-alt text-success me-2 mt-1"></i>
                                    <div>
                                        <small class="text-muted">Địa chỉ:</small>
                                        <span class="fw-bold">${contractData.dia_chi}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Hình ảnh CCCD -->
                        <div class="row">
                            <div class="col-12">
                                <small class="text-muted mb-2 d-block">
                                    <i class="bi bi-card-image me-1"></i>Giấy tờ tùy thân
                                </small>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <div class="text-center">
                                            <div class="position-relative">
                                                <img src="${contractData.anh_mat_truoc}" alt="CCCD mặt trước" 
                                                     class="img-fluid rounded border" style="max-height: 80px; width: auto;"
                                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                <div class="d-flex align-items-center justify-content-center bg-light border rounded" 
                                                     style="height: 80px; display: none;">
                                                    <i class="bi bi-card-image text-muted"></i>
                                                </div>
                                            </div>
                                            <small class="text-muted d-block mt-1">Mặt trước</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-center">
                                            <div class="position-relative">
                                                <img src="${contractData.anh_mat_sau}" alt="CCCD mặt sau" 
                                                     class="img-fluid rounded border" style="max-height: 80px; width: auto;"
                                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                <div class="d-flex align-items-center justify-content-center bg-light border rounded" 
                                                     style="height: 80px; display: none;">
                                                    <i class="bi bi-card-image text-muted"></i>
                                                </div>
                                            </div>
                                            <small class="text-muted d-block mt-1">Mặt sau</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Thông tin người hưởng -->
            <div class="col-lg-6 mb-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-warning text-dark py-2">
                        <h6 class="card-title mb-0">
                            <i class="bi bi-people-circle me-2"></i>Người hưởng
                        </h6>
                    </div>
                    <div class="card-body p-3">
                        <!-- Ảnh chân dung và thông tin cơ bản -->
                        <div class="row mb-3">
                            <div class="col-3 text-center">
                                <div class="position-relative">
                                    <img src="${contractData.th_anh_chan_dung}" alt="Ảnh chân dung người hưởng" 
                                         class="img-fluid rounded-circle border border-2 border-warning" 
                                         style="width: 60px; height: 60px; object-fit: cover;"
                                         onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                                    <div class="rounded-circle border border-2 border-warning d-flex align-items-center justify-content-center bg-light" 
                                         style="width: 60px; height: 60px; display: none;">
                                        <i class="bi bi-person text-muted fs-4"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-9">
                                <h6 class="text-warning mb-1">${contractData.th_ho_ten}</h6>
                                <div class="row g-1">
                                    <div class="col-6">
                                        <small class="text-muted">Mối quan hệ:</small>
                                        <span class="badge bg-info">${contractData.th_moi_quan_he}</span>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">Giới tính:</small>
                                        <span class="fw-bold">${contractData.th_gioi_tinh}</span>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">Ngày sinh:</small>
                                        <span class="fw-bold">${new Date(contractData.th_ngay_sinh).toLocaleDateString('vi-VN')}</span>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">CCCD:</small>
                                        <span class="fw-bold text-primary">${contractData.th_cccd}</span>
                                    </div>
                                </div>
                        </div>
                    </div>
                    
                        <!-- Thông tin liên hệ -->
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="d-flex align-items-center p-2 bg-light rounded mb-2">
                                    <i class="bi bi-phone text-warning me-2"></i>
                                    <div>
                                        <small class="text-muted">SĐT:</small>
                                        <span class="fw-bold">${contractData.th_so_dien_thoai}</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start p-2 bg-light rounded">
                                    <i class="bi bi-geo-alt text-warning me-2 mt-1"></i>
                                    <div>
                                        <small class="text-muted">Địa chỉ:</small>
                                        <span class="fw-bold">${contractData.th_dia_chi}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Hình ảnh CCCD -->
                        <div class="row">
                            <div class="col-12">
                                <small class="text-muted mb-2 d-block">
                                    <i class="bi bi-card-image me-1"></i>Giấy tờ tùy thân
                                </small>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <div class="text-center">
                                            <div class="position-relative">
                                                <img src="${contractData.th_anh_mat_truoc}" alt="CCCD mặt trước người hưởng" 
                                                     class="img-fluid rounded border" style="max-height: 80px; width: auto;"
                                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                <div class="d-flex align-items-center justify-content-center bg-light border rounded" 
                                                     style="height: 80px; display: none;">
                                                    <i class="bi bi-card-image text-muted"></i>
                                                </div>
                                            </div>
                                            <small class="text-muted d-block mt-1">Mặt trước</small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-center">
                                            <div class="position-relative">
                                                <img src="${contractData.th_anh_mat_sau}" alt="CCCD mặt sau người hưởng" 
                                                     class="img-fluid rounded border" style="max-height: 80px; width: auto;"
                                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                                <div class="d-flex align-items-center justify-content-center bg-light border rounded" 
                                                     style="height: 80px; display: none;">
                                                    <i class="bi bi-card-image text-muted"></i>
                                                </div>
                                            </div>
                                            <small class="text-muted d-block mt-1">Mặt sau</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        </div>
                    </div>
                    
        <!-- Thông tin tài chính và thời gian -->
        <div class="row mb-4">
            <!-- Thông tin tài chính -->
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-gradient bg-info text-white py-4">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h5 class="card-title mb-1">
                                    <i class="bi bi-currency-dollar me-2"></i>Thông tin tài chính
                                </h5>
                                <small class="opacity-75">Chi phí và số tiền bảo hiểm</small>
                            </div>
                            <div class="col-4 text-end">
                                <i class="bi bi-cash-stack fs-1 opacity-50"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="text-center p-4 bg-light rounded-3">
                                    <h3 class="text-success mb-2">${new Intl.NumberFormat('vi-VN').format(contractData.so_tien_mua)} VNĐ</h3>
                                    <p class="text-muted mb-0">Phí bảo hiểm</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="text-center p-4 bg-light rounded-3">
                                    <h3 class="text-primary mb-2">${new Intl.NumberFormat('vi-VN').format(contractData.so_tien_dong_hang_nam)} VNĐ</h3>
                                    <p class="text-muted mb-0">Số tiền đóng hàng năm</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="text-center p-3 bg-info text-white rounded-3">
                                    <h4 class="mb-0">${contractData.thoi_gian_mua} tháng</h4>
                                    <small class="opacity-75">Thời gian mua</small>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                    
            <!-- Thông tin thời gian -->
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-gradient bg-secondary text-white py-4">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h5 class="card-title mb-1">
                                    <i class="bi bi-calendar-event me-2"></i>Thông tin thời gian
                                </h5>
                                <small class="opacity-75">Thời hạn và ngày hiệu lực</small>
                            </div>
                            <div class="col-4 text-end">
                                <i class="bi bi-calendar3 fs-1 opacity-50"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                    <i class="bi bi-calendar-check text-secondary fs-2 me-3"></i>
                                    <div>
                                        <h6 class="mb-1">Ngày cấp hợp đồng</h6>
                                        <p class="mb-0 fw-bold">${new Date(contractData.ngay_cap_hop_dong).toLocaleDateString('vi-VN')}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                    <i class="bi bi-calendar-x text-secondary fs-2 me-3"></i>
                                    <div>
                                        <h6 class="mb-1">Ngày đáo hạn</h6>
                                        <p class="mb-0 fw-bold">${new Date(contractData.ngay_dao_han).toLocaleDateString('vi-VN')}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="text-center p-3 bg-secondary text-white rounded-3">
                                    <h4 class="mb-0">${contractData.thoi_gian_mua} tháng</h4>
                                    <small class="opacity-75">Thời hạn hợp đồng</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Thông tin ngân hàng -->
        <div class="row mb-4">
            <!-- Ngân hàng người mua -->
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-gradient bg-dark text-white py-4">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h5 class="card-title mb-1">
                                    <i class="bi bi-bank me-2"></i>Ngân hàng người mua
                                </h5>
                                <small class="opacity-75">Thông tin tài khoản thanh toán</small>
                            </div>
                            <div class="col-4 text-end">
                                <i class="bi bi-credit-card fs-1 opacity-50"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                    <i class="bi bi-building text-dark fs-3 me-3"></i>
                                    <div>
                                        <h6 class="mb-1">Ngân hàng</h6>
                                        <p class="mb-0 fw-bold">${contractData.ngan_hang}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                    <i class="bi bi-hash text-dark fs-3 me-3"></i>
                                    <div>
                                        <h6 class="mb-1">Số tài khoản</h6>
                                        <p class="mb-0 fw-bold text-primary">${contractData.so_tai_khoan}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                    <i class="bi bi-person text-dark fs-3 me-3"></i>
                                    <div>
                                        <h6 class="mb-1">Chủ tài khoản</h6>
                                        <p class="mb-0 fw-bold">${contractData.chu_tai_khoan}</p>
                                    </div>
                                </div>
                            </div>
                </div>
        </div>
    </div>
</div>

            <!-- Ngân hàng người hưởng -->
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-gradient bg-warning text-dark py-4">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h5 class="card-title mb-1">
                                    <i class="bi bi-bank me-2"></i>Ngân hàng người hưởng
                                </h5>
                                <small class="opacity-75">Thông tin tài khoản nhận tiền</small>
                            </div>
                            <div class="col-4 text-end">
                                <i class="bi bi-wallet2 fs-1 opacity-50"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                    <i class="bi bi-building text-warning fs-3 me-3"></i>
                                    <div>
                                        <h6 class="mb-1">Ngân hàng</h6>
                                        <p class="mb-0 fw-bold">${contractData.th_ngan_hang}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                    <i class="bi bi-hash text-warning fs-3 me-3"></i>
                                    <div>
                                        <h6 class="mb-1">Số tài khoản</h6>
                                        <p class="mb-0 fw-bold text-primary">${contractData.th_so_tai_khoan}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                    <i class="bi bi-person text-warning fs-3 me-3"></i>
                                    <div>
                                        <h6 class="mb-1">Chủ tài khoản</h6>
                                        <p class="mb-0 fw-bold">${contractData.th_chu_tai_khoan}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ghi chú -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-gradient bg-light py-4">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h5 class="card-title mb-1 text-dark">
                                    <i class="bi bi-chat-text me-2"></i>Ghi chú
                                </h5>
                                <small class="text-muted">Thông tin bổ sung về hợp đồng</small>
                            </div>
                            <div class="col-4 text-end">
                                <i class="bi bi-sticky fs-1 text-muted opacity-50"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="p-4 bg-light rounded-3">
                            <p class="mb-0 text-muted fs-6">${contractData.ghi_chu}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    // Cập nhật nội dung modal
    document.getElementById('contractDetailContent').innerHTML = contractDetailHTML;
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

// Đợi DOM load xong rồi mới thêm event listeners
document.addEventListener('DOMContentLoaded', function() {
    // Tìm kiếm và lọc
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const table = document.getElementById('hopDongTable');
            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
            
            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const text = row.textContent.toLowerCase();
                
                if (text.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    }

    // Lọc theo công ty
    const companyFilter = document.getElementById('companyFilter');
    if (companyFilter) {
        companyFilter.addEventListener('change', function() {
            const filterValue = this.value.toLowerCase();
            const table = document.getElementById('hopDongTable');
            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
            
            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const companyCell = row.cells[3]; // Cột công ty
                
                if (filterValue === '' || companyCell.textContent.toLowerCase().includes(filterValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    }
});
</script>

