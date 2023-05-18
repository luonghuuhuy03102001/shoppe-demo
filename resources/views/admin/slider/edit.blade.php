@extends('admin.main')

@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Tên Slider</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $slider->name }} " placeholder="Nhập tên Slider">
            </div>
            <div class="form-group">
                <label>url</label>
                <input type="text" name="url" class="form-control" value="{{ $slider->url }} " id="name" placeholder="Nhập url">
            </div>

            <div class="form-group">
                <label for="menu">Thứ tự</label>
                <input type="number" name="sort_by" value="{{ $slider->sort_by }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="menu">Ảnh Slider</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show" class="mt">
                    <a href="{{ $slider->thumb }}" target="_blank">
                        <img src="{{ $slider->thumb }}" alt="" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" value="{{ $slider->thumb }}" id="thumb">
            </div>
            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked=""  {{ $slider->active == 1 ? 'checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active"  name="active"  {{ $slider->active == 0 ? 'checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật Slider</button>
            <button type="reset" class="btn btn-success">Nhập lại</button>
            <a class="btn btn-danger" href="/admin/main">Thoát</a>
        </div>
        @csrf
    </form>
@endsection

