<!-- User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
    {!! Form::select('user_id', $user, null, ['class' => 'form-control select2', 'placeholder' => 'Select User']) !!}
</div>

<!-- Item Field -->
<div class="form-group col-sm-6">
    {!! Form::label('item_id', 'Item:') !!}
    {!! Form::select('item_id', $item, null, ['class' => 'form-control select2', 'placeholder' => 'Select Item']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
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

<!-- Date In Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_in', 'Date In:') !!}
    {!! Form::text('date_in', null, ['class' => 'form-control','id'=>'date_in']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#date_in').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush