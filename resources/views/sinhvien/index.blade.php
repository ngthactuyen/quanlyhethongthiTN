

@extends('layout/backend')

@section('content')
    <div align="center">
        <h2>Danh sách Sinh Viên</h2>
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
    <!-- search form -->
        <form action="" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="txt_keyword" class="form-control" value="<?= isset($_GET['txt_keyword']) ? $_GET['txt_keyword']: ''?>" placeholder="Tìm kiếm theo Mã SV, họ tên, ngày sinh, lớp">
                <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
    <!-- /.search form -->
        <a href="{{route('sinhvien-add')}}">
            <button type="button" class="btn btn-primary btn-sm">Thêm mới</button>
        </a>
        <table class="table table-bordered">
            <tr>
                <th>Mã sinh viên</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Lớp</th>
                <th>Mật khẩu</th>
                <th colspan="3" align="center">Thao tác</th>
            </tr>
            <?php foreach ($sinhvienList as $sinhvien): ?>
            <tr>
                <td>{{$sinhvien->maSV}}</td>
                <td>{{$sinhvien->hotenSV}}</td>
                <td>{{$sinhvien->ngaysinh}}</td>
                <td>{{$sinhvien->lop}}</td>
                <td>{{$sinhvien->matkhau}}</td>
                <td>
                    <a href="sinhvien/<?= $sinhvien->maSV?>/update">
                        <button type="button" class="btn btn-primary btn-sm">Sửa</button>
                    </a>
                </td>
                <td>
                    <a onclick="return confirm('Xác nhận xóa?')" href="sinhvien/<?= $sinhvien->maSV?>/delete">
                            <button type="button" class="btn btn-danger btn-sm">Xóa</button>
                    </a>
                </td>
                <!--<td>
                    <a href="sinhvien/<?//= $sinhvien->maSV?>/xemdiem">
                        <button type="button" class="btn btn-primary btn-sm">Xem điểm</button>
                    </a>
                </td>-->
            </tr>
            <?php endforeach ?>
        </table>
        {!! $sinhvienList->render() !!}
    </div>



@endsection



