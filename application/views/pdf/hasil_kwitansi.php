<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitansi</title>
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
    <h2>HASIL PROSES BARANG</h2>
    <table style="page-break-inside:avoid">
        <tr>
            <td style="width: 10cm; ">Nomor Registrasi : <?= $getDataPasienById['rm']; ?></td>
        </tr>
        <tr>
            <td style="width: 10cm">Dokter : <?= $getDataPasienById['dokter_pengirim']; ?></td>
        </tr>
        <tr>
            <td style="width: 10cm">Nama Pasien : <?= $getDataPasienById['nama_pasien']; ?></td>
        </tr>
    </table>
    <hr>
    <div class="div" style="height: 30px;"></div>
    <table border="1" cellpadding="10" cellspacing="0" style="page-break-inside:avoid; margin: auto; text-align: center; ">
        <tr>
            <td style="width: 5cm">No</td>
            <td style="width: 15cm">Pemeriksaan</td>
            <td style="width: 5cm">Biaya</td>
        </tr>

    </table>
    <div style="height: 10px;"></div>
    <table style="text-align: center;">
        <?php $i = 1; ?>
        <?php foreach ($getDataProgressResultWithID as $row) : ?>
            <tr>
                <td style="width: 5cm; font-size:20px;"><?= $i++; ?></td>
                <td style="width: 15cm; font-size:20px;"><?= $row['progress_sub']; ?></td>
                <td style="width: 5cm; font-size:20px;"><?= $row['progress_tarif']; ?></td>
            </tr>
        <?php endforeach; ?>
        <hr>

        <tr>
            <td style="width: 5cm"></td>
            <td style="width: 20cm"></td>
            <?php



            ?>

            <td style="font-size:30px;">Rp.


                <?php $totalHasil = $getDataPemeriksaanRowQueryWitdId['progress_tarif'];
                $querySubMenu = "SELECT SUM(progress_tarif) as 'total', id_registrasi from sf_progress group by id_registrasi";
                $subMenu = $this->db->query($querySubMenu)->row_array();

                ?>
                <?= $subMenu['total']; ?>



            </td>

        </tr>

    </table>

    <div style="text-align:right; margin-top:80px;">Tanda Tangan</div>
    <div style="text-align:right; margin-top:80px;"><?= $getDataPasienById['petugas']; ?></div>


</body>

</html>