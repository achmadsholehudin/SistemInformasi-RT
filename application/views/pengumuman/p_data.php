<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">
                        <?= $title; ?>
                    </div>
                </div>
                <div class="box-body">
                    <?= form_open_multipart('pengumuman/kirim'); ?>
                    <div class="form-group col-md-4">
                        <label for="judul">Judul Pengumuman</label>
                        <input type="text" name="judul" id="judul" class="form-control" value="<?= set_value('judul'); ?>">
                        <?= form_error('judul', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="nama">Nama Publisher</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $user['nama']; ?>" readonly>
                        <?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="tanggal">Tanggal Publikasi</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= set_value('tanggal'); ?>">
                        <?= form_error('tanggal', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="gambar">Upload Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi Pengumuman</label>
                        <textarea name="isi" id="isi" cols="30" rows="5" class="form-control"><?= set_value('isi'); ?></textarea>
                        <?= form_error('isi', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="label label-success"><i class="fa fa-paper-plane"></i> Kirim</button>
                        <button type="reset" class="label label-danger"><i class="fa fa-undo"></i> Batal</button>
                    </div>
                    <?= form_close(); ?>
                    <?= $this->session->flashdata('message'); ?>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Nama Publisher</th>
                                <th>Tanggal</th>
                                <th>Isi</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pengumuman as $p) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $p['judul']; ?></td>
                                    <td><?= $p['nama']; ?></td>
                                    <td><?= $p['tanggal']; ?></td>
                                    <td><?= $p['isi']; ?></td>
                                    <td><img src="<?= base_url('uploads/' . $p['gambar']); ?>" alt="<?= $p['judul']; ?>" width="100"></td>
                                    <td>
                                        <a href="<?= base_url('pengumuman/edit/' . $p['id']); ?>" class="label label-warning btn-sm">Edit</a>
                                        <a href="<?= base_url('pengumuman/delete/' . $p['id']); ?>" class="label label-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pengumuman ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
