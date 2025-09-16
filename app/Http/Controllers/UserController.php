<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CanCuocCongDan;
use App\Models\CongTy;
use App\Models\HopDong;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\LichSu;
class UserController extends Controller
{
    public function checkCccd(Request $request)
    {
        $cty = $request->get('cty');
        if($cty) {
            $congTy = CongTy::where('id', $cty)->first();
            if($congTy) {
                return view('user.check-cccd', compact('congTy'));
            }
            return redirect()->route('chon-dang-ky');
        }
        return redirect()->route('chon-dang-ky');
    }
    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return redirect()->route('user.index');
    }
    public function profile(Request $request)
    {
        $user = Session::get('user');
        return view('user.profile', compact('user'));
    }
    public function checkLogin(Request $request){
        try {
            $request->validate([
            'ma_so_bhxh' => ['required', 'string', 'max:20'],
            'so_cccd' => ['required', 'string', 'max:20'],
        ]);
        Log::info($request->all());
        $user = HopDong::where('ma_hop_dong', $request->ma_so_bhxh)->where('cccd', $request->so_cccd)->with('congTy')->first();

        if ($user) {
            Log::info('Đăng nhập thành công.');
            
            $lichSu = new LichSu();
            $lichSu->nguoi_dung = 'Người dùng' . $request->so_cccd;
            $lichSu->hanh_dong = 'Đăng nhập';
            $lichSu->chi_tiet = 'Đăng nhập hệ thống!';
            $lichSu->thoi_gian = now();
            $lichSu->save();
            $res = [
                'data'=>$user,
                'success' => true,
                'message' => 'Đăng nhập thành công.',
                'redirect_url' => route('profile')
            ];
            session()->put('user', (object)$user);
            return response()->json($res);
        }
        Log::info('CCCD hoặc mã hợp đồng không khớp.');
        $res = [
            'success' => false,
            'message' => 'CCCD hoặc mã hợp đồng không khớp.'
        ];
        return response()->json($res);
        } catch (\Exception $e) {
            Log::error($e);
            $res = [    'success' => false,
                'message' => 'Có lỗi xảy ra, vui lòng thử lại.'
            ];
            return response()->json($res);
        }
    }
    public function index(Request $request)
    {
        $user = Session::get('user');
        if($user && isset($user->cccd) && isset($user->ma_hop_dong)){
            $hopDong = HopDong::where('cccd', $user->cccd)->where('ma_hop_dong', $user->ma_hop_dong)->first();
        }else{
            $hopDong = '';
        }
        $anhBanner = '';
        $qrCode = '';
        if($hopDong){
            $qrCode = $hopDong->anh_banner;
        }
        return view('user.index', compact('anhBanner', 'qrCode'));
    }
    public function register(Request $request)
    {
        $cty = $request->get('cty');
        $ccccd = $request->get('ccccd');
        $ma_bao_mat = $request->get('ma_bao_mat');
        if(!$cty || !$ccccd || !$ma_bao_mat){
            return redirect()->route('chon-dang-ky');
        }
        $congTy = CongTy::where('id', $cty)->first();
        if(!$congTy){
            return redirect()->route('chon-dang-ky');
        }
        $check = HopDong::where('cccd', $ccccd)->where('ma_hop_dong', $ma_bao_mat)->first();
        if($check){
            return redirect()->route('chon-dang-ky');
        }
        $checkCccd = CanCuocCongDan::where('ccccd', $ccccd)->where('ma_bao_mat', $ma_bao_mat)->first();
        if(!$checkCccd){
            return redirect()->route('chon-dang-ky');
        }
        $checkHd = HopDong::where('cccd', $ccccd)->where('ma_hop_dong', $ma_bao_mat)->first();
        if($checkHd){
            return redirect()->route('chon-dang-ky');
        }
        return view('user.register', compact('cty', 'ccccd', 'ma_bao_mat', 'congTy'));
    }
    public function chonDangKy(Request $request)
    {
        $list_partner = CongTy::where('trang_thai', 1)->get();
        return view('user.chon-dang-ky', compact('list_partner'));
    }
    public function verifyCccd(Request $request)
    {
        $validated = $request->validate([
            'ccccd' => ['required', 'string', 'max:20'],
            'ma_bao_mat' => ['required', 'string', 'max:50'],
        ]);

        $record = CanCuocCongDan::where('ccccd', $validated['ccccd'])
            ->where('ma_bao_mat', $validated['ma_bao_mat'])
            ->first();

        if (!$record) {
            return response()->json([
                'ok' => false,
                'message' => 'Thông tin không khớp hoặc không tồn tại.'
            ], 404);
        }
        $checkHopDong = HopDong::where('cccd', $validated['ccccd'])->where('ma_hop_dong', $validated['ma_bao_mat'])->first();
        if ($checkHopDong) {
            return response()->json([
                'ok' => false,
                'message' => 'Mã số hợp đồng đã tồn tại trong hệ thống.'
            ], 404);
        }

        return response()->json([
            'ok' => true,
            'message' => 'Xác minh thành công.',
            'data' => [
                'ccccd' => $record->ccccd,
                'trang_thai' => $record->trang_thai,
            ],
        ]);
    }

    public function store(Request $request)
    {
        try {
            $checkCccd = CanCuocCongDan::where('ccccd', $request->cccd)->where('ma_bao_mat', $request->ma_hop_dong)->first();
            if(!$checkCccd){
                return response()->json([
                    'success' => false,
                    'message' => 'Số CCCD hoặc mã hợp đồng không khớp.'
                ], 404);
            }
            $checkHopDong = HopDong::where('cccd', $request->cccd)->where('ma_hop_dong', $request->ma_hop_dong)->first();
            if($checkHopDong){
                return response()->json([
                    'success' => false,
                    'message' => 'Mã hợp đồng đã tồn tại trong hệ thống.'
                ], 404);
            }
            // Validation rules
            $rules = [
                'cccd' => 'required|string|max:20',
                'ma_hop_dong' => 'required|string|max:50',
                'ho_ten' => 'required|string|max:255',
                'gioi_tinh' => 'required|string|in:Nam,Nữ',
                'ngay_sinh' => 'required|string',
                'dia_chi' => 'required|string|max:500',
                'so_dien_thoai' => 'required|string|max:15',
                'so_tien_mua' => 'required|numeric|min:0',
                'so_tien_dong_hang_nam' => 'required|numeric|min:0',
                'thoi_gian_mua' => 'required|integer|min:1',
                'ngay_cap_hop_dong' => 'required|string',
                'ngay_dao_han' => 'required|string',
                'ngan_hang' => 'required|string|max:255',
                'so_tai_khoan' => 'required|string|max:50',
                'chu_tai_khoan' => 'required|string|max:255',
                'loai_hop_dong' => 'required|string|in:cho_ban_than,cho_nguoi_khac',
                'cty' => 'required|integer|exists:cong_ty,id',
                // Validation bắt buộc cho hình ảnh
                'anh_mat_truoc' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
                'anh_mat_sau' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
                'anh_chan_dung' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            ];

            // Nếu loại hợp đồng là cho người khác, thêm validation cho thông tin người thừa hưởng
            if ($request->loai_hop_dong === 'cho_nguoi_khac') {
                $beneficiaryRules = [
                    'th_cccd' => 'required|string|max:20',
                    'th_moi_quan_he' => 'required|string|max:50',
                    'th_ho_ten' => 'required|string|max:255',
                    'th_gioi_tinh' => 'required|string|in:Nam,Nữ',
                    'th_ngay_sinh' => 'required|string',
                    'th_dia_chi' => 'required|string|max:500',
                    'th_so_dien_thoai' => 'required|string|max:15',
                    'th_ngan_hang' => 'required|string|max:255',
                    'th_so_tai_khoan' => 'required|string|max:50',
                    'th_chu_tai_khoan' => 'required|string|max:255',
                    // Validation bắt buộc cho hình ảnh người thừa hưởng
                    'th_anh_mat_truoc' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
                    'th_anh_mat_sau' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
                    'th_anh_chan_dung' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
                ];
                $rules = array_merge($rules, $beneficiaryRules);
            }

            $validated = $request->validate($rules);

            // Tạo hợp đồng
            $hopDong = new HopDong();
            $hopDong->cccd = $validated['cccd'];
            $hopDong->ma_hop_dong = $validated['ma_hop_dong'];
            $hopDong->ho_ten = $validated['ho_ten'];
            $hopDong->gioi_tinh = $validated['gioi_tinh'];
            $hopDong->ngay_sinh = $validated['ngay_sinh'];
            $hopDong->dia_chi = $validated['dia_chi'];
            $hopDong->so_dien_thoai = $validated['so_dien_thoai'];
            $hopDong->so_tien_mua = $validated['so_tien_mua'];
            $hopDong->so_tien_dong_hang_nam = $validated['so_tien_dong_hang_nam'];
            $hopDong->thoi_gian_mua = $validated['thoi_gian_mua'];
            $hopDong->ngay_cap_hop_dong = $validated['ngay_cap_hop_dong'];
            $hopDong->ngay_dao_han = $validated['ngay_dao_han'];
            $hopDong->ngan_hang = $validated['ngan_hang'];
            $hopDong->so_tai_khoan = $validated['so_tai_khoan'];
            $hopDong->chu_tai_khoan = $validated['chu_tai_khoan'];
            $hopDong->loai_hop_dong = $validated['loai_hop_dong'];
            $hopDong->cong_ty_id = $validated['cty'];

            // Xử lý thông tin người thừa hưởng nếu có
            if ($validated['loai_hop_dong'] === 'cho_nguoi_khac') {
                $hopDong->th_cccd = $validated['th_cccd'];
                $hopDong->th_moi_quan_he = $validated['th_moi_quan_he'];
                $hopDong->th_ho_ten = $validated['th_ho_ten'];
                $hopDong->th_gioi_tinh = $validated['th_gioi_tinh'];
                $hopDong->th_ngay_sinh = $validated['th_ngay_sinh'];
                $hopDong->th_dia_chi = $validated['th_dia_chi'];
                $hopDong->th_so_dien_thoai = $validated['th_so_dien_thoai'];
                $hopDong->th_ngan_hang = $validated['th_ngan_hang'];
                $hopDong->th_so_tai_khoan = $validated['th_so_tai_khoan'];
                $hopDong->th_chu_tai_khoan = $validated['th_chu_tai_khoan'];
            }

            // Xử lý upload ảnh
            if ($request->hasFile('anh_mat_truoc')) {
                $file = $request->file('anh_mat_truoc');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/hop_dong'), $fileName);
                $hopDong->anh_mat_truoc = 'images/hop_dong/' . $fileName;
            }
            if ($request->hasFile('anh_mat_sau')) {
                $file = $request->file('anh_mat_sau');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/hop_dong'), $fileName);
                $hopDong->anh_mat_sau = 'images/hop_dong/' . $fileName;
            }
            if ($request->hasFile('anh_chan_dung')) {
                $file = $request->file('anh_chan_dung');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/hop_dong'), $fileName);
                $hopDong->anh_chan_dung = 'images/hop_dong/' . $fileName;
            }

            // Xử lý upload ảnh người thừa hưởng
            if ($validated['loai_hop_dong'] === 'cho_nguoi_khac') {
                if ($request->hasFile('th_anh_mat_truoc')) {
                    $file = $request->file('th_anh_mat_truoc');
                    $fileName = time() . '_th_' . $file->getClientOriginalName();
                    $file->move(public_path('images/hop_dong'), $fileName);
                    $hopDong->th_anh_mat_truoc = 'images/hop_dong/' . $fileName;
                }
                if ($request->hasFile('th_anh_mat_sau')) {
                    $file = $request->file('th_anh_mat_sau');
                    $fileName = time() . '_th_' . $file->getClientOriginalName();
                    $file->move(public_path('images/hop_dong'), $fileName);
                    $hopDong->th_anh_mat_sau = 'images/hop_dong/' . $fileName;
                }
                if ($request->hasFile('th_anh_chan_dung')) {
                    $file = $request->file('th_anh_chan_dung');
                    $fileName = time() . '_th_' . $file->getClientOriginalName();
                    $file->move(public_path('images/hop_dong'), $fileName);
                    $hopDong->th_anh_chan_dung = 'images/hop_dong/' . $fileName;
                }
            }

            $hopDong->save();

            return response()->json([
                'success' => true,
                'message' => 'Đăng ký bảo hiểm thành công!',
                'data' => [
                    'hop_dong_id' => $hopDong->id,
                    'ma_hop_dong' => $hopDong->ma_hop_dong
                ],
                'redirect_url' => route('user.register')
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Xử lý lỗi validation
            $errors = $e->errors();
            
            return response()->json([
                'success' => false,
                'message' => 'Vui lòng kiểm tra lại thông tin đã nhập.',
                'errors' => $errors
            ], 422);
        } catch (\Exception $e) {
            Log::error('Lỗi đăng ký bảo hiểm: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi đăng ký. Vui lòng thử lại.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function rutTien(Request $request)
    {
        if ($request->isMethod('post')) {
            return $this->processRutTien($request);
        }
        
        $user = Session::get('user');
        if (!$user) {
            return redirect()->route('user.index')->with('error', 'Vui lòng đăng nhập để sử dụng chức năng này');
        }
        // Lấy hợp đồng để hiển thị số dư hiện tại và tiền lãi
        $hopDong = HopDong::where('cccd', $user->cccd ?? null)
            ->where('ma_hop_dong', $user->ma_hop_dong ?? null)
            ->first();

        $principal = 0;
        $interest = 0;
        if ($hopDong) {
            // Loại bỏ ký tự không phải số phòng trường hợp lưu kèm dấu chấm/phẩy hoặc text
            $soTienMua = $hopDong->so_tien_mua ? (int)preg_replace('/\D/', '', (string)$hopDong->so_tien_mua) : 0;
            $thoiGianMua = $hopDong->thoi_gian_mua ? (int)$hopDong->thoi_gian_mua : 0;
            $principal = $soTienMua * $thoiGianMua;
            $interest = $hopDong->tien_lai ? (int)preg_replace('/\D/', '', (string)$hopDong->tien_lai) : 0;
        }

        $soDuHienTai = $principal; // Tiền lãi tách riêng
        $tienLai = $interest;

        $congTy = $hopDong ? $hopDong->congTy : null;

        return view('user.rut-tien', compact('user', 'soDuHienTai', 'tienLai', 'hopDong', 'congTy'));
    }
    
    private function processRutTien(Request $request)
    {
        try {
            // Validation - yêu cầu số tiền và chữ ký
            $request->validate([
                'so_tien' => 'required|numeric|min:10000|max:100000000',
                'signature' => 'required|string'
            ], [
                'so_tien.required' => 'Vui lòng nhập số tiền rút',
                'so_tien.numeric' => 'Số tiền phải là số',
                'so_tien.min' => 'Số tiền tối thiểu là 10,000 VNĐ',
                'so_tien.max' => 'Số tiền tối đa là 100,000,000 VNĐ',
                'signature.required' => 'Vui lòng ký xác nhận trước khi gửi'
            ]);
            
            $user = Session::get('user');
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Vui lòng đăng nhập để sử dụng chức năng này'
                ], 401);
            }
            
            // Lấy thông tin hợp đồng để kiểm tra cho_phep_rut_tien
            $hopDong = HopDong::where('cccd', $user->cccd)
                ->where('ma_hop_dong', $user->ma_hop_dong)
                ->first();
            
            if (!$hopDong) {
                return response()->json([
                    'success' => false,
                    'message' => 'Không tìm thấy thông tin hợp đồng'
                ], 404);
            }
            
            // Kiểm tra quyền rút tiền
            if ($hopDong->cho_phep_rut_tien == 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Có lỗi trong quá trình xử lý hồ sơ. Vui lòng liên hệ admin để xử lý hồ sơ.'
                ], 403);
            }
            
            // Kiểm tra thông tin ngân hàng của user
            if (!$user->ngan_hang || !$user->so_tai_khoan || !$user->chu_tai_khoan) {
                return response()->json([
                    'success' => false,
                    'message' => 'Vui lòng cập nhật đầy đủ thông tin ngân hàng trong trang cá nhân trước khi rút tiền'
                ]);
            }
            
            // Tính số dư hiện tại theo công thức: so_tien_mua * thoi_gian_mua (tiền lãi tách riêng)
            $soTienMua = $hopDong->so_tien_mua ? (int)preg_replace('/\D/', '', (string)$hopDong->so_tien_mua) : 0;
            $thoiGianMua = $hopDong->thoi_gian_mua ? (int)$hopDong->thoi_gian_mua : 0;
            $soDuHienTai = $soTienMua * $thoiGianMua;
            $soTienRut = $request->so_tien;
            
            if ($soTienRut > $soDuHienTai) {
                return response()->json([
                    'success' => false,
                    'message' => 'Số dư tài khoản không đủ để thực hiện giao dịch này'
                ], 400);
            }
            
            // Kiểm tra chữ ký hợp lệ dạng data URL
            $signature = (string) $request->input('signature');
            if (strpos($signature, 'data:image') !== 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Định dạng chữ ký không hợp lệ'
                ], 422);
            }

            // Lưu chữ ký vào hợp đồng
            $hopDong->chu_ky = $signature;
            $hopDong->save();
            
            // Kiểm tra số lần rút tiền trong tháng (giả lập)
            $soLanRutTrongThang = 3; // Giả lập đã rút 3 lần
            $gioiHanRutTrongThang = 10; // Giới hạn 10 lần/tháng
            
            if ($soLanRutTrongThang >= $gioiHanRutTrongThang) {
                return response()->json([
                    'success' => false,
                    'message' => 'Bạn đã đạt giới hạn số lần rút tiền trong tháng'
                ], 400);
            }
            
            // Lưu lịch sử giao dịch (giả lập)
            $lichSu = new LichSu();
            $lichSu->nguoi_dung = $user->ho_ten ?? $user->name ?? 'Người dùng';
            $lichSu->hanh_dong = 'Yêu cầu rút tiền';
            $lichSu->chi_tiet = sprintf(
                'Yêu cầu rút %s VNĐ từ tài khoản %s (%s) - %s',
                number_format($soTienRut, 0, ',', '.'),
                $user->so_tai_khoan ?? 'N/A',
                $user->ngan_hang ?? 'N/A',
                $user->chu_tai_khoan ?? 'N/A'
            );
            $lichSu->thoi_gian = now();
            $lichSu->save();
            
            // Gửi email thông báo (giả lập)
            // Mail::to($user->email)->send(new RutTienNotification($request->all()));
            
            return response()->json([
                'success' => true,
                'message' => 'Rút tiền thành công. Số tiền sẽ được gửi vào tài khoản trong 1-3 ngày.'
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Vui lòng kiểm tra lại thông tin đã nhập.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Lỗi khi xử lý rút tiền: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi xử lý yêu cầu rút tiền. Vui lòng thử lại sau.'
            ], 500);
        }
    }

    public function kyRutTien(Request $request)
    {
        // API ký rút tiền: chỉ lưu chữ ký, không chặn bởi quyền rút tiền
        if (!$request->isMethod('post')) {
            return response()->json([
                'success' => false,
                'message' => 'Phương thức không hợp lệ'
            ], 405);
        }

        try {
            $request->validate([
                'signature' => 'required|string'
            ], [
                'signature.required' => 'Vui lòng ký xác nhận trước khi gửi'
            ]);

            $user = Session::get('user');
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Vui lòng đăng nhập để sử dụng chức năng này'
                ], 401);
            }

            $hopDong = HopDong::where('cccd', $user->cccd)
                ->where('ma_hop_dong', $user->ma_hop_dong)
                ->first();

            if (!$hopDong) {
                return response()->json([
                    'success' => false,
                    'message' => 'Không tìm thấy thông tin hợp đồng'
                ], 404);
            }

            $signature = (string) $request->input('signature');
            if (strpos($signature, 'data:image') !== 0) {
                return response()->json([
                    'success' => false,
                    'message' => 'Định dạng chữ ký không hợp lệ'
                ], 422);
            }

            // Lưu chữ ký vào hợp đồng
            $hopDong->chu_ky = $signature;
            $hopDong->save();

            // Ghi lịch sử ký
            $lichSu = new LichSu();
            $lichSu->nguoi_dung = $user->ho_ten ?? $user->name ?? 'Người dùng';
            $lichSu->hanh_dong = 'Ký rút tiền';
            $lichSu->chi_tiet = 'Người dùng đã ký xác nhận yêu cầu rút tiền.';
            $lichSu->thoi_gian = now();
            $lichSu->save();

            return response()->json([
                'success' => true,
                'message' => 'Ký xác nhận thành công.'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Vui lòng kiểm tra lại thông tin đã nhập.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Lỗi khi ký rút tiền: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi xử lý yêu cầu. Vui lòng thử lại sau.'
            ], 500);
        }
    }
    public function hopDong(Request $request)
    {
        $user = Session::get('user');
        $hopDong = HopDong::where('cccd', $user->cccd)->where('ma_hop_dong', $user->ma_hop_dong)->first();
        if(!$hopDong){
            return redirect()->route('user.index')->with('error', 'Không tìm thấy hợp đồng');
        }
        $congTy = CongTy::where('id', $hopDong->cong_ty_id)->first();
        if(!$congTy){
            return redirect()->route('user.index')->with('error', 'Không tìm thấy công ty');
        }
        return view('user.hop-dong', compact('hopDong', 'congTy'));
    }
}
