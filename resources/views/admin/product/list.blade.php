@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr align="center">
                <th width="50px">ID</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Giá giảm</th>
                <th>Giá khuyến mại</th>
                <th>Hiện thị</th>
                <th>Ngày tạo</th>
                <th width="150px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $product)
            <tr align="center">
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->menu->name }}</td>
                <td>{{ $product->price }} $</td>
                <td>{{ $product->price_sale }} $</td>
                <td>{!! \App\Helpers\Helper::active($product->active) !!}</td>
                <td>{{ $product->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{ $product->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $product->id }}, '/admin/products/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $products->links() !!}
    </div>
@endsection
