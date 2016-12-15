<div class="form-group {{ $errors->has('ship_id') ? 'has-error' : ''}}">
    {!! Form::label('ship_id', 'Ship Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('ship_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('ship_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('dh_id') ? 'has-error' : ''}}">
    {!! Form::label('dh_id', 'Dh Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('dh_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('dh_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>