<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    // 添加 $fillable 属性以允许批量赋值
    protected $fillable = ['originalName', 'mimeType', 'path', 'description'];

    // 其他模型代码...
}
