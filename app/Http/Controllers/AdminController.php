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
            $company = new CongTy();
            $company->fill($request->all());
            $company->save();
            return response()->json(['message' => 'Công ty đã được thêm thành công!']);
        } catch (\Exception $e) {
            Log::error('storeCompany error: ' . $e->getMessage());
            return response()->json(['message' => 'Lỗi khi thêm công ty!'], 500);
        }
    }
    public function updateCompany(Request $request, $id)
    {
        try {   
            $company = CongTy::find($id);
            $company->fill($request->all());
            $company->save();
            return response()->json(['message' => 'Công ty đã được cập nhật thành công!']);
        } catch (\Exception $e) {
            Log::error('updateCompany error: ' . $e->getMessage());
            return response()->json(['message' => 'Lỗi khi cập nhật công ty!'], 500);
        }
    }
    public function deleteCompany(Request $request, $id)
    {
        try {
            $company = CongTy::find($id);
            if (!$company) {
                $res = [
                    'rc' => 1,
                    'status' => true,
                    'message' => 'Công ty không tồn tại!',
                    'status' => true,
                    'data' => $e->getMessage(),
                    'code' => 404
                ];
                return response()->json($res, 404);
            }
            $company->delete();
            $res = [
                'rc' => 0,
                'status' => true,
                'message' => 'Công ty đã được xóa thành công!',
                'status' => true,
                'data' => $company,
                'code' => 200,
                'data' => $company
            ];
            return response()->json($res, 200);
        } catch (\Exception $e) {
            Log::error('deleteCompany error: ' . $e->getMessage());
            $res = [
                'status' => false,
                'message' => 'Lỗi khi xóa công ty!',
                'status' => false,
                'code' => 500
            ];
            return response()->json($res, 500);
        }
    }

    public function deleteHopDong(Request $request, $id)
    {
        try {
            $hopDong = HopDong::find($id);
            if (!$hopDong) {
                return response()->json([
                    'success' => false,
                    'message' => 'Hợp đồng không tồn tại!'
                ], 404);
            }

            // Lưu thông tin hợp đồng trước khi xóa để ghi log
            $maHopDong = $hopDong->ma_hop_dong;
            $hoTen = $hopDong->ho_ten;

            // Xóa hợp đồng
            $hopDong->delete();

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
            Log::error('deleteHopDong error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi xóa hợp đồng!'
            ], 500);
        }
    }
}
