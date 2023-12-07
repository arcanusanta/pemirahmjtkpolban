@extends('layouts.master')

@section('title')
    <title>{{ config('app.name', 'Pemira HMJTK POLBAN') }} | {{ $Title }}</title>
@endsection

@section('section-head')
    <ol class="breadcrumb bg-primary text-white-all">
        <li class="breadcrumb-item">{{ __('Master') }}</li>
        <li class="breadcrumb-item">{{ __('Kandidat') }}</li>
        <li class="breadcrumb-item"><a href="{{ route('candidate.create') }}">{{ __('Tambah') }}</a></li>
    </ol>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    
                </div>
                <form action="{{ route('candidate.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{ __('Nomor Urut*') }}</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ old('sequence_number') }}" id="sequence_number" name="sequence_number" class="form-control" placeholder="Contoh : Nomor Urut 01">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{ __('Nama Lengkap*') }}</label>
                            <div class="col-sm-9">
                                <input type="text" value="{{ old('fullname') }}" id="fullname" name="fullname" class="form-control" placeholder="Contoh : Prince">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label font-weight-bold">{{ __('Foto*') }}</label>
                            <div class="col-sm-9">
                                <input type="file" value="{{ old('photo') }}" id="photo" name="photo" class="form-control dropify">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">{{ __('Visi dan Misi*') }}</label>
                            <div class="col-sm-9">
                                <textarea id="vision_and_mission" name="vision_and_mission" class="form-control">{{ old('vision_and_mission') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label font-weight-bold">{{ __('Curriculum Vitae*') }}</label>
                            <div class="col-sm-9">
                                <input type="file" value="{{ old('curriculum_vitae') }}" id="curriculum_vitae" name="curriculum_vitae" class="form-control dropify">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ route('candidate.index') }}" class="btn btn-warning">{{ __('Kembali') }}</a>
                        <button type="reset" class="btn btn-danger">{{ __('Reset') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        CKEDITOR.replace('vision_and_mission');
    </script>
@endpush
