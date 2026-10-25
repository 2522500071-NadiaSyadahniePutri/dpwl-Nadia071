<!-- Content Wrapper -->
<div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">DATA MOBIL</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Data Mobil
                        </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card">

                <div class="card-body">

                    <!-- Tombol Tambah Data Mobil -->
                    <a href="<?= base_url('?url=Mobil_C/create_mobil') ?>"
                       class="btn btn-primary mb-3">
                        <i class="fas fa-car"></i>
                        Tambah Data Mobil
                    </a>

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">

                            <!-- Judul Kolom -->
                            <thead>
                                <tr>
                                    <th>No. Plat</th>
                                    <th>Nama Mobil</th>
                                    <th>Jumlah Kursi</th>
                                    <th>Jumlah Bagasi</th>
                                    <th>Jenis Mobil</th>
                                    <th>Transmisi</th>
                                    <th>Tahun</th>
                                    <th>Foto</th>
                                    <th>Biaya Perhari</th>
                                    <th>Catatan Unit</th>
                                    <th>Status Unit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <!-- Isi Tabel -->
                            <tbody>

                                <?php if (!empty($dtmobil)) : ?>

                                    <?php foreach ($dtmobil as $m) : ?>

                                        <tr>

                                            <!-- Nomor Plat -->
                                            <td>
                                                <?= htmlspecialchars($m['no_plat']) ?>
                                            </td>

                                            <!-- Nama Mobil -->
                                            <td>
                                                <?= htmlspecialchars($m['nm_mobil']) ?>
                                            </td>

                                            <!-- Jumlah Kursi -->
                                            <td>
                                                <?= htmlspecialchars($m['nkursi']) ?>
                                            </td>

                                            <!-- Jumlah Bagasi -->
                                            <td>
                                                <?= htmlspecialchars($m['nbagasi']) ?>
                                            </td>

                                            <!-- Jenis Mobil -->
                                            <td>
                                                <?= htmlspecialchars($m['jns_mobil']) ?>
                                            </td>

                                            <!-- Transmisi -->
                                            <td>
                                                <?= htmlspecialchars($m['transmisi']) ?>
                                            </td>

                                            <!-- Tahun -->
                                            <td>
                                                <?= htmlspecialchars($m['thn_buat']) ?>
                                            </td>

                                            <!-- Foto Mobil -->
                                            <td style="min-width:120px;">

                                                <?php
                                                $foto = [
                                                    $m['ft_depan'],
                                                    $m['ft_blkg'],
                                                    $m['ft_interior']
                                                ];

                                                foreach ($foto as $namaFoto) :
                                                    if (!empty($namaFoto)) :
                                                ?>

                                                    <img
                                                        src="<?= base_url('img/' . rawurlencode(basename($namaFoto))) ?>"
                                                        alt="Foto Mobil"
                                                        style="width:100px; height:auto; margin-bottom:5px; border-radius:5px;"
                                                    >

                                                    <br>

                                                <?php
                                                    endif;
                                                endforeach;
                                                ?>

                                            </td>

                                            <!-- Biaya Per Hari -->
                                            <td>
                                                Rp <?= number_format(
                                                    (float) $m['hrg_hari'],
                                                    0,
                                                    ',',
                                                    '.'
                                                ) ?>
                                            </td>

                                            <!-- Catatan Unit -->
                                            <td>
                                                <?= htmlspecialchars($m['cttn_unit'] ?? '') ?>
                                            </td>

                                            <!-- Status Unit -->
                                            <td>
                                                <?= htmlspecialchars($m['status_unit']) ?>
                                            </td>

                                            <!-- Tombol Aksi -->
                                            <td style="min-width:100px;">

                                                <!-- Tombol Edit -->
                                                <a
                                                    href="<?= base_url('?url=Mobil_C/edit_mobil&no_plat=' . urlencode($m['no_plat'])) ?>"
                                                    class="btn btn-warning btn-sm mb-1">

                                                    <i class="fas fa-edit"></i>
                                                    Edit

                                                </a>

                                                <br>

                                                <!-- Tombol Hapus -->
                                                <a
                                                    href="#"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus data mobil ini?')">

                                                    <i class="fas fa-trash"></i>
                                                    Hapus

                                                </a>

                                            </td>

                                        </tr>

                                    <?php endforeach; ?>

                                <?php else : ?>

                                    <tr>
                                        <td colspan="12" class="text-center">
                                            Data mobil belum tersedia.
                                        </td>
                                    </tr>

                                <?php endif; ?>

                            </tbody>

                        </table>

                    </div>

                </div>
            </div>

        </div>
    </section>

</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>