<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CanCuocCongDan;
use App\Models\CongTy;
use App\Models\HopDong;
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
            return redirect()->route('home');
        }
        return redirect()->route('home');
    }
    public function register(Request $request)
    {
        $cty = $request->get('cty');
        $ccccd = $request->get('ccccd');
        $ma_bao_mat = $request->get('ma_bao_mat');
        return view('user.register', compact('cty', 'ccccd', 'ma_bao_mat'));
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
        $checkHopDong = HopDong::where('ccccd', $validated['ccccd'])->where('ma_bao_mat', $validated['ma_bao_mat'])->first();
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
}
