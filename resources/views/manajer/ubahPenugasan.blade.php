<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penugasan Baru</title>

    <link rel="stylesheet" type="text/css" href="/assets/bootstrap.css">
    <style>
        /* Menambahkan margin atau padding pada body */
        body {
            padding-top: 15px; /* Menambahkan jarak atas */
        }
    </style>
</head>
<body>
    <div class="container-lg">
            <a class="btn btn-outline-primary btn-sm rounded text-center" style="width: 140px;" href="/todo/manajer/{{ $adminId }}">
                Beranda
            </a>
            <a class="btn btn-outline-primary btn-sm rounded text-center" style="width: 140px;" href="/manajer/todo/penugasanBaru/{{ $adminId }}">
                Penugasan Baru
            </a>
            <a class="btn btn-outline-primary btn-sm rounded text-center" style="width: 140px;" href="/manajer/todo/penugasanSelesai/{{ $adminId }}">
                Tugas Selesai
            </a>
            <a class="btn btn-outline-primary btn-sm rounded text-center" style="width: 140px;" href="/manajer/todo/penugasanDitolak/{{ $adminId }}">
                Tugas Ditolak
            </a> 
        <hr>
        <center>
            Ubah Data Tugas
        </center>
        @foreach ( $detailTodo as $dt )
        <form action="/manajer/todo/simpanPerubahanPenugasan/{{ $dt->id }}/{{ $adminId }}" method="get">
            @csrf
            <table>
                <tr>
                    <td>Nama Tugas</td>
                    <td><input type="text" name="namaTodo" value="{{ $dt->tugas }}" class="form-control input-lg"></td>
                </tr>
                <?php
                    //format tanggal dalam SQL ke HTML
                    $tanggalMulai = date('Y-m-d', strtotime($dt->waktu_mulai)); 
                    $tanggalSelesai = date('Y-m-d', strtotime($dt->waktu_selesai));
                ?>
                <tr>
                    <td>Waktu Mulai</td>
                    <td><input type="date" name="tanggalMulai" value="{{ $tanggalMulai }}"></td>
                </tr>
                <tr>
                    <td>Waktu Selesai</td>
                    <td><input type="date" name="tanggalSelesai" value="{{ $tanggalSelesai }}"></td>
                </tr>
                <tr>
                    <td>Delegator</td>
                    <td>
                        <select name="pemberiTugas">
                        <option selected value="{{ $dt->tugas_dari }}">{{ $dt->nama_pemberi }}</option>
                        @foreach ( $delegator as $d )
                        <option value="{{ $d->id }}">{{ $d->nama }}</option>
                        @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Pelaksana</td>
                    <td>
                        <select name="namaPenugas">
                            <option selected value="{{ $dt->tugas_untuk }}">{{ $dt->nama_penerima}}</option>
                            @foreach ( $pelaksana as $p )
                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Ubah Penugasan" class="btn btn-outline-primary rounded text-center"></td>
                </tr>
            </table>
        </form>
        @endforeach
    </div>
</body>
</html>