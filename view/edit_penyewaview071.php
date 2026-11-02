<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1>Edit Data Penyewa</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Penyewa</h3>
                </div>

                <form action="<?= base_url('?url=Penyewa_C071/update_penyewa') ?>"
                      method="POST"
                      enctype="multipart/form-data">

                    <div class="card-body">

                        <input type="hidden"
                               name="user_lama"
                               value="<?= htmlspecialchars($penyewa['user_plq071']) ?>">

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text"
                                   class="form-control"
                                   value="<?= htmlspecialchars($penyewa['user_plq071']) ?>"
                                   readonly>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password"
                                   name="Sandi071"
                                   class="form-control"
                                   value="<?= htmlspecialchars($penyewa['Sandi071']) ?>"
                                   maxlength="225"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text"
                                   name="Nik071"
                                   class="form-control"
                                   value="<?= htmlspecialchars($penyewa['Nik071']) ?>"
                                   maxlength="20"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text"
                                   name="nm_lngkp071"
                                   class="form-control"
                                   value="<?= htmlspecialchars($penyewa['nm_lngkp071']) ?>"
                                   maxlength="100"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Nomor HP</label>
                            <input type="text"
                                   name="no_hp071"
                                   class="form-control"
                                   value="<?= htmlspecialchars($penyewa['no_hp071']) ?>"
                                   maxlength="20"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Alamat Lengkap</label>
                            <textarea name="almt_lngkp071"
                                      class="form-control"
                                      rows="3"
                                      required><?= htmlspecialchars($penyewa['almt_lngkp071']) ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Foto KTP Saat Ini</label>
                            <br>

                            <?php if (!empty($penyewa['ft_ktp'])) : ?>
                                <img
                                    src="<?= base_url('img/' . rawurlencode(basename($penyewa['ft_ktp']))) ?>"
                                    width="150"
                                    class="img-thumbnail mb-2"
                                    alt="Foto KTP">
                            <?php else : ?>
                                <p>Belum ada foto KTP.</p>
                            <?php endif; ?>

                            <input type="file"
                                   name="ft_ktp"
                                   class="form-control"
                                   accept=".jpg,.jpeg,.png">

                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengganti foto KTP.
                            </small>
                        </div>

                        <div class="form-group">
                            <label>Foto SIM A Saat Ini</label>
                            <br>

                            <?php if (!empty($penyewa['ft_sim_a'])) : ?>
                                <img
                                    src="<?= base_url('img/' . rawurlencode(basename($penyewa['ft_sim_a']))) ?>"
                                    width="150"
                                    class="img-thumbnail mb-2"
                                    alt="Foto SIM A">
                            <?php else : ?>
                                <p>Belum ada foto SIM A.</p>
                            <?php endif; ?>

                            <input type="file"
                                   name="ft_sim_a"
                                   class="form-control"
                                   accept=".jpg,.jpeg,.png">

                            <small class="text-muted">
                                Kosongkan jika tidak ingin mengganti foto SIM A.
                            </small>
                        </div>

                    </div>

                    <div class="card-footer">

                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Update
                        </button>

                        <a href="<?= base_url('?url=Penyewa_C071/index') ?>"
                           class="btn btn-secondary">
                            Kembali
                        </a>

                    </div>

                </form>
            </div>

        </div>
    </section>
</div>