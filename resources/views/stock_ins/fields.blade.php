<!-- Item Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('item_id', 'Item:') !!}
    {!! Form::select('item_id', $item, null, ['class' => 'form-control select2', 'placeholder' => 'Select Item']) !!}
</div>

<!-- Supplier Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('supplier_id', 'Supplier:') !!}
    {!! Form::select('supplier_id', $supplier, null, ['class' => 'form-control select2', 'placeholder' => 'Select supplier']) !!}
</div>

<!-- Created By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    {!! Form::text('created_by', $user->name, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<!-- Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control']) !!}
</div>

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