@extends('user.layouts.app')

@section('content')

<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0 text-center">Đăng Ký Bảo Hiểm Nhân Thọ</h3>
                </div>
                <div class="card-body p-4">
                    <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="cty" value="{{ $cty ?? '' }}">
                        
                        <!-- Nhóm 1: Thông tin cá nhân và hợp đồng -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h4 class="text-primary border-bottom pb-2 mb-3">
                                    <i class="bi bi-person"></i> Thông tin cá nhân và hợp đồng
                                </h4>
                            </div>
                        </div>

                        <div class="form-section">
                            <div class="row">
                            <!-- CCCD -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="cccd" class="form-label">Số CCCD/CMND <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('cccd') is-invalid @enderror" 
                                       id="cccd" name="cccd" value="{{ old('cccd') }}" 
                                       placeholder="Nhập số CCCD/CMND" required>
                                @error('cccd')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Mã hợp đồng -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="ma_hop_dong" class="form-label">Mã hợp đồng <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('ma_hop_dong') is-invalid @enderror" 
                                       id="ma_hop_dong" name="ma_hop_dong" value="{{ old('ma_hop_dong') }}" 
                                       placeholder="Nhập mã hợp đồng" required>
                                @error('ma_hop_dong')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Họ tên -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="ho_ten" class="form-label">Họ và tên <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('ho_ten') is-invalid @enderror" 
                                       id="ho_ten" name="ho_ten" value="{{ old('ho_ten') }}" 
                                       placeholder="Nhập họ và tên" required>
                                @error('ho_ten')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Giới tính -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="gioi_tinh" class="form-label">Giới tính <span class="text-danger">*</span></label>
                                <select class="form-select @error('gioi_tinh') is-invalid @enderror" 
                                        id="gioi_tinh" name="gioi_tinh" required>
                                    <option value="">Chọn giới tính</option>
                                    <option value="Nam" {{ old('gioi_tinh') == 'Nam' ? 'selected' : '' }}>Nam</option>
                                    <option value="Nữ" {{ old('gioi_tinh') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                </select>
                                @error('gioi_tinh')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Ngày sinh -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="ngay_sinh" class="form-label">Ngày sinh <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('ngay_sinh') is-invalid @enderror" 
                                       id="ngay_sinh" name="ngay_sinh" value="{{ old('ngay_sinh') }}" 
                                       placeholder="DD/MM/YYYY" required>
                                @error('ngay_sinh')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Địa chỉ -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="dia_chi" class="form-label">Địa chỉ <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('dia_chi') is-invalid @enderror" 
                                       id="dia_chi" name="dia_chi" value="{{ old('dia_chi') }}" 
                                       placeholder="Nhập địa chỉ" required>
                                @error('dia_chi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Số điện thoại -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="so_dien_thoai" class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control @error('so_dien_thoai') is-invalid @enderror" 
                                       id="so_dien_thoai" name="so_dien_thoai" value="{{ old('so_dien_thoai') }}" 
                                       placeholder="Nhập số điện thoại" required>
                                @error('so_dien_thoai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Số tiền mua -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="so_tien_mua" class="form-label">Số tiền mua (VNĐ) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('so_tien_mua') is-invalid @enderror" 
                                       id="so_tien_mua" name="so_tien_mua" value="{{ old('so_tien_mua') }}" 
                                       placeholder="Nhập số tiền mua" required>
                                @error('so_tien_mua')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Số tiền đóng hàng năm -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="so_tien_dong_hang_nam" class="form-label">Số tiền đóng hàng năm (VNĐ) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('so_tien_dong_hang_nam') is-invalid @enderror" 
                                       id="so_tien_dong_hang_nam" name="so_tien_dong_hang_nam" value="{{ old('so_tien_dong_hang_nam') }}" 
                                       placeholder="Nhập số tiền đóng hàng năm" required>
                                @error('so_tien_dong_hang_nam')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Thời gian mua -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="thoi_gian_mua" class="form-label">Thời gian mua (năm) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('thoi_gian_mua') is-invalid @enderror" 
                                       id="thoi_gian_mua" name="thoi_gian_mua" value="{{ old('thoi_gian_mua') }}" 
                                       placeholder="Nhập số năm" required>
                                @error('thoi_gian_mua')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Ngày cấp hợp đồng -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="ngay_cap_hop_dong" class="form-label">Ngày cấp hợp đồng <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('ngay_cap_hop_dong') is-invalid @enderror" 
                                       id="ngay_cap_hop_dong" name="ngay_cap_hop_dong" value="{{ old('ngay_cap_hop_dong') }}" 
                                       placeholder="DD/MM/YYYY" required>
                                @error('ngay_cap_hop_dong')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Ngày đáo hạn -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="ngay_dao_han" class="form-label">Ngày đáo hạn <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('ngay_dao_han') is-invalid @enderror" 
                                       id="ngay_dao_han" name="ngay_dao_han" value="{{ old('ngay_dao_han') }}" 
                                       placeholder="DD/MM/YYYY" required>
                                @error('ngay_dao_han')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Ngân hàng -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="ngan_hang" class="form-label">Ngân hàng <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('ngan_hang') is-invalid @enderror" 
                                       id="ngan_hang" name="ngan_hang" value="{{ old('ngan_hang') }}" 
                                       placeholder="Nhập tên ngân hàng" required>
                                @error('ngan_hang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Số tài khoản -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="so_tai_khoan" class="form-label">Số tài khoản <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('so_tai_khoan') is-invalid @enderror" 
                                       id="so_tai_khoan" name="so_tai_khoan" value="{{ old('so_tai_khoan') }}" 
                                       placeholder="Nhập số tài khoản" required>
                                @error('so_tai_khoan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Chủ tài khoản -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="chu_tai_khoan" class="form-label">Chủ tài khoản <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('chu_tai_khoan') is-invalid @enderror" 
                                       id="chu_tai_khoan" name="chu_tai_khoan" value="{{ old('chu_tai_khoan') }}" 
                                       placeholder="Nhập tên chủ tài khoản" required>
                                @error('chu_tai_khoan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Loại hợp đồng -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="loai_hop_dong" class="form-label">Loại hợp đồng <span class="text-danger">*</span></label>
                                <select class="form-select @error('loai_hop_dong') is-invalid @enderror" 
                                        id="loai_hop_dong" name="loai_hop_dong" required>
                                    <option value="">Chọn loại hợp đồng</option>
                                    <option value="cho_ban_than" {{ old('loai_hop_dong') == 'cho_ban_than' ? 'selected' : '' }}>Cho bản thân</option>
                                    <option value="cho_nguoi_khac" {{ old('loai_hop_dong') == 'cho_nguoi_khac' ? 'selected' : '' }}>Cho người khác</option>
                                </select>
                                @error('loai_hop_dong')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>

                            <!-- Upload ảnh người mua -->
                            <div class="row mb-4 mt-4">
                                <div class="col-12">
                                    <h5 class="text-secondary border-bottom pb-2 mb-3">
                                        <i class="bi bi-camera"></i> Upload ảnh người mua
                                    </h5>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Ảnh mặt trước CCCD -->
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label class="form-label">Ảnh mặt trước CCCD</label>
                                    <div class="drag-drop-area @error('anh_mat_truoc') is-invalid @enderror" 
                                         id="drag_drop_anh_mat_truoc" 
                                         data-input="anh_mat_truoc">
                                        <!-- Default content -->
                                        <div class="drag-drop-content" id="content_anh_mat_truoc">
                                            <div class="drag-drop-icon">
                                                <i class="bi bi-cloud-upload"></i>
                                            </div>
                                            <div class="drag-drop-text">
                                                <p class="mb-1">Kéo thả ảnh vào đây</p>
                                                <p class="text-muted small">hoặc <span class="text-primary">click để chọn</span></p>
                                            </div>
                                            <div class="drag-drop-info">
                                                <small class="text-muted">JPG, PNG, GIF (tối đa 5MB)</small>
                                            </div>
                                        </div>
                                        
                                        <!-- Preview content -->
                                        <div class="drag-drop-preview" id="preview_content_anh_mat_truoc" style="display: none;">
                                            <img class="preview-image" id="preview_img_anh_mat_truoc" src="" alt="Preview">
                                            <div class="preview-overlay">
                                                <div class="preview-info">
                                                    <small class="text-white" id="info_anh_mat_truoc"></small>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-danger remove-image-btn" onclick="removeImage('anh_mat_truoc'); event.stopPropagation();">
                                                    <i class="bi bi-x"></i>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <input type="file" class="d-none" id="anh_mat_truoc" name="anh_mat_truoc" accept="image/*" data-required="true">
                                    </div>
                                    @error('anh_mat_truoc')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Ảnh mặt sau CCCD -->
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label class="form-label">Ảnh mặt sau CCCD</label>
                                    <div class="drag-drop-area @error('anh_mat_sau') is-invalid @enderror" 
                                         id="drag_drop_anh_mat_sau" 
                                         data-input="anh_mat_sau">
                                        <!-- Default content -->
                                        <div class="drag-drop-content" id="content_anh_mat_sau">
                                            <div class="drag-drop-icon">
                                                <i class="bi bi-cloud-upload"></i>
                                            </div>
                                            <div class="drag-drop-text">
                                                <p class="mb-1">Kéo thả ảnh vào đây</p>
                                                <p class="text-muted small">hoặc <span class="text-primary">click để chọn</span></p>
                                            </div>
                                            <div class="drag-drop-info">
                                                <small class="text-muted">JPG, PNG, GIF (tối đa 5MB)</small>
                                            </div>
                                        </div>
                                        
                                        <!-- Preview content -->
                                        <div class="drag-drop-preview" id="preview_content_anh_mat_sau" style="display: none;">
                                            <img class="preview-image" id="preview_img_anh_mat_sau" src="" alt="Preview">
                                            <div class="preview-overlay">
                                                <div class="preview-info">
                                                    <small class="text-white" id="info_anh_mat_sau"></small>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-danger remove-image-btn" onclick="removeImage('anh_mat_sau'); event.stopPropagation();">
                                                    <i class="bi bi-x"></i>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <input type="file" class="d-none" id="anh_mat_sau" name="anh_mat_sau" accept="image/*" data-required="true">
                                    </div>
                                    @error('anh_mat_sau')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Ảnh chân dung -->
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label class="form-label">Ảnh chân dung</label>
                                    <div class="drag-drop-area @error('anh_chan_dung') is-invalid @enderror" 
                                         id="drag_drop_anh_chan_dung" 
                                         data-input="anh_chan_dung">
                                        <!-- Default content -->
                                        <div class="drag-drop-content" id="content_anh_chan_dung">
                                            <div class="drag-drop-icon">
                                                <i class="bi bi-cloud-upload"></i>
                                            </div>
                                            <div class="drag-drop-text">
                                                <p class="mb-1">Kéo thả ảnh vào đây</p>
                                                <p class="text-muted small">hoặc <span class="text-primary">click để chọn</span></p>
                                            </div>
                                            <div class="drag-drop-info">
                                                <small class="text-muted">JPG, PNG, GIF (tối đa 5MB)</small>
                                            </div>
                                        </div>
                                        
                                        <!-- Preview content -->
                                        <div class="drag-drop-preview" id="preview_content_anh_chan_dung" style="display: none;">
                                            <img class="preview-image" id="preview_img_anh_chan_dung" src="" alt="Preview">
                                            <div class="preview-overlay">
                                                <div class="preview-info">
                                                    <small class="text-white" id="info_anh_chan_dung"></small>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-danger remove-image-btn" onclick="removeImage('anh_chan_dung'); event.stopPropagation();">
                                                    <i class="bi bi-x"></i>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <input type="file" class="d-none" id="anh_chan_dung" name="anh_chan_dung" accept="image/*" data-required="true">
                                    </div>
                                    @error('anh_chan_dung')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Nhóm 2: Thông tin người thừa hưởng -->
                        <div class="row mb-4 mt-5" id="beneficiary-section" style="display: none;">
                            <div class="col-12">
                                <h4 class="text-primary border-bottom pb-2 mb-3">
                                    <i class="bi bi-people"></i> Thông tin người thừa hưởng
                                </h4>
                            </div>
                        </div>

                        <div class="form-section" id="beneficiary-form" style="display: none;">
                            <div class="row">
                            <!-- CCCD người thừa hưởng -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="th_cccd" class="form-label">Số CCCD/CMND người thừa hưởng</label>
                                <input type="text" class="form-control @error('th_cccd') is-invalid @enderror" 
                                       id="th_cccd" name="th_cccd" value="{{ old('th_cccd') }}" 
                                       placeholder="Nhập số CCCD/CMND người thừa hưởng">
                                @error('th_cccd')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Mối quan hệ -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="th_moi_quan_he" class="form-label">Mối quan hệ</label>
                                <select class="form-select @error('th_moi_quan_he') is-invalid @enderror" 
                                        id="th_moi_quan_he" name="th_moi_quan_he">
                                    <option value="">Chọn mối quan hệ</option>
                                    <option value="Vợ/Chồng" {{ old('th_moi_quan_he') == 'Vợ/Chồng' ? 'selected' : '' }}>Vợ/Chồng</option>
                                    <option value="Con" {{ old('th_moi_quan_he') == 'Con' ? 'selected' : '' }}>Con</option>
                                    <option value="Cha/Mẹ" {{ old('th_moi_quan_he') == 'Cha/Mẹ' ? 'selected' : '' }}>Cha/Mẹ</option>
                                    <option value="Anh/Chị/Em" {{ old('th_moi_quan_he') == 'Anh/Chị/Em' ? 'selected' : '' }}>Anh/Chị/Em</option>
                                    <option value="Khác" {{ old('th_moi_quan_he') == 'Khác' ? 'selected' : '' }}>Khác</option>
                                </select>
                                @error('th_moi_quan_he')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Họ tên người thừa hưởng -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="th_ho_ten" class="form-label">Họ và tên người thừa hưởng</label>
                                <input type="text" class="form-control @error('th_ho_ten') is-invalid @enderror" 
                                       id="th_ho_ten" name="th_ho_ten" value="{{ old('th_ho_ten') }}" 
                                       placeholder="Nhập họ và tên người thừa hưởng">
                                @error('th_ho_ten')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Giới tính người thừa hưởng -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="th_gioi_tinh" class="form-label">Giới tính người thừa hưởng</label>
                                <select class="form-select @error('th_gioi_tinh') is-invalid @enderror" 
                                        id="th_gioi_tinh" name="th_gioi_tinh">
                                    <option value="">Chọn giới tính</option>
                                    <option value="Nam" {{ old('th_gioi_tinh') == 'Nam' ? 'selected' : '' }}>Nam</option>
                                    <option value="Nữ" {{ old('th_gioi_tinh') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                </select>
                                @error('th_gioi_tinh')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Ngày sinh người thừa hưởng -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="th_ngay_sinh" class="form-label">Ngày sinh người thừa hưởng</label>
                                <input type="text" class="form-control @error('th_ngay_sinh') is-invalid @enderror" 
                                       id="th_ngay_sinh" name="th_ngay_sinh" value="{{ old('th_ngay_sinh') }}" 
                                       placeholder="DD/MM/YYYY">
                                @error('th_ngay_sinh')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Địa chỉ người thừa hưởng -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="th_dia_chi" class="form-label">Địa chỉ người thừa hưởng</label>
                                <input type="text" class="form-control @error('th_dia_chi') is-invalid @enderror" 
                                       id="th_dia_chi" name="th_dia_chi" value="{{ old('th_dia_chi') }}" 
                                       placeholder="Nhập địa chỉ người thừa hưởng">
                                @error('th_dia_chi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Số điện thoại người thừa hưởng -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="th_so_dien_thoai" class="form-label">Số điện thoại người thừa hưởng</label>
                                <input type="tel" class="form-control @error('th_so_dien_thoai') is-invalid @enderror" 
                                       id="th_so_dien_thoai" name="th_so_dien_thoai" value="{{ old('th_so_dien_thoai') }}" 
                                       placeholder="Nhập số điện thoại người thừa hưởng">
                                @error('th_so_dien_thoai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Ngân hàng người thừa hưởng -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="th_ngan_hang" class="form-label">Ngân hàng người thừa hưởng</label>
                                <input type="text" class="form-control @error('th_ngan_hang') is-invalid @enderror" 
                                       id="th_ngan_hang" name="th_ngan_hang" value="{{ old('th_ngan_hang') }}" 
                                       placeholder="Nhập tên ngân hàng người thừa hưởng">
                                @error('th_ngan_hang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Số tài khoản người thừa hưởng -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="th_so_tai_khoan" class="form-label">Số tài khoản người thừa hưởng</label>
                                <input type="text" class="form-control @error('th_so_tai_khoan') is-invalid @enderror" 
                                       id="th_so_tai_khoan" name="th_so_tai_khoan" value="{{ old('th_so_tai_khoan') }}" 
                                       placeholder="Nhập số tài khoản người thừa hưởng">
                                @error('th_so_tai_khoan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Chủ tài khoản người thừa hưởng -->
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <label for="th_chu_tai_khoan" class="form-label">Chủ tài khoản người thừa hưởng</label>
                                <input type="text" class="form-control @error('th_chu_tai_khoan') is-invalid @enderror" 
                                       id="th_chu_tai_khoan" name="th_chu_tai_khoan" value="{{ old('th_chu_tai_khoan') }}" 
                                       placeholder="Nhập tên chủ tài khoản người thừa hưởng">
                                @error('th_chu_tai_khoan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            </div>

                            <!-- Upload ảnh người thừa hưởng -->
                            <div class="row mb-4 mt-4">
                                <div class="col-12">
                                    <h5 class="text-secondary border-bottom pb-2 mb-3">
                                        <i class="bi bi-camera"></i> Upload ảnh người thừa hưởng
                                    </h5>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Ảnh mặt trước CCCD người thừa hưởng -->
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label class="form-label">Ảnh mặt trước CCCD người thừa hưởng</label>
                                    <div class="drag-drop-area @error('th_anh_mat_truoc') is-invalid @enderror" 
                                         id="drag_drop_th_anh_mat_truoc" 
                                         data-input="th_anh_mat_truoc">
                                        <!-- Default content -->
                                        <div class="drag-drop-content" id="content_th_anh_mat_truoc">
                                            <div class="drag-drop-icon">
                                                <i class="bi bi-cloud-upload"></i>
                                            </div>
                                            <div class="drag-drop-text">
                                                <p class="mb-1">Kéo thả ảnh vào đây</p>
                                                <p class="text-muted small">hoặc <span class="text-primary">click để chọn</span></p>
                                            </div>
                                            <div class="drag-drop-info">
                                                <small class="text-muted">JPG, PNG, GIF (tối đa 5MB)</small>
                                            </div>
                                        </div>
                                        
                                        <!-- Preview content -->
                                        <div class="drag-drop-preview" id="preview_content_th_anh_mat_truoc" style="display: none;">
                                            <img class="preview-image" id="preview_img_th_anh_mat_truoc" src="" alt="Preview">
                                            <div class="preview-overlay">
                                                <div class="preview-info">
                                                    <small class="text-white" id="info_th_anh_mat_truoc"></small>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-danger remove-image-btn" onclick="removeImage('th_anh_mat_truoc'); event.stopPropagation();">
                                                    <i class="bi bi-x"></i>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <input type="file" class="d-none" id="th_anh_mat_truoc" name="th_anh_mat_truoc" accept="image/*" data-required="false">
                                    </div>
                                    @error('th_anh_mat_truoc')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Ảnh mặt sau CCCD người thừa hưởng -->
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label class="form-label">Ảnh mặt sau CCCD người thừa hưởng</label>
                                    <div class="drag-drop-area @error('th_anh_mat_sau') is-invalid @enderror" 
                                         id="drag_drop_th_anh_mat_sau" 
                                         data-input="th_anh_mat_sau">
                                        <!-- Default content -->
                                        <div class="drag-drop-content" id="content_th_anh_mat_sau">
                                            <div class="drag-drop-icon">
                                                <i class="bi bi-cloud-upload"></i>
                                            </div>
                                            <div class="drag-drop-text">
                                                <p class="mb-1">Kéo thả ảnh vào đây</p>
                                                <p class="text-muted small">hoặc <span class="text-primary">click để chọn</span></p>
                                            </div>
                                            <div class="drag-drop-info">
                                                <small class="text-muted">JPG, PNG, GIF (tối đa 5MB)</small>
                                            </div>
                                        </div>
                                        
                                        <!-- Preview content -->
                                        <div class="drag-drop-preview" id="preview_content_th_anh_mat_sau" style="display: none;">
                                            <img class="preview-image" id="preview_img_th_anh_mat_sau" src="" alt="Preview">
                                            <div class="preview-overlay">
                                                <div class="preview-info">
                                                    <small class="text-white" id="info_th_anh_mat_sau"></small>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-danger remove-image-btn" onclick="removeImage('th_anh_mat_sau'); event.stopPropagation();">
                                                    <i class="bi bi-x"></i>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <input type="file" class="d-none" id="th_anh_mat_sau" name="th_anh_mat_sau" accept="image/*" data-required="false">
                                    </div>
                                    @error('th_anh_mat_sau')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Ảnh chân dung người thừa hưởng -->
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label class="form-label">Ảnh chân dung người thừa hưởng</label>
                                    <div class="drag-drop-area @error('th_anh_chan_dung') is-invalid @enderror" 
                                         id="drag_drop_th_anh_chan_dung" 
                                         data-input="th_anh_chan_dung">
                                        <!-- Default content -->
                                        <div class="drag-drop-content" id="content_th_anh_chan_dung">
                                            <div class="drag-drop-icon">
                                                <i class="bi bi-cloud-upload"></i>
                                            </div>
                                            <div class="drag-drop-text">
                                                <p class="mb-1">Kéo thả ảnh vào đây</p>
                                                <p class="text-muted small">hoặc <span class="text-primary">click để chọn</span></p>
                                            </div>
                                            <div class="drag-drop-info">
                                                <small class="text-muted">JPG, PNG, GIF (tối đa 5MB)</small>
                                            </div>
                                        </div>
                                        
                                        <!-- Preview content -->
                                        <div class="drag-drop-preview" id="preview_content_th_anh_chan_dung" style="display: none;">
                                            <img class="preview-image" id="preview_img_th_anh_chan_dung" src="" alt="Preview">
                                            <div class="preview-overlay">
                                                <div class="preview-info">
                                                    <small class="text-white" id="info_th_anh_chan_dung"></small>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-danger remove-image-btn" onclick="removeImage('th_anh_chan_dung'); event.stopPropagation();">
                                                    <i class="bi bi-x"></i>
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <input type="file" class="d-none" id="th_anh_chan_dung" name="th_anh_chan_dung" accept="image/*" data-required="false">
                                    </div>
                                    @error('th_anh_chan_dung')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Nút submit -->
                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="bi bi-save"></i> Đăng ký
                                </button>
                                <button type="reset" class="btn btn-secondary btn-lg px-5 ms-3">
                                    <i class="bi bi-arrow-clockwise"></i> Làm mới
                                </button>
                                <button type="button" class="btn btn-info btn-lg px-5 ms-3" onclick="fillSampleData()">
                                    <i class="bi bi-magic"></i> Điền dữ liệu mẫu
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border: none;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.card-header {
    border-radius: 15px 15px 0 0 !important;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
}

.form-section {
    border: 2px solid #e9ecef;
    border-radius: 12px;
    padding: 25px;
    margin-bottom: 30px;
    background: #f8f9fa;
    transition: all 0.3s ease;
}

.form-section:hover {
    border-color: #667eea;
    box-shadow: 0 5px 15px rgba(102, 126, 234, 0.1);
}

.form-control, .form-select {
    border-radius: 8px;
    border: 1px solid #e0e0e0;
    transition: all 0.3s ease;
    background: #fff;
    font-size: 0.95rem;
    padding: 0.375rem 0.75rem;
    height: calc(1.5em + 0.75rem + 2px);
}

.form-control:focus, .form-select:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    background: #fff;
}


/* Đảm bảo tất cả select box có width 100% */
.form-select {
    width: 100% !important;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m1 6 7 7 7-7'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    background-size: 16px 12px;
    padding-right: 2.25rem;
}

/* Select2 Custom Styling */
.select2-container {
    width: 100% !important;
}

.select2-container--bootstrap-5 .select2-selection {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    min-height: calc(1.5em + 0.75rem + 2px);
    background: #fff;
    transition: all 0.3s ease;
}

.select2-container--bootstrap-5 .select2-selection:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

.select2-container--bootstrap-5 .select2-selection--single {
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 2.25rem 0.375rem 0.75rem;
}

.select2-container--bootstrap-5 .select2-selection--single .select2-selection__rendered {
    padding: 0;
    line-height: 1.5;
    color: #212529;
}

.select2-container--bootstrap-5 .select2-selection--single .select2-selection__placeholder {
    color: #6c757d;
}

.select2-container--bootstrap-5 .select2-selection--single .select2-selection__arrow {
    height: calc(1.5em + 0.75rem);
    right: 8px;
}

/* Ẩn icon dropdown mặc định của Select2 */
.select2-container--bootstrap-5 .select2-selection--single .select2-selection__arrow b {
    display: none;
}

/* Ẩn icon dropdown của form-select gốc */
.form-select {
    background-image: none !important;
}

/* Tạo icon dropdown đẹp cho Select2 */
.select2-container--bootstrap-5 .select2-selection--single .select2-selection__arrow::after {
    content: '';
    position: absolute;
    top: 50%;
    right: 8px;
    transform: translateY(-50%);
    width: 0;
    height: 0;
    border-left: 4px solid transparent;
    border-right: 4px solid transparent;
    border-top: 4px solid #6c757d;
    pointer-events: none;
}

/* Icon dropdown khi hover */
.select2-container--bootstrap-5 .select2-selection--single:hover .select2-selection__arrow::after {
    border-top-color: #667eea;
}

.select2-container--bootstrap-5 .select2-dropdown {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.select2-container--bootstrap-5 .select2-search--dropdown .select2-search__field {
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    padding: 0.375rem 0.75rem;
}

.select2-container--bootstrap-5 .select2-results__option {
    padding: 0.5rem 0.75rem;
}

.select2-container--bootstrap-5 .select2-results__option--highlighted {
    background-color: #667eea;
    color: white;
}

.select2-container--bootstrap-5 .select2-results__option--selected {
    background-color: #f8f9fa;
    color: #495057;
}

/* Error state cho Select2 */
.form-select.is-invalid + .select2-container .select2-selection {
    border-color: #dc3545;
}

.form-select.is-invalid + .select2-container .select2-selection:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
}

.btn-secondary {
    border-radius: 8px;
    transition: all 0.3s ease;
}

.btn-secondary:hover {
    transform: translateY(-2px);
}

.text-primary {
    color: #667eea !important;
}

.text-secondary {
    color: #6c757d !important;
}

.border-bottom {
    border-bottom: 2px solid #e0e0e0 !important;
}

h4 {
    font-weight: 600;
}

h5 {
    font-weight: 500;
    font-size: 1.1rem;
}

.form-label {
    font-weight: 500;
    color: #333;
}

.text-danger {
    color: #dc3545 !important;
}

/* Animation cho form sections */
.form-section {
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Drag & Drop Area Styles */
.drag-drop-area {
    border: 2px dashed #cbd5e0;
    border-radius: 12px;
    padding: 30px 20px;
    text-align: center;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    height: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.drag-drop-area::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent 30%, rgba(102, 126, 234, 0.1) 50%, transparent 70%);
    transform: translateX(-100%);
    transition: transform 0.6s ease;
}

.drag-drop-area:hover::before {
    transform: translateX(100%);
}

.drag-drop-area:hover {
    border-color: #667eea;
    background: linear-gradient(135deg, #f0f2ff 0%, #e6f0ff 100%);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.15);
}

.drag-drop-area.drag-over {
    border-color: #667eea;
    background: linear-gradient(135deg, #e6f0ff 0%, #d1e7ff 100%);
    transform: scale(1.02);
    box-shadow: 0 12px 30px rgba(102, 126, 234, 0.25);
}

.drag-drop-area.is-invalid {
    border-color: #dc3545;
    background: linear-gradient(135deg, #fff5f5 0%, #ffe6e6 100%);
    animation: shake 0.5s ease-in-out;
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}

.drag-drop-content {
    position: relative;
    z-index: 2;
}

/* Style cho vùng upload thiếu hình ảnh */
.missing-image {
    background-color: rgba(220, 53, 69, 0.05) !important;
    border: 2px dashed #dc3545 !important;
    position: relative;
}

.missing-image::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent 30%, rgba(220, 53, 69, 0.1) 50%, transparent 70%);
    animation: shimmer 2s infinite;
    pointer-events: none;
    z-index: 1;
}

@keyframes shimmer {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

.upload-status-text {
    font-weight: 500;
    text-align: center;
    animation: fadeInUp 0.3s ease-out;
}

.drag-drop-icon {
    font-size: 3rem;
    color: #667eea;
    margin-bottom: 15px;
    transition: all 0.3s ease;
}

.drag-drop-area:hover .drag-drop-icon {
    transform: scale(1.1);
    color: #5a67d8;
}

.drag-drop-text p {
    margin: 0;
    font-weight: 500;
    color: #2d3748;
}

.drag-drop-text .text-primary {
    color: #667eea !important;
    font-weight: 600;
}

.drag-drop-info {
    margin-top: 10px;
}

.drag-drop-info small {
    color: #718096;
    font-size: 0.8rem;
}

/* Drag Drop Preview Styles */
.drag-drop-preview {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 12px;
    overflow: hidden;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
}

.preview-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
    border-radius: 12px;
    transition: all 0.3s ease;
    background: #f8f9fa;
}

.preview-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.1) 50%, transparent 100%);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 10px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.drag-drop-preview:hover .preview-overlay {
    opacity: 1;
}

.preview-info {
    background: rgba(0, 0, 0, 0.7);
    padding: 5px 10px;
    border-radius: 15px;
    backdrop-filter: blur(10px);
}

.preview-info small {
    font-size: 0.75rem;
    font-weight: 500;
}

.remove-image-btn {
    align-self: flex-end;
    border-radius: 50%;
    width: 32px;
    height: 32px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    background: rgba(220, 53, 69, 0.9);
    border: none;
    color: white;
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
    z-index: 10;
    pointer-events: auto;
    cursor: pointer;
}

.remove-image-btn:hover {
    transform: scale(1.1);
    background: rgba(220, 53, 69, 1);
    box-shadow: 0 4px 12px rgba(220, 53, 69, 0.4);
}

/* Animations */
@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes pulse {
    0% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.7);
    }
    50% {
        transform: scale(1.02);
        box-shadow: 0 0 0 10px rgba(220, 53, 69, 0);
    }
    100% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(220, 53, 69, 0);
    }
}

.drag-drop-area.drag-over .drag-drop-icon {
    animation: pulse 1s infinite;
}

/* Success state */
.drag-drop-area.has-image {
    border-color: #28a745;
    background: linear-gradient(135deg, #f0fff4 0%, #e6fffa 100%);
}

.drag-drop-area.has-image .drag-drop-icon {
    color: #28a745;
}

/* File input styling */
.form-control[type="file"] {
    display: none;
}

/* Drag drop area with preview */
.drag-drop-area.has-preview {
    background: #fff;
    border: 2px solid #28a745;
    position: relative;
}

.drag-drop-area.has-preview .drag-drop-content {
    display: none;
}

.drag-drop-area.has-preview .drag-drop-preview {
    display: block !important;
}

/* Validation Toast Styles */
.validation-toast {
    border-left: 4px solid #dc3545;
    box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);
    animation: slideInRight 0.3s ease-out;
}

.validation-toast ul {
    padding-left: 20px;
}

.validation-toast li {
    margin-bottom: 5px;
    font-size: 0.9rem;
}

@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .form-section {
        padding: 15px;
        margin-bottom: 20px;
    }
    
    .card-body {
        padding: 20px;
    }
    
    .drag-drop-area {
        height: 150px;
        padding: 20px 15px;
    }
    
    .drag-drop-icon {
        font-size: 2rem;
        margin-bottom: 10px;
    }
    
    .drag-drop-text p {
        font-size: 0.9rem;
    }
    
    .drag-drop-info small {
        font-size: 0.7rem;
    }
    
    .remove-image-btn {
        width: 28px;
        height: 28px;
        font-size: 12px;
    }
    
    .validation-toast {
        min-width: 300px;
        max-width: 350px;
        right: 10px;
        left: 10px;
    }
}
</style>

@endsection

<script>
// Đảm bảo jQuery đã được load và thực thi sau khi DOM sẵn sàng
function initializeForm() {
    // Đảm bảo jQuery đã được load
    if (typeof jQuery === 'undefined') {
        console.error('jQuery is not loaded');
        return;
    }
    
    console.log('jQuery version:', jQuery.fn.jquery);

    // Khởi tạo Select2 cho tất cả select box
    $('.form-select').select2({
        theme: 'bootstrap-5',
        width: '100%',
        placeholder: function() {
            return $(this).find('option:first').text();
        },
        allowClear: true,
        language: {
            noResults: function() {
                return "Không tìm thấy kết quả";
            },
            searching: function() {
                return "Đang tìm kiếm...";
            }
        }
    });

    // Xử lý validation cho Select2
    $('.form-select').on('select2:select', function (e) {
        var data = e.params.data;
        $(this).removeClass('is-invalid');
        $(this).next('.invalid-feedback').hide();
    });

    // Xử lý khi form submit
    console.log('Binding form submit event...');
    console.log('Found forms:', $('form').length);
    console.log('Form elements:', $('form'));
    
    $('form').on('submit', function(e) {
        e.preventDefault(); // Luôn ngăn submit mặc định
        console.log('Form submit triggered');
        console.log('Form element:', this);
        console.log('Current time:', new Date().toISOString());
        
        // Kiểm tra validation trước khi submit
        console.log('About to call validateForm...');
        console.log('validateForm function exists:', typeof validateForm);
        
        if (typeof validateForm !== 'function') {
            console.error('validateForm is not a function!');
            alert('Lỗi: Hàm validation không tồn tại. Vui lòng tải lại trang.');
            return false;
        }
        
        let isValid;
        try {
            isValid = validateForm();
            console.log('validateForm returned:', isValid);
        } catch (error) {
            console.error('Error in validateForm:', error);
            alert('Lỗi trong quá trình validation: ' + error.message);
            return false;
        }
        
        if (!isValid) {
            console.log('Validation failed, preventing submit');
            return false;
        }
        
        console.log('Validation passed, submitting with axios');
        submitFormWithAxios(this);
    });
    
    // Ngăn chặn HTML5 validation cho các input file ẩn
    $('input[type="file"].d-none').on('invalid', function(e) {
        e.preventDefault();
        console.log('Prevented HTML5 validation for hidden file input:', this.id);
    });


    // Xử lý cho Select2 (vẫn dùng jQuery vì Select2 là jQuery plugin)
    $('#loai_hop_dong').on('select2:select', function (e) {
        console.log('Select2 select event triggered');
        const selectedValue = e.params.data.id;
        toggleBeneficiaryForm(selectedValue);
    });

    // Xử lý cho change event thông thường (Vanilla JavaScript)
    const loaiHopDongSelect = document.getElementById('loai_hop_dong');
    if (loaiHopDongSelect) {
        loaiHopDongSelect.addEventListener('change', function() {
            console.log('Change event triggered');
            const selectedValue = this.value;
            toggleBeneficiaryForm(selectedValue);
        });

        // Thêm event listener cho input event
        loaiHopDongSelect.addEventListener('input', function() {
            console.log('Input event triggered');
            const selectedValue = this.value;
            toggleBeneficiaryForm(selectedValue);
        });
    }

    // Khởi tạo trạng thái ban đầu
    const initialValue = loaiHopDongSelect ? loaiHopDongSelect.value : '';
    toggleBeneficiaryForm(initialValue);
    
    // Khởi tạo image preview cho tất cả file inputs
    initializeImagePreview();
}

// Hàm xử lý hiển thị/ẩn form người thừa hưởng (Vanilla JavaScript)
function toggleBeneficiaryForm(selectedValue) {
    console.log('Toggle beneficiary form with value:', selectedValue);
    const beneficiarySection = document.getElementById('beneficiary-section');
    const beneficiaryForm = document.getElementById('beneficiary-form');
    
    console.log('Beneficiary section found:', beneficiarySection ? 'Yes' : 'No');
    console.log('Beneficiary form found:', beneficiaryForm ? 'Yes' : 'No');
    
    if (selectedValue === 'cho_nguoi_khac') {
        console.log('Showing beneficiary form');
        if (beneficiarySection) {
            beneficiarySection.style.display = 'block';
            beneficiarySection.style.animation = 'fadeInUp 0.6s ease-out';
        }
        if (beneficiaryForm) {
            beneficiaryForm.style.display = 'block';
            beneficiaryForm.style.animation = 'fadeInUp 0.6s ease-out';
        }
        
        // Làm các trường người thừa hưởng bắt buộc
        const beneficiaryInputs = document.querySelectorAll('#beneficiary-form input, #beneficiary-form select');
        beneficiaryInputs.forEach(input => {
            input.required = true;
        });
        
        // Làm các trường hình ảnh người thừa hưởng bắt buộc (chỉ đánh dấu, không set required)
        const beneficiaryImageInputs = ['th_anh_mat_truoc', 'th_anh_mat_sau', 'th_anh_chan_dung'];
        beneficiaryImageInputs.forEach(inputId => {
            const input = document.getElementById(inputId);
            if (input) {
                // Không set required cho input file ẩn, chỉ dựa vào JavaScript validation
                input.setAttribute('data-required', 'true');
            }
        });
        
        // Hiển thị thông báo
        showAlert('📋 Form thông tin người thừa hưởng đã được hiển thị', 'info');
    } else {
        console.log('Hiding beneficiary form');
        if (beneficiarySection) {
            beneficiarySection.style.display = 'none';
        }
        if (beneficiaryForm) {
            beneficiaryForm.style.display = 'none';
        }
        
        // Bỏ bắt buộc các trường người thừa hưởng
        const beneficiaryInputs = document.querySelectorAll('#beneficiary-form input, #beneficiary-form select');
        beneficiaryInputs.forEach(input => {
            input.required = false;
            input.value = ''; // Xóa giá trị các trường người thừa hưởng
        });
        
        // Bỏ bắt buộc các trường hình ảnh người thừa hưởng
        const beneficiaryImageInputs = ['th_anh_mat_truoc', 'th_anh_mat_sau', 'th_anh_chan_dung'];
        beneficiaryImageInputs.forEach(inputId => {
            const input = document.getElementById(inputId);
            if (input) {
                input.setAttribute('data-required', 'false');
                input.value = ''; // Xóa file đã chọn
                // Xóa preview
                removeImage(inputId);
            }
        });
    }
}

// Hàm khởi tạo image preview và drag & drop
function initializeImagePreview() {
    // Danh sách tất cả file inputs cần preview
    const fileInputs = [
        'anh_mat_truoc', 'anh_mat_sau', 'anh_chan_dung',
        'th_anh_mat_truoc', 'th_anh_mat_sau', 'th_anh_chan_dung'
    ];
    
    fileInputs.forEach(inputId => {
        const fileInput = document.getElementById(inputId);
        const dragDropArea = document.getElementById('drag_drop_' + inputId);
        
        if (fileInput && dragDropArea) {
            // Event listener cho file input
            fileInput.addEventListener('change', function(e) {
                handleImagePreview(e, inputId);
                // Kiểm tra validation sau khi chọn ảnh
                checkImageRequired(inputId);
            });
            
            // Event listeners cho drag & drop
            setupDragAndDrop(dragDropArea, fileInput, inputId);
        }
    });
}

// Hàm thiết lập drag & drop
function setupDragAndDrop(dragDropArea, fileInput, inputId) {
    // Click để chọn file
    dragDropArea.addEventListener('click', function() {
        fileInput.click();
    });
    
    // Ngăn chặn default drag behaviors
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dragDropArea.addEventListener(eventName, preventDefaults, false);
        document.body.addEventListener(eventName, preventDefaults, false);
    });
    
    // Highlight drop area khi drag over
    ['dragenter', 'dragover'].forEach(eventName => {
        dragDropArea.addEventListener(eventName, highlight, false);
    });
    
    ['dragleave', 'drop'].forEach(eventName => {
        dragDropArea.addEventListener(eventName, unhighlight, false);
    });
    
    // Handle dropped files
    dragDropArea.addEventListener('drop', handleDrop, false);
    
    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }
    
    function highlight(e) {
        dragDropArea.classList.add('drag-over');
    }
    
    function unhighlight(e) {
        dragDropArea.classList.remove('drag-over');
    }
    
    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        
        if (files.length > 0) {
            // Chỉ lấy file đầu tiên
            const file = files[0];
            
            // Kiểm tra định dạng file
            if (file.type.startsWith('image/')) {
                // Tạo event giả để tương thích với hàm handleImagePreview
                const fakeEvent = {
                    target: {
                        files: [file]
                    }
                };
                
                // Set file vào input
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                fileInput.files = dataTransfer.files;
                
                // Xử lý preview
                handleImagePreview(fakeEvent, inputId);
            } else {
                showAlert('Vui lòng chọn file ảnh hợp lệ (JPG, PNG, GIF)', 'warning');
            }
        }
    }
}

// Hàm xử lý preview ảnh
function handleImagePreview(event, inputId) {
    const file = event.target.files[0];
    const dragDropArea = document.getElementById('drag_drop_' + inputId);
    const defaultContent = document.getElementById('content_' + inputId);
    const previewContent = document.getElementById('preview_content_' + inputId);
    const previewImg = document.getElementById('preview_img_' + inputId);
    const imageInfo = document.getElementById('info_' + inputId);
    
    if (file && file.type.startsWith('image/')) {
        // Kiểm tra kích thước file (tối đa 5MB)
        if (file.size > 5 * 1024 * 1024) {
            showAlert('Kích thước file quá lớn. Vui lòng chọn file nhỏ hơn 5MB.', 'error');
            event.target.value = '';
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            // Hiển thị ảnh preview
            previewImg.src = e.target.result;
            
            // Hiển thị thông tin file
            if (imageInfo) {
                const fileSize = formatFileSize(file.size);
                const fileName = file.name;
                imageInfo.innerHTML = `${fileName} (${fileSize})`;
            }
            
            // Chuyển đổi hiển thị
            if (defaultContent) defaultContent.style.display = 'none';
            if (previewContent) previewContent.style.display = 'block';
            
            // Thêm class để đánh dấu đã có ảnh
            if (dragDropArea) {
                dragDropArea.classList.add('has-preview');
            }
            
            // Dismiss toast nếu có
            dismissImageToast(inputId);
            
            // Xóa class lỗi và hiệu ứng
            if (dragDropArea) {
                dragDropArea.classList.remove('is-invalid');
                dragDropArea.style.animation = '';
            }
        };
        reader.readAsDataURL(file);
    } else {
        // Ẩn preview nếu không phải file ảnh
        if (defaultContent) defaultContent.style.display = 'flex';
        if (previewContent) previewContent.style.display = 'none';
        if (previewImg) previewImg.src = '';
        
        // Xóa class has-preview
        if (dragDropArea) {
            dragDropArea.classList.remove('has-preview');
        }
    }
}



// Hàm gửi form với axios
function submitFormWithAxios(form) {
    const formData = new FormData(form);
    const submitButton = form.querySelector('button[type="submit"]');
    const originalText = submitButton.innerHTML;
    
    // Hiển thị loading state
    submitButton.disabled = true;
    submitButton.innerHTML = '<i class="bi bi-hourglass-split"></i> Đang xử lý...';
    
    // Gửi request với axios
    axios.post('{{ route("user.register.store") }}', formData, {
        headers: {
            'Content-Type': 'multipart/form-data',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        onUploadProgress: function(progressEvent) {
            const percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
            submitButton.innerHTML = `<i class="bi bi-hourglass-split"></i> Đang tải lên ${percentCompleted}%`;
        }
    })
    .then(function(response) {
        console.log('Success:', response.data);
        
        // Hiển thị thông báo thành công
        showAlert('🎉 Đăng ký bảo hiểm thành công!', 'success');
        
        // Reset form sau khi thành công
        form.reset();
        
        // Reset preview ảnh
        document.querySelectorAll('.drag-drop-area').forEach(area => {
            area.classList.remove('has-preview', 'is-invalid');
            area.style.animation = '';
        });
        
        // Reset preview content
        document.querySelectorAll('.drag-drop-preview').forEach(preview => {
            preview.style.display = 'none';
        });
        
        document.querySelectorAll('.drag-drop-content').forEach(content => {
            content.style.display = 'flex';
        });
        
        // Ẩn form người thừa hưởng
        const beneficiarySection = document.getElementById('beneficiary-section');
        const beneficiaryForm = document.getElementById('beneficiary-form');
        if (beneficiarySection) beneficiarySection.style.display = 'none';
        if (beneficiaryForm) beneficiaryForm.style.display = 'none';
        
        // Scroll lên đầu trang
        window.scrollTo({ top: 0, behavior: 'smooth' });
        
        // Redirect sau 2 giây
        setTimeout(() => {
            window.location.href = response.data.redirect_url || '/';
        }, 2000);
    })
    .catch(function(error) {
        console.error('Error:', error);
        
        // Hiển thị lỗi
        if (error.response) {
            // Lỗi từ server
            const errors = error.response.data.errors || {};
            const errorMessages = [];
            
            Object.keys(errors).forEach(field => {
                errors[field].forEach(message => {
                    errorMessages.push(message);
                });
            });
            
            if (errorMessages.length > 0) {
                showValidationErrors(errorMessages);
            } else {
                showAlert(error.response.data.message || 'Có lỗi xảy ra khi đăng ký', 'error');
            }
        } else if (error.request) {
            // Lỗi network
            showAlert('Không thể kết nối đến server. Vui lòng kiểm tra kết nối mạng.', 'error');
        } else {
            // Lỗi khác
            showAlert('Có lỗi xảy ra: ' + error.message, 'error');
        }
    })
    .finally(function() {
        // Khôi phục button
        submitButton.disabled = false;
        submitButton.innerHTML = originalText;
    });
}

// Hàm validate form
function validateForm() {
    console.log('Validating form...');
    const errors = [];
    
    // Reset tất cả trạng thái lỗi trước khi validate
    document.querySelectorAll('.is-invalid').forEach(el => {
        el.classList.remove('is-invalid');
        el.style.animation = '';
    });
    
    // Danh sách các trường bắt buộc
    const requiredFields = [
        { id: 'cccd', name: 'Số CCCD/CMND' },
        { id: 'ma_hop_dong', name: 'Mã hợp đồng' },
        { id: 'ho_ten', name: 'Họ và tên' },
        { id: 'gioi_tinh', name: 'Giới tính' },
        { id: 'ngay_sinh', name: 'Ngày sinh' },
        { id: 'dia_chi', name: 'Địa chỉ' },
        { id: 'so_dien_thoai', name: 'Số điện thoại' },
        { id: 'so_tien_mua', name: 'Số tiền mua' },
        { id: 'so_tien_dong_hang_nam', name: 'Số tiền đóng hàng năm' },
        { id: 'thoi_gian_mua', name: 'Thời gian mua' },
        { id: 'ngay_cap_hop_dong', name: 'Ngày cấp hợp đồng' },
        { id: 'ngay_dao_han', name: 'Ngày đáo hạn' },
        { id: 'ngan_hang', name: 'Ngân hàng' },
        { id: 'so_tai_khoan', name: 'Số tài khoản' },
        { id: 'chu_tai_khoan', name: 'Chủ tài khoản' },
        { id: 'loai_hop_dong', name: 'Loại hợp đồng' }
    ];
    
    // Danh sách các trường hình ảnh bắt buộc
    const requiredImages = [
        { id: 'anh_mat_truoc', name: 'Ảnh mặt trước CCCD', icon: '🆔' },
        { id: 'anh_mat_sau', name: 'Ảnh mặt sau CCCD', icon: '🆔' },
        { id: 'anh_chan_dung', name: 'Ảnh chân dung', icon: '📷' }
    ];
    
    // Kiểm tra các trường bắt buộc
    requiredFields.forEach(field => {
        const element = document.getElementById(field.id);
        if (!element || !element.value.trim()) {
            errors.push(`Vui lòng nhập ${field.name.toLowerCase()}`);
            if (element) {
                element.classList.add('is-invalid');
            }
        } else {
            if (element) {
                element.classList.remove('is-invalid');
            }
        }
    });
    
    // Kiểm tra các trường hình ảnh bắt buộc
    requiredImages.forEach(image => {
        const element = document.getElementById(image.id);
        console.log(`Checking image ${image.id}:`, element, element ? element.files : 'no element');
        
        // Kiểm tra xem element có tồn tại và có file không
        const hasFile = element && element.files && element.files.length > 0;
        const isRequired = element && element.getAttribute('data-required') === 'true';
        
        console.log(`Image ${image.id} - hasFile: ${hasFile}, isRequired: ${isRequired}`);
        
        // Tất cả hình ảnh trong danh sách requiredImages đều bắt buộc
        if (!hasFile) {
            console.log(`Missing required image: ${image.id}`);
            errors.push(`${image.icon} Vui lòng chọn ${image.name.toLowerCase()}`);
            
            const dragDropArea = document.getElementById('drag_drop_' + image.id);
            if (dragDropArea) {
                dragDropArea.classList.add('is-invalid');
                // Thêm hiệu ứng nhấp nháy để thu hút sự chú ý
                dragDropArea.style.animation = 'pulse 1s infinite';
                setTimeout(() => {
                    dragDropArea.style.animation = '';
                }, 3000);
            }
        } else {
            console.log(`Image ${image.id} is valid`);
            const dragDropArea = document.getElementById('drag_drop_' + image.id);
            if (dragDropArea) {
                dragDropArea.classList.remove('is-invalid');
                dragDropArea.style.animation = '';
            }
        }
    });
    
    // Kiểm tra thông tin người thừa hưởng nếu loại hợp đồng là "cho_nguoi_khac"
    const loaiHopDong = document.getElementById('loai_hop_dong').value;
    if (loaiHopDong === 'cho_nguoi_khac') {
        const beneficiaryFields = [
            { id: 'th_cccd', name: 'Số CCCD/CMND người thừa hưởng' },
            { id: 'th_moi_quan_he', name: 'Mối quan hệ' },
            { id: 'th_ho_ten', name: 'Họ và tên người thừa hưởng' },
            { id: 'th_gioi_tinh', name: 'Giới tính người thừa hưởng' },
            { id: 'th_ngay_sinh', name: 'Ngày sinh người thừa hưởng' },
            { id: 'th_dia_chi', name: 'Địa chỉ người thừa hưởng' },
            { id: 'th_so_dien_thoai', name: 'Số điện thoại người thừa hưởng' },
            { id: 'th_ngan_hang', name: 'Ngân hàng người thừa hưởng' },
            { id: 'th_so_tai_khoan', name: 'Số tài khoản người thừa hưởng' },
            { id: 'th_chu_tai_khoan', name: 'Chủ tài khoản người thừa hưởng' }
        ];
        
        const beneficiaryImages = [
            { id: 'th_anh_mat_truoc', name: 'Ảnh mặt trước CCCD người thừa hưởng', icon: '🆔' },
            { id: 'th_anh_mat_sau', name: 'Ảnh mặt sau CCCD người thừa hưởng', icon: '🆔' },
            { id: 'th_anh_chan_dung', name: 'Ảnh chân dung người thừa hưởng', icon: '📷' }
        ];
        
        // Kiểm tra các trường thông tin người thừa hưởng
        beneficiaryFields.forEach(field => {
            const element = document.getElementById(field.id);
            if (!element || !element.value.trim()) {
                errors.push(`Vui lòng nhập ${field.name.toLowerCase()}`);
                if (element) {
                    element.classList.add('is-invalid');
                }
            } else {
                if (element) {
                    element.classList.remove('is-invalid');
                }
            }
        });
        
        // Kiểm tra các trường hình ảnh người thừa hưởng
        beneficiaryImages.forEach(image => {
            const element = document.getElementById(image.id);
            const hasFile = element && element.files && element.files.length > 0;
            
            console.log(`Checking beneficiary image ${image.id} - hasFile: ${hasFile}`);
            
            // Tất cả hình ảnh người thừa hưởng đều bắt buộc khi loại hợp đồng là "cho_nguoi_khac"
            if (!hasFile) {
                console.log(`Missing beneficiary image: ${image.id}`);
                errors.push(`${image.icon} Vui lòng chọn ${image.name.toLowerCase()}`);
                const dragDropArea = document.getElementById('drag_drop_' + image.id);
                if (dragDropArea) {
                    dragDropArea.classList.add('is-invalid');
                    // Thêm hiệu ứng nhấp nháy để thu hút sự chú ý
                    dragDropArea.style.animation = 'pulse 1s infinite';
                    setTimeout(() => {
                        dragDropArea.style.animation = '';
                    }, 3000);
                }
            } else {
                const dragDropArea = document.getElementById('drag_drop_' + image.id);
                if (dragDropArea) {
                    dragDropArea.classList.remove('is-invalid');
                    dragDropArea.style.animation = '';
                }
            }
        });
    }
    
    // Hiển thị lỗi nếu có
    if (errors.length > 0) {
        console.log('Found validation errors:', errors);
        console.log('Total errors:', errors.length);
        
        // Phân loại lỗi
        const imageErrors = errors.filter(error => error.includes('🆔') || error.includes('📷'));
        const fieldErrors = errors.filter(error => !error.includes('🆔') && !error.includes('📷'));
        
        console.log('Image errors:', imageErrors);
        console.log('Field errors:', fieldErrors);
        
        showValidationErrors(errors);
        
        // Hiển thị thông báo đặc biệt nếu có lỗi hình ảnh
        if (imageErrors.length > 0) {
            console.log('Showing image missing alert for:', imageErrors);
            setTimeout(() => {
                showImageMissingAlert(imageErrors);
            }, 2000);
        }
        
        return false;
    }
    
    console.log('Form validation passed');
    return true;
}

// Hàm hiển thị thông báo hình ảnh thiếu
function showImageMissingAlert(imageErrors) {
    console.log('showImageMissingAlert called with:', imageErrors);
    console.log('Image errors length:', imageErrors ? imageErrors.length : 'undefined');
    
    // Xóa các toast cũ
    const existingToasts = document.querySelectorAll('.image-missing-toast');
    console.log('Removing existing image toasts:', existingToasts.length);
    existingToasts.forEach(toast => toast.remove());
    
    // Tạo toast đặc biệt cho hình ảnh thiếu
    const toast = document.createElement('div');
    toast.className = 'image-missing-toast alert alert-warning alert-dismissible fade show position-fixed';
    toast.style.cssText = 'top: 80px; right: 20px; z-index: 10000; min-width: 400px; max-width: 500px; box-shadow: 0 4px 20px rgba(255, 193, 7, 0.4); border-left: 4px solid #ffc107;';
    
    let content = '<div class="d-flex align-items-start">';
    content += '<div class="me-3">';
    content += '<i class="bi bi-camera-fill text-warning" style="font-size: 1.5rem;"></i>';
    content += '</div>';
    content += '<div class="flex-grow-1">';
    content += '<h6 class="alert-heading mb-2 text-warning">📸 Hình ảnh bắt buộc còn thiếu</h6>';
    content += '<p class="mb-2 small">Để hoàn tất đăng ký bảo hiểm, bạn cần upload đầy đủ các hình ảnh sau:</p>';
    content += '<ul class="mb-2 ps-3 small">';
    imageErrors.forEach(error => {
        content += `<li class="mb-1">${error}</li>`;
    });
    content += '</ul>';
    content += '<div class="alert alert-info py-2 mb-0">';
    content += '<small><i class="bi bi-lightbulb me-1"></i> <strong>Hướng dẫn:</strong> Kéo thả ảnh vào vùng upload hoặc click để chọn file từ máy tính</small>';
    content += '</div>';
    content += '</div>';
    content += '</div>';
    
    toast.innerHTML = content + '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
    
    document.body.appendChild(toast);
    
    // Tự động ẩn sau 15 giây
    setTimeout(() => {
        if (toast.parentNode) {
            toast.parentNode.removeChild(toast);
        }
    }, 15000);
    
    // Scroll đến phần hình ảnh
    const imageSection = document.querySelector('#image-upload-section') || document.querySelector('.image-upload-section');
    if (imageSection) {
        imageSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

// Hàm hiển thị lỗi validation
function showValidationErrors(errors) {
    console.log('showValidationErrors called with:', errors);
    console.log('Errors length:', errors ? errors.length : 'undefined');
    
    // Xóa các toast cũ
    const existingToasts = document.querySelectorAll('.validation-toast');
    console.log('Removing existing toasts:', existingToasts.length);
    existingToasts.forEach(toast => toast.remove());
    
    // Kiểm tra nếu không có lỗi
    if (!errors || errors.length === 0) {
        console.log('No errors to show');
        return;
    }
    
    // Phân loại lỗi
    const imageErrors = errors.filter(error => error.includes('🆔') || error.includes('📷'));
    const fieldErrors = errors.filter(error => !error.includes('🆔') && !error.includes('📷'));
    
    // Hiển thị toast với danh sách lỗi
    const toast = document.createElement('div');
    toast.className = 'validation-toast alert alert-danger alert-dismissible fade show position-fixed';
    toast.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 450px; max-width: 550px; box-shadow: 0 4px 12px rgba(220, 53, 69, 0.3);';
    
    let errorList = '<div class="d-flex align-items-center mb-3">';
    errorList += '<i class="bi bi-exclamation-triangle-fill me-2" style="font-size: 1.2rem;"></i>';
    errorList += '<strong class="mb-0">Vui lòng kiểm tra lại các thông tin sau:</strong>';
    errorList += '</div>';
    
    // Hiển thị lỗi hình ảnh nếu có
    if (imageErrors.length > 0) {
        errorList += '<div class="mb-3">';
        errorList += '<h6 class="text-danger mb-2"><i class="bi bi-camera me-1"></i> Hình ảnh bắt buộc còn thiếu:</h6>';
        errorList += '<div class="alert alert-warning py-2 mb-2">';
        errorList += '<small class="text-muted"><i class="bi bi-info-circle me-1"></i> Vui lòng upload đầy đủ các hình ảnh sau để hoàn tất đăng ký:</small>';
        errorList += '</div>';
        errorList += '<ul class="mb-0 ps-3">';
        imageErrors.forEach(error => {
            errorList += `<li class="mb-1 fw-medium">${error}</li>`;
        });
        errorList += '</ul>';
        errorList += '<div class="mt-2">';
        errorList += '<small class="text-info"><i class="bi bi-lightbulb me-1"></i> <strong>Gợi ý:</strong> Bạn có thể kéo thả ảnh vào vùng upload hoặc click để chọn file từ máy tính</small>';
        errorList += '</div>';
        errorList += '</div>';
    }
    
    // Hiển thị lỗi trường thông tin nếu có
    if (fieldErrors.length > 0) {
        errorList += '<div>';
        errorList += '<h6 class="text-danger mb-2"><i class="bi bi-info-circle me-1"></i> Thông tin bắt buộc:</h6>';
        errorList += '<ul class="mb-0 ps-3">';
        fieldErrors.forEach(error => {
            errorList += `<li class="mb-1">${error}</li>`;
        });
        errorList += '</ul>';
        errorList += '</div>';
    }
    
    toast.innerHTML = `
        ${errorList}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    document.body.appendChild(toast);
    
    // Tự động ẩn sau 12 giây (tăng thời gian để người dùng đọc được)
    setTimeout(() => {
        if (toast.parentNode) {
            toast.parentNode.removeChild(toast);
        }
    }, 12000);
    
    // Scroll đến đầu trang để người dùng thấy lỗi
    window.scrollTo({ top: 0, behavior: 'smooth' });
    
    // Hiển thị thông báo bổ sung nếu có lỗi hình ảnh
    if (imageErrors.length > 0) {
        // Cập nhật trạng thái visual cho các vùng upload thiếu hình ảnh
        updateImageUploadStatus(imageErrors);
        
        setTimeout(() => {
            showAlert('💡 Mẹo: Bạn có thể kéo thả ảnh vào vùng upload hoặc click để chọn file từ máy tính', 'info');
        }, 2000);
    }
}

// Hàm cập nhật trạng thái visual cho các vùng upload hình ảnh
function updateImageUploadStatus(imageErrors) {
    console.log('Updating image upload status for errors:', imageErrors);
    
    // Mapping từ tên lỗi đến ID của input
    const errorToInputId = {
        '🆔 Vui lòng chọn ảnh mặt trước cccd': 'anh_mat_truoc',
        '🆔 Vui lòng chọn ảnh mặt sau cccd': 'anh_mat_sau', 
        '📷 Vui lòng chọn ảnh chân dung': 'anh_chan_dung',
        '🆔 Vui lòng chọn ảnh mặt trước cccd người thừa hưởng': 'th_anh_mat_truoc',
        '🆔 Vui lòng chọn ảnh mặt sau cccd người thừa hưởng': 'th_anh_mat_sau',
        '📷 Vui lòng chọn ảnh chân dung người thừa hưởng': 'th_anh_chan_dung'
    };
    
    // Reset tất cả trạng thái lỗi trước
    document.querySelectorAll('.drag-drop-area').forEach(area => {
        area.classList.remove('is-invalid', 'missing-image');
        area.style.animation = '';
        area.style.borderColor = '';
    });
    
    // Cập nhật trạng thái cho các hình ảnh thiếu
    imageErrors.forEach(error => {
        const inputId = errorToInputId[error];
        if (inputId) {
            const dragDropArea = document.getElementById('drag_drop_' + inputId);
            if (dragDropArea) {
                // Thêm class và style để làm nổi bật
                dragDropArea.classList.add('is-invalid', 'missing-image');
                dragDropArea.style.borderColor = '#dc3545';
                dragDropArea.style.borderWidth = '2px';
                dragDropArea.style.borderStyle = 'dashed';
                
                // Thêm hiệu ứng nhấp nháy
                dragDropArea.style.animation = 'pulse 1s infinite, shake 0.5s ease-in-out';
                
                // Thêm text thông báo
                let statusText = dragDropArea.querySelector('.upload-status-text');
                if (!statusText) {
                    statusText = document.createElement('div');
                    statusText.className = 'upload-status-text text-danger small mt-2';
                    statusText.innerHTML = '<i class="bi bi-exclamation-triangle me-1"></i>Hình ảnh bắt buộc';
                    dragDropArea.appendChild(statusText);
                } else {
                    statusText.innerHTML = '<i class="bi bi-exclamation-triangle me-1"></i>Hình ảnh bắt buộc';
                    statusText.className = 'upload-status-text text-danger small mt-2';
                }
                
                // Tự động ẩn hiệu ứng sau 5 giây
                setTimeout(() => {
                    dragDropArea.style.animation = '';
                }, 5000);
            }
        }
    });
}

// Hàm kiểm tra trường ảnh bắt buộc
function checkImageRequired(inputId) {
    const fileInput = document.getElementById(inputId);
    const dragDropArea = document.getElementById('drag_drop_' + inputId);
    
    if (!fileInput || !dragDropArea) return;
    
    // Kiểm tra xem trường này có bắt buộc không
    const isRequired = fileInput.getAttribute('data-required') === 'true';
    const hasFile = fileInput.files && fileInput.files.length > 0;
    
    if (isRequired && !hasFile) {
        // Thêm class lỗi và hiệu ứng
        dragDropArea.classList.add('is-invalid');
        dragDropArea.style.animation = 'pulse 1s infinite';
        
        // Hiển thị thông báo toast
        const imageNames = {
            'anh_mat_truoc': 'Ảnh mặt trước CCCD',
            'anh_mat_sau': 'Ảnh mặt sau CCCD', 
            'anh_chan_dung': 'Ảnh chân dung',
            'th_anh_mat_truoc': 'Ảnh mặt trước CCCD người thừa hưởng',
            'th_anh_mat_sau': 'Ảnh mặt sau CCCD người thừa hưởng',
            'th_anh_chan_dung': 'Ảnh chân dung người thừa hưởng'
        };
        
        const imageName = imageNames[inputId] || 'Hình ảnh';
        showImageRequiredToast(imageName, inputId);
    } else {
        // Xóa class lỗi và hiệu ứng
        dragDropArea.classList.remove('is-invalid');
        dragDropArea.style.animation = '';
    }
}

// Hàm xóa ảnh preview
function removeImage(inputId) {
    const fileInput = document.getElementById(inputId);
    const dragDropArea = document.getElementById('drag_drop_' + inputId);
    const defaultContent = document.getElementById('content_' + inputId);
    const previewContent = document.getElementById('preview_content_' + inputId);
    const previewImg = document.getElementById('preview_img_' + inputId);
    const imageInfo = document.getElementById('info_' + inputId);
    
    // Xóa file đã chọn
    fileInput.value = '';
    
    // Chuyển về trạng thái mặc định
    if (defaultContent) defaultContent.style.display = 'flex';
    if (previewContent) previewContent.style.display = 'none';
    if (previewImg) previewImg.src = '';
    if (imageInfo) imageInfo.innerHTML = '';
    
    // Xóa class has-preview
    if (dragDropArea) {
        dragDropArea.classList.remove('has-preview');
    }
    
    // Dismiss toast nếu có
    dismissImageToast(inputId);
    
    // Kiểm tra và hiển thị cảnh báo nếu trường này bắt buộc
    checkImageRequired(inputId);
}

// Hàm hiển thị thông báo
function showAlert(message, type = 'info') {
    // Tạo toast notification
    const toast = document.createElement('div');
    toast.className = `alert alert-${type === 'error' ? 'danger' : type} alert-dismissible fade show position-fixed`;
    toast.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
    toast.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    document.body.appendChild(toast);
    
    // Tự động ẩn sau 5 giây
    setTimeout(() => {
        if (toast.parentNode) {
            toast.parentNode.removeChild(toast);
        }
    }, 5000);
}

// Hàm hiển thị toast cho hình ảnh bắt buộc
function showImageRequiredToast(imageName, inputId) {
    // Xóa toast cũ nếu có
    const existingToast = document.getElementById('image-required-toast-' + inputId);
    if (existingToast) {
        existingToast.remove();
    }
    
    // Tạo toast notification đặc biệt cho hình ảnh
    const toast = document.createElement('div');
    toast.id = 'image-required-toast-' + inputId;
    toast.className = 'alert alert-warning alert-dismissible fade show position-fixed';
    toast.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 350px; max-width: 400px; box-shadow: 0 4px 12px rgba(255, 193, 7, 0.3);';
    
    // Tạo nội dung toast với icon và hướng dẫn
    const icon = inputId.includes('th_') ? '👥' : '👤';
    const category = inputId.includes('th_') ? 'người thừa hưởng' : 'người mua';
    
    toast.innerHTML = `
        <div class="d-flex align-items-start">
            <div class="me-3">
                <i class="bi bi-camera-fill text-warning" style="font-size: 1.5rem;"></i>
            </div>
            <div class="flex-grow-1">
                <h6 class="alert-heading mb-2">
                    ${icon} ${imageName} bắt buộc
                </h6>
                <p class="mb-2 small">
                    Vui lòng chọn ${imageName.toLowerCase()} cho ${category} để hoàn tất đăng ký.
                </p>
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-sm btn-outline-warning" onclick="focusImageInput('${inputId}')">
                        <i class="bi bi-camera me-1"></i> Chọn ảnh
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="dismissImageToast('${inputId}')">
                        <i class="bi bi-x me-1"></i> Bỏ qua
                    </button>
                </div>
            </div>
            <button type="button" class="btn-close" onclick="dismissImageToast('${inputId}')"></button>
        </div>
    `;
    
    document.body.appendChild(toast);
    
    // Tự động ẩn sau 8 giây (tăng thời gian để người dùng đọc)
    setTimeout(() => {
        if (toast.parentNode) {
            toast.parentNode.removeChild(toast);
        }
    }, 8000);
    
    // Scroll đến vùng upload tương ứng
    setTimeout(() => {
        const dragDropArea = document.getElementById('drag_drop_' + inputId);
        if (dragDropArea) {
            dragDropArea.scrollIntoView({ 
                behavior: 'smooth', 
                block: 'center' 
            });
        }
    }, 500);
}

// Hàm focus vào input file để chọn ảnh
function focusImageInput(inputId) {
    const fileInput = document.getElementById(inputId);
    const dragDropArea = document.getElementById('drag_drop_' + inputId);
    
    if (fileInput && dragDropArea) {
        // Click vào drag drop area để mở file dialog
        dragDropArea.click();
        
        // Dismiss toast sau khi click
        dismissImageToast(inputId);
    }
}

// Hàm dismiss toast hình ảnh
function dismissImageToast(inputId) {
    const toast = document.getElementById('image-required-toast-' + inputId);
    if (toast) {
        toast.remove();
    }
}

// Hàm format file size
function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

// Hàm điền dữ liệu mẫu
function fillSampleData() {
    console.log('Starting to fill sample data...');
    
    // Hiển thị thông báo đang xử lý
    showAlert('🔄 Đang điền dữ liệu mẫu...', 'info');
    
    // Mảng dữ liệu mẫu
    const sampleData = {
        // Tên người Việt Nam
        names: [
            'Nguyễn Văn An', 'Trần Thị Bình', 'Lê Hoàng Cường', 'Phạm Thị Dung', 'Hoàng Văn Em',
            'Vũ Thị Phương', 'Đặng Văn Giang', 'Bùi Thị Hoa', 'Đinh Văn Inh', 'Ngô Thị Kim',
            'Lý Văn Long', 'Mai Thị Lan', 'Phan Văn Minh', 'Võ Thị Nga', 'Tôn Văn Oanh',
            'Đỗ Thị Phương', 'Hồ Văn Quang', 'Lưu Thị Rinh', 'Chu Văn Sơn', 'Tạ Thị Tuyết'
        ],
        
        // Địa chỉ Việt Nam
        addresses: [
            '123 Nguyễn Huệ, Quận 1, TP.HCM', '456 Lê Lợi, Quận 3, TP.HCM', '789 Điện Biên Phủ, Quận Bình Thạnh, TP.HCM',
            '321 Trần Hưng Đạo, Quận 5, TP.HCM', '654 Cách Mạng Tháng 8, Quận 10, TP.HCM',
            '987 Nguyễn Trãi, Quận Thanh Xuân, Hà Nội', '147 Láng Hạ, Quận Đống Đa, Hà Nội',
            '258 Kim Mã, Quận Ba Đình, Hà Nội', '369 Giải Phóng, Quận Hai Bà Trưng, Hà Nội',
            '741 Lê Duẩn, Quận Hải Châu, Đà Nẵng', '852 Nguyễn Văn Linh, Quận Thanh Khê, Đà Nẵng'
        ],
        
        // Ngân hàng Việt Nam
        banks: [
            'Vietcombank', 'VietinBank', 'BIDV', 'Agribank', 'Techcombank', 'ACB', 'Sacombank',
            'VPBank', 'TPBank', 'HDBank', 'MSB', 'VIB', 'Eximbank', 'SeABank', 'LienVietPostBank'
        ],
        
        // Mối quan hệ
        relationships: ['Vợ/Chồng', 'Con', 'Cha/Mẹ', 'Anh/Chị/Em', 'Khác'],
        
        // Loại hợp đồng
        contractTypes: ['cho_ban_than', 'cho_nguoi_khac']
    };
    
    // Hàm tạo số ngẫu nhiên
    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
    
    // Hàm tạo CCCD ngẫu nhiên
    function generateCCCD() {
        return Math.floor(Math.random() * 900000000) + 100000000;
    }
    
    // Hàm tạo số điện thoại ngẫu nhiên
    function generatePhone() {
        const prefixes = ['032', '033', '034', '035', '036', '037', '038', '039', '070', '076', '077', '078', '079', '081', '082', '083', '084', '085', '086', '088', '089', '090', '091', '092', '093', '094', '096', '097', '098'];
        const prefix = prefixes[getRandomInt(0, prefixes.length - 1)];
        const number = Math.floor(Math.random() * 10000000).toString().padStart(7, '0');
        return prefix + number;
    }
    
    // Hàm tạo số tài khoản ngẫu nhiên
    function generateAccountNumber() {
        return Math.floor(Math.random() * 9000000000000) + 1000000000000;
    }
    
    // Hàm tạo ngày ngẫu nhiên
    function generateRandomDate() {
        const start = new Date(1970, 0, 1);
        const end = new Date(2005, 11, 31);
        const randomDate = new Date(start.getTime() + Math.random() * (end.getTime() - start.getTime()));
        const day = String(randomDate.getDate()).padStart(2, '0');
        const month = String(randomDate.getMonth() + 1).padStart(2, '0');
        const year = randomDate.getFullYear();
        return `${day}/${month}/${year}`;
    }
    
    // Hàm tạo ngày trong tương lai (cho ngày cấp hợp đồng và đáo hạn)
    function generateFutureDate() {
        const start = new Date();
        const end = new Date(2030, 11, 31);
        const randomDate = new Date(start.getTime() + Math.random() * (end.getTime() - start.getTime()));
        const day = String(randomDate.getDate()).padStart(2, '0');
        const month = String(randomDate.getMonth() + 1).padStart(2, '0');
        const year = randomDate.getFullYear();
        return `${day}/${month}/${year}`;
    }
    
    // Hàm tạo số tiền ngẫu nhiên
    function generateAmount() {
        const amounts = [1000000, 2000000, 5000000, 10000000, 20000000, 50000000, 100000000, 200000000, 500000000];
        return amounts[getRandomInt(0, amounts.length - 1)];
    }
    
    // Hàm tạo thời gian mua ngẫu nhiên
    function generateContractDuration() {
        const durations = [5, 10, 15, 20, 25, 30];
        return durations[getRandomInt(0, durations.length - 1)];
    }
    
    // Hàm tạo mã hợp đồng ngẫu nhiên
    function generateContractCode() {
        const prefix = 'HD';
        const number = Math.floor(Math.random() * 900000) + 100000;
        return prefix + number;
    }
    
    // Điền dữ liệu cho các trường chính
    document.getElementById('cccd').value = generateCCCD();
    document.getElementById('ma_hop_dong').value = generateContractCode();
    document.getElementById('ho_ten').value = sampleData.names[getRandomInt(0, sampleData.names.length - 1)];
    document.getElementById('gioi_tinh').value = Math.random() < 0.5 ? 'Nam' : 'Nữ';
    document.getElementById('ngay_sinh').value = generateRandomDate();
    document.getElementById('dia_chi').value = sampleData.addresses[getRandomInt(0, sampleData.addresses.length - 1)];
    document.getElementById('so_dien_thoai').value = generatePhone();
    document.getElementById('so_tien_mua').value = generateAmount();
    document.getElementById('so_tien_dong_hang_nam').value = Math.floor(generateAmount() / getRandomInt(5, 20));
    document.getElementById('thoi_gian_mua').value = generateContractDuration();
    document.getElementById('ngay_cap_hop_dong').value = generateFutureDate();
    document.getElementById('ngay_dao_han').value = generateFutureDate();
    document.getElementById('ngan_hang').value = sampleData.banks[getRandomInt(0, sampleData.banks.length - 1)];
    document.getElementById('so_tai_khoan').value = generateAccountNumber();
    document.getElementById('chu_tai_khoan').value = sampleData.names[getRandomInt(0, sampleData.names.length - 1)];
    
    // Luôn chọn loại hợp đồng "Cho người khác"
    const contractType = 'cho_nguoi_khac';
    
    // Set giá trị cho select box
    document.getElementById('loai_hop_dong').value = contractType;
    
    // Trigger change event cho Select2
    $('#loai_hop_dong').val(contractType).trigger('change');
    
    // Đảm bảo form người thừa hưởng được hiển thị ngay lập tức
    toggleBeneficiaryForm(contractType);
    
    // Đảm bảo form người thừa hưởng được hiển thị sau khi Select2 cập nhật
    setTimeout(() => {
        toggleBeneficiaryForm(contractType);
    }, 200);
    
    // Điền dữ liệu người thừa hưởng sau khi form đã được hiển thị
    setTimeout(() => {
        // Điền dữ liệu người thừa hưởng
        document.getElementById('th_cccd').value = generateCCCD();
        document.getElementById('th_moi_quan_he').value = sampleData.relationships[getRandomInt(0, sampleData.relationships.length - 1)];
        document.getElementById('th_ho_ten').value = sampleData.names[getRandomInt(0, sampleData.names.length - 1)];
        document.getElementById('th_gioi_tinh').value = Math.random() < 0.5 ? 'Nam' : 'Nữ';
        document.getElementById('th_ngay_sinh').value = generateRandomDate();
        document.getElementById('th_dia_chi').value = sampleData.addresses[getRandomInt(0, sampleData.addresses.length - 1)];
        document.getElementById('th_so_dien_thoai').value = generatePhone();
        document.getElementById('th_ngan_hang').value = sampleData.banks[getRandomInt(0, sampleData.banks.length - 1)];
        document.getElementById('th_so_tai_khoan').value = generateAccountNumber();
        document.getElementById('th_chu_tai_khoan').value = sampleData.names[getRandomInt(0, sampleData.names.length - 1)];
        
        // Trigger change cho Select2 của người thừa hưởng
        $('#th_moi_quan_he').val(document.getElementById('th_moi_quan_he').value).trigger('change');
        $('#th_gioi_tinh').val(document.getElementById('th_gioi_tinh').value).trigger('change');
        
        // Hiển thị thông báo thành công
        showAlert('✅ Đã điền dữ liệu mẫu cho hợp đồng "Cho người khác" thành công! Form người thừa hưởng đã được hiển thị và điền đầy đủ thông tin.', 'success');
        
        // Scroll đến form người thừa hưởng để người dùng thấy
        setTimeout(() => {
            const beneficiarySection = document.getElementById('beneficiary-section');
            if (beneficiarySection) {
                beneficiarySection.scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'start' 
                });
            }
        }, 500);
    }, 300);
}

// Thực thi khi DOM sẵn sàng
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeForm);
} else {
    initializeForm();
}

// Xử lý hiển thị lỗi validation từ server
document.addEventListener('DOMContentLoaded', function() {
    // Kiểm tra nếu có lỗi validation từ server
    @if(session('validation_errors'))
        const serverErrors = @json(session('validation_errors'));
        if (serverErrors && serverErrors.length > 0) {
            showValidationErrors(serverErrors);
        }
    @endif
    
    // Kiểm tra nếu có thông báo lỗi chung
    @if(session('error'))
        showAlert('{{ session('error') }}', 'error');
    @endif
    
    // Kiểm tra nếu có thông báo thành công
    @if(session('success'))
        showAlert('{{ session('success') }}', 'success');
    @endif
});
</script>
