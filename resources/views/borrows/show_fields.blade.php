<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $borrow->user_id }}</p>
</div>

<!-- Item Id Field -->
<div class="col-sm-12">
    {!! Form::label('item_id', 'Item Id:') !!}
    <p>{{ $borrow->item_id }}</p>
</div>

<!-- Total Field -->
<div class="col-sm-12">
    {!! Form::label('total', 'Total:') !!}
    <p>{{ $borrow->total }}</p>
</div>

<!-- Date Out Field -->
<div class="col-sm-12">
    {!! Form::label('date_out', 'Date Out:') !!}
    <p>{{ $borrow->date_out }}</p>
</div>

<!-- Date In Field -->
<div class="col-sm-12">
    {!! Form::label('date_in', 'Date In:') !!}
    <p>{{ $borrow->date_in }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $borrow->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $borrow->updated_at }}</p>
</div>

