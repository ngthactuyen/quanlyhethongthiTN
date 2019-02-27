@extends('layout/backend')

@section('content')

<div align="center">
    <h2>Thêm mới Môn thi</h2>
    <?php
    if (isset($_SESSION['error_message'])){
        echo "<p style='color: red'>".$_SESSION['error_message']."</p>";
        unset($_SESSION['error_message']);
    }
    ?>
    <form action="{{route('monthi-addsave')}}" method="post" name="myForm" onsubmit="return validateForm()">
        <table class="table table-bordered">
            <input class="form-control" type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <tr>
                <th>Mã môn thi</th>
                <td>
                    <input class="form-control" type="text" name="txt_mamt" id="mamt" value="{{ isset($mamt) ? $mamt : '' }}">
                </td>
            </tr>
            <tr>
                <th>Tên môn thi</th>
                <td>
                    <input class="form-control" type="text" name="txt_tenmt" id="tenmt" value="{{ isset($tenmt) ? $tenmt : '' }}">
                </td>
            </tr>
            <tr>
                <th>Thời gian làm bài</th>
                <td>
                    <input class="form-control" type="text" name="txt_thoigianlambai" id="thoigianlambai" placeholder="phút" value="{{ isset($thoigianlambai) ? $thoigianlambai : '' }}">
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