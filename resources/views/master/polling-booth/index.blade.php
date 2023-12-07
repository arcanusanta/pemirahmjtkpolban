@extends('layouts.master')

@section('title')
    <title>{{ config('app.name', 'KPU HMJTK') }} | {{ __('Dashboard') }}</title>
@endsection

@section('section-head')
    <ol class="breadcrumb bg-primary text-white-all">
        <li class="breadcrumb-item">{{ __('Master') }}</li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    </ol>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12">
            @if (Auth::user()->status == 'NON-AKTIF')
                <div class="alert alert-primary alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        <span class="font-medium">Peringatan!</span> Maaf Bukan Sesi Anda Untuk Melakukan Pemilihan!
                    </div>
                </div>
            @else
                @if ($IsVote == 1)
                    <div class="alert alert-primary alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            <span class="font-medium">Peringatan!</span> Maaf Anda Sudah Melakukan Pemilihan!
                        </div>
                    </div>
                @else
                @endif
            @endif
        </div>
    </div>
@endsection