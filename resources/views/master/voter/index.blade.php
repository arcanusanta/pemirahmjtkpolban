@extends('layouts.master')

@section('title')
    <title>{{ config('app.name', 'Pemira HMJTK POLBAN') }} | {{ $Title }}</title>
@endsection

@section('section-head')
    <ol class="breadcrumb bg-primary text-white-all">
        <li class="breadcrumb-item">{{ __('Master') }}</li>
        <li class="breadcrumb-item">{{ __('Pemilih') }}</li>
        <li class="breadcrumb-item"><a href="{{ route('voter.data.index') }}">{{ __('Data') }}</a></li>
    </ol>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col">
                        <a href="{{ route('voter.data.create') }}" class="btn btn-primary float-right"><span class="fas fa-plus"></span> {{ __('Tambah') }}</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="crudVoter" class="table table-striped w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('No') }}</th>
                                    <th class="text-center">{{ __('NIM') }}</th>
                                    <th class="text-center">{{ __('Nama Lengkap') }}</th>
                                    <th class="text-center">{{ __('Kelas') }}</th>
                                    <th class="text-center">{{ __('Program Studi') }}</th>
                                    <th class="text-center">{{ __('Angkatan') }}</th>
                                    <th class="text-center">{{ __('Status') }}</th>
                                    <th class="text-center">{{ __('Aksi') }}</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var datatable = $('#crudVoter').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('voter.data.index') }}",
            columns: [
                { data: 'no', name: 'no', render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                }, width: '5%', class: 'text-center' },
                { data: 'nim', name: 'nim', class: 'text-center', width: '10%' },
                { data: 'fullname', name: 'fullname' },
                { data: 'grade_name', name: 'grade_name', class: 'text-center', width: '10%' },
                { data: 'study_program_name', name: 'study_program_name', class: 'text-center' },
                { data: 'year', name: 'year', class: 'text-center', width: '5%' },
                { data: 'status', name: 'status', class: 'text-center', width: '10%' },
                { data: 'action', name: 'action', orderable: true, searchable: true, width: '5%' }
            ]
        })
    </script>
@endpush