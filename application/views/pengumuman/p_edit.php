<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">
                        Edit Pengumuman
                    </div>
                </div>
                <div class="box-body">
                    <?= form_open_multipart('pengumuman/edit/' . $pengumuman['id']); ?>
                    <div class="form-group col-md-4">
                        <label for="judul">Judul Pengumuman</label>
                        <input type="text" name="judul" id="judul" class="form-control" value="<?= $pengumuman['judul']; ?>">
                        <?= form_error('judul', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="nama">Nama Publisher</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $user['nama']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="tanggal">Tanggal Publikasi</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $pengumuman['tanggal']; ?>">
                        <?= form_error('tanggal', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="gambar">Upload Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control">
                        <img src="<?= base_url('uploads/' . $pengumuman['gambar']); ?>" alt="<?= $pengumuman['judul']; ?>" width="100">
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi Pengumuman</label>
                        <textarea name="isi" id="isi" cols="30" rows="5" class="form-control"><?= $pengumuman['isi']; ?></textarea>
                        <?= form_error('isi', '<small class="form-text text-danger">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <a type="submit" class="label label-success"><i class="fa fa-paper-plane"></i> Update</a>
                        <a href="<?= base_url('pengumuman'); ?>" class="label label-danger"><i class="fa fa-undo"></i> Batal</a>
                    </div>
                    <?= form_close(); ?>
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
        </div>
    </div>
</section>