<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $userDetail->user_id }}</p>
</div>

<!-- Nik Field -->
<div class="col-sm-12">
    {!! Form::label('nik', 'Nik:') !!}
    <p>{{ $userDetail->nik }}</p>
</div>

<!-- Seksie Field -->
<div class="col-sm-12">
    {!! Form::label('seksie', 'Seksie:') !!}
    <p>{{ $userDetail->seksie }}</p>
</div>

<!-- Photo Field -->
<div class="col-sm-12">
    {!! Form::label('photo', 'Photo:') !!}
    <p><img src="{{ asset('storage/user/'.$userDetail->photo) }}" alt="user" width="200px"></p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $userDetail->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $userDetail->updated_at }}</p>
</div>

