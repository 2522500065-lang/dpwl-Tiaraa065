<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Ubah Data Penyewa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('Penyewa_C065/index') ?>">Data Penyewa</a></li>
            <li class="breadcrumb-item active">Ubah Data Penyewa</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-edit"></i> Form Edit Data Penyewa
          </h3>
        </div>

        <!-- Form Edit Data Penyewa -->
        <form action="<?= base_url('Penyewa_C065/UpdatePenyewa') ?>" method="post" enctype="multipart/form-data">
          <div class="card-body">
            
            <!-- Hidden Input Foto Asli -->
            <input type="hidden" name="ft_ktp_asli" value="<?= $penyewa['ft_ktp065'] ?? ''; ?>">
            <input type="hidden" name="ft_sim_a_asli" value="<?= $penyewa['ft_sim_a065'] ?? ''; ?>">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="user_plg065">Username (User Pelanggan)</label>
                  <input type="text" name="user_plg065" id="user_plg065" class="form-control" value="<?= htmlspecialchars($penyewa['user_plg065'] ?? ''); ?>" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="Sandi065">Kata Sandi (Password)</label>
                  <input type="password" name="Sandi065" id="Sandi065" class="form-control" value="<?= htmlspecialchars($penyewa['Sandi065'] ?? ''); ?>" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="Nik065">NIK</label>
                  <input type="text" name="Nik065" id="Nik065" class="form-control" value="<?= htmlspecialchars($penyewa['Nik065'] ?? ''); ?>" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="nm_lngkp065">Nama Lengkap</label>
                  <input type="text" name="nm_lngkp065" id="nm_lngkp065" class="form-control" value="<?= htmlspecialchars($penyewa['nm_lngkp065'] ?? ''); ?>" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="no_hp065">No. Handphone</label>
                  <input type="text" name="no_hp065" id="no_hp065" class="form-control" value="<?= htmlspecialchars($penyewa['no_hp065'] ?? ''); ?>" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="almt_lngkp065">Alamat Lengkap</label>
                  <textarea name="almt_lngkp065" id="almt_lngkp065" class="form-control" rows="3" required><?= htmlspecialchars($penyewa['almt_lngkp065'] ?? ''); ?></textarea>
                </div>
              </div>
            </div>

            <h5 class="mt-3">Dokumen Identitas</h5>
            <hr>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="ft_ktp">Foto KTP (ft_ktp)</label><br>
                  <?php if (!empty($penyewa['ft_ktp065'])) : ?>
                    <img src="<?= base_url('img/' . $penyewa['ft_ktp065']); ?>" style="width: 120px; height: auto;" class="mb-2 rounded">
                  <?php endif; ?>
                  <input type="file" name="ft_ktp" id="ft_ktp" class="form-control-file" accept=".jpg,.jpeg,.png">
                  <small class="form-text text-muted">Abaikan jika tidak ingin mengubah Foto KTP</small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="ft_sim_a">Foto SIM A (ft_sim_a)</label><br>
                  <?php if (!empty($penyewa['ft_sim_a065'])) : ?>
                    <img src="<?= base_url('img/' . $penyewa['ft_sim_a065']); ?>" style="width: 120px; height: auto;" class="mb-2 rounded">
                  <?php endif; ?>
                  <input type="file" name="ft_sim_a" id="ft_sim_a" class="form-control-file" accept=".jpg,.jpeg,.png">
                  <small class="form-text text-muted">Abaikan jika tidak ingin mengubah Foto SIM A</small>
                </div>
              </div>
            </div>

          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Perbarui Data</button>
            <a href="<?= base_url('Penyewa_C065/index') ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Batal</a>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>