@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th width="50px">ID</th>
                <th>Name</th>
                <th>Active</th>
                <th>Updated</th>
                <th width="150px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::menu($menus) !!}
        </tbody>
    </table>
@endsection

