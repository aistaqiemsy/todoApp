<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>

    <link rel="stylesheet" href="/assets/bootstrap.css" type="text/css">
</head>
<body>
    <div class="container-lg">
        <br>
            <a class="btn btn-outline-primary btn-sm rounded text-center" style="width: 140px;" href="/todo/manajer/{{ $idManajer }}">
                Beranda
            </a>
            <a class="btn btn-outline-primary btn-sm rounded text-center" style="width: 140px;" href="/manajer/todo/penugasanBaru/{{ $idManajer }}">
                Penugasan Baru
            </a>
            <a class="btn btn-outline-primary btn-sm rounded text-center" style="width: 140px;" href="/manajer/todo/penugasanSelesai/{{ $idManajer }}">
                Tugas Selesai
            </a>
            <a class="btn btn-outline-primary btn-sm rounded text-center" style="width: 140px;" href="/manajer/todo/penugasanDitolak/{{ $idManajer }}">
                Tugas Ditolak
            </a> 
        <hr>
        @if (count($dataPegawai)<0)
            <center>
                Tidak ada todo!
            </center>
        @else
        <div class="table-responsive">
            <table class="table table-sm table-striped table-hover table-bordered align-middle shadow-sm rounded small">
                <thead class="table-primary">
                    <tr class="text-nowrap">
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $dataPegawai as $dp )
                    <tr class="text-nowrap">
                        <td align="center">{{ $loop->iteration }}</td>
                        <td>{{ $dp->nama }}</td>
                        <td>{{ $dp->jabatan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</body>
</html>