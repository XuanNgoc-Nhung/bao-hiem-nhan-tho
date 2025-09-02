<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CanCuocCongDan extends Model
{
    protected $table = 'can_cuoc_cong_dan';
    protected $fillable = [
        'ccccd',
        'ma_bao_mat',
        'trang_thai'
    ];
}
