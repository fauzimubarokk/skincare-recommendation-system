<div class="container mt-5">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title text-primary">Cek Rekomendasi Skincare</h4>
    </div>
    <div class="card-body">
    <?php if ($this->session->flashdata('success')) : ?>
          <!-- <div id="myAlert" class="alert alert-success"><?= $this->session->flashdata('success'); ?>
        </div> -->
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
<!-- Result Modal -->
<div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="resultModalLabel">Hasil Rekomendasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>