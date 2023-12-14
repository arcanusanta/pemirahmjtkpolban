@extends('layouts.master')

@section('title')
    <title>{{ config('app.name', 'Pemira HMJTK POLBAN') }} | {{ __('Dashboard') }}</title>
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

                @foreach($Candidates as $RC)
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class="pricing pricing-highlight">
                                    <div class="pricing-title">
                                        {{ $RC->sequence_number }}
                                    </div>
                                    <div class="pricing-padding">
                                        <div class="pricing-price">
                                            <div><img src="{{ Storage::url($RC->photo) }}" alt="" /></div>
                                            <div><strong>{{ $RC->fullname }}</strong></div>
                                        </div>
                                    </div>
                                    <div class="pricing-cta">
                                        <a href="{{ Storage::url($RC->vision_and_mission) }}">Visi Misi <i class="fas fa-arrow-right"></i></a>
                                        <a href="{{ Storage::url($RC->curriculum_vitae) }}">Curriculum Vitae <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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

                    @foreach($Candidates as $RC)
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class="pricing pricing-highlight">
                                    <div class="pricing-title">
                                        {{ $RC->sequence_number }}
                                    </div>
                                    <div class="pricing-padding">
                                        <div class="pricing-price">
                                            <div><img src="{{ Storage::url($RC->photo) }}" alt="" /></div>
                                            <div><strong>{{ $RC->fullname }}</strong></div>
                                        </div>
                                    </div>
                                    <div class="pricing-cta">
                                        <a href="{{ Storage::url($RC->vision_and_mission) }}">Visi Misi <i class="fas fa-arrow-right"></i></a>
                                        <a href="{{ Storage::url($RC->curriculum_vitae) }}">Curriculum Vitae <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                @else
                    @inject('carbon', 'Carbon\Carbon')

                    @if($carbon::now()->between(Auth::user()->start_time, Auth::user()->end_time))
                        <div class="col-12">
                            <div class="alert alert-primary alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                    </button>
                                    Silahkan gunakan hak suara Anda!
                                </div>
                            </div>
                        </div>

                        @foreach($Candidates as $RC)
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class="pricing pricing-highlight">
                                    <div class="pricing-title">
                                        {{ $RC->sequence_number }}
                                    </div>
                                    <div class="pricing-padding">
                                        <div class="pricing-price">
                                            <div><img src="{{ Storage::url($RC->photo) }}" alt="" /></div>
                                            <div><strong>{{ $RC->fullname }}</strong></div>
                                        </div>
                                    </div>
                                    <div class="pricing-cta">
                                        <a href="{{ Storage::url($RC->vision_and_mission) }}">Visi Misi <i class="fas fa-arrow-right"></i></a>
                                        <a href="{{ Storage::url($RC->curriculum_vitae) }}">Curriculum Vitae <i class="fas fa-arrow-right"></i></a>
                                    </div>

                                    <div class="pricing-cta">
                                        <form id="vote-form" action="{{ route('polling-booth.store') }}" method="POST">
                                            @csrf

                                            <button name="candidate" value="{{ $RC->id }}" class="btn btn-primary">Vote</button>
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

                        @foreach($Candidates as $RC)
                            <div class="col-12 col-md-4 col-lg-4">
                                <div class="pricing pricing-highlight">
                                    <div class="pricing-title">
                                        {{ $RC->sequence_number }}
                                    </div>
                                    <div class="pricing-padding">
                                        <div class="pricing-price">
                                            <div><img src="{{ Storage::url($RC->photo) }}" alt="" /></div>
                                            <div><strong>{{ $RC->fullname }}</strong></div>
                                        </div>
                                    </div>
                                    <div class="pricing-cta">
                                        <a href="{{ Storage::url($RC->vision_and_mission) }}">Visi Misi <i class="fas fa-arrow-right"></i></a>
                                        <a href="{{ Storage::url($RC->curriculum_vitae) }}">Curriculum Vitae <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endif
            @endif
    </div>
@endsection