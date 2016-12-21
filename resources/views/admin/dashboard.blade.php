@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"> {{ Auth::user()->name }}</div>

                <div class="panel-body">
                    {{ Html::image('ns/images/logo1.png') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection