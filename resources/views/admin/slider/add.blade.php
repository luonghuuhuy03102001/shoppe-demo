@extends('admin.main')

@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Tên Slider</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nhập tên Slider">
            </div>
            <div class="form-group">
                <label>url</label>
                <input type="text" name="url" class="form-control" id="name" placeholder="Nhập url">
            </div>

            <div class="form-group">
                <label for="menu">Thứ tự</label>
                <input type="number" name="sort_by" value="{{ old('sort_by') }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="menu">Ảnh Slider</label>
                <input type="file" class="form-control" id="upload">
                <div id="image_show" class="mt">

                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>
            <div class="form-group">
                <label for="menu">Hiện thị</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="active" id="active" value="1"
                        checked="">
                    <label>Có</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="active" id="no_active" value="0">
                    <label>Không</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm Slider</button>
            <button type="reset" class="btn btn-success">Nhập lại</button>
            <a class="btn btn-danger" href="/admin/main">Thoát</a>
        </div>
        @csrf
    </form>
@endsection

