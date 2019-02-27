

@extends('layout/backend')

@section('content')
    <div align="center">
        <h2>Danh sách Môn thi</h2>
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
                <input type="text" name="txt_keyword" class="form-control" value="<?= isset($_GET['txt_keyword']) ? $_GET['txt_keyword']: ''?>" placeholder="Tìm kiếm theo Mã môn thi, tên môn thi">
                <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
    <!-- /.search form -->
        <a href="{{route('monthi-add')}}">
            <button type="button" class="btn btn-primary btn-sm">Thêm mới</button>
        </a>
        <table class="table table-bordered">
            <tr>
                <th>Mã môn thi</th>
                <th>Tên môn thi</th>
                <th>Thời gian làm bài</th>
                <th colspan="2" align="center">Thao tác</th>
            </tr>
            <?php foreach ($monthiList as $monthi): ?>
            <tr>
                <td>{{$monthi->maMT}}</td>
                <td>{{$monthi->tenMT}}</td>
                <td>{{$monthi->thoigianlambai}} phút</td>
                <!--
                <td>
                    <a href="monthi/<?//= $monthi->maMT?>/update">
                        <button type="button" class="btn btn-primary btn-sm">Sửa</button>
                    </a>
                </td>
                -->
                <td>
                    <a onclick="return confirm('Xác nhận xóa?')" href="monthi/<?= $monthi->maMT?>/delete">
                            <button type="button" class="btn btn-danger btn-sm">Xóa</button>
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
        {!! $monthiList->render() !!}
    </div>



@endsection



