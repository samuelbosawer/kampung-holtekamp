<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat {{ $surat->nama_surat }}</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            line-height: 1.6;
        }

        .header {
            width: 100%;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .logo {
            float: left;
            width: 80px;
        }

        .kop {
            text-align: center;
        }

        .kop h2, .kop h3 {
            margin: 0;
        }

        .title {
            text-align: center;
            margin: 20px 0;
        }

        .content {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 4px;
            vertical-align: top;
        }

        .ttd {
            margin-top: 50px;
            width: 100%;
        }

        .ttd td {
            text-align: center;
        }
    </style>
</head>

<body>

    @php
    $nomorSurat = 
        $surat->id . '/' .
        $surat->jenis_surat_id .
        '-RW' . $surat->warga->rw_id .
        '-RT' . $surat->warga->rt_id .
        '-W' . $surat->warga->id .'/KH/' . date('Y');
@endphp




<table width="100%" style="border-bottom:3px solid #000; padding-bottom:10px; margin-bottom:20px;">
    <tr>
        <td width="15%" align="center">
            <img src="{{ asset('assets/img/logo.png') }}" style="width:80px;">
        </td>
        <td width="85%" align="center">
            <h3 style="margin:0;">PEMERINTAH KAMPUNG HOLTEKAMP</h3>
            <h2 style="margin:0;">SISTEM MANAJEMEN PELAYANAN DESA</h2>
            <p style="margin:0;">Alamat: Kampung Holtekamp</p>
        </td>
    </tr>
</table>


{{-- ================= JUDUL SURAT ================= --}}
<div style="text-align:center; margin-bottom:20px;">
    <h3 style="margin:0;"><u>SURAT {{ strtoupper($surat->jenisSurat->nama) }}</u></h3>
    <p style="margin-top:5px;">Nomor: {{ $nomorSurat }}</p>
</div>


{{-- ================= ISI SURAT ================= --}}
<div class="content">

    <p>Yang bertanda tangan di bawah ini, Pemerintah Kampung Holtekamp, menerangkan bahwa:</p>

    <table>
        <tr>
            <td width="30%">NIK</td>
            <td width="2%">:</td>
            <td>{{ $surat->warga->nik }}</td>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <td>{{ $surat->warga->nama_lengkap }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $surat->warga->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
        </tr>
        <tr>
            <td>Tempat / Tanggal Lahir</td>
            <td>:</td>
            <td>{{ $surat->warga->tempat_lahir }}, {{ \Carbon\Carbon::parse($surat->warga->tanggal_lahir)->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{ $surat->warga->pekerjaan }}</td>
        </tr>
        <tr>
            <td>Status Perkawinan</td>
            <td>:</td>
            <td>{{ $surat->warga->status }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>
                {{ $surat->warga->alamat }} <br>
                RT {{ $surat->warga->rt->nama_rt }} / RW {{ $surat->warga->rw->nama_rw }}
            </td>
        </tr>
    </table>

    <br>

    <p>
        Dengan ini mengajukan permohonan pembuatan
        <strong>{{ $surat->jenisSurat->nama }}</strong>
        pada tanggal {{ \Carbon\Carbon::parse($surat->tanggal_pengajuan)->translatedFormat('d F Y') }}.
    </p>

    <p>
        Demikian surat pengajuan ini dibuat dengan sebenar-benarnya untuk dapat dipergunakan sebagaimana mestinya.
    </p>

</div>

{{-- ================= TANDA TANGAN ================= --}}
<table class="ttd">
    <tr>
        <td width="50%">
            Mengetahui,<br>
            Ketua RT<br><br><br><br>
            <b>{{ $surat->warga->rt->kepala_rt ?? '......................' }}</b>
        </td>

        <td width="50%">
            Kampung Holtekamp, {{ now()->translatedFormat('d F Y') }}<br>
            Kepala Kampung<br><br><br><br>
            <b>{{ $surat->warga->rw->kepala_rw ?? '......................' }}</b>
        </td>
    </tr>
</table>

<br>

<p style="font-size:11px;">
    Status Validasi: <br>
    RT : {{ $surat->status_rt }} <br>
    RW : {{ $surat->status_rw }} <br>
    Kepala Kampung : {{ $surat->status_kepala }}
</p>

</body>
</html>
