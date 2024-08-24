<!-- Item Id Field -->
<div class="col-sm-12">
    {!! Form::label('item_id', 'Item Id:') !!}
    <p>{{ $stockOut->item_id }}</p>
</div>

<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $stockOut->user_id }}</p>
</div>

<!-- Date Out Field -->
<div class="col-sm-12">
    {!! Form::label('date_out', 'Date Out:') !!}
    <p>{{ $stockOut->date_out }}</p>
</div>

<!-- Total Field -->
<div class="col-sm-12">
    {!! Form::label('total', 'Total:') !!}
    <p>{{ $stockOut->total }}</p>
</div>

<!-- Location Field -->
<div class="col-sm-12">
    {!! Form::label('location', 'Location:') !!}
    <p>{{ $stockOut->location }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $stockOut->description }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $stockOut->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $stockOut->updated_at }}</p>
</div>

