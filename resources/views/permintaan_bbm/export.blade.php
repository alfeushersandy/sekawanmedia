<h1>Tabel Permohonan BBM</h1>
<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Kode Permintaan</th>
        <th>Kendaraan</th>
        <th>Driver</th>
        <th>Jumlah Liter</th>
    </tr>
    </thead>
    <tbody>
    @php
        $i=1
    @endphp
    @foreach($bbm as $item)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>{{ $item->kode_permintaan }}</td>
            <td>{{ $item->nama_kendaraan }}</td>
            <td>{{ $item->nama_driver }}</td>
            <td>{{ $item->jumlah}}</td>
        </tr>
    @endforeach
    </tbody>
</table>