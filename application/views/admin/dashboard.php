<div class="row">
  <div class="d-flex align-items-strech col-lg-8">
    <div class="card w-100">
      <div class="card-body">
        <img src="<?= base_url() ?>assets/images/welcome_illustrator.jpg" class="img-fluid" alt="Responsive image" />
      </div>
    </div>
  </div>

  <div class="d-flex align-items-strech col-lg-4">
    <div class="card w-100">
      <div class="card-body text-center">
        <img src="<?= base_url() ?>assets/images/skincare_illustrator.jpg" class="img-fluid d-block mx-auto" alt="Responsive image" />
        <?php if ($this->session->userdata('role') == 'User') { ?>
          Ayo cek <b class="text-primary">SKINCARE</b> yang cocok buat kamu !
        <?php } else { ?>
          Ayo cek <b class="text-primary">DAFTAR PENGGUNA</b> website anda, ada yang baru daftar niii...
        <?php } ?>
      </div>
    </div>
  </div>
</div>