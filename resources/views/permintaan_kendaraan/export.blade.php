<h1>Tabel Permohonan Kendaraan</h1>
<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Kode Permintaan</th>
        <th>Pemohon</th>
        <th>Keperluan</th>
        <th>Kendaraan</th>
        <th>Driver</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @php
        $i=1
    @endphp
    @foreach($permintaan as $item)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $item->kode_permintaan }}</td>
            <td>{{ $item->pemohon }}</td>
            <td>{{ $item->keperluan }}</td>
            <td>{{ $item->nama_kendaraan }}</td>
            <td>{{ $item->nama_driver}}</td>
            <td>{{ $item->tanggal_pinjam }}</td>
            <td>{{ $item->tanggal_kembali }}</td>
            <td>{{ $item->status }}</td>
        </tr>
    @endforeach
    </tbody>
</table>