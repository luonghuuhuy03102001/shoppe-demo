@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr align="center">
                <th width="50px">ID</th>
                <th>Tên Slider</th>
                <th>url</th>
                <th>Hình ảnh</th>
                <th>Hiện thị</th>
                <th>Ngày tạo</th>
                <th width="150px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $key => $slider)
            <tr align="center">
                <td>{{ $slider->id }}</td>
                <td>{{ $slider->name }}</td>
                <td>{{ $slider->url }}</td>
                <td>
                    <a href="{{ $slider->thumb }}" target="_blank">
                        <img src="{{ $slider->thumb }}" alt="" height="50px">
                    </a>
                </td>
                <td>{!! \App\Helpers\Helper::active($slider->active) !!}</td>
                <td>{{ $slider->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/sliders/edit/{{ $slider->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $slider->id }}, '/admin/sliders/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $sliders->links() !!}
    </div>
@endsection
