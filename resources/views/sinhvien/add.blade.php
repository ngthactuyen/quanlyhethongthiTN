@extends('layout/backend')

@section('content')

<div align="center">
    <h2>Thêm mới Sinh Viên</h2>
    <?php
    if (isset($_SESSION['error_message'])){
        echo "<p style='color: red'>".$_SESSION['error_message']."</p>";
        unset($_SESSION['error_message']);
    }
    ?>
    <form action="{{route('sinhvien-addsave')}}" method="post" name="myForm" onsubmit="return validateForm()">
        <table class="table table-bordered">
            <input class="form-control" type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <tr>
                <th>Mã sinh viên</th>
                <td>
                    <input class="form-control" type="text" name="txt_masv" id="masv" value="{{ isset($masv) ? $masv : '' }}">
                </td>
            </tr>
            <tr>
                <th>Họ tên</th>
                <td>
                    <input class="form-control" type="text" name="txt_hotensv" id="hotensv" value="{{ isset($hotensv) ? $hotensv : '' }}">
                </td>
            </tr>
            <tr>
                <th>Ngày sinh</th>
                <td>
                    <input class="form-control" type="text" name="txt_ngaysinh" id="ngaysinh" placeholder="Năm - tháng - ngày" value="{{ isset($ngaysinh) ? $ngaysinh : '' }}">
                </td>
            </tr>
            <tr>
                <th>Lớp</th>
                <td>
                    <input class="form-control" type="text" name="txt_lop" id="lop" value="{{ isset($lop) ? $lop : '' }}">
                </td>
            </tr>
            <tr>
                <th>Mật khẩu</th>
                <td>
                    <input class="form-control" type="text" name="txt_matkhau" id="matkhau" value="{{ isset($matkhau) ? $matkhau : '' }}">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input class="btn btn-primary btn-sm" type="submit" value="Thêm mới">
                </td>
            </tr>
        </table>
    </form>
</div>


@endsection