@extends('layouts.master')

@section('title')
    <title>{{ config('app.name', 'Pemira HMJTK POLBAN') }} | {{ $Title }}</title>
@endsection

@section('section-head')
    <ol class="breadcrumb bg-primary text-white-all">
        <li class="breadcrumb-item">{{ __('Master') }}</li>
        <li class="breadcrumb-item">{{ __('Saksi') }}</li>
        <li class="breadcrumb-item"><a href="{{ route('witness.index') }}">{{ __('Data') }}</a></li>
    </ol>
@endsection

@section('section-body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="col">
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#importWitnessModal"><span class="fas fa-file-import"></span> {{ __('Import') }}</button>
                        <a href="{{ route('witness.create') }}" class="btn btn-primary float-right mr-2"><span class="fas fa-plus"></span> {{ __('Tambah') }}</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="crudWitness" class="table table-striped w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('No') }}</th>
                                    <th class="text-center">{{ __('NIM') }}</th>
                                    <th class="text-center">{{ __('Nama Lengkap') }}</th>
                                    <th class="text-center">{{ __('Kelas') }}</th>
                                    <th class="text-center">{{ __('Program Studi') }}</th>
                                    <th class="text-center">{{ __('Angkatan') }}</th>
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

@section('modal')
    <div class="modal fade" id="importWitnessModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data Saksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('witness.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <a href="{{ asset('document/import/WitnessesDataTemplates.xlsx') }}" download>Format Data</a>

                        <div class="form-group">
                            <input type="file" class="form-control dropify" id="customFile" name="file" accept=".xlsx, .xls, .csv">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var datatable = $('#crudWitness').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('witness.index') }}",
            columns: [
                { data: 'no', name: 'no', render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                }, width: '5%', class: 'text-center' },
                { data: 'nim', name: 'nim', class: 'text-center', width: '10%' },
                { data: 'name', name: 'name' },
                { data: 'grade_name', name: 'grade_name', class: 'text-center', width: '10%' },
                { data: 'study_program_name', name: 'study_program_name', class: 'text-center' },
                { data: 'year', name: 'year', class: 'text-center', width: '5%' },
                { data: 'action', name: 'action', orderable: true, searchable: true, width: '5%' }
            ]
        })
    </script>
@endpush