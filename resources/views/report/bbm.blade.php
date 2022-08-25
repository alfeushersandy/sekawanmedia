@extends('layouts.master')

@section('title')
    Permohonan Kendaraan
@endsection

@section('content')

@include('sweetalert::alert')

<div class="col-md-5">
    <form action="{{ route('bensin.export')}}" class="form-tanggal tanggal" method="POST" id="tanggal">
        @csrf
        <div class="form-group">
            <div class="row">
                <label for="kode_produk" class="col-lg-2">Tanggal</label>
            </div>
            <div class="row">
                  <div class="input-group">
                    <input type="date" class="form-control datepicker date1" name="date1">
                  </div>
                  <div class="input-group">
                      <input type="date" class="form-control datepicker date2" name="date2">
                      <span class="input-group-btn">
                          <button class="btn btn-info btn-flat" type="button" id="cari">Cari</button>
                      </span>
                  </div>
            </div>
        </div>
    </form>
</div>

    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="row">
                    <div class="box-header with-border mt-2">
                        <a href="{{route('bensin.export')}}" target="_blank" onclick="event.preventDefault();
                        document.getElementById('tanggal').submit();" class="btn btn-info">export to excel</a>
                    </div>
                </div>
                <br>
                <div class="box-body table-responsive mt-2">
                    <table class="table table-stiped table-bordered" style="text-align: center;">
                        <thead>
                            <th>No</th>
                            <th>Kendaraan</th>
                            <th>Total BBM</th>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    let table;
    $(function () {
      table = $(".table").DataTable({
            responsive: false,
            processing: true,
            serverSide: false,
            autoWidth: false,
            data:[],
            columns: [
                    {data: 'DT_RowIndex', searchable: false, sortable: false},
                    {data: 'nama_kendaraan'},
                    {data: 'total'},
                ],
            })
        
    });

    $('#cari').on("click", function(event){
      let tanggal_awal = $('.date1').val();
      let tanggal_akhir = $('.date2').val();
      table.ajax.url('/bbm/data/'+tanggal_awal+'/'+tanggal_akhir);
      table.ajax.reload();
    })
</script>
@endpush