@extends('layout/backend')

@section('content')

<div align="center">
    <h2>Sửa thông tin Sinh Viên</h2>

    <form action="{{route('sinhvien-updatesave')}}" method="post" name="myForm" onsubmit="return validateForm()">
        <table class="table table-bordered">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <input type="hidden" name="txt_masv" value="{{ $getSinhVienByMasv[0]->maSV }}">
            <tr>
                <th>Họ tên</th>
                <td>
                    <input class="form-control" type="text" name="txt_hotensv" id="hotensv" value="{{ $getSinhVienByMasv[0]->hotenSV }}" >
                </td>
            </tr>
            <tr>
                <th>Ngày sinh</th>
                <td>
                    <input class="form-control" type="text" name="txt_ngaysinh" id="ngaysinh" value="{{ $getSinhVienByMasv[0]->ngaysinh }}" >
                </td>
            </tr>
            <tr>
                <th>Lớp</th>
                <td>
                    <input class="form-control" type="text" name="txt_lop" id="lop" value="{{ $getSinhVienByMasv[0]->lop }}" >
                </td>
            </tr>
            <tr>
                <th>Mật khẩu</th>
                <td>
                    <input class="form-control" type="text" name="txt_matkhau" id="matkhau" value="{{ $getSinhVienByMasv[0]->matkhau }}" >
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input class="btn btn-primary btn-sm" type="submit" value="Sửa">
                </td>
            </tr>
        </table>
    </form>
</div>


@endsection