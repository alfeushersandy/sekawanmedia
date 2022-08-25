<h1>Tabel Permohonan BBM</h1>
<br>
<h2>Tanggal {{$tanggal_awal}} - {{$tanggal_akhir}}</h2>
<br>
<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Kendaraan</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    @php
        $i=1
    @endphp
    @foreach($bbm as $item)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $item['nama_kendaraan'] }}</td>
            <td>{{ $item['total'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>