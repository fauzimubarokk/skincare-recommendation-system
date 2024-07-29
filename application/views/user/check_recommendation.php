<div class="container mt-5">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title text-primary">Cek Rekomendasi Skincare</h4>
    </div>
    <div class="card-body">
    <?php if ($this->session->flashdata('success')) : ?>
        <!-- Result Modal -->
        <div class="modal fade modal-lg" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="resultModalLabel">Hasil Rekomendasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-12 ms-auto">
                    <?php
                    $index = 1;
                    foreach($this->session->flashdata('success') as $data): ?>
                        <div class="card mb-3">
                          <div class="row g-0">
                            <div class="col-md-4">
                              <img src="<?= base_url('uploads/' . $data->gambar); ?>" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                              <div class="card-body">
                                <h5 class="card-title"><?= $data->merk?></h5>
                                <p class="card-text"><?= substr($data->detail,0 , 200) ?>...</p>
                                <p class="card-text"><small class="text-muted">Harga : Rp.<?= $data->harga?></small></p>
                              </div>
                            </div>
                          </div>
                        </div>
                    <?php 
                    $index += 1;
                    endforeach; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <script src="<?= base_url() ?>assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script>
          window.onload = showResultModal(); // call function with parameters on page load
          function showResultModal() {
              var myModal = new bootstrap.Modal(document.getElementById("resultModal"), {});
              document.onreadystatechange = function () {
                myModal.show();
              };
            }
        </script>
      <?php endif; ?>
    <?php if ($this->session->flashdata('error')) : ?>
          <div id="myAlert" class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>
      <form action="<?= site_url('recom/process'); ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="umur" class="form-label">Umur</label>
          <input type="number" class="form-control" name="umur" value="0" required>
        </div>
        <div class="mb-3">
          <label for="id_jenis_skincare" class="form-label">Jenis Skincare</label>
          <select class="form-select" name="id_jenis_skincare" required>
            <?php foreach ($jenis_skincare as $js) : ?>
              <option value="<?= $js->id; ?>"><?= $js->nama; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-3">
          <label for="id_jenis_kulit" class="form-label">Jenis Kulit</label>
          <select class="form-select" name="id_jenis_kulit" required>
            <?php foreach ($jenis_kulit as $jk) : ?>
              <option value="<?= $jk->id; ?>"><?= $jk->nama; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Cek Rekomendasi</button>
      </form>
    </div>
  </div>
</div>