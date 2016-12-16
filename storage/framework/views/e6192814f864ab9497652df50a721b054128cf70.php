<div class="form-group <?php echo e($errors->has('diachishop') ? 'has-error' : ''); ?>">
    <?php echo Form::label('diachishop', 'Diachishop', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::text('diachishop', null, ['class' => 'form-control']); ?>

        <?php echo $errors->first('diachishop', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('sdtshop') ? 'has-error' : ''); ?>">
    <?php echo Form::label('sdtshop', 'Sdtshop', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::text('sdtshop', null, ['class' => 'form-control']); ?>

        <?php echo $errors->first('sdtshop', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('diachinnhan') ? 'has-error' : ''); ?>">
    <?php echo Form::label('diachinnhan', 'Diachinnhan', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::text('diachinnhan', null, ['class' => 'form-control']); ?>

        <?php echo $errors->first('diachinnhan', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('sdtnnhan') ? 'has-error' : ''); ?>">
    <?php echo Form::label('sdtnnhan', 'Sdtnnhan', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::text('sdtnnhan', null, ['class' => 'form-control']); ?>

        <?php echo $errors->first('sdtnnhan', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('ghichu') ? 'has-error' : ''); ?>">
    <?php echo Form::label('ghichu', 'Ghichu', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::text('ghichu', null, ['class' => 'form-control']); ?>

        <?php echo $errors->first('ghichu', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('tenmathang') ? 'has-error' : ''); ?>">
    <?php echo Form::label('tenmathang', 'Tenmathang', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::text('tenmathang', null, ['class' => 'form-control']); ?>

        <?php echo $errors->first('tenmathang', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('canang') ? 'has-error' : ''); ?>">
    <?php echo Form::label('canang', 'Canang', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::number('canang', null, ['class' => 'form-control']); ?>

        <?php echo $errors->first('canang', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('tienung') ? 'has-error' : ''); ?>">
    <?php echo Form::label('tienung', 'Tienung', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::number('tienung', null, ['class' => 'form-control']); ?>

        <?php echo $errors->first('tienung', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('phiship') ? 'has-error' : ''); ?>">
    <?php echo Form::label('phiship', 'Phiship', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::number('phiship', null, ['class' => 'form-control']); ?>

        <?php echo $errors->first('phiship', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('user_id') ? 'has-error' : ''); ?>">
    <?php echo Form::label('user_id', 'User Id', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::number('user_id', null, ['class' => 'form-control']); ?>

        <?php echo $errors->first('user_id', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('khoangcach') ? 'has-error' : ''); ?>">
    <?php echo Form::label('khoangcach', 'Khoangcach', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::number('khoangcach', null, ['class' => 'form-control']); ?>

        <?php echo $errors->first('khoangcach', '<p class="help-block">:message</p>'); ?>

    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <?php echo Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']); ?>

    </div>
</div>