<?php

namespace App\Http\Controllers;

use App\NhanVien;
use App\SinhVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SinhVienController extends Controller
{
    public function index(){
        $keyword = isset($_GET['txt_keyword']) ? $_GET['txt_keyword'] : '';
        $sinhvienList = DB::table('tbl_sinhvien')
            ->where('maSV', 'like', "%$keyword%")
            ->orWhere('hotenSV', 'like', "%$keyword%")
            ->orWhere('ngaysinh', 'like', "%$keyword%")
            ->orWhere('lop', 'like', "%$keyword%")
            ->orderBy('maSV')
            ->paginate(6);
        return view('sinhvien/index', ['sinhvienList' => $sinhvienList]);
    }

    public function add(){
        return view('sinhvien/add');
    }

    public function addsave(){
        $masv = $_POST['txt_masv'];
        $hotensv = $_POST['txt_hotensv'];
        $ngaysinh = $_POST['txt_ngaysinh'];
        $lop = $_POST['txt_lop'];
        $matkhau = $_POST['txt_matkhau'];
        $getSinhVienByMasv = DB::table('tbl_sinhvien')
            ->where('masv', 'like', "$masv")
            ->get()->toArray();
        if (count($getSinhVienByMasv) == 0){
            $sinhvien = new SinhVien();
            $sinhvien->masv = $masv;
            $sinhvien->hotensv = $hotensv;
            $sinhvien->ngaysinh = $ngaysinh;
            $sinhvien->lop = $lop;
            $sinhvien->matkhau = $matkhau;

            $sinhvien->save();
            $_SESSION['success_message'] = 'Thêm mới thành công';

            return redirect(route('sinhvien-list'));
        }else{
            $_SESSION['error_message'] = "Mã sinh viên bạn vừa nhập đã có trong cơ sở dữ liệu, vui lòng nhập lại";
            return view('sinhvien/add')
                ->with('masv', $masv)
                ->with('hotensv', $hotensv)
                ->with('ngaysinh', $ngaysinh)
                ->with('lop', $lop)
                ->with('matkhau', $matkhau);
        }


    }

    public function delete($id){
        SinhVien::find($id)->delete();
        $_SESSION['success_message'] = 'Xóa thành công';
        return redirect()->action('SinhVienController@index');
    }

    public function update($id){
        $getSinhVienByMasv = DB::table('tbl_sinhvien')
            ->where('masv', 'like', "$id")
            ->get()->toArray();
//        dd($getSinhVienByMasv);
        return view('sinhvien/update')->with('getSinhVienByMasv', $getSinhVienByMasv);
    }

    public function updatesave(){
//        dd($_POST);
        $masv = $_POST['txt_masv'];
        $hotensv = $_POST['txt_hotensv'];
        $ngaysinh = $_POST['txt_ngaysinh'];
        $lop = $_POST['txt_lop'];
        $matkhau = $_POST['txt_matkhau'];

        DB::table('tbl_sinhvien')
            ->where('maSV', 'like', "$masv")
            ->update([
                'hotenSV' => $hotensv,
                'ngaysinh' => $ngaysinh,
                'lop' => $lop,
                'matkhau' => $matkhau
            ]);

        $_SESSION['success_message'] = 'Sửa thành công';
        return redirect(route('sinhvien-list'));
    }

    public function xemdiem($masv){
        $sv = DB::table('tbl_sinhvien')
            ->where('masv', 'like', "$masv")
            ->get()->toArray()  ;
//        dd($sv);
        $getKetQuaByMasv = DB::table('tbl_ketqua')
            ->join('tbl_monthi', 'maMT', 'like', 'KQ_maMT')
            ->where('kq_masv', 'like', "$masv")
            ->get()->toArray();
//        dd($getKetQuaByMasv);
        return view('sinhvien/xemdiem')
            ->with('sv', $sv)
            ->with('getKetQuaByMasv', $getKetQuaByMasv);
    }

}
