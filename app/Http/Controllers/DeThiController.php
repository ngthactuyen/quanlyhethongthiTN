<?php

namespace App\Http\Controllers;

use App\DeThi;
use App\MonThi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeThiController extends Controller
{
    public function index(){
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        $dethiList = DB::table('tbl_dethi')
            ->join('tbl_monthi', 'DT_maMT', 'like', 'maMT')
            ->where('maMT', 'like', "%$keyword%")
            ->orWhere('tenMT', 'like', "%$keyword%")
            ->orWhere('maDT', 'like', "%$keyword%")
            ->orderBy('maMT')
            ->orderBy('maDT')
            ->paginate(10);
//        dd($dethiList);
        return view('dethi/index')
            ->with('dethiList', $dethiList);
    }

    public function delete($maDT){
        DeThi::find($maDT)->delete();
        $_SESSION['success_message'] = 'Xóa thành công';
        return redirect(route('dethi-list'));
    }

    public function add(){
        $monthiList = DB::table('tbl_monthi')
            ->get()->toArray();
//        dd($monthiList);
        return view('dethi/add')
            ->with('monthiList', $monthiList);
    }

    public function addsave(){
        $mamt = $_POST['sl_mamt'];
        $madt = $_POST['txt_madt'];
        $dethi = DB::table('tbl_dethi')
            ->where('maDT', 'like', "$madt")
            ->get()->toArray();
        if (count($dethi) == 0){
            DB::table('tbl_dethi')
                ->insert([
                    'maDT' => $madt,
                    'DT_maMT' => $mamt
                ]);
            $_SESSION['success_message'] = 'Thêm mới thàng công';
            return redirect(route('dethi-list'));
        }else{
            $_SESSION['error_message'] = 'Mã đề thi bạn vừa nhập đã có trong cơ sở dữ liệu, vui lòng nhập lại';
            $monthiList = DB::table('tbl_monthi')
                ->get()->toArray();
            return view('dethi/add')
                ->with('mamt', $mamt)
                ->with('madt', $madt)
                ->with('monthiList', $monthiList);
        }
    }


}
