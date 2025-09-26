<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CanCuocCongDan;
use App\Models\LichSu;

class CccdController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');
        $query = CanCuocCongDan::query();
        if ($search) {
            $query->where('ccccd', 'like', '%' . $search . '%');
        }
        if ($status !== null && in_array((int)$status, [1, 2], true)) {
            $query->where('trang_thai', (int)$status);
        }
        $danh_sach_cccd = $query->paginate(20);
        return view('admin.cccd', compact('danh_sach_cccd'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ccccd' => ['required', 'string', 'max:20', 'unique:can_cuoc_cong_dan,ccccd'],
            'ma_bao_mat' => ['nullable', 'string', 'max:50'],
        ], [
            'ccccd.required' => 'Vui lòng nhập số CCCD.',
            'ccccd.unique' => 'Số CCCD này đã tồn tại trong hệ thống.',
            'ccccd.max' => 'Số CCCD không được vượt quá 20 ký tự.',
        ]);

        $cccd = new CanCuocCongDan();
        $cccd->ccccd = $validated['ccccd'];
        if (isset($validated['ma_bao_mat'])) {
            $cccd->ma_bao_mat = $validated['ma_bao_mat'];
        }
        $cccd->trang_thai = 1;
        $cccd->save();
        LichSu::create([
            'nguoi_dung' => $request->session()->get('user')->name,
            'hanh_dong' => 'Tạo CCCD',
            'chi_tiet' => 'Tạo CCCD : ' . $validated['ccccd'] . ' thành công',
            'thoi_gian' => now(),
        ]);

        return response()->json([
            'message' => 'Tạo CCCD thành công',
            'data' => $cccd,
        ], 201);
    }

    public function destroy(Request $request, $id)
    {
        $cccd = CanCuocCongDan::find($id);
        if (!$cccd) {
            return response()->json([
                'message' => 'Không tìm thấy bản ghi CCCD'
            ], 404);
        }

        $cccd->delete();
        LichSu::create([
            'nguoi_dung' => $request->session()->get('user')->name,
            'hanh_dong' => 'Xóa CCCD',
            'chi_tiet' => 'Xóa CCCD : ' . $cccd->ccccd . ' thành công',
            'thoi_gian' => now(),
        ]);
        return response()->json([
            'message' => 'Xóa CCCD thành công'
        ]);
    }

    public function update(Request $request, $id) {
        $cccd = CanCuocCongDan::find($id);
        if (!$cccd) {
            return response()->json([
                'message' => 'Không tìm thấy bản ghi CCCD'
            ], 404);
        }

        $validated = $request->validate([
            'ccccd' => ['required', 'string', 'max:20', 'unique:can_cuoc_cong_dan,ccccd,' . $id],
            'ma_bao_mat' => ['nullable', 'string', 'max:50'],
            'trang_thai' => ['nullable', 'in:1,2']
        ], [
            'ccccd.required' => 'Vui lòng nhập số CCCD.',
            'ccccd.unique' => 'Số CCCD này đã tồn tại trong hệ thống.',
            'ccccd.max' => 'Số CCCD không được vượt quá 20 ký tự.',
            'ma_bao_mat.max' => 'Mã bảo mật không được vượt quá 50 ký tự.',
            'trang_thai.in' => 'Trạng thái không hợp lệ.'
        ]);

        $cccd->ccccd = $validated['ccccd'];
        $cccd->ma_bao_mat = $validated['ma_bao_mat'] ?? null;
        if (array_key_exists('trang_thai', $validated)) {
            $cccd->trang_thai = (int) $validated['trang_thai'];
        }
        $cccd->save();
        LichSu::create([
            'nguoi_dung' => $request->session()->get('user')->name,
            'hanh_dong' => 'Cập nhật CCCD',
            'chi_tiet' => 'Cập nhật CCCD : ' . $cccd->ccccd . ' thành công',
            'thoi_gian' => now(),
        ]);
        return response()->json([
            'message' => 'Cập nhật CCCD thành công',
            'data' => $cccd
        ]);
    }

}
