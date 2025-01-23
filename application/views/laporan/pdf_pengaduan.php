<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2 class="center"><?= $title ?></h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama lengkap</th>
                <th>Hari/Tanggal</th>
                <th>Keterangan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($aduan as $srt) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $srt->nama; ?></td>
                    <td><?= $srt->hari_tanggal; ?></td>
                    <td><?= $srt->keterangan; ?></td>
                    <?php if ($srt->status == 0) : ?>
                        <td>Proses</td>
                    <?php else : ?>
                        <td>Confirmed</td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
