<?php

namespace App\Http\Controllers;

use App\QuanLy;
use Illuminate\Http\Request;

class QuanLyController extends Controller
{
    public function login(){
        if (isset($_SESSION['tenNhanVien'])){
            return redirect(route('sinhvien-list'));
        }else{
            return view('quanly/login');
        }
    }

    public function logout(){
        unset($_SESSION['tenQuanLy']);
        return view('quanly/login');
    }

    public function authenticate(){
//        dd($_POST);
        $tendangnhap = @$_POST['txt_tendangnhap'];
        $matkhau = @$_POST['txt_matkhau'];
//        dd($matkhau);
        $quanly = new QuanLy();
        $getQuanLyByTendangnhap = $quanly->where('maQL', 'like', $tendangnhap)->get()->toArray();
//        dd($getQuanLyByTendangnhap);
        if (!$getQuanLyByTendangnhap){
            $_SESSION['error_message'] = 'Tên tài khoản sai hoặc không tồn tại!';
            return redirect(route('quanly-login'));
        }elseif ($getQuanLyByTendangnhap[0]['matkhau'] != $matkhau){
            $_SESSION['error_message'] = 'Mật khẩu đăng nhập sai!';
            return redirect(route('quanly-login'));
        }else{
            $_SESSION['success_message'] = 'Đăng nhập thành công';
            $_SESSION['tenQuanLy'] = $getQuanLyByTendangnhap[0]['hotenQL'];
            return redirect(route('sinhvien-list'));
//            return view('layout/backend');
        }
//        var_dump($getNhanVienByTendangnhap);
//        echo "<br>";
//        var_dump($_POST);
//        echo "<br>";
//        var_dump($_SESSION);
    }
}
