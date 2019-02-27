@extends('layout/backend')

@section('content')
    <div align="center">
        <h2>Kết quả thi Sinh Viên</h2>
        <p>Họ tên: {{ $sv[0]->hotenSV }}</p>
        <p>Mã SV: {{ $sv[0]->maSV }}</p>
        <?php
        if (isset($_SESSION['error_message'])){
            echo "<p style='color: red'>".$_SESSION['error_message']."</p>";
            unset($_SESSION['error_message']);
        }
        if (isset($_SESSION['success_message'])){
            echo "<p style='color: green'>".$_SESSION['success_message']."</p>";
            unset($_SESSION['success_message']);
        }
        ?>

            <table class="table table-bordered">
                <tr>
                    <th>Tên môn thi</th>
                    <th>Điểm</th>
                    <th colspan="3" align="center">Thao tác</th>
                </tr>
                <?php
                for ($i = 0; $i < count($getKetQuaByMasv); $i++){
                    echo '<tr>
                          <td>'.$getKetQuaByMasv[$i]->tenMT.'</td>
                          <td>'.$getKetQuaByMasv[$i]->diem.'</td>
                          <td>
                               <a href="sinhvien/'.$getKetQuaByMasv[$i]->maKQ.'/update">
                                    <button type="button" class="btn btn-primary btn-sm">Sửa</button>
                               </a>
                          </td>
                          <td>
                               <a onclick="return confirm(\'Xác nhận xóa?\')" href="ketqua/'.$getKetQuaByMasv[$i]->maKQ.'/delete">
                                    <button type="button" class="btn btn-danger btn-sm">Xóa</button>
                               </a>
                          </td>
                      </tr>';
                }

                ?>
            </table>
        </form>


    </div>

@endsection