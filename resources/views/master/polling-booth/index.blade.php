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
            @if (Auth::user()->status == 'NON-AKTIF')
                <div class="col-12">
                    <div class="alert alert-primary alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            <span class="font-medium">Peringatan!</span> Maaf, Akun Anda belum aktif!
                        </div>
                    </div>
                </div>  
            @else
                @if ($IsVote == 1)
                    <div class="col-12">
                        <div class="alert alert-primary alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                <span class="font-medium">Peringatan!</span> Maaf, Anda sudah melakukan pemilihan!
                            </div>
                        </div>
                    </div>
                @else
                    @inject('carbon', 'Carbon\Carbon')

                    @if($carbon::now()->between(Auth::user()->start_time, Auth::user()->end_time))
                        @foreach($Candidates as $RC)
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class="pricing pricing-highlight">
                                    <div class="pricing-title">
                                        {{ $RC->sequence_number }}
                                    </div>
                                    <div class="pricing-padding">
                                        <div class="pricing-price">
                                            <div><img src="{{ Storage::url($RC->photo) }}" alt="" /></div>
                                            <div>{{ $RC->fullname }}</div>
                                        </div>
                                        <div class="pricing-details">
                                            <div class="pricing-item">
                                                <div class="pricing-item-label"><strong>Visi</strong></div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-label">Memajukan kesejahteraan umat beragama dalam segala aktivitas belajar ataupun keterampilan.</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-label"><Strong>Misi</Strong></div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">Mengutamakan kebersamaan dan kekeluargaan untuk mempersatukan keterbatasan.</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">Menjadikan sebagai organisasi terbuka bagi umat agar terjalin keharmonisan di segala kegiatan.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pricing-cta">
                                        <a href="{{ Storage::url($RC->curriculum_vitae) }}">Curriculum Vitae <i class="fas fa-arrow-right"></i></a>
                                    </div>

                                    <div class="pricing-cta">
                                        <form id="vote-form" action="{{ route('polling-booth.store') }}" method="POST">
                                            @csrf

                                            <button name="candidate" value="{{ $RC->id }}" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <div class="alert alert-primary alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    <span class="font-medium">Peringatan!</span> Maaf bukan sesi Anda untuk memilih!
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            @endif
    </div>
@endsection