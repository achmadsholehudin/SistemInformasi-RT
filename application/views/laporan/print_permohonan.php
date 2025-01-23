<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <style>
        /* Add your custom CSS styles for printing here */
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 100px;
            margin-bottom: 10px;
        }
        .header h1 {
            margin: 0;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
        .footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="<?= base_url('assets/images/kop_surat.png'); ?>" alt="Kop Surat">
        <h1><?= $title; ?></h1>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Keperluan</th>
                <th>Hari/Tanggal</th>
                <th>Keterangan</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($surat as $srt) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $srt->nama; ?></td>
                    <td><?= $srt->keperluan; ?></td>
                    <td><?= $srt->hari_tanggal; ?></td>
                    <td><?= $srt->keterangan; ?></td>
                    <td><?= $srt->alamat; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="footer">
        <p>Tanda Tangan RT</p>
        <br><br>
        <p>_________________________</p>
    </div>
</body>
</html>
