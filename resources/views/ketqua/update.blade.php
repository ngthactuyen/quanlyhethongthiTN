@extends('layout/backend')

@section('content')

<div align="center">
    <h2>Sửa thông tin Kết quả thi</h2>

    <form action="{{route('ketqua-updatesave')}}" method="post" name="myForm" onsubmit="return validateForm()">
        <table class="table table-bordered">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <input type="hidden" name="txt_makq" value="{{ $getKetQuaByMaKQ[0]->maKQ }}">
            <tr>
                <th>Tên môn thi</th>
                <td>
                    <input class="form-control" type="text" name="txt_tenmt" id="tenmt" value="{{ $getKetQuaByMaKQ[0]->tenMT }}" disabled>
                </td>
            </tr>
            <tr>
                <th>Mã sinh viên</th>
                <td>
                    <input class="form-control" type="text" name="txt_masv" id="masv" value="{{ $getKetQuaByMaKQ[0]->maSV }}" disabled>
                </td>
            </tr>
            <tr>
                <th>Tên sinh viên</th>
                <td>
                    <input class="form-control" type="text" name="txt_tensv" id="tensv" value="{{ $getKetQuaByMaKQ[0]->hotenSV }}" disabled>
                </td>
            </tr>
            <tr>
                <th>Điểm</th>
                <td>
                    <input class="form-control" type="text" name="txt_diem" id="diem" value="{{ $getKetQuaByMaKQ[0]->diem }}" >
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