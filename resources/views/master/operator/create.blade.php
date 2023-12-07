@extends('layouts.master')

@section('title')
    <title>{{ config('app.name', 'Pemira HMJTK POLBAN') }} | {{ $Title }}</title>
@endsection

@section('section-head')
    <ol class="breadcrumb bg-primary text-white-all">
        <li class="breadcrumb-item">{{ __('Master') }}</li>
        <li class="breadcrumb-item">{{ __('Operator') }}</li>
        <li class="breadcrumb-item"><a href="{{ route('operator.create') }}">{{ __('Tambah') }}</a></li>
    </ol>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    
                </div>
                <form action="{{ route('operator.store') }}" method="post">
                    @csrf

                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{ __('Nama Lengkap') }}</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ old('name') }}" id="name" name="name" class="form-control" required="" placeholder="Contoh : Garly Nugraha">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{ __('Email') }}</label>
                            <div class="col-sm-9">
                                <input type="email" value="{{ old('email') }}" id="email" name="email" class="form-control" required="" placeholder="Contoh : contact@princegarll.com">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{ __('Kata Sandi') }}</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control pwstrength" data-indicator="pwindicator" placeholder="Contoh : uf=mH%G&C4EyB,t;J.Wv9}">
                                </div>
                                <div id="pwindicator" class="pwindicator">
                                    <div class="bar"></div>
                                    <div class="label"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ route('operator.index') }}" class="btn btn-warning">{{ __('Kembali') }}</a>
                        <button type="reset" class="btn btn-danger">{{ __('Reset') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection