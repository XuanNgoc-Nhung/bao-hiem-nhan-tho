<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use App\Models\HopDong;

class UserInfoComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $check = Session::get('user');
        if(!$check){
            $userInfo = null;
        }else{
            // Kiểm tra xem thuộc tính cccd và ma_hop_dong có tồn tại không
            if(isset($check->cccd) && isset($check->ma_hop_dong)){
                $userInfo = HopDong::where('cccd', $check->cccd)->where('ma_hop_dong', $check->ma_hop_dong)->with('congTy')->first();
            } else {
                // Nếu không có thuộc tính cần thiết, đặt userInfo = null
                $userInfo = null;
            }
        }
        $view->with('userInfo', $userInfo);
    }
}
