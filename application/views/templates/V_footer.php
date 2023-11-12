        </div>
      </div>
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Laporan MT <?= date('Y') ?></span>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!-- Modal Logout -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel">Ingin Logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah kamu yakin ingin Logout?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
          <a class="btn btn-danger" href="<?= base_url('auth/logout') ?>">Ya</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Tambah User Modal -->
  <div class="modal fade" id="tambahUserModal" tabindex="-1" role="dialog" aria-labelledby="tambahUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahUserModalLabel">Tambah User</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('data-user/tambah') ?>" method="POST">  
            <div class="form-group">
              <label for="inputEmail">Email</label>
              <input type="email" class="form-control form-tambah-user" name="email" id="inputEmail" autocomplete="off" required>
            </div>
            <div class="form-group">
              <label for="inputPassword">Password</label>
              <input type="password" class="form-control form-tambah-user" name="password" id="inputPassword" autocomplete="off" required>
              <small class="form-text">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="showPassword"> Show Password
                </div>
              </small>
            </div>
            <hr>
            <div class="form-group">
              <label for="inputName">Nama Lengkap</label>
              <input type="text" class="form-control form-tambah-user" name="name" id="inputName" autocomplete="off" required>
            </div>
            <div class="form-group">
              <label for="inputNoHP">No. HP</label>
              <input type="text" class="form-control form-tambah-user" name="no_hp" id="inputNoHP" autocomplete="off" required>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input form-tambah-user" type="radio" name="role" id="radioRole1" value="admin">
              <label class="form-check-label" for="radioRole1">Admin</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input form-tambah-user" type="radio" name="role" id="radioRole2" value="mt">
              <label class="form-check-label" for="radioRole2">Master Trainer</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Delete User Modal -->
  <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah kamu yakin ingin menghapus user ini?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
          <a class="btn btn-danger" id="btnDeleteUserModal">Ya</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Tambah Presensi Modal -->
  <div class="modal fade" id="tambahPresensiModal" tabindex="-1" role="dialog" aria-labelledby="tambahPresensiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahPresensiModalLabel">Tambah Presensi</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="<?= base_url('data-presensi/tambah') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-row">
              <div class="col-3">
                <div class="form-group">
                  <label for="inputTanggal">Tanggal Mengajar</label>
                  <input type="date" class="form-control" name="tgl_mengajar" id="inputTanggal" autocomplete="off" max="<?= date("Y-m-d") ?>" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="inputNamaSekolah">Nama Sekolah</label>
                  <input type="text" class="form-control" name="nama_sekolah" id="inputNamaSekolah" autocomplete="off" required>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="inputKelas">Kelas</label>
                  <select class="form-control" id="inputKelas" name="kelas" required>
                    <option selected hidden></option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                    <option value="Guru">Guru</option>
                    <option value="ALL">ALL</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-9">
                <label for="inputFile">Upload File Excel Presensi</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputFilePresensi" name="file_presensi" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                  <label style="white-space: nowrap" class="custom-file-label"><i>Pilih file presensi ...</i></label>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="inputJenisMengajar">Jenis Mengajar</label>
                  <select class="form-control" id="inputJenisMengajar" name="jenis_mengajar" required>
                    <option selected hidden></option>
                    <option value="Online">Online</option>
                    <option value="Offline DIY">Offline DIY</option>
                    <option value="Offline Luar DIY">Offline Luar DIY</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col">
                <div class="form-group">
                  <label for="inputMasterTrainer">MT Yang Mengajar</label>
                  <select class="form-control" id="inputMasterTrainer" name="master_trainer[]" multiple="multiple" style="width: 100%;" required>
                    <?php foreach ($mt as $mt) :?>
                    <option <?php if($mt->name == $_SESSION['name']) { echo 'selected'; } ?> value="<?= $mt->name ?>"><?= $mt->name ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="btnSubmitTambahPresensi">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Delete Presensi Modal -->
  <div class="modal fade" id="deletePresensiModal" tabindex="-1" role="dialog" aria-labelledby="deletePresensiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deletePresensiModalLabel">Delete Data Presensi</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah kamu yakin ingin menghapus data ini?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
          <a class="btn btn-danger" id="btnDeletePresensiModal">Ya</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    var base_url = "<?= base_url() ?>"
  </script>

  <!-- Vendor Javascript -->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/chart.js/Chart.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/sweetalert2/sweetalert2.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/select2/dist/js/select2.min.js') ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/js/laporan-mt.js') ?>"></script>
  <script src="<?= base_url('assets/js/demo/chart-area-demo.js') ?>"></script>
  <script src="<?= base_url('assets/js/demo/chart-pie-demo.js') ?>"></script>
  <script src="<?= base_url('assets/js/demo/datatables-demo.js') ?>"></script>

  <?php if ($this->session->flashdata('icon')) :?>
  <script>
		Swal.fire({
			position: 'top',
			icon: '<?= $this->session->flashdata('icon') ?>',
			title: '<?= $this->session->flashdata('title') ?>',
			text: '<?= $this->session->flashdata('text') ?>',
			width: '24em',
			allowEscapeKey: false,
			allowEnterKey: false,
			showConfirmButton: false,
			timer: 2000,
		})
	</script>
  <?php endif; ?>

</body>

</html>