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
                        <div _ngcontent-c3="" class="card-body p-4">

                            @if($hopDong)
                                <!-- Quốc hiệu và tiêu ngữ -->
                                <div class="text-center mb-4">
                                    <div class="quoc-hieu">
                                        <h2 class="fw-bold text-dark mb-2">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h2>
                                        <h4 class="fw-bold text-dark mb-3">Độc lập - Tự do - Hạnh phúc</h4>
                                    </div>
                                    <i class="text-dark d-block text-end">Ngày {{ date('d', strtotime($hopDong->ngay_cap_hop_dong)) }} tháng {{ date('m', strtotime($hopDong->ngay_cap_hop_dong)) }} năm {{ date('Y', strtotime($hopDong->ngay_cap_hop_dong)) }}</i>
                                    <h3 class="fw-bold text-dark mb-4 mt-4">XÁC NHẬN RÚT TIỀN</h3>
                                    
                                </div>

                                <!-- Thông tin bên A (Công ty bảo hiểm) -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="card border">
                                            <div class="card-header bg-light border-bottom">
                                                <h5 class="card-title mb-0 text-dark">
                                                    BÊN A: CÔNG TY BẢO HIỂM
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                @if($congTy)
                                                <div class="row">
                                                    <!-- Logo công ty bên trái -->
                                                    <div class="col-md-3">
                                                        <div class="text-center">
                                                            @if($congTy->logo)
                                                                <img src="{{ asset($congTy->logo) }}" alt="Logo {{ $congTy->ten }}" class="img-fluid border rounded company-logo">
                                                            @else
                                                                <div class="border rounded d-flex align-items-center justify-content-center company-logo-placeholder">
                                                                    <span class="text-muted">Không có logo</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Thông tin công ty bên phải -->
                                                    <div class="col-md-9">
                                                        <div class="company-info-text">
                                                            <p class="mb-1">
                                                                <span class="fw-bold">Tên công ty:</span> {{ $congTy->ten }}
                                                            </p>
                                                            <p class="mb-1">
                                                                <span class="fw-bold">Mã số thuế:</span> {{ $congTy->ma_so_thue }}
                                                            </p>
                                                            <p class="mb-1">
                                                                <span class="fw-bold">Địa chỉ trụ sở chính:</span> {{ $congTy->dia_chi }}
                                                            </p>
                                                            <p class="mb-1">
                                                                <span class="fw-bold">Số điện thoại:</span> {{ $congTy->so_dien_thoai ?? 'N/A' }}
                                                            </p>
                                                            <p class="mb-0">
                                                                <span class="fw-bold">Website:</span> {{ $congTy->website ?? 'N/A' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="alert alert-warning">
                                                    <i class="material-icons me-2">warning</i>
                                                    Không có thông tin công ty bảo hiểm
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Thông tin bên B (Người được bảo hiểm) -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="card border">
                                            <div class="card-header bg-light border-bottom">
                                                <h5 class="card-title mb-0 text-dark">
                                                    BÊN B: NGƯỜI ĐƯỢC BẢO HIỂM
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <!-- Bootstrap Grid System - Layout ảnh trái, thông tin phải -->
                                                <div class="row g-4 align-items-start">
                                                    <!-- Ảnh chân dung người được bảo hiểm bên trái -->
                                                    <div class="col-12 col-sm-5 col-md-4 col-lg-3">
                                                        <div class="text-center">
                                                            @if($hopDong->anh_chan_dung)
                                                                <img src="{{ asset($hopDong->anh_chan_dung) }}" alt="Ảnh chân dung {{ $hopDong->ho_ten }}" class="img-fluid border rounded user-photo">
                                                            @else
                                                                <div class="border rounded d-flex align-items-center justify-content-center user-photo-placeholder">
                                                                    <span class="text-muted">Không có ảnh</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Thông tin người được bảo hiểm bên phải -->
                                                    <div class="col-12 col-sm-7 col-md-8 col-lg-9">
                                                        <div class="user-info-text">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-6">
                                                                    <p class="mb-1">
                                                                        <span class="fw-bold">Họ và tên:</span> {{ $hopDong->ho_ten }}
                                                                    </p>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <p class="mb-1">
                                                                        <span class="fw-bold">Giới tính:</span> {{ $hopDong->gioi_tinh }}
                                                                    </p>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <p class="mb-1">
                                                                        <span class="fw-bold">Ngày sinh:</span> {{ date('d/m/Y', strtotime($hopDong->ngay_sinh)) }}
                                                                    </p>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <p class="mb-1">
                                                                        <span class="fw-bold">Số CCCD:</span> {{ $hopDong->cccd }}
                                                                    </p>
                                                                </div>
                                                                <div class="col-12">
                                                                    <p class="mb-1">
                                                                        <span class="fw-bold">Địa chỉ thường trú:</span> {{ $hopDong->dia_chi }}
                                                                    </p>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <p class="mb-0">
                                                                        <span class="fw-bold">Số điện thoại:</span> {{ $hopDong->so_dien_thoai }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Thông tin người thừa hưởng (nếu có) -->
                                @if($hopDong->loai_hop_dong == 'cho_nguoi_khac' && $hopDong->th_ho_ten)
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="card border">
                                            <div class="card-header bg-light border-bottom">
                                                <h5 class="card-title mb-0 text-dark">
                                                    THÔNG TIN NGƯỜI THỪA HƯỞNG
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <!-- Layout ảnh trái, thông tin phải cho người thừa hưởng -->
                                                <div class="row g-4 align-items-start">
                                                    <!-- Ảnh chân dung người thừa hưởng bên trái -->
                                                    <div class="col-12 col-sm-5 col-md-3">
                                                        <div class="text-center">
                                                            @if($hopDong->th_anh_chan_dung)
                                                                <img src="{{ asset($hopDong->th_anh_chan_dung) }}" alt="Ảnh chân dung {{ $hopDong->th_ho_ten }}" class="img-fluid border rounded user-photo">
                                                            @else
                                                                <div class="border rounded d-flex align-items-center justify-content-center user-photo-placeholder">
                                                                    <span class="text-muted">Không có ảnh</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Thông tin người thừa hưởng bên phải -->
                                                    <div class="col-12 col-sm-7 col-md-9">
                                                        <div class="beneficiary-info-text">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-6">
                                                                    <p class="mb-1">
                                                                        <span class="fw-bold">Họ và tên:</span> {{ $hopDong->th_ho_ten }}
                                                                    </p>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <p class="mb-1">
                                                                        <span class="fw-bold">Mối quan hệ:</span> {{ $hopDong->th_moi_quan_he }}
                                                                    </p>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <p class="mb-1">
                                                                        <span class="fw-bold">Giới tính:</span> {{ $hopDong->th_gioi_tinh }}
                                                                    </p>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <p class="mb-1">
                                                                        <span class="fw-bold">Ngày sinh:</span> {{ date('d/m/Y', strtotime($hopDong->th_ngay_sinh)) }}
                                                                    </p>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <p class="mb-1">
                                                                        <span class="fw-bold">Số CCCD:</span> {{ $hopDong->th_cccd }}
                                                                    </p>
                                                                </div>
                                                                <div class="col-12 col-sm-6">
                                                                    <p class="mb-1">
                                                                        <span class="fw-bold">Số điện thoại:</span> {{ $hopDong->th_so_dien_thoai }}
                                                                    </p>
                                                                </div>
                                                                <div class="col-12">
                                                                    <p class="mb-0">
                                                                        <span class="fw-bold">Địa chỉ:</span> {{ $hopDong->th_dia_chi }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                                <!-- Thông tin tài chính và điều khoản -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="card border">
                                            <div class="card-header bg-light border-bottom">
                                                <h5 class="card-title mb-0 text-dark">
                                                    THÔNG TIN TÀI CHÍNH VÀ ĐIỀU KHOẢN
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="financial-info-text">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1">
                                                                <span class="fw-bold">Số tiền bảo hiểm:</span> {{ number_format($hopDong->so_tien_mua, 0, ',', '.') }} VNĐ
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1">
                                                                <span class="fw-bold">Phí bảo hiểm hàng năm:</span> {{ number_format($hopDong->so_tien_dong_hang_nam, 0, ',', '.') }} VNĐ
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1">
                                                                <span class="fw-bold">Thời hạn hợp đồng:</span> {{ $hopDong->thoi_gian_mua }} năm
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1">
                                                                <span class="fw-bold">Ngày hiệu lực:</span> {{ date('d/m/Y', strtotime($hopDong->ngay_cap_hop_dong)) }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1">
                                                                <span class="fw-bold">Ngày đáo hạn:</span> {{ date('d/m/Y', strtotime($hopDong->ngay_dao_han)) }}
                                                            </p>
                                                        </div>
                                                        @if($hopDong->tien_lai)
                                                        <div class="col-md-6">
                                                            <p class="mb-1">
                                                                <span class="fw-bold">Tiền lãi tích lũy:</span> {{ number_format($hopDong->tien_lai, 0, ',', '.') }} VNĐ
                                                            </p>
                                                        </div>
                                                        @endif
                                                        <div class="col-md-6">
                                                            <p class="mb-0">
                                                                <span class="fw-bold">Tổng số dư hiện tại:</span> 
                                                                @php
                                                                    $soTienMua = $hopDong->so_tien_mua ? (int)preg_replace('/\D/', '', (string)$hopDong->so_tien_mua) : 0;
                                                                    $thoiGianMua = $hopDong->thoi_gian_mua ? (int)$hopDong->thoi_gian_mua : 0;
                                                                    $tongSoDu = $soTienMua * $thoiGianMua;
                                                                @endphp
                                                                {{ number_format($tongSoDu, 0, ',', '.') }} VNĐ
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Thông tin ngân hàng -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="card border">
                                            <div class="card-header bg-light border-bottom">
                                                <h5 class="card-title mb-0 text-dark">
                                                    THÔNG TIN NGÂN HÀNG
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="bank-info-text">
                                                    <p class="mb-1">
                                                        <span class="fw-bold">Ngân hàng:</span> {{ $hopDong->ngan_hang }}
                                                    </p>
                                                    <p class="mb-1">
                                                        <span class="fw-bold">Số tài khoản:</span> {{ $hopDong->so_tai_khoan }}
                                                    </p>
                                                    <p class="mb-0">
                                                        <span class="fw-bold">Chủ tài khoản:</span> {{ $hopDong->chu_tai_khoan }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Cam kết khi rút tiền trước hạn -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="card border">
                                            <div class="card-header bg-light border-bottom">
                                                <h5 class="card-title mb-0 text-dark">
                                                    CAM KẾT KHI RÚT TIỀN TRƯỚC HẠN
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="financial-info-text">
                                                    <ol class="mb-0" style="padding-left: 1.1rem;">
                                                        <li class="mb-2">Tôi hiểu và chấp nhận rằng việc rút tiền trước hạn có thể làm giảm hoặc làm mất một phần/toàn bộ quyền lợi bảo hiểm theo hợp đồng, bao gồm nhưng không giới hạn ở quyền lợi bảo vệ và quyền lợi tích lũy.</li>
                                                        <li class="mb-2">Tôi đồng ý chịu mọi khoản phí/phạt rút trước hạn (nếu có) theo biểu phí, quy định nội bộ và thông báo của công ty tại thời điểm tiếp nhận và xử lý yêu cầu.</li>
                                                        <li class="mb-2">Tôi xác nhận lãi tích lũy và/hoặc các khoản thưởng (nếu có) sẽ được tính toán, khấu trừ và chi trả theo quy tắc, điều khoản sản phẩm và có thể thấp hơn so với việc duy trì hợp đồng đến ngày đáo hạn.</li>
                                                        <li class="mb-2">Tôi cung cấp đầy đủ, chính xác thông tin nhận tiền (họ tên, số tài khoản, ngân hàng, chi nhánh, nội dung nhận, v.v.) và hoàn toàn chịu trách nhiệm nếu phát sinh sai sót, chậm trễ hoặc thất lạc do thông tin tôi cung cấp không chính xác/không đầy đủ.</li>
                                                        <li class="mb-2">Tôi đồng ý để công ty thực hiện các biện pháp xác minh danh tính, thẩm định hồ sơ, kiểm tra chống gian lận; đồng thời tôi sẽ phối hợp, bổ sung tài liệu/hồ sơ theo yêu cầu (nếu cần) để hoàn tất việc giải quyết.</li>
                                                        <li class="mb-2">Tôi hiểu thời gian xử lý yêu cầu có thể thay đổi tùy thuộc vào mức độ phức tạp của hồ sơ, kết quả xác minh, quy định pháp luật hiện hành và quy trình nội bộ của công ty.</li>
                                                        <li class="mb-2">Tôi cam kết thực hiện đầy đủ các nghĩa vụ thuế, phí, lệ phí (nếu phát sinh) theo quy định pháp luật liên quan đến khoản tiền rút; công ty có quyền khấu trừ tại nguồn theo quy định trước khi chi trả.</li>
                                                        <li class="mb-2">Trong trường hợp số dư sau khi rút thấp hơn mức tối thiểu quy định hoặc không còn đáp ứng điều kiện duy trì, tôi hiểu hợp đồng có thể bị giảm quyền lợi, tạm dừng hiệu lực hoặc chấm dứt theo điều khoản sản phẩm.</li>
                                                        <li class="mb-2">Tôi xác nhận đã được tư vấn/đã đọc và hiểu rõ các rủi ro, tác động tài chính, ảnh hưởng đến quyền lợi bảo hiểm khi rút trước hạn; quyết định thực hiện là tự nguyện, không bị ép buộc.</li>
                                                        <li class="mb-0">Sau khi khoản tiền rút được giải ngân thành công, tôi đồng ý không khiếu nại về mức phí/phạt, phương thức tính toán và số tiền đã nhận, trừ trường hợp có sai sót do lỗi từ phía công ty.</li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Hình ảnh và chữ ký -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="card border">
                                            <div class="card-header bg-light border-bottom">
                                                <h5 class="card-title mb-0 text-dark">
                                                    HÌNH ẢNH VÀ TÀI LIỆU ĐÍNH KÈM
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <!-- Hình ảnh người được bảo hiểm -->
                                                    <div class="col-md-6">
                                                        <h6 class="fw-bold mb-3">Hình ảnh người được bảo hiểm:</h6>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div class="text-center">
                                                                    <label class="form-label small">Mặt trước CCCD</label>
                                                                    @if($hopDong->anh_mat_truoc)
                                                                        <img src="{{ asset($hopDong->anh_mat_truoc) }}" alt="Mặt trước CCCD" class="img-fluid border rounded" style="max-height: 150px;">
                                                                    @else
                                                                        <div class="border rounded d-flex align-items-center justify-content-center" style="height: 150px;">
                                                                            <span class="text-muted">Không có hình</span>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="text-center">
                                                                    <label class="form-label small">Mặt sau CCCD</label>
                                                                    @if($hopDong->anh_mat_sau)
                                                                        <img src="{{ asset($hopDong->anh_mat_sau) }}" alt="Mặt sau CCCD" class="img-fluid border rounded" style="max-height: 150px;">
                                                                    @else
                                                                        <div class="border rounded d-flex align-items-center justify-content-center" style="height: 150px;">
                                                                            <span class="text-muted">Không có hình</span>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="text-center">
                                                                    <label class="form-label small">Ảnh chân dung</label>
                                                                    @if($hopDong->anh_chan_dung)
                                                                        <img src="{{ asset($hopDong->anh_chan_dung) }}" alt="Ảnh chân dung" class="img-fluid border rounded" style="max-height: 150px;">
                                                                    @else
                                                                        <div class="border rounded d-flex align-items-center justify-content-center" style="height: 150px;">
                                                                            <span class="text-muted">Không có hình</span>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Hình ảnh người thừa hưởng (nếu có) -->
                                                    @if($hopDong->loai_hop_dong == 'cho_nguoi_khac' && $hopDong->th_ho_ten)
                                                    <div class="col-md-6">
                                                        <h6 class="fw-bold mb-3">Hình ảnh người thừa hưởng:</h6>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div class="text-center">
                                                                    <label class="form-label small">Mặt trước CCCD</label>
                                                                    @if($hopDong->th_anh_mat_truoc)
                                                                        <img src="{{ asset($hopDong->th_anh_mat_truoc) }}" alt="Mặt trước CCCD TH" class="img-fluid border rounded" style="max-height: 150px;">
                                                                    @else
                                                                        <div class="border rounded d-flex align-items-center justify-content-center" style="height: 150px;">
                                                                            <span class="text-muted">Không có hình</span>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="text-center">
                                                                    <label class="form-label small">Mặt sau CCCD</label>
                                                                    @if($hopDong->th_anh_mat_sau)
                                                                        <img src="{{ asset($hopDong->th_anh_mat_sau) }}" alt="Mặt sau CCCD TH" class="img-fluid border rounded" style="max-height: 150px;">
                                                                    @else
                                                                        <div class="border rounded d-flex align-items-center justify-content-center" style="height: 150px;">
                                                                            <span class="text-muted">Không có hình</span>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="text-center">
                                                                    <label class="form-label small">Ảnh chân dung</label>
                                                                    @if($hopDong->th_anh_chan_dung)
                                                                        <img src="{{ asset($hopDong->th_anh_chan_dung) }}" alt="Ảnh chân dung TH" class="img-fluid border rounded" style="max-height: 150px;">
                                                                    @else
                                                                        <div class="border rounded d-flex align-items-center justify-content-center" style="height: 150px;">
                                                                            <span class="text-muted">Không có hình</span>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Phần ký kết -->
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <div class="card border">
                                            <div class="card-header bg-light border-bottom">
                                                <h5 class="card-title mb-0 text-dark">
                                                    PHẦN KÝ KẾT
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <!-- Ký bên A -->
                                                    <div class="col-6">
                                                        <div class="text-center">
                                                            <h6 class="fw-bold mb-2" style="font-size: 0.9rem;">BÊN A - CÔNG TY BẢO HIỂM</h6>
                                                            @if($congTy)
                                                                <p  style="font-size: 0.8rem; margin-bottom: 0;"><strong>{{ $congTy->ten }}</strong></p>
                                                            @endif
                                                            <div class="">
                                                                @if($congTy && ($congTy->con_dau || $congTy->chu_ky))
                                                                    <div class="company-signature-container">
                                                                        <i class="mb-2 text-muted" style="font-size: 0.7rem;">(Đã ký tên, đóng dấu)</i>
                                                                        <!-- Con dấu công ty -->
                                                                        @if($congTy->con_dau)
                                                                            <div class="company-seal mb-2">
                                                                                <img src="{{ asset($congTy->con_dau) }}" alt="Con dấu {{ $congTy->ten }}" class="company-seal-img">
                                                                            </div>
                                                                        @endif
                                                                        
                                                                        <!-- Chữ ký đại diện công ty -->
                                                                        @if($congTy->chu_ky)
                                                                            <div class="company-signature">
                                                                                <img src="{{ asset($congTy->chu_ky) }}" alt="Chữ ký đại diện {{ $congTy->ten }}" class="company-signature-img">
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($congTy->nguoi_dai_dien) && $congTy->nguoi_dai_dien)
                                                                            <p class="mt-2" style="font-size: 0.8rem;">{{ $congTy->nguoi_dai_dien }}</p>
                                                                        @endif
                                                                    </div>
                                                                @else
                                                                    <div class="border border-2 border-dark rounded" style="height: 100px; width: 200px; margin: 0 auto; display: flex; align-items: center; justify-content: center;">
                                                                        <span class="text-muted" style="font-size: 0.75rem;">Chưa có chữ ký</span>
                                                                    </div>
                                                                    <p class="mt-2 text-muted" style="font-size: 0.7rem;">(Ký tên, đóng dấu)</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Ký bên B -->
                                                    <div class="col-6">
                                                        <div class="text-center">
                                                            <h6 class="fw-bold mb-2" style="font-size: 0.9rem;">BÊN B - NGƯỜI ĐƯỢC BẢO HIỂM</h6>
                                                            <p class="" style="font-size: 0.8rem; margin-bottom: 0;"><strong>{{ $hopDong->ho_ten }}</strong></p>
                                                            <div class="">
                                                                @if($hopDong->chu_ky)
                                                                    <div class="user-signature-container">
                                                                        <i class="mb-2 text-muted" style="font-size: 0.7rem;">(Đã ký điện tử)</i>
                                                                        <img src="{{ $hopDong->chu_ky }}" alt="Chữ ký người được bảo hiểm" class="user-signature-img">
                                                                        @if(isset($hopDong->ho_ten) && $hopDong->ho_ten)
                                                                            <p class="mt-2" style="font-size: 0.8rem;">{{ $hopDong->ho_ten }}</p>
                                                                        @endif
                                                                    </div>
                                                                @else
                                                                    <div class="border border-2 border-dark rounded" style="height: 100px; width: 200px; margin: 0 auto; display: flex; align-items: center; justify-content: center;">
                                                                        <span class="text-muted" style="font-size: 0.75rem;">Chưa ký</span>
                                                                    </div>
                                                                    <p class="mt-2 text-muted" style="font-size: 0.7rem;">(Ký tên)</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-warning text-center">
                                    <h5 class="alert-heading">
                                        <i class="material-icons me-2">warning</i>
                                        Không tìm thấy thông tin hợp đồng
                                    </h5>
                                    <p class="mb-0">Vui lòng liên hệ với công ty bảo hiểm để được hỗ trợ.</p>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control:disabled {
        background-color: #f8f9fa;
        border-color: #dee2e6;
        color: #495057;
    }
    
    .card {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        margin-bottom: 1.5rem;
    }
    
    .card-header {
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        font-weight: bold;
    }
    
    .form-label {
        color: #495057;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }
    
    .img-fluid {
        max-width: 100%;
        height: auto;
    }
    
    .border {
        border: 1px solid #dee2e6 !important;
    }
    
    .rounded {
        border-radius: 0.375rem !important;
    }
    
    .quoc-hieu {
        margin-bottom: 2rem;
    }
    
    .quoc-hieu h2 {
        font-size: 1.8rem;
        letter-spacing: 1px;
    }
    
    .quoc-hieu h4 {
        font-size: 1.2rem;
        letter-spacing: 0.5px;
    }
    
    .ky-section {
        margin-top: 1rem;
    }
    
    .ky-section .border {
        border: none !important;
        border-radius: 0;
    }
    
    .text-primary {
        color: #0d6efd !important;
    }
    
    .fw-bold {
        font-weight: 700 !important;
    }
    
    .small {
        font-size: 0.875rem;
    }
    
    .text-muted {
        color: #6c757d !important;
    }
    
    .alert {
        border-radius: 0.375rem;
    }
    
    .alert-heading {
        color: inherit;
        font-size: 1.1rem;
    }
    
    .border-bottom {
        border-bottom: 1px solid #dee2e6 !important;
    }
    
    .border-2 {
        border-width: 2px !important;
    }
    
    .border-primary {
        border-color: #0d6efd !important;
    }
    
    .border-dark {
        border-color: #343a40 !important;
    }
    
    /* CSS cho logo công ty và ảnh người dùng */
    .company-logo {
        max-height: 150px;
        max-width: 200px;
        object-fit: contain;
    }
    
    .company-logo-placeholder {
        height: 150px;
        width: 200px;
        margin: 0 auto;
    }
    
    .user-photo {
        max-height: 250px;
        max-width: 250px;
        object-fit: cover;
        border-radius: 50%;
    }
    
    .user-photo-placeholder {
        height: 250px;
        width: 250px;
        margin: 0 auto;
        border-radius: 50%;
    }
    
    /* CSS cho văn bản hành chính */
    .company-info-text,
    .user-info-text,
    .beneficiary-info-text,
    .bank-info-text {
        font-size: 1rem;
        line-height: 1.6;
    }
    
    .company-info-text p,
    .user-info-text p,
    .beneficiary-info-text p,
    .bank-info-text p {
        margin-bottom: 0.25rem;
        padding: 0.25rem 0;
        border-bottom: 1px solid #f8f9fa;
    }
    
    .company-info-text p:last-child,
    .user-info-text p:last-child,
    .beneficiary-info-text p:last-child,
    .bank-info-text p:last-child {
        border-bottom: none;
    }
    
    .financial-info-text p {
        margin-bottom: 0.5rem;
        padding: 0.5rem;
        background-color: #f8f9fa;
        border-radius: 0.375rem;
        border-left: 4px solid #6c757d;
    }
    
    /* Responsive cho mobile */
    @media (max-width: 768px) {
        .company-logo,
        .company-logo-placeholder {
            max-height: 120px;
            max-width: 150px;
        }
        
        .user-photo,
        .user-photo-placeholder {
            max-height: 200px;
            max-width: 200px;
        }
        
        .company-info-text,
        .user-info-text,
        .beneficiary-info-text,
        .bank-info-text {
            font-size: 0.9rem;
        }
        
        .financial-info-text .fs-5 {
            font-size: 1.1rem !important;
        }
        
        /* Đảm bảo layout ảnh trái, thông tin phải trên mobile */
        .row.g-4.align-items-start {
            align-items: flex-start !important;
        }
        
        /* Tối ưu khoảng cách trên mobile */
        .row.g-4 > [class*="col-"] {
            margin-bottom: 1rem;
        }
        
        /* Căn giữa ảnh trên mobile */
        .text-center {
            margin-bottom: 1rem;
        }
    }
    
    /* Responsive cho tablet */
    @media (max-width: 992px) and (min-width: 769px) {
        .user-photo,
        .user-photo-placeholder {
            max-height: 220px;
            max-width: 220px;
        }
    }
    
    /* Responsive cho desktop nhỏ */
    @media (max-width: 1200px) and (min-width: 993px) {
        .user-photo,
        .user-photo-placeholder {
            max-height: 240px;
            max-width: 240px;
        }
    }
    
    /* CSS cho con dấu và chữ ký công ty */
    .company-signature-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100px;
        padding: 10px;
        position: relative;
    }
    
    .company-seal {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 1;
    }
    
    .company-seal-img {
        max-height: 140px;
        max-width: 140px;
        object-fit: contain;
        border-radius: 50%;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .company-signature {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 0;
        position: absolute;
        top: 50%;
        left: 70%;
        transform: translate(-50%, -50%);
        z-index: 2;
        pointer-events: none;
    }
    
    .company-signature-img {
        max-height: 70px;
        max-width: 250px;
        object-fit: contain;
        filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.1));
    }
    
    /* CSS cho chữ ký người dùng */
    .user-signature-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100px;
        padding: 10px;
    }
    
    .user-signature-img {
        max-height: 70px;
        max-width: 250px;
        object-fit: contain;
        filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.1));
        border: none !important;
        border-radius: 0;
        padding: 0;
        background-color: transparent;
    }
    
    /* Responsive cho con dấu và chữ ký */
    @media (max-width: 768px) {
        .company-seal-img {
            max-height: 120px;
            max-width: 120px;
        }
        
        .company-signature-img {
            max-height: 55px;
            max-width: 200px;
        }
        .company-signature {
            top: 52%;
            left: 72%;
        }
        
        .company-signature-container {
            min-height: 80px;
            padding: 5px;
        }
        
        .user-signature-img {
            max-height: 55px;
            max-width: 200px;
        }
        
        .user-signature-container {
            min-height: 80px;
            padding: 5px;
        }
    }
</style>
@endsection
