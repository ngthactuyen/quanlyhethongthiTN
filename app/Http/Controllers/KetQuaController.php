<?php

namespace App\Http\Controllers;

use App\KetQua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KetQuaController extends Controller
{
    public function index(){
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        $ketquaList = DB::table('tbl_ketqua')
            ->join('tbl_sinhvien', 'KQ_maSV', 'like', 'maSV')
            ->join('tbl_monthi', 'KQ_maMT', 'like', 'maMT')
            ->orderBy('maMT')
            ->orderBy('maSV')
            ->paginate(20);
        return view('ketqua/index')
            ->with('ketquaList', $ketquaList);
    }


    public function delete($makq){
        DB::table('tbl_ketqua')
            ->where('maKQ', 'like', $makq)
            ->delete();
        $_SESSION['success_message'] = 'Xóa thành công';
        return redirect(route('ketqua-list'));
    }

    public function update($makq){
        $getKetQuaByMaKQ = DB::table('tbl_ketqua')
            ->join('tbl_sinhvien', 'KQ_maSV', 'like', 'maSV')
            ->join('tbl_monthi', 'KQ_maMT', 'like', 'maMT')
            ->where('maKQ', 'like', "$makq")
            ->get()->toArray();
//        dd($getKetQuaByMaKQ);
        return view('ketqua/update')
            ->with('getKetQuaByMaKQ', $getKetQuaByMaKQ);
    }

    public function updatesave(){
//        dd($_POST);
        $makq = $_POST['txt_makq'];
        $diem = $_POST['txt_diem'];
        DB::table('tbl_ketqua')
            ->where('maKQ', 'like', $makq)
            ->update([
                'diem' => $diem
            ]);
        $_SESSION['success_message'] = 'Sửa thàng công';
        return redirect(route('ketqua-list'));
    }
}
