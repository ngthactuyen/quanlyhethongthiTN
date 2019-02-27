@extends('layout/backend')

@section('content')

<div align="center">
    <h2>Sửa thông tin Môn thi</h2>

    <form action="{{route('monthi-updatesave')}}" method="post" name="myForm" onsubmit="return validateForm()">
        <table class="table table-bordered">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <input type="hidden" name="txt_mamt" value="{{ $getMonThiByMamt[0]->maMT }}">
            <tr>
                <th>Tên môn thi</th>
                <td>
                    <input class="form-control" type="text" name="txt_tenmt" id="tenmt" value="{{ $getMonThiByMamt[0]->tenMT }}" >
                </td>
            </tr>
            <tr>
                <th>Thời gian làm bài</th>
                <td>
                    <input class="form-control" type="text" name="txt_thoigianlambai" id="thoigianlambai" placeholder="phút" value="{{ $getMonThiByMamt[0]->thoigianlambai }}" >
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