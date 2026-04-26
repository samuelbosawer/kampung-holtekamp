<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat {{ $surat->jenisSurat->nama }}</title>
    <style>
        /* Pengaturan Kertas */
        @page {
            margin: 1cm 2cm;
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            line-height: 1.5;
            color: #000;
        }

        /* Kop Surat */
        .header-table {
            width: 100%;
            border-bottom: 3px double #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        /* Konten Isi */
        .content {
            text-align: justify;
        }

        .data-table {
            width: 100%;
            margin: 15px 0 15px 20px;
            border-collapse: collapse;
        }

        .data-table td {
            padding: 3px;
            vertical-align: top;
        }

        /* Area Tanda Tangan */
        .ttd-container {
            width: 100%;
            margin-top: 40px;
            border-collapse: collapse;
            page-break-inside: avoid;
        }

        .ttd-box {
            width: 50%;
            text-align: center;
            vertical-align: top;
        }

        .signature-wrapper {
            height: 110px; /* Tinggi tetap agar nama pejabat sejajar */
            display: block;
            position: relative;
            margin: 10px 0;
        }

        .img-ttd {
            max-height: 100px; /* Membatasi tinggi gambar */
            max-width: 180px;
            display: block;
            margin: 0 auto;
        }

        .nama-pejabat {
            font-weight: bold;
            text-decoration: underline;
            text-transform: uppercase;
        }

        .footer-info {
            margin-top: 50px;
            font-size: 9pt;
            color: #555;
            border-top: 1px solid #ccc;
            padding-top: 5px;
        }
    </style>
</head>

<body>

    @php
        $nomorSurat = $surat->id . '/' . 
                     $surat->jenis_surat_id . 
                     '-RW' . $surat->warga->rw_id . 
                     '-RT' . $surat->warga->rt_id . 
                     '-W' . $surat->warga->id .'/KH/' . date('Y');
    @endphp

    <table class="header-table">
        <tr>
            <td width="15%" align="center">
                <img src="{{ public_path('assets/img/logo.png') }}" style="width:80px;">
            </td>
            <td width="85%" align="center">
                <h3 style="margin:0; text-transform: uppercase;">PEMERINTAH KAMPUNG HOLTEKAMP</h3>
                <h2 style="margin:0; text-transform: uppercase;">SISTEM MANAJEMEN PELAYANAN DESA</h2>
                <p style="margin:0; font-size: 11pt;">Alamat: Kampung Holtekamp, Distrik Muara Tami, Kota Jayapura</p>
            </td>
        </tr>
    </table>

    <div style="text-align:center; margin-bottom:20px;">
        <h3 style="margin:0;"><u>SURAT {{ strtoupper($surat->jenisSurat->nama) }}</u></h3>
        <p style="margin:5px 0 0 0;">Nomor: {{ $nomorSurat }}</p>
    </div>

    <div class="content">
        <p>Yang bertanda tangan di bawah ini, Pemerintah Kampung Holtekamp, menerangkan bahwa:</p>

        <table class="data-table">
            <tr><td width="30%">NIK</td><td width="2%">:</td><td>{{ $surat->warga->nik }}</td></tr>
            <tr><td>Nama Lengkap</td><td>:</td><td>{{ $surat->warga->nama_lengkap }}</td></tr>
            <tr><td>Jenis Kelamin</td><td>:</td><td>{{ $surat->warga->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td></tr>
            <tr><td>Tempat / Tanggal Lahir</td><td>:</td><td>{{ $surat->warga->tempat_lahir }}, {{ \Carbon\Carbon::parse($surat->warga->tanggal_lahir)->isoFormat('D MMMM Y') }}</td></tr>
            <tr><td>Pekerjaan</td><td>:</td><td>{{ $surat->warga->pekerjaan }}</td></tr>
            <tr><td>Status Perkawinan</td><td>:</td><td>{{ $surat->warga->status }}</td></tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                    {{ $surat->warga->alamat }}<br>
                    RT {{ $surat->warga->rt->nama_rt }} / RW {{ $surat->warga->rw->nama_rw }}
                </td>
            </tr>
        </table>

        <p>Dengan ini mengajukan permohonan pembuatan <strong>{{ $surat->jenisSurat->nama }}</strong> pada tanggal {{ \Carbon\Carbon::parse($surat->tanggal_pengajuan)->translatedFormat('d F Y') }}.</p>
        <p>Demikian surat pengajuan ini dibuat dengan sebenar-benarnya untuk dapat dipergunakan sebagaimana mestinya.</p>
    </div>

    <table class="ttd-container">
        <tr>
           

            <td class="ttd-box">
                Kampung Holtekamp, {{ now()->translatedFormat('d F Y') }}<br>
                <strong>Kepala Kampung</strong>
                
                <div class="signature-wrapper">
                    @if(file_exists(public_path('assets/img/ttd_2.png')))
                        <img src="{{ public_path('assets/img/ttd_2.png') }}" class="img-ttd">
                    @endif
                </div>
                
                <span class="nama-pejabat">{{ $surat->warga->rw->kepala_rw ?? '......................' }}</span>
            </td>
        </tr>
    </table>

    <div class="footer-info">
        <strong>Status Validasi Digital:</strong><br>
        RT: {{ $surat->status_rt }} | RW: {{ $surat->status_rw }} | Kepala Kampung: {{ $surat->status_kepala }}
    </div>

</body>
</html>