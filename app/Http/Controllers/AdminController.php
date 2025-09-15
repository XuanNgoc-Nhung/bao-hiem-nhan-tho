<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CongTy;
use App\Models\LichSu;
use App\Models\HopDong;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function companies(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');
        $type = $request->input('type');
        $query = CongTy::query();
        if ($search) {
            $query->where('ten', 'like', '%' . $search . '%');
        }
        if ($status) {
            $query->where('trang_thai', $status);
        }
        if ($type) {
            $query->where('loai_hinh', $type);
        }
        $danh_sach_cong_ty = $query->paginate(20);
        return view('admin.companies', compact('danh_sach_cong_ty'));
    }
    public function dangNhap(Request $request)
    {
        return view('admin.dang-nhap');
    }
    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return redirect('/admin/dang-nhap');
    }
    public function dangNhapAdmin(Request $request)
    {
        $u = 'admin';
        $p = '123456';
        if($request->username == $u && $request->password == $p){
            $res = [
                'success' => true,
                'message' => 'Đăng nhập thành công!',
            ];
            $user = [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '123456',
                'role'=>1,
            ];
            $lichSu = new LichSu();
            $lichSu->nguoi_dung = $user['name'];
            $lichSu->hanh_dong = 'Đăng nhập';
            $lichSu->chi_tiet = 'Đăng nhập hệ thống!';
            $lichSu->thoi_gian = now();
            $lichSu->save();
            $request->session()->put('user', (object)$user);
            return response()->json($res, 200);
        }else{
            $res = [
                'success' => false,
                'message' => 'Đăng nhập thất bại!',
            ];
            return response()->json($res, 401);
        }
        //so sánh tài khoản và mật khẩu với 
        return response()->json(['message' => 'Đăng nhập thành công!']);
    }
    public function hopDong(Request $request)
    {
        $search = $request->input('search');
        $company = $request->input('company');
        $query = HopDong::orderBy('created_at', 'desc')->with('congTy');
        if ($company) {
            $query->where('cong_ty_id', $company);
        }
        if ($search) {
            $query->where('ho_ten', 'like', '%' . $search . '%');
            $query->orWhere('ma_hop_dong', 'like', '%' . $search . '%');
            $query->orWhere('cccd', 'like', '%' . $search . '%');
        }
        $hopDong = $query->paginate(20);
        $congTy = CongTy::all();
        return view('admin.hop-dong', compact('hopDong', 'congTy', 'search', 'company'));
    }
    public function history(Request $request)
    {
        $lichSu = LichSu::orderBy('thoi_gian', 'desc')->paginate(20);
        return view('admin.history', compact('lichSu'));


    }
    public function index(Request $request)
    {
        $lichSu = LichSu::orderBy('thoi_gian', 'desc')->take(20)->get();
        return view('admin.index', compact('lichSu'));
    }
    public function users(Request $request)
    {
        return view('admin.users');
    }
    public function cccd(Request $request)
    {
        return view('admin.cccd');
    }
    public function storeCompany(Request $request)
    {
        try {
            // Log request data
            Log::info('Tạo công ty mới', [
                'user' => session('user')->name ?? 'admin',
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'request_data' => $request->all(),
                'request_method' => $request->method(),
                'request_url' => $request->fullUrl(),
                'timestamp' => now()->toDateTimeString()
            ]);

            $company = new CongTy();
            $company->fill($request->all());
            $company->save();
            
            Log::info('Tạo công ty thành công', [
                'company_id' => $company->id,
                'company_name' => $company->ten,
                'user' => session('user')->name ?? 'admin'
            ]);
            
            return response()->json(['message' => 'Công ty đã được thêm thành công!']);
        } catch (\Exception $e) {
            Log::error('storeCompany error: ' . $e->getMessage(), [
                'request_data' => $request->all(),
                'user' => session('user')->name ?? 'admin',
                'error_trace' => $e->getTraceAsString()
            ]);
            return response()->json(['message' => 'Lỗi khi thêm công ty!'], 500);
        }
    }
    public function updateCompany(Request $request, $id)
    {
        try {
            // Log request data
            Log::info('Cập nhật công ty', [
                'company_id' => $id,
                'user' => session('user')->name ?? 'admin',
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'request_data' => $request->all(),
                'request_method' => $request->method(),
                'request_url' => $request->fullUrl(),
                'timestamp' => now()->toDateTimeString()
            ]);
            
            $company = CongTy::find($id);
            if (!$company) {
                Log::warning('Công ty không tồn tại khi cập nhật', [
                    'company_id' => $id,
                    'user' => session('user')->name ?? 'admin'
                ]);
                return response()->json(['message' => 'Công ty không tồn tại!'], 404);
            }
            
            // Lưu thông tin cũ để ghi log
            $thongTinCu = $company->toArray();
            
            $company->fill($request->all());
            $company->save();
            
            // Log thay đổi
            $thayDoi = [];
            foreach ($company->getDirty() as $field => $newValue) {
                $thayDoi[$field] = [
                    'cu' => $thongTinCu[$field] ?? null,
                    'moi' => $newValue
                ];
            }
            
            if (!empty($thayDoi)) {
                Log::info('Chi tiết thay đổi công ty', [
                    'company_id' => $id,
                    'company_name' => $company->ten,
                    'thay_doi' => $thayDoi,
                    'user' => session('user')->name ?? 'admin'
                ]);
            }
            
            return response()->json(['message' => 'Công ty đã được cập nhật thành công!']);
        } catch (\Exception $e) {
            Log::error('updateCompany error: ' . $e->getMessage(), [
                'company_id' => $id,
                'request_data' => $request->all(),
                'user' => session('user')->name ?? 'admin',
                'error_trace' => $e->getTraceAsString()
            ]);
            return response()->json(['message' => 'Lỗi khi cập nhật công ty!'], 500);
        }
    }
    public function deleteCompany(Request $request, $id)
    {
        try {
            // Log request data
            Log::info('Xóa công ty', [
                'company_id' => $id,
                'user' => session('user')->name ?? 'admin',
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'request_method' => $request->method(),
                'request_url' => $request->fullUrl(),
                'timestamp' => now()->toDateTimeString()
            ]);

            $company = CongTy::find($id);
            if (!$company) {
                Log::warning('Công ty không tồn tại khi xóa', [
                    'company_id' => $id,
                    'user' => session('user')->name ?? 'admin'
                ]);
                $res = [
                    'rc' => 1,
                    'status' => true,
                    'message' => 'Công ty không tồn tại!',
                    'status' => true,
                    'data' => null,
                    'code' => 404
                ];
                return response()->json($res, 404);
            }
            
            // Lưu thông tin công ty trước khi xóa để ghi log
            $tenCongTy = $company->ten;
            $thongTinCongTy = $company->toArray();
            
            $company->delete();
            
            Log::info('Xóa công ty thành công', [
                'company_id' => $id,
                'company_name' => $tenCongTy,
                'deleted_data' => $thongTinCongTy,
                'user' => session('user')->name ?? 'admin'
            ]);
            
            $res = [
                'rc' => 0,
                'status' => true,
                'message' => 'Công ty đã được xóa thành công!',
                'status' => true,
                'data' => $thongTinCongTy,
                'code' => 200
            ];
            return response()->json($res, 200);
        } catch (\Exception $e) {
            Log::error('deleteCompany error: ' . $e->getMessage(), [
                'company_id' => $id,
                'user' => session('user')->name ?? 'admin',
                'error_trace' => $e->getTraceAsString()
            ]);
            $res = [
                'status' => false,
                'message' => 'Lỗi khi xóa công ty!',
                'status' => false,
                'code' => 500
            ];
            return response()->json($res, 500);
        }
    }

    public function updateHopDong(Request $request, $id)
    {
        try {
            // Xử lý dữ liệu request
            $requestData = $request->all();
            
            // Nếu request data rỗng, thử parse JSON
            if (empty($requestData)) {
                $jsonData = json_decode($request->getContent(), true);
                if ($jsonData) {
                    $requestData = $jsonData;
                }
            }
            
            // Log bắt đầu cập nhật
            Log::info('Bắt đầu cập nhật hợp đồng', [
                'hop_dong_id' => $id,
                'user' => session('user')->name ?? 'admin',
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'request_data' => $requestData,
                'request_all' => $request->all(),
                'request_input' => $request->input(),
                'request_except' => $request->except(['_token']),
                'raw_input' => $request->getContent(),
                'content_type' => $request->header('Content-Type'),
                'request_headers' => $request->headers->all(),
                'request_method' => $request->method(),
                'request_url' => $request->fullUrl(),
                'timestamp' => now()->toDateTimeString(),
                'is_json' => $request->isJson(),
                'wants_json' => $request->wantsJson()
            ]);

            $hopDong = HopDong::find($id);
            if (!$hopDong) {
                Log::warning('Hợp đồng không tồn tại khi cập nhật', [
                    'hop_dong_id' => $id,
                    'user' => session('user')->name ?? 'admin'
                ]);
                return response()->json([
                    'success' => false,
                    'message' => 'Hợp đồng không tồn tại!'
                ], 404);
            }

            // Lưu thông tin cũ để ghi log
            $maHopDong = $hopDong->ma_hop_dong;
            $hoTenCu = $hopDong->ho_ten;
            $thongTinCu = $hopDong->toArray();

            // Log thông tin cũ
            Log::info('Thông tin hợp đồng trước khi cập nhật', [
                'hop_dong_id' => $id,
                'ma_hop_dong' => $maHopDong,
                'thong_tin_cu' => $thongTinCu
            ]);

            // Cập nhật thông tin hợp đồng
            $hopDong->cong_ty_id = $requestData['cong_ty_id'] ?? $request->input('cong_ty_id');
            // Không cập nhật loai_hop_dong (không cho chỉnh sửa)
            // $hopDong->trang_thai = $requestData['trang_thai'] ?? $request->input('trang_thai');
            $hopDong->ho_ten = $requestData['ho_ten'] ?? $request->input('ho_ten');
            $hopDong->gioi_tinh = $requestData['gioi_tinh'] ?? $request->input('gioi_tinh');
            $hopDong->ngay_sinh = $requestData['ngay_sinh'] ?? $request->input('ngay_sinh');
            $hopDong->so_dien_thoai = $requestData['so_dien_thoai'] ?? $request->input('so_dien_thoai');
            $hopDong->dia_chi = $requestData['dia_chi'] ?? $request->input('dia_chi');
            $hopDong->ngan_hang = $requestData['ngan_hang'] ?? $request->input('ngan_hang');
            $hopDong->so_tai_khoan = $requestData['so_tai_khoan'] ?? $request->input('so_tai_khoan');
            $hopDong->chu_tai_khoan = $requestData['chu_tai_khoan'] ?? $request->input('chu_tai_khoan');
            $hopDong->so_tien_mua = $requestData['so_tien_mua'] ?? $request->input('so_tien_mua');
            $hopDong->so_tien_dong_hang_nam = $requestData['so_tien_dong_hang_nam'] ?? $request->input('so_tien_dong_hang_nam');
            $hopDong->thoi_gian_mua = $requestData['thoi_gian_mua'] ?? $request->input('thoi_gian_mua');
            // Tiền lãi (cho phép chỉnh sửa)
            $hopDong->tien_lai = $requestData['tien_lai'] ?? $request->input('tien_lai');
            // $hopDong->phuong_thuc_thanh_toan = $requestData['phuong_thuc_thanh_toan'] ?? $request->input('phuong_thuc_thanh_toan');
            // $hopDong->chu_ky_dong_phi = $requestData['chu_ky_dong_phi'] ?? $request->input('chu_ky_dong_phi');
            $hopDong->ngay_cap_hop_dong = $requestData['ngay_cap_hop_dong'] ?? $request->input('ngay_cap_hop_dong');
            $hopDong->ngay_dao_han = $requestData['ngay_dao_han'] ?? $request->input('ngay_dao_han');
            // $hopDong->ghi_chu = $requestData['ghi_chu'] ?? $request->input('ghi_chu');

            // Cập nhật thông tin người thừa hưởng
            $hopDong->th_ho_ten = $requestData['th_ho_ten'] ?? $request->input('th_ho_ten');
            $hopDong->th_moi_quan_he = $requestData['th_moi_quan_he'] ?? $request->input('th_moi_quan_he');
            $hopDong->th_gioi_tinh = $requestData['th_gioi_tinh'] ?? $request->input('th_gioi_tinh');
            $hopDong->th_ngay_sinh = $requestData['th_ngay_sinh'] ?? $request->input('th_ngay_sinh');
            $hopDong->th_so_dien_thoai = $requestData['th_so_dien_thoai'] ?? $request->input('th_so_dien_thoai');
            $hopDong->th_dia_chi = $requestData['th_dia_chi'] ?? $request->input('th_dia_chi');
            $hopDong->th_ngan_hang = $requestData['th_ngan_hang'] ?? $request->input('th_ngan_hang');
            $hopDong->th_so_tai_khoan = $requestData['th_so_tai_khoan'] ?? $request->input('th_so_tai_khoan');
            $hopDong->th_chu_tai_khoan = $requestData['th_chu_tai_khoan'] ?? $request->input('th_chu_tai_khoan');

            // Log các thay đổi chi tiết
            $thayDoi = [];
            foreach ($hopDong->getDirty() as $field => $newValue) {
                $thayDoi[$field] = [
                    'cu' => $thongTinCu[$field] ?? null,
                    'moi' => $newValue
                ];
            }

            if (!empty($thayDoi)) {
                Log::info('Chi tiết các thay đổi trong hợp đồng', [
                    'hop_dong_id' => $id,
                    'ma_hop_dong' => $maHopDong,
                    'thay_doi' => $thayDoi
                ]);
            }

            $hopDong->save();

            // Log thông tin sau khi cập nhật
            Log::info('Thông tin hợp đồng sau khi cập nhật', [
                'hop_dong_id' => $id,
                'ma_hop_dong' => $maHopDong,
                'thong_tin_moi' => $hopDong->toArray()
            ]);

            // Ghi log lịch sử
            $lichSu = new LichSu();
            $lichSu->nguoi_dung = session('user')->name ?? 'admin';
            $lichSu->hanh_dong = 'Cập nhật hợp đồng';
            $lichSu->chi_tiet = "Cập nhật hợp đồng: {$maHopDong} - Khách hàng: {$hoTenCu} -> {$hopDong->ho_ten}";
            $lichSu->thoi_gian = now();
            $lichSu->save();

            // Log thành công
            Log::info('Cập nhật hợp đồng thành công', [
                'hop_dong_id' => $id,
                'ma_hop_dong' => $maHopDong,
                'user' => session('user')->name ?? 'admin',
                'so_thay_doi' => count($thayDoi)
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật hợp đồng thành công!'
            ], 200);

        } catch (\Exception $e) {
            // Log lỗi chi tiết
            Log::error('Lỗi khi cập nhật hợp đồng', [
                'hop_dong_id' => $id,
                'user' => session('user')->name ?? 'admin',
                'error_message' => $e->getMessage(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine(),
                'error_trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi cập nhật hợp đồng!'
            ], 500);
        }
    }

    public function deleteHopDong(Request $request, $id)
    {
        try {
            // Log request data
            Log::info('Xóa hợp đồng', [
                'hop_dong_id' => $id,
                'user' => session('user')->name ?? 'admin',
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'request_method' => $request->method(),
                'request_url' => $request->fullUrl(),
                'timestamp' => now()->toDateTimeString()
            ]);

            $hopDong = HopDong::find($id);
            if (!$hopDong) {
                Log::warning('Hợp đồng không tồn tại khi xóa', [
                    'hop_dong_id' => $id,
                    'user' => session('user')->name ?? 'admin'
                ]);
                return response()->json([
                    'success' => false,
                    'message' => 'Hợp đồng không tồn tại!'
                ], 404);
            }

            // Lưu thông tin hợp đồng trước khi xóa để ghi log
            $maHopDong = $hopDong->ma_hop_dong;
            $hoTen = $hopDong->ho_ten;
            $thongTinHopDong = $hopDong->toArray();

            // Xóa hợp đồng
            $hopDong->delete();

            // Log thông tin xóa
            Log::info('Xóa hợp đồng thành công', [
                'hop_dong_id' => $id,
                'ma_hop_dong' => $maHopDong,
                'ho_ten' => $hoTen,
                'deleted_data' => $thongTinHopDong,
                'user' => session('user')->name ?? 'admin'
            ]);

            // Ghi log lịch sử
            $lichSu = new LichSu();
            $lichSu->nguoi_dung = session('user')->name ?? 'admin';
            $lichSu->hanh_dong = 'Xóa hợp đồng';
            $lichSu->chi_tiet = "Xóa hợp đồng: {$maHopDong} - Khách hàng: {$hoTen}";
            $lichSu->thoi_gian = now();
            $lichSu->save();

            return response()->json([
                'success' => true,
                'message' => 'Xóa hợp đồng thành công!'
            ], 200);

        } catch (\Exception $e) {
            Log::error('deleteHopDong error: ' . $e->getMessage(), [
                'hop_dong_id' => $id,
                'user' => session('user')->name ?? 'admin',
                'error_trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi xóa hợp đồng!'
            ], 500);
        }
    }

    public function updateBanner(Request $request)
    {
        try {
            // Log request data
            Log::info('Cập nhật ảnh banner hợp đồng', [
                'user' => session('user')->name ?? 'admin',
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'request_data' => $request->all(),
                'request_method' => $request->method(),
                'request_url' => $request->fullUrl(),
                'timestamp' => now()->toDateTimeString(),
                'has_file' => $request->hasFile('banner_image'),
                'file_info' => $request->hasFile('banner_image') ? [
                    'original_name' => $request->file('banner_image')->getClientOriginalName(),
                    'mime_type' => $request->file('banner_image')->getMimeType(),
                    'size' => $request->file('banner_image')->getSize(),
                    'is_valid' => $request->file('banner_image')->isValid(),
                    'path' => $request->file('banner_image')->getPathname()
                ] : null
            ]);

            // Validate request
            $request->validate([
                'contract_id' => 'required|integer|exists:hop_dong,id',
                'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120' // 5MB max
            ]);

            $contractId = $request->input('contract_id');
            $hopDong = HopDong::find($contractId);
            
            if (!$hopDong) {
                Log::warning('Hợp đồng không tồn tại khi cập nhật banner', [
                    'contract_id' => $contractId,
                    'user' => session('user')->name ?? 'admin'
                ]);
                return response()->json([
                    'success' => false,
                    'message' => 'Hợp đồng không tồn tại!'
                ], 404);
            }

            // Lưu thông tin cũ để ghi log
            $maHopDong = $hopDong->ma_hop_dong;
            $anhBannerCu = $hopDong->anh_banner;

            // Xử lý upload ảnh
            if ($request->hasFile('banner_image')) {
                $file = $request->file('banner_image');
                
                // Kiểm tra file có hợp lệ không
                if (!$file->isValid()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'File upload không hợp lệ!'
                    ], 400);
                }
                
                // Lấy thông tin file trước khi move
                $fileSize = $file->getSize();
                $fileType = $file->getMimeType();
                $originalName = $file->getClientOriginalName();
                
                // Tạo tên file unique
                $fileName = time() . '_' . $contractId . '_banner.' . $file->getClientOriginalExtension();
                
                // Tạo thư mục nếu chưa tồn tại
                $uploadPath = public_path('images/hop_dong');
                if (!file_exists($uploadPath)) {
                    if (!mkdir($uploadPath, 0755, true)) {
                        Log::error('Không thể tạo thư mục upload', [
                            'path' => $uploadPath,
                            'user' => session('user')->name ?? 'admin'
                        ]);
                        return response()->json([
                            'success' => false,
                            'message' => 'Không thể tạo thư mục lưu trữ!'
                        ], 500);
                    }
                }
                
                // Kiểm tra quyền ghi
                if (!is_writable($uploadPath)) {
                    Log::error('Thư mục upload không có quyền ghi', [
                        'path' => $uploadPath,
                        'user' => session('user')->name ?? 'admin'
                    ]);
                    return response()->json([
                        'success' => false,
                        'message' => 'Thư mục lưu trữ không có quyền ghi!'
                    ], 500);
                }
                
                // Lưu file vào thư mục public/images/hop_dong/
                try {
                    $file->move($uploadPath, $fileName);
                } catch (\Exception $e) {
                    Log::error('Lỗi khi di chuyển file', [
                        'error' => $e->getMessage(),
                        'source' => $file->getPathname(),
                        'destination' => $uploadPath . '/' . $fileName,
                        'user' => session('user')->name ?? 'admin'
                    ]);
                    return response()->json([
                        'success' => false,
                        'message' => 'Không thể lưu file ảnh!'
                    ], 500);
                }
                
                // Cập nhật đường dẫn ảnh banner
                $hopDong->anh_banner = '/images/hop_dong/' . $fileName;
                $hopDong->save();

                // Log thông tin upload
                Log::info('Upload ảnh banner thành công', [
                    'contract_id' => $contractId,
                    'ma_hop_dong' => $maHopDong,
                    'file_name' => $fileName,
                    'original_name' => $originalName,
                    'file_size' => $fileSize,
                    'file_type' => $fileType,
                    'old_banner' => $anhBannerCu,
                    'new_banner' => $hopDong->anh_banner,
                    'user' => session('user')->name ?? 'admin'
                ]);

                // Ghi log lịch sử
                $lichSu = new LichSu();
                $lichSu->nguoi_dung = session('user')->name ?? 'admin';
                $lichSu->hanh_dong = 'Cập nhật ảnh banner';
                $lichSu->chi_tiet = "Cập nhật ảnh banner cho hợp đồng: {$maHopDong}";
                $lichSu->thoi_gian = now();
                $lichSu->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Cập nhật ảnh banner thành công!',
                    'banner_url' => $hopDong->anh_banner
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Không có file ảnh được upload!'
                ], 400);
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Validation error khi cập nhật banner', [
                'errors' => $e->errors(),
                'user' => session('user')->name ?? 'admin'
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Dữ liệu không hợp lệ!',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('updateBanner error: ' . $e->getMessage(), [
                'contract_id' => $request->input('contract_id'),
                'user' => session('user')->name ?? 'admin',
                'error_trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi cập nhật ảnh banner!'
            ], 500);
        }
    }

    public function toggleWithdrawalStatus(Request $request)
    {
        try {
            // Validate request
            $request->validate([
                'contract_id' => 'required|integer|exists:hop_dong,id',
                'cho_phep_rut_tien' => 'required|boolean'
            ]);

            $contractId = $request->input('contract_id');
            $choPhepRutTien = $request->input('cho_phep_rut_tien');

            // Log request data
            Log::info('Toggle withdrawal status', [
                'contract_id' => $contractId,
                'cho_phep_rut_tien' => $choPhepRutTien,
                'user' => session('user')->name ?? 'admin',
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'timestamp' => now()->toDateTimeString()
            ]);

            // Tìm hợp đồng
            $hopDong = HopDong::find($contractId);
            if (!$hopDong) {
                Log::warning('Hợp đồng không tồn tại khi toggle withdrawal status', [
                    'contract_id' => $contractId,
                    'user' => session('user')->name ?? 'admin'
                ]);
                return response()->json([
                    'success' => false,
                    'message' => 'Hợp đồng không tồn tại!'
                ], 404);
            }

            // Lưu trạng thái cũ để ghi log
            $trangThaiCu = $hopDong->cho_phep_rut_tien;

            // Cập nhật trạng thái rút tiền
            $hopDong->cho_phep_rut_tien = $choPhepRutTien;
            $hopDong->save();

            // Ghi log lịch sử
            $lichSu = new LichSu();
            $lichSu->nguoi_dung = session('user')->name ?? 'admin';
            $lichSu->hanh_dong = 'Thay đổi trạng thái rút tiền';
            $lichSu->chi_tiet = "Thay đổi trạng thái rút tiền cho hợp đồng: {$hopDong->ma_hop_dong} từ " . 
                               ($trangThaiCu ? 'Cho phép' : 'Không cho phép') . 
                               " thành " . 
                               ($choPhepRutTien ? 'Cho phép' : 'Không cho phép');
            $lichSu->thoi_gian = now();
            $lichSu->save();

            // Log thành công
            Log::info('Toggle withdrawal status thành công', [
                'contract_id' => $contractId,
                'ma_hop_dong' => $hopDong->ma_hop_dong,
                'trang_thai_cu' => $trangThaiCu,
                'trang_thai_moi' => $choPhepRutTien,
                'user' => session('user')->name ?? 'admin'
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Cập nhật trạng thái rút tiền thành công!',
                'cho_phep_rut_tien' => $choPhepRutTien
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Validation error khi toggle withdrawal status', [
                'errors' => $e->errors(),
                'user' => session('user')->name ?? 'admin'
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Dữ liệu không hợp lệ!',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('toggleWithdrawalStatus error: ' . $e->getMessage(), [
                'contract_id' => $request->input('contract_id'),
                'user' => session('user')->name ?? 'admin',
                'error_trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi cập nhật trạng thái rút tiền!'
            ], 500);
        }
    }
}
