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
                                        <input type="text" class="form-control" value="${contractData.cong_ty}" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-normal text-dark">Mã số thuế:</label>
                                        <input type="text" class="form-control" value="${contractData.ma_so_thue}" disabled>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-normal text-dark">ĐỊA CHỈ TRỤ SỞ CHÍNH:</label>
                                        <input type="text" class="form-control" value="123 Đường ABC, Phường 1, Quận 1, TP.Hồ Chí Minh" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-normal text-dark">SỐ ĐIỆN THOẠI:</label>
                                        <input type="text" class="form-control" value="1900 1234" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-normal text-dark">WEBSITE:</label>
                                        <input type="text" class="form-control" value="www.baoviet.com.vn" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-normal text-dark">EMAIL:</label>
                                        <input type="text" class="form-control" value="support@baoviet.com.vn" disabled>
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
                                <div class="col-2 text-center">
                                    <div class="border border-2 border-dark p-2" style="min-height: 120px; min-width: 100px; display: flex; align-items: center; justify-content: center;">
                                        <img src="${contractData.anh_chan_dung}" alt="Ảnh chân dung" 
                                             class="img-fluid" style="max-height: 100px; width: auto;"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="d-none text-center flex-column align-items-center justify-content-center" style="min-height: 100px;">
                                            <i class="bi bi-person fs-1 text-dark mb-2"></i>
                                            <p class="mb-0 small fw-bold">ẢNH CHÂN DUNG</p>
                                        </div>
                                    </div>
                                    <p class="small mt-2 mb-0 fw-bold">ẢNH CHÂN DUNG</p>
                                </div>
                                <div class="col-10">
                                    <form>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label fw-normal text-dark">HỌ VÀ TÊN:</label>
                                                <input type="text" class="form-control text-uppercase" value="${contractData.ho_ten}" disabled>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label fw-normal text-dark">GIỚI TÍNH:</label>
                                                <input type="text" class="form-control" value="${contractData.gioi_tinh}" disabled>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label fw-normal text-dark">NGÀY SINH:</label>
                                                <input type="text" class="form-control" value="${new Date(contractData.ngay_sinh).toLocaleDateString('vi-VN')}" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-normal text-dark">SỐ CCCD/CMND:</label>
                                                <input type="text" class="form-control" value="${contractData.cccd}" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-normal text-dark">SỐ ĐIỆN THOẠI:</label>
                                                <input type="text" class="form-control" value="${contractData.so_dien_thoai}" disabled>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label fw-normal text-dark">ĐỊA CHỈ THƯỜNG TRÚ:</label>
                                                <input type="text" class="form-control" value="${contractData.dia_chi}" disabled>
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
                                                <input type="text" class="form-control" value="${contractData.ngan_hang}" disabled>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-normal text-dark">SỐ TÀI KHOẢN:</label>
                                                <input type="text" class="form-control text-primary" value="${contractData.so_tai_khoan}" disabled>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-normal text-dark">CHỦ TÀI KHOẢN:</label>
                                                <input type="text" class="form-control text-uppercase" value="${contractData.chu_tai_khoan}" disabled>
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
                                        <div class="col-6">
                                            <div class="text-center">
                                                <div class="border border-2 border-dark p-2" style="min-height: 180px; min-width: 120px; display: flex; align-items: center; justify-content: center;">
                                                    <img src="${contractData.anh_mat_truoc}" alt="CCCD mặt trước" 
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
                                        <div class="col-6">
                                            <div class="text-center">
                                                <div class="border border-2 border-dark p-2" style="min-height: 180px; min-width: 120px; display: flex; align-items: center; justify-content: center;">
                                                    <img src="${contractData.anh_mat_sau}" alt="CCCD mặt sau" 
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
                                <div class="col-2 text-center">
                                    <div class="border border-2 border-dark p-2" style="min-height: 120px; min-width: 100px; display: flex; align-items: center; justify-content: center;">
                                        <img src="${contractData.th_anh_chan_dung}" alt="Ảnh chân dung người thừa hưởng" 
                                             class="img-fluid" style="max-height: 100px; width: auto;"
                                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="d-none text-center flex-column align-items-center justify-content-center" style="min-height: 100px;">
                                            <i class="bi bi-person fs-1 text-dark mb-2"></i>
                                            <p class="mb-0 small fw-bold">ẢNH CHÂN DUNG</p>
                                        </div>
                                    </div>
                                    <p class="small mt-2 mb-0 fw-bold">ẢNH CHÂN DUNG</p>
                                </div>
                                <div class="col-10">
                                    <form>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label fw-normal text-dark">HỌ VÀ TÊN:</label>
                                                <input type="text" class="form-control text-uppercase" value="${contractData.th_ho_ten}" disabled>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label fw-normal text-dark">MỐI QUAN HỆ:</label>
                                                <input type="text" class="form-control" value="${contractData.th_moi_quan_he}" disabled>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label fw-normal text-dark">GIỚI TÍNH:</label>
                                                <input type="text" class="form-control" value="${contractData.th_gioi_tinh}" disabled>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label fw-normal text-dark">NGÀY SINH:</label>
                                                <input type="text" class="form-control" value="${new Date(contractData.th_ngay_sinh).toLocaleDateString('vi-VN')}" disabled>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label fw-normal text-dark">SỐ CCCD/CMND:</label>
                                                <input type="text" class="form-control" value="${contractData.th_cccd}" disabled>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-normal text-dark">SỐ ĐIỆN THOẠI:</label>
                                                <input type="text" class="form-control" value="${contractData.th_so_dien_thoai}" disabled>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label fw-normal text-dark">ĐỊA CHỈ THƯỜNG TRÚ:</label>
                                                <input type="text" class="form-control" value="${contractData.th_dia_chi}" disabled>
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
                                                <input type="text" class="form-control" value="${contractData.th_ngan_hang}" disabled>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-normal text-dark">SỐ TÀI KHOẢN:</label>
                                                <input type="text" class="form-control text-primary" value="${contractData.th_so_tai_khoan}" disabled>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-normal text-dark">CHỦ TÀI KHOẢN:</label>
                                                <input type="text" class="form-control text-uppercase" value="${contractData.th_chu_tai_khoan}" disabled>
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
                                        <div class="col-6">
                                            <div class="text-center">
                                                <div class="border border-2 border-dark p-2" style="min-height: 180px; min-width: 120px; display: flex; align-items: center; justify-content: center;">
                                                    <img src="${contractData.th_anh_mat_truoc}" alt="CCCD mặt trước người thừa hưởng" 
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
                                        <div class="col-6">
                                            <div class="text-center">
                                                <div class="border border-2 border-dark p-2" style="min-height: 180px; min-width: 120px; display: flex; align-items: center; justify-content: center;">
                                                    <img src="${contractData.th_anh_mat_sau}" alt="CCCD mặt sau người thừa hưởng" 
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
                                            <input type="text" class="form-control text-success" value="${new Intl.NumberFormat('vi-VN').format(contractData.so_tien_mua)} VNĐ" disabled>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-normal text-dark">PHÍ BẢO HIỂM HÀNG NĂM:</label>
                                            <input type="text" class="form-control text-primary" value="${new Intl.NumberFormat('vi-VN').format(contractData.so_tien_dong_hang_nam)} VNĐ" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-normal text-dark">THỜI GIAN ĐÓNG PHÍ:</label>
                                            <input type="text" class="form-control" value="${contractData.thoi_gian_mua} THÁNG" disabled>
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
                                            <input type="text" class="form-control" value="${new Date(contractData.ngay_cap_hop_dong).toLocaleDateString('vi-VN')}" disabled>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-normal text-dark">NGÀY ĐÁO HẠN:</label>
                                            <input type="text" class="form-control" value="${new Date(contractData.ngay_dao_han).toLocaleDateString('vi-VN')}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-normal text-dark">THỜI HẠN HỢP ĐỒNG:</label>
                                            <input type="text" class="form-control" value="${contractData.thoi_gian_mua} THÁNG" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fw-normal text-dark">TRẠNG THÁI HỢP ĐỒNG:</label>
                                            <input type="text" class="form-control ${contractData.trang_thai == 1 ? 'text-success' : 'text-danger'}" value="${contractData.trang_thai == 1 ? 'ĐANG HIỆU LỰC' : 'HẾT HẠN'}" disabled>
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
                                        <textarea class="form-control" rows="3" disabled>${contractData.ghi_chu}</textarea>
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


