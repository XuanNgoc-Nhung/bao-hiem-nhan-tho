<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CongTy;
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
}
