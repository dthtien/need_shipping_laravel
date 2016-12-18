@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Baidang</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/bai-dang/create') }}" class="btn btn-primary btn-xs" title="Add New BaiDang"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Diachishop </th><th> Sdtshop </th><th> Diachinnhan </th><th> TenNguoiNhan </th>
                                        <th>TenMatHang</th><th>Actions</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($baidang as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->diachishop }}</td><td>{{ $item->sdtshop }}</td><td>{{ $item->diachinnhan }}</td><td> {{ $item->ghichu }}</td>
                                        <td>{{ $item->tenmathang }}</td>
                                        <td>
                                            <a href="{{ url('/admin/bai-dang/' . $item->id) }}" class="btn btn-success btn-xs" title="View BaiDang"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/bai-dang/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit BaiDang"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/bai-dang', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete BaiDang" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete BaiDang',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $baidang->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection