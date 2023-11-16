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

@endsection