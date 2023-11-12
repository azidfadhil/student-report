<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
  </div>
  <div class="card-body">
    <form action="<?= base_url('data-user/update/' . $user->id) ?>" method="POST">
      <div class="form-row">
        <div class="col-6">
          <div class="form-group">
            <label for="inputEmailEdit">Email</label>
            <input type="email" class="form-control" name="email" id="inputEmailEdit" autocomplete="off" required value="<?= $user->email ?>">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="inputPasswordEdit">Password</label>
            <input type="password" class="form-control" id="inputPasswordEdit" name="password" autocomplete="off" required value="<?= $user->password ?>">
            <small class="form-text">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="showPasswordEdit"> Show Password
              </div>
            </small>
          </div>
        </div>
      </div>
      <hr>
      <div class="form-row">
        <div class="col-6">
          <div class="form-group">
            <label for="inputNameEdit">Nama Lengkap</label>
            <input type="text" class="form-control" name="name" id="inputNameEdit" autocomplete="off" required value="<?= $user->name ?>">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="inputNoHP_edit">No. HP</label>
            <input type="text" class="form-control" name="no_hp" id="inputNoHP_edit" autocomplete="off" required value="<?= $user->no_hp ?>">
          </div>
        </div>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="role" id="radioRole1Edit" <?php if ($user->role == 'admin') { echo 'checked'; } ?> value="admin">
        <label class="form-check-label" for="radioRole1Edit">Admin</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="role" id="radioRole2Edit" <?php if ($user->role == 'mt') { echo 'checked'; } ?> value="mt">
        <label class="form-check-label" for="radioRole2Edit">Master Trainer</label>
      </div>
      <hr>
      <button type="submit" class="btn btn-warning">Edit</button>
    </form>
  </div>
</div>