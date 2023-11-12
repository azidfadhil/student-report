<!-- Data Presensi Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Presensi</h6>
  </div>
  <div class="card-body">
    <form action="<?= base_url('data-presensi/update/' . $presensi[0]->id) ?>" method="POST" enctype="multipart/form-data">
      <div class="form-row">
        <div class="col-3">
          <div class="form-group">
            <label for="inputTanggal">Tanggal Mengajar</label>
            <input type="date" class="form-control" name="tgl_mengajar" id="inputEditTanggal" autocomplete="off" value="<?= $presensi[0]->tgl_mengajar ?>" max="<?= date("Y-m-d") ?>" required>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="inputNamaSekolah">Nama Sekolah</label>
            <input type="text" class="form-control" name="nama_sekolah" id="inputEditNamaSekolah" autocomplete="off" value="<?= $presensi[0]->nama_sekolah ?>" required>
          </div>
        </div>
        <div class="col-3">
          <div class="form-group">
            <label for="inputKelas">Kelas</label>
            <select class="form-control" id="inputEditKelas" name="kelas" required>
              <option selected hidden></option>
              <option <?php if($presensi[0]->kelas == "X") { echo "selected"; } ?> value="X">X</option>
              <option <?php if($presensi[0]->kelas == "XI") { echo "selected"; } ?> value="XI">XI</option>
              <option <?php if($presensi[0]->kelas == "XII") { echo "selected"; } ?> value="XII">XII</option>
              <option <?php if($presensi[0]->kelas == "Guru") { echo "selected"; } ?> value="Guru">Guru</option>
              <option <?php if($presensi[0]->kelas == "ALL") { echo "selected"; } ?> value="ALL">ALL</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="col-9">
          <label for="inputFile">Upload File Excel Presensi</label>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputEditFilePresensi" name="file_presensi" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
            <label style="white-space: nowrap" class="custom-file-label" id="placeholderFile"><?= $presensi[0]->nama_file ?></label>
            <small class="form-text text-success" id="changeFilePresensi">File presensi tidak diubah <i class="fas fa-check-square"></i></small>
          </div>
        </div>
        <div class="col-3">
          <div class="form-group">
            <label for="inputJenisMengajar">Jenis Mengajar</label>
            <select class="form-control" id="inputEditJenisMengajar" name="jenis_mengajar" required>
              <option selected hidden></option>
              <option <?php if($presensi[0]->jenis_mengajar == "Online") { echo "selected"; } ?> value="Online">Online</option>
              <option <?php if($presensi[0]->jenis_mengajar == "Offline DIY") { echo "selected"; } ?> value="Offline DIY">Offline DIY</option>
              <option <?php if($presensi[0]->jenis_mengajar == "Offline Luar DIY") { echo "selected"; } ?> value="Offline Luar DIY">Offline Luar DIY</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="col">
          <div class="form-group">
            <label for="inputMasterTrainer">MT Yang Mengajar</label>
            <select class="form-control" id="inputEditMasterTrainer" name="master_trainer[]" multiple="multiple" style="width: 100%;" required>
              <?php $nmt = explode(',', $presensi[0]->nama_mt);

              foreach ($mt as $mt) { ?>
                <option <?php if(in_array($mt->name, $nmt)) { echo 'selected'; } ?> value="<?= $mt->name ?>"><?= $mt->name ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
      </div>
      <hr>
      <button type="submit" class="btn btn-warning" id="btnEditTambahPresensi">Edit</button>
    </form>
  </div>
</div>