@extends('user.template.app')
@section('content')
<div _ngcontent-c3="" class="main portal-home">
    <app-sidebar-mobile _ngcontent-c3="" _nghost-c5="" style="display: none;">
        <ul _ngcontent-c5="" class="menu-left close">
            <li _ngcontent-c5=""><button _ngcontent-c5="" class="icon-btn"><img _ngcontent-c5="" alt="image"
                        src="./assets/images/btn_menu.svg"></button></li>
            <!---->
        </ul>
    </app-sidebar-mobile>
    <app-siderbar _ngcontent-c3="" class="bhxh-sidebar sidebar-fixed" _nghost-c6="" style="top: 120px; height: 802px;">
        <!---->
    </app-siderbar>
    <div _ngcontent-c3="" class="portal-content">
        <mc-breadcrumbs _ngcontent-c3="" class="an-breadcrumb" style="display: none;">
            <!---->
            <ol class="breadcrumb">
                <!---->
                <li class="breadcrumb-item active">
                    <!---->
                    <!----><span>Trang chủ</span></li>
            </ol>
        </mc-breadcrumbs>
        <router-outlet _ngcontent-c3=""></router-outlet>
        <app-portal-index _nghost-c13="">
            <div _ngcontent-c13="" id="content">
                <div _ngcontent-c13="" class="row">
                    <div _ngcontent-c13="" class="col-md-12">
                        <div _ngcontent-c13="" class="banner">
                            <div _ngcontent-c13="" class="boc-banner">
                                <img _ngcontent-c13="" alt="image" class="banner-img" 
                                    src="{{ $anhBanner ? asset('storage/' . $anhBanner) : asset('assets/images/bg_01.svg') }}"
                                    style="height: 760px; width: 1512px;">
                            </div>
                            <div _ngcontent-c13="" class="col-md-12 menu">
                                <div _ngcontent-c13="" class="container banner-list container-content slider-container">
                                    <ul _ngcontent-c13="" class="ul-menu">
                                        <li _ngcontent-c13="">
                                            <!---->
                                            <!----><a _ngcontent-c13="" title="Kê khai"
                                                href="{{ $qrCode ? asset($qrCode) : '#ke-khai' }}" {{ $qrCode ? 'target="_blank"' : '' }}><img _ngcontent-c13="" alt="image"
                                                    src="../../../../assets/images/kekhai.svg"></a></li>
                                        <li _ngcontent-c13=""><a _ngcontent-c13=""
                                                href="#/thanh-toan-bhxh-dien-tu/ngan-hang-lien-ket"><img
                                                    _ngcontent-c13="" alt="image"
                                                    src="../../../../assets/images/thanhtoanbhxhdientu-01.svg"></a>
                                        </li>
                                        <li _ngcontent-c13=""><a _ngcontent-c13="" href="#"><img
                                                    _ngcontent-c13="" alt="image"
                                                    src="../../../../assets/images/dichvucong-01.svg"></a>
                                        </li>
                                        <li _ngcontent-c13=""><a _ngcontent-c13="" href="#/tra-cuu/tra-cuu-dang-ky"><img
                                                    _ngcontent-c13="" alt="image"
                                                    src="../../../../assets/images/tracuu.svg"></a></li>
                                        <li _ngcontent-c13=""><a _ngcontent-c13="" href="#/tro-giup"><img
                                                    _ngcontent-c13="" alt="image"
                                                    src="../../../../assets/images/tailieu.svg"></a></li>
                                        <li _ngcontent-c13=""><a _ngcontent-c13="" href="#/dat-lich"><img
                                                    _ngcontent-c13="" alt="image"
                                                    src="../../../../assets/images/datlich.svg"></a></li>
                                    </ul>
                                    <!---->
                                </div>
                                <div _ngcontent-c13="" class="block">
                                    <div _ngcontent-c13="" class="block1">
                                        <div _ngcontent-c13="" class="name-chartpie"> Tình hình xử lý hồ sơ
                                            năm 2025 <p _ngcontent-c13="" class="line"></p>
                                        </div>
                                        <div _ngcontent-c13="" class="tab-content" id="myTabContent">
                                            <div _ngcontent-c13="" class="tab-pane fade active show" id="xulynam"
                                                role="tabpanel">
                                                <div _ngcontent-c13="" class="tiepnhan">
                                                    <div _ngcontent-c13="" class="item"><span _ngcontent-c13=""
                                                            class="name">Đã tiếp
                                                            nhận</span>
                                                        <h4 _ngcontent-c13="">5.120.636</h4><span _ngcontent-c13=""
                                                            class="text">Hồ sơ</span>
                                                    </div>
                                                    <div _ngcontent-c13="" class="item"><span _ngcontent-c13=""
                                                            class="name">Đã giải
                                                            quyết</span>
                                                        <h4 _ngcontent-c13="">4.797.848</h4><span _ngcontent-c13=""
                                                            class="text">Hồ sơ</span>
                                                    </div>
                                                </div>
                                                <div _ngcontent-c13="" class="item">
                                                    <h4 _ngcontent-c13="">94.48%</h4><span _ngcontent-c13=""
                                                        class="text">Đã giải quyết trong hạn</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div _ngcontent-c13="" class="block3">
                                        <div _ngcontent-c13="" class="name-chartpie"> Thống kê hồ sơ tiếp
                                            nhận theo lĩnh vực năm 2025 <p _ngcontent-c13="" class="line">
                                            </p>
                                        </div>
                                        <!---->
                                        <div _ngcontent-c13="" class="item_chart" style="text-align: center;">
                                            <img src="{{ asset('images/chart.png') }}"
                                                style="width: 300px; height: 100%;" alt="">
                                        </div>
                                        <div _ngcontent-c13="" class="chuthich">
                                            <ul _ngcontent-c13="">
                                                <li _ngcontent-c13="">
                                                    <p _ngcontent-c13="" class="color color_1"></p>Thu BHXH,
                                                    BHYT, BHTN
                                                </li>
                                                <li _ngcontent-c13="">
                                                    <p _ngcontent-c13="" class="color color_3"></p>Thực hiện
                                                    chính sách BHXH
                                                </li>
                                            </ul>
                                            <ul _ngcontent-c13="">
                                                <li _ngcontent-c13="">
                                                    <p _ngcontent-c13="" class="color color_2"></p>Cấp sổ
                                                    BHXH, thẻ BHYT
                                                </li>
                                                <li _ngcontent-c13="">
                                                    <p _ngcontent-c13="" class="color color_4"></p>Chi trả
                                                    các chế độ BHXH
                                                </li>
                                            </ul>
                                            <ul _ngcontent-c13="">
                                                <li _ngcontent-c13="" class="justify-content-center">
                                                    <p _ngcontent-c13="" class="color color_5"></p>Thực hiện
                                                    chính sách BHYT
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div _ngcontent-c13="" class="col-md-12 _ivan">
                    <p _ngcontent-c13="" class="col-md-12 p-title">TỔ CHỨC DỊCH VỤ CUNG CẤP IVAN</p>
                    <div _ngcontent-c13="" class="container wrapped-thumbnail container-content">
                        <ul _ngcontent-c13="">
                            <!---->
                            <li _ngcontent-c13="" class="box-logo bg-green"><a _ngcontent-c13="" target="_blank"
                                    href="https://vin-bhxh.vn"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/vinbhxh_logo.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-green"><a _ngcontent-c13="" target="_blank"
                                    href="http://vnpt-ca.vn/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/dv2.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-orange"><a _ngcontent-c13="" target="_blank"
                                    href="http://thaison.vn/webs/users/Default.aspx"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/dv3.svg"></a>
                            </li>
                            <li _ngcontent-c13="" class="box-logo bg-purple"><a _ngcontent-c13="" target="_blank"
                                    href="https://efy.com.vn"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/dv4.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-blue"><a _ngcontent-c13="" target="_blank"
                                    href="http://vww.ts24.com.vn/web/index.php"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/ts24corp.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-orange"><a _ngcontent-c13="" target="_blank"
                                    href="http://www.vnpost.vn/vi-vn/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/vnpost-01.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-green"><a _ngcontent-c13="" target="_blank"
                                    href="http://www.viettel-ca.vn/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/viettel ca-01.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-blue"><a _ngcontent-c13="" target="_blank"
                                    href="http://bkavca.vn/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/tc2.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-bold-orange"><a _ngcontent-c13="" target="_blank"
                                    href="https://amis.misa.vn/amis-bhxh"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/misa_logo.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-purple"><a _ngcontent-c13="" target="_blank"
                                    href="https://cybercare.vn/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/CyberLotus.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-dark-blue"><a _ngcontent-c13="" target="_blank"
                                    href="https://ibh.ivan.vn/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/ibh_logo.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-green"><a _ngcontent-c13="" target="_blank"
                                    href="http://tokhaibaohiem.vn/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/ICARE.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-purple"><a _ngcontent-c13="" target="_blank"
                                    href="https://mbhxh.vn/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/mbhxh_logo.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-bold-orange"><a _ngcontent-c13="" target="_blank"
                                    href="https://1office.vn/1hrm"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/1Office_logo.svg"></a></li>
                        </ul>
                    </div>
                </div>
                <div _ngcontent-c13="" class="col-md-12 _thu-so">
                    <p _ngcontent-c13="" class="col-md-12 p-title mar-top-30">TỔ CHỨC CUNG CẤP CHỨNG THƯ SỐ
                    </p>
                    <div _ngcontent-c13="" class="container wrapped-thumbnail container-content">
                        <ul _ngcontent-c13="">
                            <!---->
                            <li _ngcontent-c13="" class="box-logo bg-pink"><a _ngcontent-c13="" target="_blank"
                                    href="https://easyca.vn/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/easyCA.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-dark-blue"><a _ngcontent-c13="" target="_blank"
                                    href="http://newtel-ca.vn/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/LogoNewtel_CA.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-purple"><a _ngcontent-c13="" target="_blank"
                                    href="http://bkavca.vn/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/tc2.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-bold-orange"><a _ngcontent-c13="" target="_blank"
                                    href="http://www.viettel-ca.vn/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/tc3.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-pink"><a _ngcontent-c13="" target="_blank"
                                    href="http://www.cavn.vn/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/tc4.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-pink"><a _ngcontent-c13="" target="_blank"
                                    href="http://vnpt-ca.vn/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/vnpt.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-bold-orange"><a _ngcontent-c13="" target="_blank"
                                    href="http://www.safecert.com.vn/www/home/index.sca"><img _ngcontent-c13=""
                                        alt="image" src="../../assets/images/safe-01.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-purple"><a _ngcontent-c13="" target="_blank"
                                    href="https://fpt.com.vn/vi"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/fpt.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-dark-blue"><a _ngcontent-c13="" target="_blank"
                                    href="https://www.smartsign.com.vn/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/smart sign.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-purple"><a _ngcontent-c13="" target="_blank"
                                    href="https://efyca.vn/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/efly ca.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-bold-orange"><a _ngcontent-c13="" target="_blank"
                                    href="https://www.misa.com.vn/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/misa_logo.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-pink"><a _ngcontent-c13="" target="_blank"
                                    href="http://nc-ca.com.vn"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/logo_NCCA.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-orange"><a _ngcontent-c13="" target="_blank"
                                    href="https://fastca.vn/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/fastca_logo.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-green"><a _ngcontent-c13="" target="_blank"
                                    href="https://trustca.vn/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/LogoTrustCA.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-bold-orange"><a _ngcontent-c13="" target="_blank"
                                    href="https://i-ca.vn/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/i-ca_logo.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-blue"><a _ngcontent-c13="" target="_blank"
                                    href="https://hilo-ca.vn/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/hilo_ca_logo.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-sapphire"><a _ngcontent-c13="" target="_blank"
                                    href="https://one-ca.net/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/OneCA_logo.svg"></a></li>
                            <li _ngcontent-c13="" class="box-logo bg-green"><a _ngcontent-c13="" target="_blank"
                                    href="https://eca.com.vn/"><img _ngcontent-c13="" alt="image"
                                        src="../../assets/images/ECA-logo.svg"></a></li>
                        </ul>
                    </div>
                </div>
                <div _ngcontent-c13="" class="col-md-12 _chuc-nang">
                    <div _ngcontent-c13="" class="container wrapped-thumbnail container-content">
                        <ul _ngcontent-c13="">
                            <!---->
                            <li _ngcontent-c13="">
                                <!----><a _ngcontent-c13="" routerlinkactive="active"
                                    href="https://faq.baohiemxahoi.gov.vn/category/question_faq"><img _ngcontent-c13=""
                                        alt="image" src="../../assets/images/chucnang_faq-01.svg"></a>
                                <!---->
                            </li>
                            <li _ngcontent-c13="">
                                <!----><a _ngcontent-c13="" routerlinkactive="active"
                                    href="https://baohiemxahoi.gov.vn/chuyen-trang-bhxh-bhyt-va-phan-anh-kien-nghi/Pages/default.aspx"><img
                                        _ngcontent-c13="" alt="image"
                                        src="../../assets/images/tiepnhan_ykien-01.svg"></a>
                                <!---->
                            </li>
                            <li _ngcontent-c13="">
                                <!----><a _ngcontent-c13="" routerlinkactive="active" href="tel:19009068"><img
                                        _ngcontent-c13="" alt="image" src="../../assets/images/tongdai-01.svg"></a>
                                <!---->
                            </li>
                            <li _ngcontent-c13="">
                                <!---->
                                <!----><a _ngcontent-c13="" routerlinkactive="active" href="#/" class="active"><img
                                        _ngcontent-c13="" alt="image" src="../../assets/images/tro-ly-ao.svg"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </app-portal-index>
    </div>
</div>
@endsection
