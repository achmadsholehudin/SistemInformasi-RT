<!DOCTYPE html>
<html>
<head>
    <title>Laporan Permohonan</title>
    <style>
        /* CSS styling untuk PDF */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .page-header {
            margin-bottom: 20px;
        }
        .page-header h1 {
            font-size: 18px;
            text-align: center;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #000;
            padding: 5px;
        }
        .table th {
            background-color: #f2f2f2;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="page-header">
<div class="header">
        Laporan Permohonan<br>
        RT.003/005
    </div>
    <?php if (!empty($start_date) && !empty($end_date)) : ?>
        <p>Periode: <?= date('d/m/Y', strtotime($start_date)) ?> sampai <?= date('d/m/Y', strtotime($end_date)) ?></p>
    <?php endif; ?>
</div>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Keperluan</th>
            <th>Hari/Tanggal</th>
            <th>Keterangan</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($permohonan as $pmh) : ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $pmh->nama ?></td>
                <td><?= $pmh->keperluan ?></td>
                <td><?= $pmh->hari_tanggal ?></td>
                <td><?= $pmh->keterangan ?></td>
                <td><?= $pmh->alamat ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
