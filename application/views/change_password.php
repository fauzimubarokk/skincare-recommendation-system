<div class="row">
  <div class="d-flex align-items-strech">
    <div class="card w-100">
      <div class="card-body">
        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
          <div class="mb-3 mb-sm-0">
            <h5 class="card-title fw-semibold">Ubah Password</h5>
          </div>
        </div>
        <form method="post" action="<?= site_url('authentication/login'); ?>">
          <div class="row">
            <div class="mb-3 col-lg-6 col-md-6">
              <label for="exampleInputEmail1" class="form-label">Password Lama</label>
              <input type="password" name="old_password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-4 col-lg-6 col-md-6">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
            </div>
          </div>
          <input type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Ubah Password">
        </form>
      </div>
    </div>
  </div>
</div>