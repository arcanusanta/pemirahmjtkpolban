@extends('layouts.master')

@section('title')
    <title>{{ config('app.name', 'Pemira HMJTK POLBAN') }} | {{ $Title }}</title>
@endsection

@section('section-head')
    <ol class="breadcrumb bg-primary text-white-all">
        <li class="breadcrumb-item">{{ __('Master') }}</li>
        <li class="breadcrumb-item">{{ __('Pemilih') }}</li>
        <li class="breadcrumb-item">{{ __('Kelas') }}</li>
        <li class="breadcrumb-item"><a href="{{ route('voters.grade.index') }}">{{ __('Data') }}</a></li>
    </ol>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col">
                        <a href="{{ route('voters.grade.create') }}" class="btn btn-primary float-right"><span class="fas fa-plus"></span> {{ __('Tambah') }}</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="crudGrade" class="table table-striped w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('No') }}</th>
                                    <th class="text-center">{{ __('Nama Kelas') }}</th>
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
        var datatable = $('#crudGrade').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('voters.grade.index') }}",
            columns: [
                { data: 'no', name: 'no', render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                }, width: '5%', class: 'text-center' },
                { data: 'name', name: 'name'},
                { data: 'action', name: 'action', orderable: true, searchable: true, width: '5%' }
            ]
        })
    </script>
@endpush