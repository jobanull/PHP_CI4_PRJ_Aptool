<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HASIL PROSES BARANG</title>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: arial;
            line-height: 1.65;
            padding-bottom: 1000px;
        }

        .flex-container {
            display: flex;
            flex-wrap: nowrap;
            background-color: DodgerBlue;
        }

        .flex-container>div {
            background-color: #f1f1f1;
            width: 100px;
            margin: 10px;
            text-align: center;
            line-height: 75px;
            font-size: 30px;
        }
    </style>
</head>

<body>
    <div style="background-color: lightblue; height: 100px; text-align:center;">PROFIL KLINIK DAN LOGO</div>
    <h2>HASIL PROSES BARANG</h2>





    <table style="page-break-inside:avoid" border="1">
        <tr>
            <td style="width: 10cm">Nomor Registrasi : <?= $getDataPasienById['rm']; ?></td>
            <td style="width: 10cm">Tanggal : <?= $getDataPasienById['tgl_registrasi']; ?></td>
        </tr>
        <tr>
            <td style="width: 10cm">Nama Pasien : <?= $getDataPasienById['nama_pasien']; ?></td>
            <td></td>
        </tr>
        <tr>
            <td style="width: 10cm">TL/Umur :</td>
            <td>Jam Mulai :</td>
        </tr>
        <tr>
            <td style="width: 10cm">Jenis Kelamin : <?= $getDataPasienById['jenis_kelamin']; ?></td>
            <td>Jam Selesai :</td>
        </tr>
        <tr>
            <td style="width: 10cm">Alamat : <?= $getDataPasienById['alamat']; ?></td>
            <td></td>
        </tr>
    </table>
    <div class="div" style="height: 50px;"></div>
    <table border="1" cellpadding="10" cellspacing="0" style="page-break-inside:avoid; margin: auto; text-align: center; ">
        <tr>
            <td style="width: 5cm">Bidang</td>
            <td style="width: 5cm">Pemeriksaan</td>
            <td style="width: 5cm">Sub Periksa</td>
            <td style="width: 5cm">Hasil</td>
            <td style="width: 5cm">Nilai Nominal</td>
        </tr>

    </table>
    <div style="height: 10px;"></div>
    <table style="text-align: center;">
        <?php foreach ($getDataProgressResultWithID as $row) : ?>
            <tr>
                <td style="width: 5cm;font-size:20px;"><?= $row['progress_bidang']; ?></td>
                <td style="width: 5cm;font-size:20px;"><?= $row['progress']; ?></td>
                <td style="width: 5cm;font-size:20px;"><?= $row['progress_sub']; ?></td>
                <td style="width: 5cm;font-size:20px;"><?= $row['progress_hasil']; ?></td>
                <td style="width: 5cm;font-size:20px;"><?= $row['progress_nominal'] . '&nbsp;' . $row['progress_satuan']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div style="text-align:right; margin-top:80px;">Tanda Tangan</div>
    <div style="text-align:right; margin-top:100px;"><?= $getDataPasienById['petugas']; ?></div>
</body>

</html>