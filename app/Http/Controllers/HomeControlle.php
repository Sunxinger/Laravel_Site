<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application's home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取所有上传的数据
        $uploads = Upload::all();

        // 将上传的数据传递给主页视图
        return view('welcome', ['uploads' => $uploads]);
    }
}
