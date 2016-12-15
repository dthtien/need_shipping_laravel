@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Xndonhang</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/xndonhang/create') }}" class="btn btn-primary btn-xs" title="Add New xndonhang"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Ship Id </th><th> Dh Id </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($xndonhang as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->ship_id }}</td><td>{{ $item->dh_id }}</td>
                                        <td>
                                            <a href="{{ url('/admin/xndonhang/' . $item->id) }}" class="btn btn-success btn-xs" title="View xndonhang"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/xndonhang/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit xndonhang"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/xndonhang', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete xndonhang" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete xndonhang',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $xndonhang->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection