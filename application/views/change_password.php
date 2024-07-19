<div class="row">
  <div class="d-flex align-items-strech">
    <div class="card w-100">
      <div class="card-body">
        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
          <div class="mb-3 mb-sm-0">
            <h5 class="card-title fw-semibold">Ubah Password</h5>
          </div>
        </div>
        <?php if ($this->session->flashdata('success')) : ?>
          <div id="myAlert" class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')) : ?>
          <div id="myAlert" class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <form method="post" action="<?= site_url('password-changed'); ?>">
          <div class="row">
            <div class="mb-3 col-lg-6 col-md-6">
              <label for="exampleInputEmail1" class="form-label">Password Lama</label>
              <input type="password" name="old_password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-4 col-lg-6 col-md-6">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="new_password" class="form-control" id="exampleInputPassword1" required>
            </div>
          </div>
          <input type="submit" class="btn btn-primary py-8 fs-4 mb-4 rounded-2" value="Ubah Password">
        </form>
      </div>
    </div>
  </div>
</div>