@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">xndonhang {{ $xndonhang->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('admin/xndonhang/' . $xndonhang->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit xndonhang"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/xndonhang', $xndonhang->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete xndonhang',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $xndonhang->id }}</td>
                                    </tr>
                                    <tr><th> Ship Id </th><td> {{ $xndonhang->ship_id }} </td></tr><tr><th> Dh Id </th><td> {{ $xndonhang->dh_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection