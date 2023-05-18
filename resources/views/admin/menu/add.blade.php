@extends('admin.main')

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Tên dang mục</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nhập tên danh mục">
            </div>
            <div class="form-group">
                <label>Danh mục cha</label>
                <select name="parent_id" class="custom-select rounded-0" id="exampleSelectRounded0">
                    <option value="0">------Lựa chọn danh mục------</option>
                    @foreach ($menus as $menu) 
                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Mô tả danh mục</label>
                <textarea type="text" name="description" class="form-control"> </textarea>
            </div>
            <div class="form-group" >
                <div class="form-group">
                <label>Mô tả chi tiết danh mục</label>
                <textarea  id="content" type="text" name="content" class="form-control"> </textarea>
            </div>
            <div class="form-group">
                <label>Hiện thị</label>
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
            <button type="submit" class="btn btn-primary">Thêm danh mục</button>
            <button type="reset" class="btn btn-success">Nhập lại</button>
            <a class="btn btn-danger" href="/admin/main">Thoát</a>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
