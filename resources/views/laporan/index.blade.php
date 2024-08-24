@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Items</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('items.create') }}">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-4">


                <div class="align-items-center row">
                    <div class="form-group col-sm-2">
                        <label for="start">Start</label>
                        <input type="date" class="form-control" id="start" placeholder="Start Date">
                    </div>
                    <div class="text-center" style="width: 50px">To</div>
                    <div class="form-group col-sm-2">
                        <label for="end">End</label>
                        <input type="date" class="form-control" id="end" placeholder="End Date">
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="end">Table</label>
                        {!! Form::select('table', $table, null, ['class' => 'form-control select2', 'placeholder' => 'Select Table']) !!}

                        {{-- <input type="text" class="form-control" id="end" placeholder="End Date"> --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-danger">Export Excel</button>
                    </div>
                </div>

                <table class="d-none">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kolom</th>
                            <th>Kolom</th>
                            <th>Kolom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>1</th>
                            <th>kolom</th>
                            <th>kolom</th>
                            <th>kolom</th>
                        </tr>
                    </tbody>
                </table>

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

