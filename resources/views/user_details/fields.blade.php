<!-- Full Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Full Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Retype Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password_confirmation', 'Retype Password:') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>

<!-- Nik Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nik', 'Nik:') !!}
    {!! Form::text('nik', null, ['class' => 'form-control']) !!}
</div>

<!-- Seksie Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seksie', 'Seksie:') !!}
    {!! Form::select('seksie', $seksie, null, ['class' => 'form-control select2', 'placeholder' => 'Select Seksie']) !!}
</div>

<!-- Role Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role_id', 'Role:') !!}
    {!! Form::select('role_id', $role, null, ['class' => 'form-control select2', 'placeholder' => 'Select Role']) !!}

</div>

<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Photo:') !!}
    {!! Form::file('photo', ['class' => 'form-control dropify', 'data-max-file-size' => '3M', 'data-default-file' => ( @$userDetail ? asset('storage/user/'.$userDetail->photo) : null)]) !!}
</div>