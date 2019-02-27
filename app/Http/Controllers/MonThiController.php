<?php

namespace App\Http\Controllers;

use App\MonThi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonThiController extends Controller
{
    public function index(){
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        $monthiList = DB::table('tbl_monthi')
            ->where('maMT', 'like', "%$keyword%")
            ->orWhere('tenMT', 'like', "%$keyword%")
            ->paginate(6);
        return view('monthi/index')->with('monthiList', $monthiList);
    }

    public function add(){
        return view('monthi/add');
    }

    public function addsave(){
        $mamt = $_POST['txt_mamt'];
        $tenmt = $_POST['txt_tenmt'];
        $thoigianlambai = $_POST['txt_thoigianlambai'];
        $getMonThiByMamt = DB::table('tbl_monthi')
            ->where('maMT', 'like', "$mamt")
            ->get()->toArray();
        if (count($getMonThiByMamt) == 0){
            MonThi::insert([
                'maMT' => $mamt,
                'tenMT' => $tenmt,
                'thoigianlambai' => $thoigianlambai
            ]);
            $_SESSION['success_message'] = 'Thêm mới thành công';
            return redirect(route('monthi-list'));
        }else{
            $_SESSION['error_message'] = "Mã môn thi bạn vừa nhập đã có trong cơ sở dữ liệu, vui lòng nhập lại";
            return view('monthi/add')
                ->with('mamt', $mamt)
                ->with('tenmt', $tenmt)
                ->with('thoigianlambai', $thoigianlambai);
        }

    }

    public function delete($maMT){
        MonThi::find($maMT)->delete();
        $_SESSION['success_message'] = 'Xóa thành công';
        return redirect(route('monthi-list'));
    }

    public function update($maMT){
        $getMonThiByMamt = DB::table('tbl_monthi')
            ->where('maMT', 'like', "$maMT")
            ->get()->toArray();
        return view('monthi/update')
            ->with('getMonThiByMamt', $getMonThiByMamt);
    }

    public function updatesave(){
        $mamt = $_POST['txt_mamt'];
        $tenmt = $_POST['txt_tenmt'];
        $thoigianlambai = $_POST['txt_thoigianlambai'];
        DB::table('tbl_monthi')
            ->where('mamt', 'like', "$mamt")
            ->update([
                'tenmt' => $tenmt,
                'thoigianlambai' => $thoigianlambai
            ]);
        $_SESSION['success_message'] = 'Sửa thành công';
        return redirect(route('monthi-list'));
    }
}
