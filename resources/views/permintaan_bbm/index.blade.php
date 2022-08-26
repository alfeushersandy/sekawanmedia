@extends('layouts.master')

@section('title')
    Permohonan BBM
@endsection

@section('content')

@include('sweetalert::alert')

    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="row">
                    <div class="box-header with-border">
                        <button onclick="addForm('{{ route('bensin.store') }}')" class="btn btn-success btn-xs btn-flat"><i class="fa fa-plus-circle"></i> Tambah</button>
                    </div>
                </div>
                <br>
                <div class="box-body table-responsive mt-2">
                    <table class="table table-stiped table-bordered" style="text-align: center;">
                        <thead>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kode Permintaan</th>
                            <th>Kendaraan</th>
                            <th>Driver</th>
                            <th>Jumlah Liter</th>
                            <th width="15%"><i class="fa fa-cog"></i></th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@include('permintaan_bbm.form')
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
            url: '{{ route('bensin.data') }}',
        },
        columns: [
            {data: 'DT_RowIndex', searchable: false, sortable: false},
            {data: 'tanggal'},
            {data: 'kode_permintaan'},
            {data: 'nama_kendaraan'},
            {data: 'nama_driver'},
            {data: 'jumlah'},
            
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