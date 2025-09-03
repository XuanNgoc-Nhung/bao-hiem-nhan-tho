@extends('admin.layouts.app')
@section('title', 'Quản lý công ty')
@section('page-title', 'Quản lý công ty')

@section('content')
<div class="page-header">
    <h1 class="page-title">Quản lý công ty bảo hiểm</h1>
    <p class="page-subtitle">Quản lý thông tin các công ty bảo hiểm trong hệ thống</p>
</div>
<!-- Search and Filter -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <form action="{{ route('admin.companies') }}" class="input-group" method="get">
                <div class="col-md-4 mb-3">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" class="form-control" name="search" placeholder="Tìm kiếm công ty..." value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <select class="form-select" name="status" id="statusFilter">
                        <option {{ request('status') == '' ? 'selected' : '' }} value="">Tất cả trạng thái</option>
                        <option {{ request('status') == 1 ? 'selected' : '' }} value="1">Đang hoạt động</option>
                        <option {{ request('status') == 0 ? 'selected' : '' }} value="0">Không hoạt động</option>
                        <option {{ request('status') == 2 ? 'selected' : '' }} value="2">Chờ xác nhận</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <select class="form-select" name="type"  id="typeFilter">
                        <option {{ request('type') == '' ? 'selected' : '' }} value="">Tất cả loại hình</option>
                        <option {{ request('type') == 'life' ? 'selected' : '' }} value="life">Bảo hiểm nhân thọ</option>
                        <option {{ request('type') == 'health' ? 'selected' : '' }} value="health">Bảo hiểm sức khỏe</option>
                        <option {{ request('type') == 'property' ? 'selected' : '' }} value="property">Bảo hiểm tài sản</option>
                        <option {{ request('type') == 'general' ? 'selected' : '' }} value="general">Bảo hiểm tổng hợp</option>
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-search me-2"></i>Tìm kiếm
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Companies Table -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">
            <i class="bi bi-building me-2"></i>
            Danh sách công ty bảo hiểm
        </h5>
        <div class="d-flex gap-2">
            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addCompanyModal">
                <i class="bi bi-plus-circle me-2"></i>Thêm mới
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered table-sm" id="companiesTable">
                <thead>
                    <tr>
                        <th>Thông tin công ty</th>
                        <th>Loại hình</th>
                        <th>Trạng thái</th>
                        <th>Mã số thuế</th>
                        <th>Ngày đăng ký</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($danh_sach_cong_ty) > 0)
                    @foreach ($danh_sach_cong_ty as $cong_ty)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="company-logo me-3"
                                    style="width: 100px; height: 100px; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 1.2rem;">
                                   <img src="{{ $cong_ty->logo }}" alt="Logo" style="width: 100px; height: 100px; object-fit: contain;">
                                </div>
                                <div>
                                    <div class="fw-bold">{{ $cong_ty->ten }}</div>
                                    <small class="text-muted">{{ $cong_ty->email }} | {{ $cong_ty->so_dien_thoai }}</small>
                                    <br>
                                    <small class="text-muted">{{ $cong_ty->dia_chi }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-success">{{ $cong_ty->loai_hinh }}</span>
                        </td>
                        <td>
                            <span class="badge bg-success">{{ $cong_ty->trang_thai == 1 ? 'Đang hoạt động' : 'Không hoạt động' }}</span>
                        </td>
                        <td>
                            <span class="badge bg-info">{{ $cong_ty->ma_so_thue }}</span>
                        </td>
                            <td>{{ $cong_ty->ngay_dang_ky }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-warning" 
                                        title="Chỉnh sửa"
                                        onclick="editCompany({{ json_encode($cong_ty) }})">
                                    <i class="bi bi-pencil btn-sm"></i>
                                </button>
                                <button class="btn btn-danger" onclick="deleteCompany({{ json_encode($cong_ty) }})" title="Xóa">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="text-center">Không có dữ liệu</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            {{ $danh_sach_cong_ty->links(app()->getLocale() == 'vi' ? 'pagination::bootstrap-5' : 'pagination::bootstrap-4') }}
        </div>

    </div>
</div>

<!-- Add Company Modal -->
<div class="modal fade" id="addCompanyModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-building me-2"></i>
                    Thêm công ty bảo hiểm mới
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addCompanyForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <div class="d-inline-block border rounded p-2 bg-light"
                                    style="min-height: 160px; min-width: 260px; display: flex; align-items: center; justify-content: center;">
                                    <img id="addLogoPreview" alt="Xem trước logo"
                                        style="max-width: 260px; max-height: 160px; display: none; object-fit: contain;">
                                    <div id="addLogoPlaceholder" class="text-muted small" style="display: block;">Chưa có ảnh
                                        logo</div>
                                </div>
                                <div class="mt-2">
                                    <label class="form-label">Hình ảnh logo <span class="text-danger">*</span></label>
                                    <input type="text" id="addLogoUrl" class="form-control form-control-sm" name="addLogoUrl"
                                        required placeholder="Dán link ảnh logo (https://...)">
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="d-inline-block border rounded p-2 bg-light"
                                    style="min-height: 160px; min-width: 260px; display: flex; align-items: center; justify-content: center;">
                                    <img id="addHinhNenPreview" alt="Xem trước hình nền"
                                        style="max-width: 260px; max-height: 160px; display: none; object-fit: contain;">
                                    <div id="addHinhNenPlaceholder" class="text-muted small" style="display: block;">Chưa có ảnh
                                        hình nền</div>
                                </div>
                                <div class="mt-2">
                                    <label class="form-label">Hình ảnh hình nền</label>
                                    <input type="text" id="addHinhNenUrl" class="form-control form-control-sm" name="addHinhNenUrl"
                                        placeholder="Dán link ảnh hình nền (https://...)">
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        document.getElementById('addLogoUrl').addEventListener('input', function () {
                            document.getElementById('addLogoPreview').src = this.value;
                            document.getElementById('addLogoPreview').style.display = 'block';
                            document.getElementById('addLogoPlaceholder').style.display = 'none';
                        });

                        document.getElementById('addHinhNenUrl').addEventListener('input', function () {
                            document.getElementById('addHinhNenPreview').src = this.value;
                            document.getElementById('addHinhNenPreview').style.display = 'block';
                            document.getElementById('addHinhNenPlaceholder').style.display = 'none';
                        });
                    </script>
                    <div class="row g-3">
                        <div class="col-12 col-sm-6 col-lg-3 mb-3">
                            <label class="form-label">Tên công ty <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" name="company_name" required
                                placeholder="Nhập tên công ty">
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-3">
                            <label class="form-label">Mã số thuế <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" name="tax_code" required
                                placeholder="Nhập mã số thuế">
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-3">
                            <label class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-sm" name="email" required
                                placeholder="Nhập email">
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-3">
                            <label class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control form-control-sm" name="phone" required
                                placeholder="Nhập số điện thoại">
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-3">
                            <label class="form-label">Loại hình bảo hiểm <span class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" name="insurance_type" required>
                                <option value="">Chọn loại hình</option>
                                <option value="life">Bảo hiểm nhân thọ</option>
                                <option value="health">Bảo hiểm sức khỏe</option>
                                <option value="property">Bảo hiểm tài sản</option>
                                <option value="general">Bảo hiểm tổng hợp</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-3">
                            <label class="form-label">Trạng thái <span class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" name="status" required>
                                <option value="">Chọn trạng thái</option>
                                <option value="1">Đang hoạt động</option>
                                <option value="0">Không hoạt động</option>
                                <option value="2">Chờ xác nhận</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-3">
                            <label class="form-label">Website</label>
                            <input type="url" class="form-control form-control-sm" name="website"
                                placeholder="Nhập website (https://example.com)">
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-3">
                            <label class="form-label">Người đại diện</label>
                            <input type="text" class="form-control form-control-sm" name="representative"
                                placeholder="Nhập tên người đại diện">
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-3">
                            <label class="form-label">Địa chỉ công ty</label>
                            <input type="text" class="form-control form-control-sm" name="address"
                                placeholder="Nhập địa chỉ công ty">
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-3">
                            <label class="form-label">Ngày đăng ký</label>
                            <input type="text" class="form-control form-control-sm" name="ngay_dang_ky"
                                placeholder="Nhập ngày đăng ký">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mô tả</label>
                        <textarea class="form-control form-control-sm" name="description" rows="2"
                            placeholder="Nhập mô tả"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-outline-info" id="fillSampleDataAdd">
                        <i class="bi bi-clipboard-data me-2"></i>Điền dữ liệu mẫu
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-2"></i>Thêm công ty
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Company Detail Modal -->
<div class="modal fade" id="companyDetailModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-building me-2"></i>
                    Chi tiết công ty
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8">
                        <h6>Thông tin cơ bản</h6>
                        <table class="table table-borderless">
                            <tr>
                                <td width="150"><strong>Tên công ty:</strong></td>
                                <td>Bảo Việt Nhân Thọ</td>
                            </tr>
                            <tr>
                                <td><strong>Mã số thuế:</strong></td>
                                <td>0123456789</td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong></td>
                                <td>bảoviệt@email.com</td>
                            </tr>
                            <tr>
                                <td><strong>Số điện thoại:</strong></td>
                                <td>+84 24 3936 1234</td>
                            </tr>
                            <tr>
                                <td><strong>Địa chỉ:</strong></td>
                                <td>123 Đường ABC, Quận 1, TP.HCM</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <h6>Thống kê</h6>
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <h3 class="text-primary">1,250</h3>
                                <p class="mb-0">Hợp đồng bảo hiểm</p>
                            </div>
                        </div>
                        <div class="card bg-light mt-3">
                            <div class="card-body text-center">
                                <h3 class="text-success">45</h3>
                                <p class="mb-0">Đại lý</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-warning">
                    <i class="bi bi-pencil me-2"></i>Chỉnh sửa
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Company Modal -->
<div class="modal fade" id="editCompanyModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-pencil me-2"></i>
                    Chỉnh sửa công ty bảo hiểm
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editCompanyForm">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <div class="d-inline-block border rounded p-2 bg-light"
                                    style="min-height: 160px; min-width: 260px; display: flex; align-items: center; justify-content: center;">
                                    <img id="editLogoPreview" alt="Xem trước logo"
                                        style="max-width: 260px; max-height: 160px; display: none; object-fit: contain;">
                                    <div id="editLogoPlaceholder" class="text-muted small" style="display: block;">Chưa có ảnh
                                        logo</div>
                                </div>
                                <div class="mt-2">
                                    <label class="form-label">Hình ảnh logo <span class="text-danger">*</span></label>
                                    <input type="text" id="editLogoUrl" class="form-control form-control-sm" name="editLogoUrl"
                                        required placeholder="Dán link ảnh logo (https://...)">
                                </div>
                            </div>
                            <div class="col-md-6 text-center">
                                <div class="d-inline-block border rounded p-2 bg-light"
                                    style="min-height: 160px; min-width: 260px; display: flex; align-items: center; justify-content: center;">
                                    <img id="editHinhNenPreview" alt="Xem trước hình nền"
                                        style="max-width: 260px; max-height: 160px; display: none; object-fit: contain;">
                                    <div id="editHinhNenPlaceholder" class="text-muted small" style="display: block;">Chưa có ảnh
                                        hình nền</div>
                                </div>
                                <div class="mt-2">
                                    <label class="form-label">Hình ảnh hình nền</label>
                                    <input type="text" id="editHinhNenUrl" class="form-control form-control-sm" name="editHinhNenUrl"
                                        placeholder="Dán link ảnh hình nền (https://...)">
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        document.getElementById('editLogoUrl').addEventListener('input', function () {
                            document.getElementById('editLogoPreview').src = this.value;
                            document.getElementById('editLogoPreview').style.display = 'block';
                            document.getElementById('editLogoPlaceholder').style.display = 'none';
                        });

                        document.getElementById('editHinhNenUrl').addEventListener('input', function () {
                            document.getElementById('editHinhNenPreview').src = this.value;
                            document.getElementById('editHinhNenPreview').style.display = 'block';
                            document.getElementById('editHinhNenPlaceholder').style.display = 'none';
                        });
                    </script>
                    <div class="row g-3">
                        <div class="col-12 col-sm-6 col-lg-3 mb-3">
                            <label class="form-label">Tên công ty <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" name="company_name" required
                                placeholder="Nhập tên công ty">
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-3">
                            <label class="form-label">Mã số thuế <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" name="tax_code" required
                                placeholder="Nhập mã số thuế">
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-3">
                            <label class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-sm" name="email" required
                                placeholder="Nhập email">
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-3">
                            <label class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control form-control-sm" name="phone" required
                                placeholder="Nhập số điện thoại">
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-3">
                            <label class="form-label">Loại hình bảo hiểm <span class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" name="insurance_type" required>
                                <option value="">Chọn loại hình</option>
                                <option value="life">Bảo hiểm nhân thọ</option>
                                <option value="health">Bảo hiểm sức khỏe</option>
                                <option value="property">Bảo hiểm tài sản</option>
                                <option value="general">Bảo hiểm tổng hợp</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-3">
                            <label class="form-label">Trạng thái <span class="text-danger">*</span></label>
                            <select class="form-select form-select-sm" name="status" required>
                                <option value="">Chọn trạng thái</option>
                                <option value="1">Đang hoạt động</option>
                                <option value="0">Không hoạt động</option>
                                <option value="2">Chờ xác nhận</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-3">
                            <label class="form-label">Website</label>
                            <input type="url" class="form-control form-control-sm" name="website"
                                placeholder="Nhập website (https://example.com)">
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-3">
                            <label class="form-label">Người đại diện</label>
                            <input type="text" class="form-control form-control-sm" name="representative"
                                placeholder="Nhập tên người đại diện">
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-3">
                            <label class="form-label">Địa chỉ công ty</label>
                            <input type="text" class="form-control form-control-sm" name="address"
                                placeholder="Nhập địa chỉ công ty">
                        </div>
                        <div class="col-12 col-sm-6 col-lg-3 mb-3">
                            <label class="form-label">Ngày đăng ký</label>
                            <input type="text" class="form-control form-control-sm" name="ngay_dang_ky"
                                placeholder="Nhập ngày đăng ký">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mô tả</label>
                        <textarea class="form-control form-control-sm" name="description" rows="2"
                            placeholder="Nhập mô tả"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-outline-info" id="fillSampleDataEdit">
                        <i class="bi bi-clipboard-data me-2"></i>Điền dữ liệu mẫu
                    </button>
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-save me-2"></i>Lưu thay đổi
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

<!-- Confirm Modal (Reusable) -->
<div class="modal fade" id="confirmModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Xác nhận</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p id="confirmModalMessage" class="mb-0">Bạn có chắc không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-primary" id="confirmModalOkBtn">Xác nhận</button>
            </div>
        </div>
    </div>
    
</div>

<style>
    /* Darken backdrop for all Bootstrap modals on this page */
    .modal-backdrop {
        --bs-backdrop-bg: #000;
        --bs-backdrop-opacity: 0.7;
    }
    /* Ensure nested confirm modal's backdrop overlays the parent modal */
    .modal-backdrop.modal-backdrop-elevated {
        z-index: 2000;
    }
    .modal.modal-elevated {
        z-index: 2005;
    }
    /* Optional: slightly darken page content when modal is open on iOS/Safari */
    body.modal-open {
        background-color: rgba(0, 0, 0, 0.02);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        console.log('🚀 Companies page JavaScript initialized');
        
        // Reusable confirm modal helper
        function showConfirm(message, { okText = 'Xác nhận', cancelText = 'Hủy', okVariant = 'primary' } = {}) {
            return new Promise((resolve) => {
                const modalEl = document.getElementById('confirmModal');
                const msgEl = document.getElementById('confirmModalMessage');
                const okBtn = document.getElementById('confirmModalOkBtn');

                if (!modalEl || !msgEl || !okBtn || typeof bootstrap === 'undefined') {
                    const fallback = window.confirm(message || 'Bạn có chắc không?');
                    resolve(!!fallback);
                    return;
                }

                msgEl.textContent = message || 'Bạn có chắc không?';
                okBtn.textContent = okText;
                okBtn.className = 'btn btn-' + okVariant;

                const bsModal = new bootstrap.Modal(modalEl, { backdrop: 'static' });

                const onOk = () => {
                    cleanup();
                    bsModal.hide();
                    resolve(true);
                };
                const onHide = () => {
                    cleanup();
                    resolve(false);
                };
                function cleanup() {
                    okBtn.removeEventListener('click', onOk);
                    modalEl.removeEventListener('hidden.bs.modal', onHide);
                    modalEl.classList.remove('modal-elevated');
                    const backdrops = document.querySelectorAll('.modal-backdrop');
                    if (backdrops.length) {
                        backdrops[backdrops.length - 1].classList.remove('modal-backdrop-elevated');
                    }
                }

                okBtn.addEventListener('click', onOk);
                modalEl.addEventListener('hidden.bs.modal', onHide);

                bsModal.show();

                // Elevate the newest backdrop and this modal so it overlays parent modals
                modalEl.classList.add('modal-elevated');
                const backdrops = document.querySelectorAll('.modal-backdrop');
                if (backdrops.length) {
                    backdrops[backdrops.length - 1].classList.add('modal-backdrop-elevated');
                }
            });
        }
        // View detail buttons
        const viewButtons = document.querySelectorAll('.btn-outline-primary');
        console.log('👁️ Found view detail buttons:', viewButtons.length);
        viewButtons.forEach((button, index) => {
            button.addEventListener('click', function () {
                console.log(`👁️ View detail button ${index + 1} clicked`);
                const detailModal = new bootstrap.Modal(document.getElementById(
                    'companyDetailModal'));
                detailModal.show();
                console.log('📋 Company detail modal opened');
            });
        });

        // Hàm deleteCompany để xử lý việc xóa công ty
        window.deleteCompany = async function(congTy) {
            console.log('❌ Delete company called with data:', congTy);
            // Xác nhận trước khi xóa
            const confirmed = await showConfirm('Xác nhận xóa công ty này?', { okVariant: 'danger', okText: 'Xóa công ty' });
            if (!confirmed) {
                console.log('❌ Delete cancelled by user');
                return;
            }
            // Gửi dữ liệu đến backend để xóa
            axios.delete(`/admin/companies/${congTy.id}`)
            .then(response => {
                if(response.data.rc == 0) {
                console.log('✅ Delete company success:', response.data);
                    showToast('Công đã được xóa thành công!', 'success');
                    setTimeout(() => {
                        console.log('🔄 Reloading page...');
                        window.location.reload();
                    }, 1000);
                } else {
                    showToast(response.data.message, 'error');
                    setTimeout(() => {
                        console.log('🔄 Reloading page...');
                        window.location.reload();
                    }, 1000);
                }
            })
            .catch(error => {
                console.error('❌ Delete company error:', error);
                showToast(error.response.data.message, 'error');
            });
        };
        // Hàm editCompany để xử lý việc chỉnh sửa công ty
        window.editCompany = function(congTy) {
            console.log('✏️ Edit company called with data:', congTy);
            // Điền dữ liệu vào form chỉnh sửa
            fillEditForm(congTy);

            // Hiển thị modal
            const editModal = new bootstrap.Modal(document.getElementById('editCompanyModal'));
            editModal.show();
            console.log('📋 Edit modal opened');
        };

        // Function để điền dữ liệu vào form chỉnh sửa
        function fillEditForm(congTy) {
            console.log('📝 Filling edit form with company data:', congTy);
            const form = document.getElementById('editCompanyForm');
            
            // Điền các trường cơ bản
            const fields = {
                'company_name': congTy.ten || '',
                'tax_code': congTy.ma_so_thue || '',
                'email': congTy.email || '',
                'phone': congTy.so_dien_thoai || '',
                'address': congTy.dia_chi || '',
                'website': congTy.website || '',
                'representative': congTy.nguoi_dai_dien || '',
                'ngay_dang_ky': congTy.ngay_dang_ky || '',
                'description': congTy.mo_ta || ''
            };
            
            Object.keys(fields).forEach(fieldName => {
                const input = form.querySelector(`[name="${fieldName}"]`);
                if (input) {
                    input.value = fields[fieldName];
                    console.log(`📋 Filled ${fieldName}:`, fields[fieldName]);
                }
            });

            // Điền loại hình bảo hiểm
            const typeSelect = form.querySelector('[name="insurance_type"]');
            if (typeSelect) {
                typeSelect.value = congTy.loai_hinh || '';
                console.log('📋 Filled insurance_type:', congTy.loai_hinh);
            }

            // Điền trạng thái
            const statusSelect = form.querySelector('[name="status"]');
            if (statusSelect) {
                statusSelect.value = congTy.trang_thai || '';
                console.log('📋 Filled status:', congTy.trang_thai);
            }

            // Điền logo và cập nhật preview
            const logoInput = document.getElementById('editLogoUrl');
            if (logoInput) {
                logoInput.value = congTy.logo || '';
                console.log('📋 Filled logo URL:', congTy.logo);
                // Trigger input event để cập nhật preview
                logoInput.dispatchEvent(new Event('input'));
            }

            // Điền hình nền và cập nhật preview
            const hinhNenInput = document.getElementById('editHinhNenUrl');
            if (hinhNenInput) {
                hinhNenInput.value = congTy.hinh_nen || '';
                console.log('📋 Filled hinh_nen URL:', congTy.hinh_nen);
                // Trigger input event để cập nhật preview
                hinhNenInput.dispatchEvent(new Event('input'));
            }

            // Thêm company ID vào form để biết đang chỉnh sửa công ty nào
            form.setAttribute('data-company-id', congTy.id);
            console.log('🆔 Set company ID:', congTy.id);
        }

        // Logo preview helpers
        function setupLogoPreview(inputSelector, imgSelector, placeholderSelector) {
            console.log('🖼️ Setting up logo preview:', inputSelector, imgSelector, placeholderSelector);
            const input = document.querySelector(inputSelector);
            const img = document.querySelector(imgSelector);
            const placeholder = document.querySelector(placeholderSelector);
            if (!input || !img) {
                console.warn('⚠️ Logo preview elements not found');
                return;
            }

            function updatePreview() {
                const url = input.value.trim();
                console.log('🖼️ Updating logo preview with URL:', url);
                if (url) {
                    img.src = url;
                    img.style.display = 'block';
                    if (placeholder) placeholder.style.display = 'none';
                    console.log('✅ Logo preview updated');
                } else {
                    img.removeAttribute('src');
                    img.style.display = 'none';
                    if (placeholder) placeholder.style.display = 'block';
                    console.log('🔄 Logo preview cleared');
                }
            }

            img.addEventListener('error', function () {
                console.error('❌ Logo image failed to load');
                img.style.display = 'none';
                if (placeholder) placeholder.style.display = 'block';
            });

            input.addEventListener('input', updatePreview);
            input.addEventListener('change', updatePreview);
            updatePreview();
        }

        setupLogoPreview('#addLogoUrl', '#addLogoPreview', '#addLogoPlaceholder');
        setupLogoPreview('#editLogoUrl', '#editLogoPreview', '#editLogoPlaceholder');
        setupLogoPreview('#addHinhNenUrl', '#addHinhNenPreview', '#addHinhNenPlaceholder');
        setupLogoPreview('#editHinhNenUrl', '#editHinhNenPreview', '#editHinhNenPlaceholder');

        // Edit form submission
        const editCompanyForm = document.getElementById('editCompanyForm');
        console.log('✏️ Edit company form found:', !!editCompanyForm);
        if (editCompanyForm) {
            editCompanyForm.addEventListener('submit', async function (e) {
                e.preventDefault();
                console.log('✏️ Edit company form submitted');
                
                // Xác nhận trước khi gửi cập nhật
                const confirmed = await showConfirm('Xác nhận lưu thay đổi cho công ty này?', { okVariant: 'warning', okText: 'Lưu thay đổi' });
                if (!confirmed) {
                    console.log('❌ Update cancelled by user');
                    return;
                }
                
                // Lấy company ID từ form
                const companyId = this.getAttribute('data-company-id');
                console.log('🆔 Editing company ID:', companyId);
                
                const formData = {
                    ten: this.company_name.value,
                    logo: this.editLogoUrl.value,
                    hinh_nen: this.editHinhNenUrl.value,
                    trang_thai: this.status.value,
                    mo_ta: this.description.value,
                    email: this.email.value,
                    so_dien_thoai: this.phone.value,
                    dia_chi: this.address.value,
                    loai_hinh: this.insurance_type.value,
                    ma_so_thue: this.tax_code.value,
                    website: this.website.value,
                    nguoi_dai_dien: this.representative.value,
                    ngay_dang_ky: this.ngay_dang_ky.value
                };
                console.log('📤 Sending update data:', formData);
                
                // Gửi dữ liệu cập nhật đến backend
                axios.put(`/admin/companies/${companyId}`, formData)
                .then(response => {
                    console.log('✅ Update company success:', response.data);
                    showToast('Công ty đã được cập nhật thành công!', 'success');
                    // Reload trang để cập nhật dữ liệu
                    setTimeout(() => {
                        console.log('🔄 Reloading page...');
                        window.location.reload();
                    }, 1000);
                })
                .catch(error => {
                    console.error('❌ Update company error:', error);
                    showToast('Lỗi khi cập nhật công ty!', 'error');
                });
                
                bootstrap.Modal.getInstance(document.getElementById('editCompanyModal')).hide();
            });
        }

        // Sample data for forms
        const sampleData = {
            company_name: 'Công ty Bảo hiểm ABC',
            tax_code: '0123456789',
            email: 'contact@abc-insurance.com',
            phone: '+84 24 3936 1234',
            address: '123 Đường Nguyễn Huệ, Quận 1, TP.HCM',
            insurance_type: 'life',
            status: 1,
            website: 'https://www.abc-insurance.com',
            representative: 'Nguyễn Văn A',
            ngay_dang_ky: '22/09/2025',
            logo: 'https://assets.startbootstrap.com/img/screenshots/themes/sb-admin-2.png',
            hinh_nen: 'https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2074&q=80',
            description: 'Công ty bảo hiểm hàng đầu Việt Nam với hơn 20 năm kinh nghiệm trong lĩnh vực bảo hiểm nhân thọ và sức khỏe.'
        };

        // Function to fill sample data
        function fillSampleData(formId) {
            console.log('📋 Filling sample data for form:', formId);
            const form = document.getElementById(formId);
            if (!form) {
                console.warn('⚠️ Form not found:', formId);
                return;
            }

            console.log('📊 Sample data:', sampleData);

            // Fill all input fields
            Object.keys(sampleData).forEach(key => {
                const input = form.querySelector(`[name="${key}"]`);
                if (input) {
                    input.value = sampleData[key];
                    console.log(`📝 Filled ${key}:`, sampleData[key]);

                    // Trigger input event for logo preview
                    if (key === 'logo') {
                        input.dispatchEvent(new Event('input'));
                    }
                } else {
                    console.warn(`⚠️ Input field not found: ${key}`);
                }
            });

            // Special handling for logo URL fields (they have different names)
            if (formId === 'addCompanyForm') {
                const logoInput = document.getElementById('addLogoUrl');
                if (logoInput) {
                    logoInput.value = sampleData.logo;
                    logoInput.dispatchEvent(new Event('input'));
                    console.log('🖼️ Set add logo URL:', sampleData.logo);
                }
            } else if (formId === 'editCompanyForm') {
                const logoInput = document.getElementById('editLogoUrl');
                if (logoInput) {
                    logoInput.value = sampleData.logo;
                    logoInput.dispatchEvent(new Event('input'));
                    console.log('🖼️ Set edit logo URL:', sampleData.logo);
                }
            }
            console.log('✅ Sample data filled successfully');
        }

        // Add event listeners for sample data buttons
        document.getElementById('fillSampleDataAdd').addEventListener('click', function () {
            console.log('🔄 Fill sample data button clicked (Add form)');
            fillSampleData('addCompanyForm');
        });

        document.getElementById('fillSampleDataEdit').addEventListener('click', function () {
            console.log('🔄 Fill sample data button clicked (Edit form)');
            fillSampleData('editCompanyForm');
        });
    });

</script>
@endsection
