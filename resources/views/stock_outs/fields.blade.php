<!-- Item Field -->
<div class="form-group col-sm-6">
    {!! Form::label('item_id', 'Item:') !!}
    {!! Form::select('item_id', $item, null, ['class' => 'form-control select2', 'placeholder' => 'Select Item']) !!}
</div>

<!-- User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'Created By:') !!}
    {!! Form::text('user_id', $user->name, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<!-- Date Out Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_out', 'Date Out:') !!}
    {!! Form::text('date_out', null, ['class' => 'form-control','id'=>'date_out']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_out').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>

<!-- Location Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('location', 'Location:') !!}
    {!! Form::textarea('location', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>