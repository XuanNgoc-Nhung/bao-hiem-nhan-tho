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
                                <button class="btn btn-outline-primary" title="Xem chi tiết" onclick="viewContractDetail({{ $hd}})">
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
                    <button type="button" class="btn btn-success" onclick="printContract()">
                        <i class="bi bi-printer me-2"></i><span class="d-none d-sm-inline">In hợp đồng</span><span class="d-inline d-sm-none">In</span>
                    </button>
                    <button type="button" class="btn btn-primary" onclick="exportContract()">
                        <i class="bi bi-download me-2"></i><span class="d-none d-sm-inline">Xuất PDF</span><span class="d-inline d-sm-none">PDF</span>
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle me-2"></i>Đóng
                    </button>
                </div>
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
    element.querySelector('#contractCompany').textContent = data.cong_ty.ten;
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
    element.querySelector('#contractCompany').value = data.cong_ty;
    element.querySelector('#contractTaxCode').value = data.cong_ty.ma_so_thue;
    element.querySelector('#contractAddress').value = data.cong_ty.dia_chi;
    element.querySelector('#contractPhone').value = data.cong_ty.so_dien_thoai;
    element.querySelector('#contractWebsite').value = data.cong_ty.website;
    element.querySelector('#contractEmail').value = data.cong_ty.email;
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


