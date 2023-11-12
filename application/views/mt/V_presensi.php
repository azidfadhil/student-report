<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"></h1>
  <a class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" id="btnTutorialTambahPresensi" href="#">
    <i class="fas fa-info-circle fa-sm text-white"></i> Tutorial Input Presensi
  </a>
</div>

<!-- Data User Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Data Presensi</h6>
    <div class="dropdown no-arrow" id="btnTambahPresensi">
      <a href="#" role="button" title="Tambah Presensi" data-toggle="modal" data-target="#tambahPresensiModal" data-backdrop="static">
        <i class="fa fa-plus-square text-gray-400"></i>
      </a>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-sm table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="5%">No</th>
            <th width="10%">Tanggal</th>
            <th>Nama Sekolah</th>
            <th width="7%">Kelas</th>
            <th width="9%">MT</th>
            <th width="15%">Jenis Mengajar</th>
            <th width="7%">Siswa</th>
            <th width="12%">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; foreach($presensi as $p) : ?>        
          <tr>
            <td><?= $i ?></td>
            <td><?= $p->tgl_mengajar ?></td>
            <td><?= $p->nama_sekolah ?></td>
            <td><?= $p->kelas ?></td>
            <td class="text-center">
              <?php $nama_mt = explode(',', $p->nama_mt); ?>
              <button type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="right" data-html="true"
                      title="<?php foreach ($nama_mt as $nmt) { echo '<li>' . $nmt . '</li>'; } ?>">
                Lihat MT <i class="far fa-eye"></i>
              </button>
            </td>
            <td><?= $p->jenis_mengajar ?></td>
            <td><?= $p->jml_siswa ?></td>
            <td class="text-center">
              <a class="btn btn-success btn-sm" href="<?= base_url('data-presensi/lihatpresensi/' . $p->id) ?>" target="_blank" title="Lihat Presensi"><i class="fas fa-file-excel"></i></a>
              <a class="btn btn-secondary btn-sm" href="<?= base_url('data-presensi/downloadpresensi/' . $p->id) ?>" title="Download Presensi"><i class="fas fa-file-download"></i></a>
              <a class="btn btn-warning btn-sm" href="<?= base_url('data-presensi/editpresensi/' . $p->id) ?>" title="Edit Presensi"><i class="fas fa-pencil-alt"></i></a> 
              <a class="btn btn-danger btn-sm" id="btnDeletePresensi" data-toggle="modal" data-target="#deletePresensiModal" data-id="<?= $p->id ?>" title="Delete Presensi"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
          <?php $i++; endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>