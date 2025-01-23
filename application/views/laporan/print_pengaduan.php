<!DOCTYPE html>
<html>
<head>
    <title><?= $title; ?></title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2><?= $title; ?></h2>
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Nama lengkap</th>
                <th>Hari/Tanggal</th>
                <th>Keterangan</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php if (!empty($aduan)) : ?>
                <?php foreach ($aduan as $srt) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $srt->nama; ?></td>
                        <td><?= $srt->hari_tanggal; ?></td>
                        <td><?= $srt->keterangan; ?></td>
                        <td>
                            <img src="<?= base_url('uploads/' . (isset($srt->gambar) ? $srt->gambar : 'default.jpg')) ?>" style="width: 120px; height: 75px; margin: 5px;">
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5">No data available</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
