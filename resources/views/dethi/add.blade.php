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
    <form action="{{route('dethi-addsave')}}" method="post" name="myForm" onsubmit="return validateForm()">
        <table class="table table-bordered">
            <input class="form-control" type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <tr>
                <th>Tên môn thi</th>
                <td>
                    <select name="sl_mamt" id="mamt">
                        <option value="">Chọn môn thi</option>
                        <?php
                        $mamt = isset($mamt) ? $mamt : '';
                         for ($i = 0; $i< count($monthiList); $i++){
                             $string = ($monthiList[$i] == $mamt) ? 'selected' : '';
                             echo '<option value="'.$monthiList[$i]->maMT.'" '.$string.' >'.$monthiList[$i]->tenMT.' - '.$monthiList[$i]->maMT.'</option>';
                         }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Mã đề thi</th>
                <td>
                    <input class="form-control" type="text" name="txt_madt" id="madt" value="{{ isset($madt) ? $madt : '' }}">
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