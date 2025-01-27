<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h3 align='center'>LAPORAN RESERVASI LAPANGAN</h3>
    <p align='center'>Bencoolen Badminton</p>
    <table class="table table-bordered" align="center" rules="all" style="width: 95%" border="1px">
        <thead>
            <tr>
                <th >No</th>
                <th >Nama</th>
                <th >Lapangan</th>
                <th>Tanggal Pemesanan</th> 
                <th >No Handphone</th>
                <th >Waktu Mulai</th>
                <th >Waktu Akhir</th>
                <th >Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach ($cetakPemesanan as $pemesanan)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $pemesanan->nama }}</td>
                    <td>{{ $pemesanan->lapangan_id }}</td>
                    <td>{{ $pemesanan->tgl_pemesanan }}</td>
                    <td>{{ $pemesanan->no_hp }}</td>
                    <td>{{ $pemesanan->waktu_mulai }}</td>
                    <td>{{ $pemesanan->waktu_akhir }}</td>
                    <td>{{ $pemesanan->total_harga }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>