@extends('admin.main')

@section('head')
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label>Tên dang mục</label>
                <input type="text" name="name" value="{{ $menu->name }}" class="form-control" id="name" placeholder="Nhập tên danh mục">
            </div>
            <div class="form-group">
                <label>Danh mục cha</label>
                <select name="parent_id" class="custom-select rounded-0" id="exampleSelectRounded0">
                    <option value="0" {{ $menu->parent_id == 0 ? 'selected' : ''}}>------Lựa chọn danh mục------</option>
                    @foreach ($menus as $menuParent) 
                        <option value="{{ $menuParent->id }}" {{ $menu->parent_id == $menuParent->id ? 'selected' : ''}}>{{ $menuParent->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Mô tả danh mục</label>
                <textarea type="text" name="description" class="form-control"> {{ $menu->description }} </textarea>
            </div>
            <div class="form-group" >
                <div class="form-group">
                <label>Mô tả chi tiết danh mục</label>
                <textarea  id="content" type="text" name="content" class="form-control"> {{ $menu->content }} </textarea>
            </div>
            <div class="form-group">
                <label>Hiện thị</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="active" id="active" value="1"
                       {{ $menu->active == 1 ? 'checked=""' : '' }}>
                    <label>Có</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="active" id="no_active" value="0"
                    {{ $menu->active == 0 ? 'checked=""' : '' }}>
                    <label>Không</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
            <button type="reset" class="btn btn-success">Nhập lại</button>
            <a class="btn btn-danger" href="/admin/menus/list">Thoát</a>
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
