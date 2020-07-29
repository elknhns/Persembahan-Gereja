<h1>LAPORAN KARTU PERSEMBAHAN YANG MASUK</h1>
<h3>Tanggal {{ $dateStart }} s/d {{ $dateEnd }}</h3>
<br>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Umat</th>
            <th>Lingkungan</th>
            <th>Jumlah Persembahan</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    {{ $i = 0 }}
    @foreach ($offerings as $offering)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $offering->person->name }}</td>
            <td>{{ $offering->person->area->name }}</td>
            <td>{{ $offering->value }}</td>
            <td>{{ $offering->created_at->format('d/m/Y') }}</td>
        </tr>
    @endforeach
</table>