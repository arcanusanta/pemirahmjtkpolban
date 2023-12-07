@extends('layouts.master')

@section('title')
    <title>{{ config('app.name', 'SIKEMBANG PD') }} | {{ $Title }}</title>
@endsection

@foreach($Data as $OR)
    @section('section-head')
        <ol class="breadcrumb bg-primary text-white-all">
            <li class="breadcrumb-item">{{ __('Master') }}</li>
            <li class="breadcrumb-item">{{ __('Operator') }}</li>
            <li class="breadcrumb-item">{{ $OR->name }}</li>
            <li class="breadcrumb-item"><a href="{{ route('operator.edit', $OR->id) }}">{{ __('Edit') }}</a></li>
        </ol>
    @endsection

    @section('section-body')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        
                    </div>
                    <form action="{{ route('operator.update', $OR->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Nama Lengkap') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{ old('name') ?? $OR->name }}" id="name" name="name" class="form-control" required="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">{{ __('Email') }}</label>
                                <div class="col-sm-9">
                                    <input type="email" value="{{ old('email') ?? $OR->email }}" id="email" name="email" class="form-control" required="">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('operator.index') }}" class="btn btn-warning">{{ __('Kembali') }}</a>
                            <button type="reset" class="btn btn-danger">{{ __('Reset') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Simpan Perubahan') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
@endforeach