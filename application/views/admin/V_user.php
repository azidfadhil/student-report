<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"></h1>
  <a class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
    <i class="fas fa-plus fa-sm text-white"></i> Input Multiple User
  </a>
</div>

<!-- Data User Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
    <div class="dropdown no-arrow">
      <a href="#" role="button" title="Tambah User" data-toggle="modal" data-target="#tambahUserModal">
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
            <th>Nama</th>
            <th>Email</th>
            <th width="15%">No. HP</th>
            <th width="10%">Role</th>
            <th width="10%">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1;
          foreach($user as $u) { ?>
          <tr>
            <td><?= $i ?></td>
            <td><?= $u->name ?></td>
            <td><?= $u->email ?></td>
            <td><?= $u->no_hp ?></td>
            <td><?php if ($u->role == 'admin') { echo "Admin"; } else { echo "Master Trainer"; } ?></td>
            <td class="text-center">
              <a class="btn btn-warning btn-sm" href="data-user/edit/<?= $u->id ?>" title="Edit User"><i class="fas fa-edit"></i></a>
              | 
              <a class="btn btn-danger btn-sm" id="btnDeleteUser" href="#" data-toggle="modal" data-target="#deleteUserModal" data-id="<?= $u->id ?>" title="Delete User"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
          <?php $i++; } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>