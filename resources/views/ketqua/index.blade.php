

@extends('layout/backend')

@section('content')
    <div align="center">
        <h2>Danh sách Kết quả thi</h2>
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
        <!--
        <a href="{//{route('monthi-add')}}">
            <button type="button" class="btn btn-primary btn-sm">Thêm mới</button>
        </a>
        -->
        <table class="table table-bordered">
            <tr>
                <th>Mã môn thi</th>
                <th>Tên môn thi</th>
                <th>Mã sinh viên</th>
                <th>Họ tên sinh viên</th>
                <th>Lớp</th>
                <th>Điểm</th>
                <th colspan="2" align="center">Thao tác</th>
            </tr>
            <?php foreach ($ketquaList as $ketqua): ?>
            <tr>
                <td>{{$ketqua->maMT}}</td>
                <td>{{$ketqua->tenMT}}</td>
                <td>{{$ketqua->maSV}}</td>
                <td>{{$ketqua->hotenSV}}</td>
                <td>{{$ketqua->lop}}</td>
                <td>{{$ketqua->diem}}</td>
                <td>
                    <a href="ketqua/<?= $ketqua->maKQ?>/update">
                        <button type="button" class="btn btn-primary btn-sm">Sửa</button>
                    </a>
                </td>
                <td>
                    <a onclick="return confirm('Xác nhận xóa?')" href="ketqua/<?= $ketqua->maKQ?>/delete">
                            <button type="button" class="btn btn-danger btn-sm">Xóa</button>
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
        {!! $ketquaList->render() !!}
    </div>



@endsection



