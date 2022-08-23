@extends('layouts.master')

@section('title')
    Master Kendaraan
@endsection

@section('content')

@include('sweetalert::alert')

    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <button onclick="addForm('{{ route('kendaraan.store') }}')" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Tambah</button>
                </div>
                <div class="box-body table-responsive mt-2">
                    <table class="table table-stiped table-bordered" style="text-align: center;">
                        <thead>
                            <th>No</th>
                            <th>Nama Kendaraan</th>
                            <th>Nopol</th>
                            <th>Jenis Aset</th>
                            <th>Status Aset</th>
                            <th>Terakhir Bekerja</th>
                            <th>Terakhir BBM</th>
                            <th>Terakhir Service</th>
                            <th width="15%"><i class="fa fa-cog"></i></th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@include('kendaraan.form')
@endsection

@push('scripts')
<script>
    let table;

$(function () {
    table = $('.table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        autoWidth: false,
        ajax: {
            url: '{{ route('kendaraan.data') }}',
        },
        columns: [
            {data: 'DT_RowIndex', searchable: false, sortable: false},
            {data: 'nama_kendaraan'},
            {data: 'nopol'},
            {data: 'jenis_aset'},
            {data: 'status_aset'},
            {data: 'pekerjaan_terakhir'},
            {data: 'konsumsi_bbm_terakhir'},
            {data: 'service_terakhir'},
        ]
    });

})




    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Kendaraan');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
    }
</script>
@endpush