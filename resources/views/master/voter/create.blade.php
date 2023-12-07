@extends('layouts.master')

@section('title')
    <title>{{ config('app.name', 'Pemira HMJTK POLBAN') }} | {{ $Title }}</title>
@endsection

@section('section-head')
    <ol class="breadcrumb bg-primary text-white-all">
        <li class="breadcrumb-item">{{ __('Master') }}</li>
        <li class="breadcrumb-item">{{ __('Pemilih') }}</li>
        <li class="breadcrumb-item"><a href="{{ route('voter.data.create') }}">{{ __('Create') }}</a></li>
    </ol>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    
                </div>
                <form action="{{ route('voter.data.store') }}" method="post">
                    @csrf

                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{ __('NIM*') }}</label>
                            <div class="col-sm-9">
                                <input type="number" value="{{ old('nim') }}" id="nim" name="nim" class="form-control" placeholder="Contoh : 111111111">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{ __('Nama Lengkap*') }}</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ old('name') }}" id="name" name="name" class="form-control" placeholder="Contoh : Prince">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{ __('Kelas*') }}</label>
                            <div class="col-sm-9">
                                <select id="grade" name="grade" class="form-control select2">
                                    <option>----- Pilih Kelas -----</option>
                                    @foreach($Grades as $GC)
                                        <option value="{{ $GC->id }}">{{ $GC->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{ __('Program Studi*') }}</label>
                            <div class="col-sm-9">
                                <select id="study_program" name="study_program" class="form-control select2">
                                    <option>----- Pilih Program Studi -----</option>
                                    @foreach($StudyPrograms as $SPC)
                                        <option value="{{ $SPC->id }}">{{ $SPC->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{ __('Angkatan Tahun*') }}</label>
                            <div class="col-sm-9">
                                <input type="number" value="{{ old('year') }}" id="year" name="year" class="form-control" required="" placeholder="Contoh : 2021">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{ __('Email*') }}</label>
                            <div class="col-sm-9">
                                <input type="email" value="{{ old('email') }}" id="email" name="email" class="form-control" required="" placeholder="Contoh : prince@pemirahahmjtkpolban.my.id">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Waktu Pemilihan*</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                    </div>
                                    <input type="text" value="{{ old('time') }}" id="time" name="time" class="form-control timepicker">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{ __('Kata Sandi*') }}</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control pwstrength" data-indicator="pwindicator" placeholder="Contoh : bW{hYgKMP3aV@ByZ">
                                </div>
                                <div id="pwindicator" class="pwindicator">
                                    <div class="bar"></div>
                                    <div class="label"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ route('voter.data.index') }}" class="btn btn-warning">{{ __('Kembali') }}</a>
                        <button type="reset" class="btn btn-danger">{{ __('Reset') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
