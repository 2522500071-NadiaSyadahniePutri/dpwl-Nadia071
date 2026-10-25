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
            <li class="breadcrumb-item active">Data Mobil</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No. Plat</th>
                    <th>Nama Mobil</th>
                    <th>Jumlah Kursi</th>
                    <th>Jumlah Bagasi</th>
                    <th>Jenis Mobil/<br>Transmisi</th>
                    <th>Tahun</th>
                    <th>Foto</th>
                    <th>Biaya Perhari</th>
                    <th>Catatan Unit</th>
                    <th>Status Unit</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach ($dtmobil as $m) : ?>
                    <tr>
                      <td><?= htmlspecialchars($m['no_plat']) ?></td>
                      <td><?= htmlspecialchars($m['nm_mobil']) ?></td>
                      <td><?= htmlspecialchars($m['nkursi']) ?></td>
                      <td><?= htmlspecialchars($m['nbagasi']) ?></td>
                      <td>
                        <?= htmlspecialchars($m['jns_mobil']) ?><br>
                        <?= htmlspecialchars($m['transmisi']) ?>
                      </td>
                      <td><?= htmlspecialchars($m['thn_buat']) ?></td>
                      <td>
                        <?= htmlspecialchars($m['ft_depan']) ?><br>
                        <?= htmlspecialchars($m['ft_blkg']) ?><br>
                        <?= htmlspecialchars($m['ft_interior']) ?>
                      </td>
                      <td><?= number_format((float) $m['hrg_hari'], 2, ',', '.') ?></td>
                      <td><?= htmlspecialchars($m['cttn_unit']) ?></td>
                      <td><?= htmlspecialchars($m['status_unit']) ?></td>
                      <td>
                        <a href="#"
                           class="btn btn-warning btn-sm">Edit</a>

                        <a href="#"
                           class="btn btn-danger btn-sm">Hapus</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.content-wrapper -->