@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">BaiDang {{ $baidang->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('admin/bai-dang/' . $baidang->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit BaiDang"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/baidang', $baidang->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete BaiDang',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $baidang->id }}</td>
                                    </tr>
                                    <tr><th> Diachishop </th><td> {{ $baidang->diachishop }} </td></tr><tr><th> Sdtshop </th><td> {{ $baidang->sdtshop }} </td></tr><tr><th> Diachinnhan </th><td> {{ $baidang->diachinnhan }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection