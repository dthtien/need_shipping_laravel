<div class="form-group {{ $errors->has('diachishop') ? 'has-error' : ''}}">
    {!! Form::label('diachishop', 'Diachishop', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('diachishop', null, ['class' => 'form-control']) !!}
        {!! $errors->first('diachishop', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('sdtshop') ? 'has-error' : ''}}">
    {!! Form::label('sdtshop', 'Sdtshop', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('sdtshop', null, ['class' => 'form-control']) !!}
        {!! $errors->first('sdtshop', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('diachinnhan') ? 'has-error' : ''}}">
    {!! Form::label('diachinnhan', 'Diachinnhan', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('diachinnhan', null, ['class' => 'form-control']) !!}
        {!! $errors->first('diachinnhan', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('sdtnnhan') ? 'has-error' : ''}}">
    {!! Form::label('sdtnnhan', 'Sdtnnhan', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('sdtnnhan', null, ['class' => 'form-control']) !!}
        {!! $errors->first('sdtnnhan', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('ghichu') ? 'has-error' : ''}}">
    {!! Form::label('ghichu', 'Ghichu', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('ghichu', null, ['class' => 'form-control']) !!}
        {!! $errors->first('ghichu', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('tenmathang') ? 'has-error' : ''}}">
    {!! Form::label('tenmathang', 'Tenmathang', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('tenmathang', null, ['class' => 'form-control']) !!}
        {!! $errors->first('tenmathang', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('canang') ? 'has-error' : ''}}">
    {!! Form::label('canang', 'Canang', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('canang', null, ['class' => 'form-control']) !!}
        {!! $errors->first('canang', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('tienung') ? 'has-error' : ''}}">
    {!! Form::label('tienung', 'Tienung', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('tienung', null, ['class' => 'form-control']) !!}
        {!! $errors->first('tienung', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('phiship') ? 'has-error' : ''}}">
    {!! Form::label('phiship', 'Phiship', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('phiship', null, ['class' => 'form-control']) !!}
        {!! $errors->first('phiship', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    {!! Form::label('user_id', 'User Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('khoangcach') ? 'has-error' : ''}}">
    {!! Form::label('khoangcach', 'Khoangcach', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('khoangcach', null, ['class' => 'form-control']) !!}
        {!! $errors->first('khoangcach', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>